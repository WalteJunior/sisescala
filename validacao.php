<?php
// Verifica se houve POST e se o usuário ou a senha estão vazios
if (!empty($_POST) and (empty($_POST['usuario']) or empty($_POST['senha']))) {
    header("Location: index.php"); exit;
}

// Tenta se conectar ao servidor MySQL e ao DB
$con = mysqli_connect('localhost', 'root', '', 'sisescala');

$usuario = mysqli_real_escape_string($con, $_POST['usuario']);
$senha = mysqli_real_escape_string($con, $_POST['senha']);

// Validação do usuário/senha digitados
$sql  = "SELECT id, nome, nivel, id_func FROM usuarios WHERE (usuario = '". $usuario ."') ";
$sql .= "AND (senha = '". sha1($senha) ."') AND (ativo = 1) LIMIT 1";

//echo $sql; exit;

$query = mysqli_query($con, $sql);

if (mysqli_num_rows($query) != 1) {
    // Mensagem de erro quando os dados são inválidos e/ou o usuário não foi encontrado
    header('Content-Type: text/html; charset=utf-8');
    echo "Login inválido!"; exit;
} else {
    // Salva os dados encontrados na variável $resultado
    $resultado = mysqli_fetch_assoc($query);
    
    ////// Salvando os dados na sessão do PHP ////////

    // Se a sessão não existir, inicia uma
    if (!isset($_SESSION)) session_start();

    // Salva os dados encontrados na sessão
    $_SESSION['UsuarioID'] = $resultado['id'];
    $_SESSION['UsuarioNome'] = $resultado['nome'];
    $_SESSION['UsuarioNivel'] = $resultado['nivel'];
    $_SESSION['id_func'] = $resultado['id_func']; // Adiciona o id_func à sessão

    // Redireciona o visitante
    header("Location: home.php"); exit;
}

?>
