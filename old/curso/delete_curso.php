<div id="modalDelete" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <div class="modal-content">

            <form action="?page=curso" method="POST">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Excluir curso</h4>
                </div>
                <div class="modal-body alert alert-error">
                    <p>Você tem certeza que deseja excluir esse curso?</p>
                    <input type="hidden" name="id" id="idCurso" value="">
                    <input type="hidden" name="acao" value="deletar">
                </div>
                <div class="modal-footer">
                    <a href="?page=curso" class="btn btn-default" data-dismiss="modal">Cancelar</a>
                    <button type="submit" class="btn btn-danger">Excluir</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    let btnDeleteCurso = document.querySelectorAll(".btnDelete_curso");
    let idSetor = document.querySelectorAll("#idCurso");

btnDeleteCurso.forEach(function(element){
    element.addEventListener("click", onDelete)
})
    function onDelete(event) {
        let id = event.target.dataset.id;
        idCurso.value = id;
        return idCurso.value;
    }
</script>