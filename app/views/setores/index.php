<div class="container-fluid">
<a class="btn btn-create pull-right" href="<?php echo BASE_URL . "index.php/setor/create" ?>">Novo Registro</a>
<br><br>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>id</th>
            <th>Nome Setor</th>
            <th>Sigla</th>
            <th>Ação</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($setores as $setor) : ?>
            <tr>
                <td><?php echo $setor->id ?></td>
                <td><?php echo $setor->nome_setor ?></td>
                <td><?php echo $setor->sigla_setor ?></td>
                <td>
                    <a class="btn btn-edit" href="<?php echo BASE_URL . 'index.php/setor/edit/' . $setor->id ?>">Editar</a>
                    <a href="<?php echo BASE_URL . "index.php/setor/delete/" . $setor->id ?>" class="btn btn-delete btnDelete_setor">Excluir</a>
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
                <h4 class="modal-title">Excluir Setor</h4>
            </div>
            <div class="modal-body alert alert-error">
                <p>Você tem certeza que deseja excluir esse setor?</p>

            </div>
            <div class="modal-footer">
                <a href="" class="btn btn-default" data-dismiss="modal">Cancelar</a>
                <a href="" class="btn btn-danger" id="btnConfirmDelete">Excluir</a>
            </div>

        </div>
    </div>
</div>
</div>
<script>
    $(".btnDelete_setor").click(function(evento) {
        evento.preventDefault();
        let elemento = evento.target;
        $("#btnConfirmDelete").attr("href", elemento.href);
        $("#modalDelete").modal("show");
    })
</script>