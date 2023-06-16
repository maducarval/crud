<div id="modalDelete" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <div class="modal-content">
      <form action="index.php" method="POST">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Excluir usuário</h4>
      </div>
      <div class="modal-body alert alert-error">
        <p>Você tem certeza que deseja excluir esse usuário?</p>
        <input type="hidden" name="id" id="idUsuario" value="">
        <input type="hidden" name="acao" value="deletar">
      </div>
      <div class="modal-footer">
        <a href="tabela_setor.php" class="btn btn-default" data-dismiss="modal">Cancelar</a>
        <button type="submit" class="btn btn-danger">Excluir</button>
      </div>
       </form>
    </div>
  </div>
</div>
<script>   
  let btnsDelete = document.querySelectorAll(".btnDelete"); 
  let idUsuario = document.querySelector("#idUsuario");

  btnsDelete.forEach(function(element) {
    element.addEventListener("click", onDelete)
  });

  function onDelete(event) {
   let id = event.target.dataset.id;
   idUsuario.value = id;
   return idUsuario.value;
  }
</script>