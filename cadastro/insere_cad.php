<?php
session_start(); // Inicia a sessão

// Conexão com o banco de dados
$con = mysqli_connect('localhost', 'root', '', 'sisescala');

if (!$con) {
    die("Falha na conexão com o banco de dados: " . mysqli_connect_error());
}

// Recebe os dados do formulário
$nome      					= $_POST["nome"];
$usuario   					= $_POST["usuario"];
$senha     					= $_POST["senha"];
$email    					= $_POST["email"];
$telefone  					= $_POST["telefone"];
$sexo      					= $_POST["sexo"];
$cep_end                    = $_POST["cep_end"];
$rua_end                    = $_POST["rua_end"];
$compl_end                  = $_POST["compl_end"];
$bairro_end                 = $_POST["bairro_end"];
$cidade_end                 = $_POST["cidade_end"];
$estado_end                 = $_POST["estado_end"];

// Inserção na tabela usuarios
$sql_usuarios = "INSERT INTO usuarios (nome, usuario, senha, email) ";
$sql_usuarios .= "VALUES ('$nome', '$usuario', '".sha1($senha)."', '$email');";

// Executa a inserção na tabela usuarios
$resultado_usuario = mysqli_query($con, $sql_usuarios) or die(mysqli_error($con));

// Captura o ID do usuário recém-inserido (para armazenar na sessão)
$id_usuario = mysqli_insert_id($con);

// Inserção na tabela funcionario
$sql_funcionario = "INSERT INTO funcionario (nome_func, telefone_func, sexo_func, email_func) ";
$sql_funcionario .= "VALUES ('$nome', '$telefone', '$sexo', '$email');";

// Executa a inserção na tabela funcionario
$resultado_funcionario = mysqli_query($con, $sql_funcionario) or die(mysqli_error($con));

// Captura o ID do funcionário recém-inserido
$id_func = mysqli_insert_id($con);

// Inserção na tabela endereco usando o id_func como chave estrangeira
$sql_endereco = "INSERT INTO endereco (id_func, rua_end, compl_end, cep_end, bairro_end, cidade_end, estado_end) ";
$sql_endereco .= "VALUES ('$id_func', '$rua_end', '$compl_end', '$cep_end', '$bairro_end', '$cidade_end', '$estado_end');";

// Executa a inserção na tabela endereco
$resultado_endereco =  mysqli_query($con, $sql_endereco) or die(mysqli_error($con));

// Verifica se os registros foram inseridos com sucesso
if ($resultado_usuario && $resultado_funcionario && $resultado_endereco) {
    // Armazena o ID do usuário na sessão
    $_SESSION['usuario_id'] = $id_usuario;
    
    // Redireciona para a página inicial
    header('Location: \sisescala/home.php?msg=1');
} else {
    header('Location: \sisescala/index.php?msg=6');
}

// Fecha a conexão com o banco de dados
mysqli_close($con);
?>
