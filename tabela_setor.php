<?php
include("Banco.php");
$con = Banco::conectar();

if (isset($_POST["id"]) && isset($_POST["acao"]) && $_POST['acao'] == "deletar") {
    $id = $_POST["id"];
    $con->exec("DELETE FROM setor WHERE id=$id");
}
$setores = $con->query("SELECT * FROM setor")->FetchAll(5);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<?php include_once("header.php")?>
<title>Setor</title>

<body>
    <?php include_once("navbar.php") ?>
    <div class="container-fluid">
        <a class="btn btn-success pull-right" href="cadastrar_setor.php">Novo Registro</a>
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
                            <a class="btn" href="atualizar_setor.php?id=<?php echo $setor->id ?>">Editar</a>
                            <a href="" class="btn btn-danger btnDelete_setor" data-id="<?php echo $setor->id ?>" data-toggle="modal" data-target="#modalDelete">Excluir</a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
    <script src="https://code.jquery.com/jquery.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <?php include("delete_setor.php") ?>

</body>

</html>