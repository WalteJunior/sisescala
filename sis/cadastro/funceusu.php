<div> <?php include "mensagens.php"; ?> </div>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<div id="main" class="container-fluid">
    <h3 class="page-header">Cadastrar-se</h3>
    <form action="insere_cad.php" method="post" id="cadastroForm">

        <div class="row">
            <div class="form-group col-md-5">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" name="nome" required>
            </div>

            <div class="form-group col-md-4">
                <label for="email">E-mail</label>
                <input type="email" class="form-control" name="email" required>
            </div>
			<div class="form-group col-md-3">
				<label for="telefone">Telefone</label>
				<input type="text" class="form-control" name="telefone" id="tel_fixo" required>
			</div>
        </div>

        <div class="row">
            <div class="form-group col-md-3">
                <label for="usuario">Usuário</label>
                <input type="text" class="form-control" id="usuario" name="usuario" required>
                <small id="usuarioMsg" class="form-text text-danger"></small>
            </div>

            <div class="form-group col-md-3">
                <label for="senha">Senha</label>
                <input type="password" class="form-control" name="senha" required>
            </div>

            <div class="form-group col-md-2">
                <label for="sexo">Sexo</label>
                <select class="form-control" name="sexo" required>
                    <option> --------- </option>
                    <option value="M">Masculino</option>
                    <option value="F">Feminino</option>
                </select>
            </div>
        </div>

		<div class="row"> 

		
            <div class="form-group col-md-4">
                <label for="cep_end">Cep</label>
                <input type="text" class="form-control" name="cep_end" id="cep" required>
            </div>
			<div class="form-group col-md-4">
                <label for="rua_end">Rua</label>
                <input type="text" class="form-control" name="rua_end" id="rua" required>
            </div>
			<div class="form-group col-md-4">
                <label for="compl_end">Complemento</label>
                <input type="text" class="form-control" name="compl_end" id="complemento">
            </div>

			<div class="row">
				<div class="form-group col-md-4">
								<label for="bairro_end">Bairro</label>
								<input type="text" class="form-control" name="bairro_end" id="bairro" required>
							</div>
				<div class="form-group col-md-4">
								<label for="cidade_end">Cidade</label>
								<input type="text" class="form-control" name="cidade_end" id="cidade" required>
							</div>
				<div class="form-group col-md-4">
								<label for="estado_end">Estado</label>
								<input type="text" class="form-control" name="estado_end" id="estado" required>
							</div>
			</div>
            

		</div>
        

        <hr />
        <div id="actions" class="row">
            <div class="col-md-12">
                <button type="submit" id="submitBtn" class="btn btn-primary" disabled>Salvar</button>
                <button type="button" class="btn btn-secondary" id="btnPesquisar">Consultar Cep</button>
                <a href="../index.php" class="btn btn-default">Cancelar</a>
            </div>
        </div>
    </form>
</div>
<script src="\sisescala\js\cadastro.js"></script>