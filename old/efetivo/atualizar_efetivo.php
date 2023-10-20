<?php
include_once("Banco.php");
$con = Banco::conectar();

$id = $_GET["id"];

$cursos = $con->query("SELECT * FROM cursos")->fetchAll(5);
$setores = $con->query("SELECT * FROM setor")->fetchAll(5);


if ($_POST) {
    $nome = $_POST["nome"];
    $nomeGuerra = $_POST["nomeGuerra"];
    $saram = $_POST["saram"];
    $cpf = $_POST["cpf"];
    $om = $_POST["om"];
    $dataNascimento = $_POST["dataNascimento"];
    $setor = $_POST["setor"];
    $cursos_id = $_POST["cursos"];

    $con->query("UPDATE efetivo SET 
nome = '" . $nome . "',
nome_guerra = '" . $nomeGuerra . "', 
saram = '" . $saram . "', 
cpf = '" . $cpf . "',
om = '" . $om . "', 
data_nascimento = '" . $dataNascimento . "', 
setor_id ='" . $setor . "' 
WHERE id='$id'
");

    $con->exec("DELETE FROM efetivo_cursos WHERE efetivo_id= '$id'");

    foreach ($cursos_id as $curso) {
        $con->exec("INSERT INTO efetivo_cursos (efetivo_id, curso_id) VALUES ('$id','$curso')");
    }
}

$PDOStatement = $con->query("SELECT * FROM efetivo WHERE id= '$id'");
$dadosAtualUsuario = $PDOStatement->fetchObject();
$cursosMilitar = $con->query("SELECT curso_id FROM efetivo_cursos WHERE efetivo_id='$id'")->fetchAll(PDO::FETCH_COLUMN);


?>
<div>
    <h2 class="form-horizontal">Atualizar</h2>
    <form class="form-horizontal" method="POST">
        <div class="control-group">
            <label class="control-label" for="inputEmail">Nome completo:</label>
            <div class="controls">
                <input type="text" id="inputName" placeholder="nome" name="nome" value="<?php echo $dadosAtualUsuario->nome ?>">
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="inputNome_guerra">Nome de guerra</label>
            <div class="controls">
                <input type="text" id="inputNome_guerra" placeholder="nome de guerra" name="nomeGuerra" value="<?php echo $dadosAtualUsuario->nome_guerra ?>">
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="inputSaram">Saram</label>
            <div class="controls">
                <input type="text" id="inputSaram" placeholder="saram" name="saram" value="<?php echo $dadosAtualUsuario->saram ?>">
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="inputCpf">CPF:</label>
            <div class="controls">
                <input type="text" id="inputCpf" placeholder="cpf" name="cpf" value="<?php echo $dadosAtualUsuario->cpf ?>">
            </div>
        </div>


        <div class="control-group">
            <label class="control-label" for="inputOM">OM:</label>
            <div class="controls">
                <input type="text" id="inputOM" placeholder="om" name="om" value="<?php echo $dadosAtualUsuario->om ?>">
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="inputSetor">Setor:</label>
            <div class="controls">
                <SELECT name="setor">
                    <option>Selecione...</option>
                    <?php foreach ($setores as $setor) : ?>
                        <option value="<?php echo $setor->id ?>" <?php if ($dadosAtualUsuario->setor_id == $setor->id) echo "selected" ?>>
                            <?php echo $setor->sigla_setor ?>
                        </option>
                    <?php endforeach ?>
                </select>

            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="inputCursos">cursos:</label>
            <div class="controls">
                <select name="cursos[]" id="inputCursos" multiple>
                    <?php foreach ($cursos as $curso) : ?>
                        <option value="<?php echo $curso->id ?>" <?php foreach ($cursosMilitar as $cursoMilitar) {
                                                                        if ($curso->id == $cursoMilitar) echo "selected";
                                                                    }
                                                                    ?>>
                            <?php echo $curso->sigla_curso ?>

                        </option>
                    <?php endforeach ?>
                </select>

            </div>
        </div>


        <div class="control-group">
            <label class="control-label" for="inputData_nascimento">Data nascimento:</label>
            <div class="controls">
                <input type="date" id="inputData_nascimento" name="dataNascimento" value="<?php echo $dadosAtualUsuario->data_nascimento ?>">
            </div>
        </div>
        <div class="control-group">
            <div class="controls">
                <a href="?page=efetivo" class="btn">Voltar</a>
                <button type="submit" class="btn">Atualizar</button>

            </div>
        </div>
    </form>
</div>