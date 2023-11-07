
<div class="container-fluid">
    <a class="btn btn-create pull-right btn btn-success" href="<?php echo BASE_URL?>index.php/militar/create">Novo Registro</a>
    <br><br>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>id</th>
                <th>nome</th>
                <th>nome de guerra</th>
                <th>saram</th>
                <th>CPF</th>
                <th>OM</th>
                <th>Data de nascimento</th>
                <th>Setor</th>
                <th>Cursos</th>
                <th>Ação</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($militares as $militar) : ?>

                <tr>
                    <td><?php echo $militar->id ?></td>
                    <td><?php echo $militar->nome ?></td>
                    <td><?php echo $militar->nome_guerra ?></td>
                    <td><?php echo $militar->saram ?></td>
                    <td><?php echo $militar->cpf ?></td>
                    <td><?php echo $militar->om ?></td>
                    <td><?php echo $militar->data_nascimento ?></td>
                    <td><?php foreach($militar->setor as $setor){ echo $setor->sigla_setor;}?></td>
                    <td><?php echo MilitarModel::cursosToString($militar->cursos)?> </td>
                    <td>
                        <a class="btn btn-edit" href="<?php echo BASE_URL . 'index.php/militar/edit/' . $militar->id ?>">Editar</a>
                        <a href="<?php echo BASE_URL . "index.php/militar/delete/" . $militar->id ?>" class="btn btn-delete btnDelete_militar btn-danger">Excluir</a>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>
<div id="modalDelete" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Excluir militar</h4>
            </div>
            <div class="modal-body alert alert-error">
                <p>Você tem certeza que deseja excluir esse militar?</p>

            </div>
            <div class="modal-footer">
                <a href="" class="btn btn-default" data-dismiss="modal">Cancelar</a>
                <a href="" class="btn btn-danger" id="btnConfirmDelete">Excluir</a>
            </div>

        </div>
    </div>
</div>
<script>
    $(".btnDelete_militar").click(function(evento) {
        evento.preventDefault();
        let elemento = evento.target;
        $("#btnConfirmDelete").attr("href", elemento.href);
        $("#modalDelete").modal("show");
    })
</script>