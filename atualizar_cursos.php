<?php
include_once("Banco.php");
$con = Banco::conectar();

$id = $_GET["id"];

if ($_POST) {
    $nomeCurso = $_POST["nomeCurso"];
    $siglaCurso = $_POST["siglaCurso"];

    $con->query("UPDATE cursos SET nome_curso = '" . $nomeCurso . "', sigla_curso = '" . $siglaCurso . "' WHERE id='$id'");
}

$PDOStatement = $con->query("SELECT * FROM cursos WHERE id= '$id'");
$dadosCurso = $PDOStatement->fetchObject();
?>

<!DOCTYPE html>
<html lang="en">
<?php include_once("header.php") ?>
<title>Atualizar</title>

<body>
    <?php include_once("navbar.php") ?>
    <div>
        <h2>Atualizar Curso</h2>
        <form class="form-horizontal" method="POST">
            <div class="control-group">
                <label class="control-label" for="inputNome">Nome Curso:</label>
                <div class="controls">
                    <input type="text" id="inputNome" placeholder="nome do setor" name="nomeCurso" value="<?php echo $dadosCurso->nome_curso ?>">
                </div>
            </div>

            <div class="control-group">
                <label class="control-label" for="inputSigla">Sigla Curso:</label>
                <div class="controls">
                    <input type="text" id="inputSigla" placeholder="sigla" name="siglaCurso" value="<?php echo $dadosCurso->sigla_curso ?>">
                </div>
            </div>
            <div class="control-group">
                <div class="controls">

                    <a href="" class="btn">Voltar</a>
                    <button type="submit" class="btn">Atualizar</button>
                </div>
            </div>
        </form>
