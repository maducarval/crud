<?php
include_once("Banco.php");
$con = Banco::conectar();

if (isset($_POST["id"]) && isset($_POST["acao"]) && $_POST['acao'] == "deletar") {
    $id = $_POST["id"];
    $con->exec("DELETE FROM setor WHERE id=$id");
}
$setores = $con->query("SELECT * FROM setor")->FetchAll(5);
?>
    <div class="container-fluid">
        <a class="btn btn-success pull-right" href="?page=cadastrar_setor">Novo Registro</a>
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
                            <a class="btn" href="?page=atualizar_setor&id=<?php echo $setor->id ?>">Editar</a>
                            <a href="" class="btn btn-danger btnDelete_setor" data-id="<?php echo $setor->id ?>" data-toggle="modal" data-target="#modalDelete">Excluir</a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
    <?php include("delete_setor.php") ?>
