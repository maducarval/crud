<div class="container-fluid">
<a class="btn btn-create pull-right" href="<?php echo BASE_URL ?>index.php/curso/create">Novo Registro</a>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>id</th>
            <th>Nome Curso</th>
            <th>Sigla Curso</th>
            <th>Ação</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($cursos as $curso) : ?>
            <tr>
                <td><?php echo $curso->id ?></td>
                <td><?php echo $curso->nome_curso ?></td>
                <td><?php echo $curso->sigla_curso ?></td>
                <td>
                    <a class="btn btn-edit" href="<?php echo BASE_URL . 'index.php/curso/edit/' . $curso->id ?>">Editar</a>
                    <a href="<?php echo BASE_URL . 'index.php/curso/delete/' . $curso->id ?>" class="btn btn-delete btnDelete_curso">
                        Excluir
                    </a>
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
                <h4 class="modal-title">Excluir curso</h4>
            </div>
            <div class="modal-body alert alert-error">
                <p>Você tem certeza que deseja excluir esse curso?</p>

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
    $(".btnDelete_curso").click(function(evento) {
        evento.preventDefault();
        let elemento = evento.target;
        let btnDelete = document.querySelector("#btnConfirmDelete");
        btnDelete.href = elemento.href;
        // $("#btnConfirmDelete").attr("href",elemento.href) ;
        $('#modalDelete').modal("show")
    });
</script>