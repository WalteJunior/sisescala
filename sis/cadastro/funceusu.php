<div> <?php include "mensagens.php"; ?> </div>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.6/jquery.inputmask.min.js"></script>
    <link rel="stylesheet" href="\sisescala\css\cadastro.css">
    <title>Cadastro</title>
</head>

<div id="main" class="container-fluid">
    <h3 class="page-header text-center">Cadastrar-se</h3>
    <form action="insere_cad.php" method="post" id="cadastroForm" class="login-form">
        
        <div class="row">
            <div class="form-group col-md-5">
                <div class="form-input-material">
                    <label for="nome">Nome</label>
                    <input type="text" class="form-control" name="nome" required>
                </div>
            </div>

            <div class="form-group col-md-4">
                <div class="form-input-material">
                    <label for="email">E-mail</label>
                    <input type="email" class="form-control" name="email" required>
                </div>
            </div>
            <div class="form-group col-md-3">
                <div class="form-input-material">
                    <label for="telefone">Telefone</label>
                    <input type="text" class="form-control" name="telefone" id="tel_fixo" required>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="form-group col-md-3">
                <div class="form-input-material">
                    <label for="usuario">Usuário</label>
                    <input type="text" class="form-control" id="usuario" name="usuario" required>
                    <small id="usuarioMsg" class="form-text text-danger"></small>
                </div>
            </div>

            <div class="form-group col-md-5 d-flex align-items-center justify-content-center">
                <div class="form-input-material">
                    <label for="senha">Senha</label>
                    <input type="password" class="form-control custom-padding-right" name="senha" id="password" required>
                </div>
                <div class="icon" id="eye" onclick="show()"></div>
            </div>

            <div class="form-group col-md-2">
                <div class="form-input-material">
                    <label for="sexo">Sexo</label>
                    <select class="form-control" name="sexo" required>
                        <option value="" disabled selected>---------</option>
                        <option value="M">Masculino</option>
                        <option value="F">Feminino</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="form-group col-md-3">
                <div class="form-input-material">
                    <label for="cep_end">CEP</label>
                    <input type="text" class="form-control" name="cep_end" id="cep" required>
                </div>
            </div>
            <div class="form-group col-md-4">
                <div class="form-input-material">
                    <label for="rua_end">Rua</label>
                    <input type="text" class="form-control" name="rua_end" id="rua" required>
                </div>
            </div>
            <div class="form-group col-md-2">
        <div class="form-input-material">
            <label for="num_end">Número</label>
            <input type="text" class="form-control" name="num_end" id="num" required>
        </div>
    </div>
            <div class="form-group col-md-3">
                <div class="form-input-material">
                    <label for="compl_end">Complemento</label>
                    <input type="text" class="form-control" name="compl_end" id="complemento">
                </div>
            </div>

            <div class="row">
                <div class="form-group col-md-4">
                    <div class="form-input-material">
                        <label for="bairro_end">Bairro</label>
                        <input type="text" class="form-control" name="bairro_end" id="bairro" required>
                    </div>
                </div>
                <div class="form-group col-md-4">
                    <div class="form-input-material">
                        <label for="cidade_end">Cidade</label>
                        <input type="text" class="form-control" name="cidade_end" id="cidade" required>
                    </div>
                </div>
                <div class="form-group col-md-4">
                    <div class="form-input-material">
                        <label for="estado_end">Estado</label>
                        <input type="text" class="form-control" name="estado_end" id="estado" required>
                    </div>
                </div>
            </div>
        </div>

        <hr />
        <div id="actions" class="row">
            <div class="col-md-12">
                <button type="submit" id="submitBtn" class="btn btn-primary">Salvar</button>
                <button type="button" class="btn btn-secondary" id="btnPesquisar">Consultar Cep</button>
                <a href="../../login.php" class="btn btn-danger">Cancelar</a>
            </div>
        </div>
    </form>
</div>
<script src="../../js/cadastro.js" type="text/javascript"></script>
<script src="../../js/login.js"></script>
