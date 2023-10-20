<div id="modalDelete" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <div class="modal-content">
      <form action="?page=setor" method="POST">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Excluir Setor</h4>
        </div>
        <div class="modal-body alert alert-error">
          <p>Você tem certeza que deseja excluir esse setor?</p>
          <input type="hidden" name="id" id="idSetor" value="">
          <input type="hidden" name="acao" value="deletar">
        </div>
        <div class="modal-footer">
          <a href="?page=setor" class="btn btn-default" data-dismiss="modal">Cancelar</a>
          <button type="submit" class="btn btn-danger">Excluir</button>
        </div>
      </form>
    </div>
  </div>
</div>
<script>
  let btnsDelete = document.querySelectorAll(".btnDelete_setor");
  let idSetor = document.querySelector("#idSetor");

  btnsDelete.forEach(function(element) {
    element.addEventListener("click", onDelete)
  });

  function onDelete(event) {
    let id = event.target.dataset.id;
    idSetor.value = id;
    return idSetor.value;
  }
</script>