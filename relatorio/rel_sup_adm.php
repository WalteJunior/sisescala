<?php
session_start();
require_once __DIR__ . '/../vendor/autoload.php';
setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Sao_Paulo'); 

// Conexão com o banco de dados
$con = new mysqli("localhost", "root", "", "sisescala");
if ($con->connect_error) {
    die("Falha na conexão: " . $con->connect_error);
}

// Verificar nível de usuário
if ($_SESSION['UsuarioNivel'] < 2) {
    die("Acesso restrito para supervisores e administradores.");
}

// Parâmetros do formulário
$funcionarios = isset($_GET['funcionarios']) ? $_GET['funcionarios'] : [];
$data_inicio = isset($_GET['data_inicio']) ? $_GET['data_inicio'] : '';
$data_fim = isset($_GET['data_fim']) ? $_GET['data_fim'] : '';
$tipo_turno = isset($_GET['tipo_turno']) ? $_GET['tipo_turno'] : '';

// Consultar dados dos funcionários selecionados
$sql_funcionarios = "SELECT id_func, nome_func, cargo_func, telefone_func, email_func FROM funcionario";
if ($funcionarios) {
    $ids_funcionarios = implode(",", array_map('intval', $funcionarios));
    $sql_funcionarios .= " WHERE id_func IN ($ids_funcionarios)";
}
$result_funcionarios = $con->query($sql_funcionarios);

// CSS embutido
$css ="
<style>
    @import url('https://fonts.googleapis.com/css?family=Cambo');
    .cabecalho { width: 100%; }
    table { width: 100%; border-collapse: collapse; }
    th, td { padding: 8px; border: 1px solid #007bff; text-align: center; }
    th { background-color: #007bff; color: white; }
    h3 { text-align: center; margin-top: 20px; color: #333; }
    .titcab { font-family: 'Cambo', serif; font-size: 20px; text-align: right; float: right; width: 82%; line-height: 70px; }
    .imgcab { width: 90px; }
    .titulorel { background: #eee; padding: 10px; margin: 0; text-align: center; }
    hr { padding: 0 !important; margin: 0 !important; }
    .referencia { padding: 0 10px 5px; font-family: 'Arial'; display:flex; }
    h2, h4 { margin: 5px !important; padding: 0 !important; }
    .ref1 { width: 30%; }
    .ref2 { width: 68%; }
    .dados { height: 66%; max-height: 67%; padding: 0 10px; margin-top: 15px; }
    .fontedados { font-size: 12px !important; font-family: 'Arial'; }
    .rodape { width: 100%; bottom: 0; text-align: right; font-size: 10px !important; font-family: 'Arial'; }
    .grupoforn { padding: 10px; background: #ddd; font-weight: bold; }
</style>
"; 

// Cabeçalho do PDF
$html = $css . "<div class='cabecalho'>
                    <div class='imgcab'><img src='../assets/logo.jpeg' alt=''></div>
                    <div class='titcab'><strong>Industria Petropolis Ltda.</strong></div>
                </div>
                <div class='titulorel'><strong>Relatório de Funcionario(os)</strong></div><br>";

// Contador de funcionários
$total_funcionarios = $result_funcionarios->num_rows;
$contador_funcionarios = 0;

// Gerar relatório para cada funcionário que atende aos critérios
while ($funcionario = $result_funcionarios->fetch_assoc()) {
    $contador_funcionarios++;
    $sql_escala = "SELECT data, hora_inicio, hora_fim, tipo_turno FROM escala 
                   WHERE id_func = {$funcionario['id_func']}";

    // Adicionar os filtros de data e turno, se aplicável
    if ($data_inicio) {
        $sql_escala .= " AND data >= '$data_inicio'";
    }
    if ($data_fim) {
        $sql_escala .= " AND data <= '$data_fim'";
    }
    if ($tipo_turno) {
        $sql_escala .= " AND tipo_turno = '$tipo_turno'";
    }
    $sql_escala .= " ORDER BY data";

    $result_escala = $con->query($sql_escala);

    // Verificar se o funcionário tem escalas que atendem aos critérios
    if ($result_escala->num_rows > 0) {
        $html .= "<section class='referencia'>
                    <div>
                        <p class='ref1'><strong>Nome:</strong> {$funcionario['nome_func']}</p>
                        <p class='ref2'><strong>Cargo:</strong> {$funcionario['cargo_func']}</p>
                        <p class='ref1'><strong>Telefone:</strong> {$funcionario['telefone_func']}</p>
                        <p class='ref2'><strong>Email:</strong> {$funcionario['email_func']}</p>
                    </div>
                  </section><br>";

        // Variáveis de controle para mudança de mês
        $current_month = "";
        $first_month_table_open = false;

        // Gerar tabelas mensais no PDF
        while ($escala = $result_escala->fetch_assoc()) {
            $data = strtotime($escala['data']);
            $month_year = ucfirst(strftime("%B de %Y", $data));
            $formatted_date = date("d/m/Y", $data);
            $hora_inicio = date("H:i", strtotime($escala['hora_inicio']));
            $hora_fim = date("H:i", strtotime($escala['hora_fim']));
            $turno = ucfirst($escala['tipo_turno']);

            // Se o mês mudou, fechar a tabela anterior e iniciar uma nova
            if ($month_year !== $current_month) {
                if ($first_month_table_open) {
                    $html .= "</tbody></table><br>";
                }

                $html .= "<h3>$month_year</h3>
                          <table border='1' cellspacing='0' cellpadding='5' class='fontedados'>
                            <thead>
                                <tr>
                                    <th>Data</th>
                                    <th>Hora Início</th>
                                    <th>Hora Fim</th>
                                    <th>Turno</th>
                                </tr>
                            </thead>
                            <tbody>";
                
                $current_month = $month_year;
                $first_month_table_open = true;
            }

            // Adicionar linha na tabela do mês atual
            $html .= "<tr>
                        <td>{$formatted_date}</td>
                        <td>{$hora_inicio}</td>
                        <td>{$hora_fim}</td>
                        <td>{$turno}</td>
                      </tr>";
        }

        // Fechar a última tabela do funcionário
        if ($first_month_table_open) {
            $html .= "</tbody></table><br>";
        }

        // Consulta para exibir as solicitações de substituição do funcionário
$sql_substituicoes = "SELECT motivo, data_solic, substituto, ativo_sub FROM substituicao WHERE solicitante = '{$funcionario['nome_func']}'";
$result_substituicoes = $con->query($sql_substituicoes);

if ($result_substituicoes->num_rows > 0) {
    $html .= "<h3>Solicitações de Substituição de {$funcionario['nome_func']}</h3>
              <table border='1' cellspacing='0' cellpadding='5' class='fontedados'>
                <thead>
                    <tr>
                        <th>Motivo</th>
                        <th>Data Solicitação</th>
                        <th>Substituto</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>";
    
    while ($substituicao = $result_substituicoes->fetch_assoc()) {
        $data_solic = date("d/m/Y", strtotime($substituicao['data_solic']));
        $html .= "<tr>
                    <td>{$substituicao['motivo']}</td>
                    <td>{$data_solic}</td>
                    <td>{$substituicao['substituto']}</td>
                    <td>{$substituicao['ativo_sub']}</td>
                  </tr>";
    }
    $html .= "</tbody></table><br>";
}

        // Adicionar linha horizontal somente se não for o último funcionário
        if ($contador_funcionarios < $total_funcionarios) {
            $html .= "<hr style='border: 0; border-top: 1px solid #007bff; margin: 20px 0;'>";
        }
    }
}

// Rodapé do PDF
$htmlfooter = "<hr><div class='rodape'>Emissão: " . date('d/m/Y - H:i') . " (Horário de Brasília)</div>";

// Gerar o PDF
$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4']);
$mpdf->SetHTMLHeader("<div style='text-align: right;'>Página {PAGENO} de {nbpg}</div>");
$mpdf->WriteHTML($html);
$mpdf->SetHTMLFooter($htmlfooter);
$mpdf->Output("Relatório_Supervisor_Administrador.pdf", "I");

exit;
?>
