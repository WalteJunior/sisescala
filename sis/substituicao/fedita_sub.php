<?php
    $id = (int) $_GET['id'];
    $sql = mysqli_query($con, "SELECT * FROM substituicao WHERE id = '".$id."';");
    $row = mysqli_fetch_array($sql);
?>
<div id="main" class="container-fluid">
    <br><h3 class="page-header">Editar registro da Substituição - <?php echo $id;?></h3>

    <form action="?page=atualiza_sub&id=<?php echo $row['id']; ?>" method="post">
        <div class="row"> 
            <div class="form-group col-md-2">
                <label for="id">Nº Registro</label>
                <input type="text" class="form-control" name="id" value="<?php echo $row["id"]; ?>" readonly>
            </div>

            <div class="form-group col-md-3">
                <label for="solicitante">Solicitante</label>
                <input type="text" class="form-control" name="solicitante" value="<?php echo $row["solicitante"]; ?>">
            </div>
            
            <div class="form-group col-md-3">
                <label for="motivo">Motivo</label>
                <input type="text" class="form-control" name="motivo" value="<?php echo $row["motivo"]; ?>">
            </div>
            
            <div class="form-group col-md-3">
                <label for="data_solic">Data da Falta</label>
                <input type="date" class="form-control" name="data_solic" value="<?php echo date('Y-m-d', strtotime($row["data_solic"])); ?>" >
            </div>

            <div class="form-group col-md-3">
                <label for="substituto">Substituto</label>
                <input type="text" class="form-control" name="substituto" value="<?php echo $row["substituto"]; ?>">
            </div>
            
            <div class="form-group col-md-3">
                <label for="data_subs">Data da substituição</label>
                <input type="date" class="form-control" name="data_subs" value="<?php echo date('Y-m-d', strtotime($row["data_subs"])); ?>" >
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
