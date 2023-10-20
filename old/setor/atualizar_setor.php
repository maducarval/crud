<?php
include_once("Banco.php");
$con = Banco::conectar();

$id = $_GET["id"];

if ($_POST) {
    $nomeSetor = $_POST["nomeSetor"];
    $siglaSetor = $_POST["siglaSetor"];

    $con->query("UPDATE setor SET 
 nome_setor = '" . $nomeSetor . "',
 sigla_setor = '" . $siglaSetor . "' 
 WHERE id='$id'
 ");
    
}

$PDOStatement = $con->query("SELECT * FROM setor WHERE id= '$id'");
$dadosSetor = $PDOStatement->fetchObject();
?>
    <div>
        <h2 class="form-horizontal">Atualizar Setor</h2>
        <form class="form-horizontal" method="POST">
            <div class="control-group">
                <label class="control-label" for="inputSetro">Nome setor:</label>
                <div class="controls">
                    <input type="text" id="inputNameSetor" placeholder="nome do setor" name="nomeSetor" value="<?php echo $dadosSetor->nome_setor ?>">
                </div>
            </div>

            <div class="control-group">
                <label class="control-label" for="inputSigla">Sigla Setor:</label>
                <div class="controls">
                    <input type="text" id="inputSigla" placeholder="sigla" name="siglaSetor" value="<?php echo $dadosSetor->sigla_setor ?>">
                </div>
            </div>
            <div class="control-group">
                <div class="controls">

                    <a href="?page=setor" class="btn">Voltar</a>
                    <button type="submit" class="btn">Atualizar</button>
                </div>
            </div>
        </form>