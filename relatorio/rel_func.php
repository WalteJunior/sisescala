<?php
session_start();
require_once __DIR__ . '/../vendor/autoload.php';
setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'portuguese');


// Conexão com o banco de dados
$con = new mysqli("localhost", "root", "", "sisescala");
if ($con->connect_error) {
    die("Falha na conexão: " . $con->connect_error);
}

// Verificar se o id_func está na sessão
if (isset($_SESSION['id_func'])) {
    $id_func = $_SESSION['id_func'];
} else {
    die("ID do funcionário não encontrado na sessão.");
}

// Buscar dados do funcionário
$sql_func = "SELECT nome_func, cargo_func, telefone_func, email_func FROM funcionario WHERE id_func = $id_func";
$result_func = $con->query($sql_func);
if ($result_func->num_rows == 0) {
    die("Funcionário não encontrado.");
}
$funcionario = $result_func->fetch_assoc();

// Buscar escala do funcionário e ordenar por data
$sql_escala = "SELECT data, hora_inicio, hora_fim, tipo_turno FROM escala WHERE id_func = $id_func ORDER BY data";
$result_escala = $con->query($sql_escala);

// CSS embutido
$css = "
<style>
    @import url('https://fonts.googleapis.com/css?family=Cambo');

    .cabecalho {
        width: 100%;
    }
    table { width: 100%; border-collapse: collapse; }
    th, td { padding: 8px; border: 1px solid #007bff; text-align: center; }
    th { background-color: #007bff; color: white; }
    h3 { text-align: center; margin-top: 20px; color: #333; }

    .titcab {
        font-family: 'Cambo', serif;
        font-size: 20px;
        text-align: right;
        float: right;
        width: 82%;
        line-height: 70px;
    }

    .imgcab {
        width: 90px;
        background-image: url('/sisescala/assets/logo.jpeg'); /* Caminho absoluto para a imagem */
        background-size: 90px 90px; /* Tamanho da imagem */
        background-repeat: no-repeat;
        padding-left: 100px;
        float: left;
    }

    .titulorel {
        background: #eee;
        padding: 10px;
        margin: 0;
        text-align: center;
    }

    hr {
        padding: 0 !important;
        margin: 0 !important;
    }

    .referencia {
        padding: 0 10px 5px;
        font-family: 'Arial';
        display:flex;
    }

    h2, h4 {
        margin: 5px !important;
        padding: 0 !important;
    }

    .ref1 {
        width: 30%;
    }

    .ref2 {
        width: 68%;
    }

    .dados {
        height: 66%;
        max-height: 67%;
        padding: 0 10px;
        margin-top: 15px;
    }

    .fontedados {
        font-size: 12px !important;
        font-family: 'Arial';
    }

    .rodape {
        width: 100%;
        bottom: 0;
        text-align: right;
        font-size: 10px !important;
        font-family: 'Arial';
    }

    .grupoforn {
        padding: 10px;
        border-bottom: 1px solid #000;
        background: #ddd;
        font-weight: bold;
    }
</style>
";

// Cabeçalho do PDF
$html = $css . "
<div class='cabecalho'>
    <div class='imgcab'></div>
    <div class='titcab'><strong>Industria Petropolis Ltda.</strong></div>
</div>
<div class='titulorel'><strong>Relatório de escala do Funcionário</strong></div>
<br>
<section width='100%' class='referencia'>
    <div>
        <p class='ref1'><strong>Nome:</strong> {$funcionario['nome_func']}</p>
        <p class='ref2'><strong>Cargo:</strong> {$funcionario['cargo_func']}</p>
    </div>
    <div>
        <p class='ref1'><strong>Telefone:</strong> {$funcionario['telefone_func']}</p>
        <p class='ref2'><strong>Email:</strong> {$funcionario['email_func']}</p>
    </div>
</section>
<br>";

// Variáveis de controle para mudança de mês
$current_month = "";
$first_month_table_open = false;

// Gerar tabelas mensais no PDF
while ($escala = $result_escala->fetch_assoc()) {
    $data = strtotime($escala['data']);
    $month_year = strftime("%B de %Y", $data);  // Nome do mês em português
    $formatted_date = date("d/m/Y", $data);
    $hora_inicio = date("H:i", strtotime($escala['hora_inicio']));
    $hora_fim = date("H:i", strtotime($escala['hora_fim']));
    $turno = ucfirst($escala['tipo_turno']);

    // Se o mês mudou, fechar a tabela anterior e iniciar uma nova
    if ($month_year !== $current_month) {
        if ($first_month_table_open) {
            $html .= "</tbody></table><br>";  // Fecha a tabela anterior
        }

        // Iniciar nova tabela para o mês atual
        $html .= "<h3>$month_year</h3>";
        $html .= "<table border='1' cellspacing='0' cellpadding='5' class='fontedados'>
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
    $html .= "
        <tr>
            <td>{$formatted_date}</td>
            <td>{$hora_inicio}</td>
            <td>{$hora_fim}</td>
            <td>{$turno}</td>
        </tr>";
}

// Fechar a última tabela
if ($first_month_table_open) {
    $html .= "</tbody></table>";
}

// Rodapé com a data de emissão
$htmlfooter = "
<hr>
<div class='rodape'>Emissão: " . date('d/m/Y - H:i') . "</div>";

// Gerar o PDF usando o mPDF
$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4']);
$mpdf->SetHTMLHeader("<div style='text-align: right;'>Página {PAGENO} de {nbpg}</div>");

// Adicionar conteúdo e rodapé
$mpdf->WriteHTML($html);
$mpdf->SetHTMLFooter($htmlfooter);

// Saída do PDF
$mpdf->Output("Relatório_{$funcionario['nome_func']}.pdf", "I");

exit;
?>
