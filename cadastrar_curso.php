<?php
include("Banco.php");
$con = Banco::conectar();
?>
<!DOCTYPE html>
<html lang="en">
<?php include_once("header.php") ?>
<title>Cadastrar</title>
<body>
    <?php include_once("navbar.php") ?>
    <div>

<h2>Cadastrar Curso</h2>
    <form class="form-horizontal" method="POST">
        <div class="control-group">
            <label class="control-label" for="inputNome">Nome curso:</label>
            <div class="controls">
                <input type="text" id="inputNome" placeholder="nome do curso" name="nomeCurso">
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="inputSigla">Sigla Curso:</label>
            <div class="controls">
                <input type="text" id="inputSigla" placeholder="curso" name="siglaCurso">
            </div>
        </div>
        <div class="control-group">
            <div class="controls">
                <button type="submit" class="btn">Cadastrar</button>
                <a href="index_cursos.php" class="btn">Voltar</a>
            </div>
        </div>
    </form>
    <?php
    if ($_POST) {
    $nomeCurso = $_POST["nomeCurso"];
    $siglaCurso = $_POST["siglaCurso"];

        $con->exec("INSERT INTO cursos (nome_curso, sigla_curso) VALUES ('$nomeCurso','$siglaCurso')");

        echo '<div class="alert alert-success"><strong>Curso cadastrado com sucesso</strong></div>';
    }
?>