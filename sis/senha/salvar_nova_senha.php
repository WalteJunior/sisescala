<?php
require '../../base/config.php';

$token = $_POST['token'];
$nova_senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);

// Validar token e verificar expiração
$sql = "SELECT usuario, expiracao_token FROM usuarios WHERE token_recuperacao = ?";
$stmt = $conexao->prepare($sql);
$stmt->bind_param("s", $token);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    $expiracao = $user['expiracao_token'];
    
    if (strtotime($expiracao) >= time()) {
        // Atualizar senha e remover token
        $sql = "UPDATE usuarios SET senha = ?, token_recuperacao = NULL, expiracao_token = NULL WHERE token_recuperacao = ?";
        $stmt = $conexao->prepare($sql);
        $stmt->bind_param("ss", $nova_senha, $token);
        $stmt->execute();

        echo "Senha redefinida com sucesso.";
    } else {
        echo "O link de redefinição expirou.";
    }
} else {
    echo "Token inválido.";
}
?>
