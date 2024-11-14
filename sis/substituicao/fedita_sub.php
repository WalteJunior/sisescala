<?php
$id = (int) $_GET['id'];
$sql = mysqli_query($con, "SELECT * FROM substituicao WHERE id = '".$id."';");
$row = mysqli_fetch_array($sql);
?>
<div id="main" class="container-fluid">
    <br><h3 class="page-header">Editar Pedido de Substituição</h3>

    <form action="?page=atualiza_sub&id=<?php echo $row['id']; ?>" method="post">
        <div class="row"> 
            <div class="form-group col-md-2">
                <label for="id">Nº Registro</label>
                <input type="text" class="form-control" name="id" value="<?php echo $row["id"]; ?>" readonly>
            </div>

            <div class="form-group col-md-3">
                <label for="solicitante">Solicitante</label>
                <input type="text" class="form-control" name="solicitante" value="<?php echo $row["solicitante"]; ?>" readonly>
            </div>
            
            <div class="form-group col-md-3">
                <label for="motivo">Motivo</label>
                <textarea class="form-control" name="motivo"><?php echo $row["motivo"]; ?></textarea>
            </div>
            
            <div class="form-group col-md-3">
                <label for="data_solic">Data da Falta</label>
                <input type="date" class="form-control" name="data_solic" id="data_solic" value="<?php echo date('Y-m-d', strtotime($row["data_solic"])); ?>">
            </div>

            <div class="form-group col-md-3">
                <label for="substituto">Substituto</label>
                <select class="form-control" name="substituto">
                    <?php
                    include "base/config.php"; // Inclui conexão com o banco de dados

                    // Query para listar funcionários, excluindo o solicitante atual
                    $sql_funcionarios = "SELECT id_func, nome_func FROM funcionario WHERE nome_func != '" . $row['solicitante'] . "'";
                    $res_funcionarios = mysqli_query($con, $sql_funcionarios);

                    // Preenche o select com os funcionários disponíveis
                    if ($res_funcionarios) {
                        while ($func = mysqli_fetch_assoc($res_funcionarios)) {
                            $selected = ($func['nome_func'] == $row["substituto"]) ? "selected" : "";
                            echo "<option value='{$func['nome_func']}' $selected>{$func['nome_func']}</option>";
                        }
                    } else {
                        echo "<option value=''>Nenhum funcionário disponível</option>";
                    }
                    ?>
                </select>
            </div>
            
            <div class="form-group col-md-3">
                <label for="data_subs">Data da substituição</label>
                <input type="date" class="form-control" name="data_subs" id="data_subs" value="<?php echo date('Y-m-d', strtotime($row["data_subs"])); ?>">
            </div>

            <div class="form-group col-md-3">
                <label for="ativo_sub">Status</label>
                <input type="text" class="form-control" readonly name="ativo_sub" value="<?php echo $row["ativo_sub"]; ?>">
            </div>
        </div>
        <hr/>
        <div id="actions" class="row">
            <div class="col-md-12">
                <button type="submit" class="btn btn-primary">Salvar</button>
                <a href="?page=lista_sub" class="btn btn-danger">Cancelar</a>
            </div>
        </div>
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const inputDate = document.getElementById('data_solic');
        const inputDate2 = document.getElementById('data_subs');
        const today = new Date();
        
        // Adicionar 3 dias à data atual
        today.setDate(today.getDate() + 3);
        
        // Formatar a data para o padrão `YYYY-MM-DD` exigido pelo atributo `min`
        const year = today.getFullYear();
        const month = String(today.getMonth() + 1).padStart(2, '0');
        const day = String(today.getDate()).padStart(2, '0');
        const minDate = `${year}-${month}-${day}`;
        
        // Definir a data mínima no campo de data
        inputDate.min = minDate;
        inputDate2.min = minDate;
    });
</script>
