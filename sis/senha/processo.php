<?php
$host = "localhost"; // ou o IP do servidor
$usuario = "root"; // usuário do banco
$senha = ""; // senha do banco
$banco = "sisescala"; // nome do banco de dados

// Criar conexão
$conexao = new mysqli($host, $usuario, $senha, $banco);

// Verificar conexão
if ($conexao->connect_error) {
    die("Erro ao conectar ao banco de dados: " . $conexao->connect_error);
}

// Captura o usuário enviado pelo formulário
$usuario = $_POST['usuario'];

// Verificar se a conexão com o banco foi estabelecida
if (!$conexao) {
    die("Erro ao conectar com o banco de dados.");
}

// Consulta para verificar se o usuário existe e obter o email
$sql = "SELECT email FROM usuarios WHERE usuario = ?";
$stmt = $conexao->prepare($sql);
$stmt->bind_param("s", $usuario);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    $email = $user['email'];
    
    // Gerar token de recuperação e definir expiração
    $token = bin2hex(random_bytes(16));
    $expiracao = date("Y-m-d H:i:s", strtotime("+1 hour"));

    // Salvar token e expiração no banco de dados
    $sql = "UPDATE usuarios SET token_recuperacao = ?, expiracao_token = ? WHERE usuario = ?";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("sss", $token, $expiracao, $usuario);
    $stmt->execute();

    // Enviar email de recuperação
    $link = "http://localhost/sisescala/sis/senha/redefinir_senha.php?token=$token";
    $mensagem = "Clique no link para redefinir sua senha: $link";
    mail($email, "Redefinição de senha", $mensagem);

    echo "Um link de recuperação foi enviado para o seu email.";
} else {
    echo "Usuário não encontrado.";
}

// Encerrar o statement e a conexão
$stmt->close();
$conexao->close();
?>
