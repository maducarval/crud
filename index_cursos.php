<?php
include("Banco.php");
$con = Banco::conectar();

if (isset($_POST["id"]) && isset($_POST["acao"]) && $_POST['acao'] == "deletar") {
    $id = $_POST["id"];
    $con->exec("DELETE FROM cursos WHERE id=$id");
}

$cursos = $con->query("SELECT * FROM cursos")->FetchAll(5);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<?php include_once("header.php") ?>
<title>Efetivo</title>

<body>
    <?php include_once("navbar.php") ?>
    <div class="container-fluid">
        <a class="btn btn-success pull-right" href="cadastrar_curso.php">Novo Registro</a>
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
        <a class="btn" href="atualizar_cursos.php?id=<?php echo $curso->id?>">Editar</a>
        <a href="" class="btn btn-danger btnDelete_curso" data-id="<?php echo $curso->id?>" data-toggle="modal" data-target="#modalDelete">Excluir</a>


    </td>
</tr>
<?php endforeach ?>
            </tbody>

</table>
</div>

<script src="https://code.jquery.com/jquery.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<?php include("delete_curso.php") ?>

</body>

</html>