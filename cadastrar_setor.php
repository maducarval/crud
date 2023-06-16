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

<h2>Cadastrar Setor</h2>
    <form class="form-horizontal" method="POST">
        <div class="control-group">
            <label class="control-label" for="inputSetro">Nome setor:</label>
            <div class="controls">
                <input type="text" id="inputNameSetor" placeholder="nome do setor" name="nomeSetor">
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="inputSigla">Sigla Setor:</label>
            <div class="controls">
                <input type="text" id="inputSigla" placeholder="sigla" name="siglaSetor">
            </div>
        </div>
        <div class="control-group">
            <div class="controls">
                <button type="submit" class="btn">Cadastrar</button>
                <a href="tabela_setor.php" class="btn">Voltar</a>
            </div>
        </div>
    </form>
    <?php
if ($_POST) {
    $nomeSetor = $_POST["nomeSetor"];
    $siglaSetor = $_POST["siglaSetor"];

    $con->exec("INSERT INTO setor (nome_setor, sigla_setor) VALUES ('$nomeSetor', '$siglaSetor')");
}
?>