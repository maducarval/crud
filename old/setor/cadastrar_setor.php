<?php
include_once("Banco.php");
$con = Banco::conectar();
?>
    <div>

<h2 class="form-horizontal">Cadastrar Setor</h2>
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
            <a href="?page=setor" class="btn">Voltar</a>
                <button type="submit" class="btn">Cadastrar</button>

            </div>
        </div>
    </form>
    <?php
if ($_POST) {
    $nomeSetor = $_POST["nomeSetor"];
    $siglaSetor = $_POST["siglaSetor"];

    $erros = [];

    if (strlen($nomeSetor) < 2) {
        $erros[] = "Nome inválido";
    }

    if (strlen($siglaSetor) < 1) {
        $erros[] = "Sigla inválida";
    }
if (count($erros) == 0) {
    $con->exec("INSERT INTO setor (nome_setor, sigla_setor) VALUES ('$nomeSetor', '$siglaSetor')");
    echo '<div class="alert alert-success"><strong>Setor cadastrado com sucesso</strong></div>';
}
else {
    echo "<ul class='alert alert-danger' >";
    foreach ($erros as $erro) :
        echo "<li>$erro</li>";
    endforeach;
    echo "</ul>";
}
}
?>