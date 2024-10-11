<?php
session_start();

// Verifica se o usuário está logado
if (!isset($_SESSION['UsuarioID'])) {
    header("Location: index.php"); // Redireciona para o login se não estiver logado
    exit();
}

// Pega o ID do usuário logado da sessão
$id = (int) $_SESSION['UsuarioID'];

// Conexão com o banco de dados 
$con = mysqli_connect('localhost', 'root', '', 'sisescala');

// Verifica se a conexão foi bem-sucedida
if (!$con) {
    die("Erro de conexão: " . mysqli_connect_error());
}

// Consulta para obter as informações do usuário
$sql = mysqli_query($con, "SELECT * FROM usuarios WHERE id = $id");
$row = mysqli_fetch_array($sql);

// Verifica se as informações foram retornadas
if (!$row) {
    echo "Usuário não encontrado!";
    exit();
}



?>
<div id="main" class="container-fluid">
    <h3 class="page-header">Visualizar registro do Usuário <?php echo $id; ?> </h3>
    <div class="row">
        <div class="col-md-2">
            <p><strong>ID</strong></p>
            <p><?php echo $row['id']; ?></p>
        </div>
        <div class="col-md-2">
            <p><strong>Nome</strong></p>
            <p><?php echo $row['nome']; ?></p>
        </div>
        <div class="col-md-2">
            <p><strong>Usuário</strong></p>
            <p><?php echo $row['usuario']; ?></p>
        </div>
        <div class="col-md-2">
            <p><strong>E-mail</strong></p>
            <p><?php echo $row['email']; ?></p>
        </div>
        <div class="col-md-2">
            <p><strong>Nível</strong></p>
            <p><?php echo $row['nivel']; ?></p>
        </div>
        <div class="col-md-2">
            <p><strong>Ativo</strong></p>
            <p><?php echo ($row['ativo'] == 1 ? 'Sim' : 'Não'); ?></p>
        </div>
    </div>

    <hr/>
    <div id="actions" class="row">
        <div class="col-md-12">
            <a href="?page=lista_usuarios" class="btn btn-default">Voltar</a>
            <?php echo "<a href=?page=fedita_usu2&id=".$row['id']." class='btn btn-primary'>Editar</a>"; ?>
        </div>
    </div>
</div>



<?php
// Fecha a conexão com o banco de dados
mysqli_close($con);
?>
<script src="../js/cadastro.js"></script>
