<?php
include_once("Banco.php");
$con = Banco::conectar();
$setores = $con->query("SELECT * FROM setor")->FetchAll(5);
$cursos = $con->query("SELECT * FROM cursos")->FetchAll(5);

?>
<div>
    <h2>Cadastramento</h2>
    <form class="form-horizontal" method="POST">
        <div class="control-group">
            <label class="control-label" for="inputEmail">Nome completo:</label>
            <div class="controls">
                <input type="text" id="inputName" placeholder="nome" name="nome">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="inputNome_guerra">Nome de guerra</label>
            <div class="controls">
                <input type="text" id="inputNome_guerra" placeholder="nome de guerra" name="nomeGuerra">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="inputSaram">Saram</label>
            <div class="controls">
                <input type="text" id="inputSaram" placeholder="saram" name="saram">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="inputCpf">CPF:</label>
            <div class="controls">
                <input type="text" id="inputCpf" placeholder="cpf" name="cpf">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="inputOM">OM:</label>
            <div class="controls">
                <input type="text" id="inputOM" placeholder="om" name="om">
            </div>
        </div>


        <div class="control-group">
            <label class="control-label" for="inputSetor">Setor:</label>
            <div class="controls">
                <select name="setor" id="inputSetor">
                    <option>Selecione...</option>
                    <?php foreach ($setores as $setor) : ?>
                        <option value="<?php echo $setor->id ?>"><?php echo $setor->sigla_setor ?></option>
                    <?php endforeach ?>
                </select>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="inputCursos">cursos:</label>
            <div class="controls">
                <select name="cursos[]" id="inputCursos" multiple>
                    <?php foreach ($cursos as $curso) : ?>
                        <option value="<?php echo $curso->id ?>"><?php echo $curso->sigla_curso ?></option>
                    <?php endforeach ?>
                </select>

            </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="inputData_nascimento">Data nascimento:</label>
            <div class="controls">
                <input type="date" id="inputData_nascimento" name="dataNascimento">
            </div>
        </div>
        <div class="control-group">
            <div class="controls">
                <a href="?page=efetivo" class="btn">Voltar</a>
                <button type="submit" class="btn">Cadastrar</button>

            </div>
        </div>
    </form>
</div>
<?php
if ($_POST) {
    $efetivo = $con->query("SELECT id FROM efetivo ORDER BY id DESC LIMIT 1")->fetch();

    $id = $efetivo['id'];

    $nome = $_POST["nome"];
    $nomeGuerra = $_POST["nomeGuerra"];
    $saram = $_POST["saram"];
    $cpf = $_POST["cpf"];
    $om = $_POST["om"];
    $dataNascimento = $_POST["dataNascimento"];
    $setores = $_POST["setor"];

    $cursos = $_POST["cursos"];


    $erros = [];

    $arrayData = explode("-", $dataNascimento);
    if (strlen($nome) < 5) {
        $erros[] = "Nome inválido";
    }

    if (strlen($nomeGuerra) < 2) {
        $erros[] = "Nome de guerra inválido";
    }

    if (strlen($saram) != 7) {
        $erros[] = "Saram inválido";
    }

    if (strlen($cpf) != 11) {
        $erros[] = "cpf inválido";
    }

    if (!$dataNascimento) {
        $erros[] = "Data Obrigatória";
    }

    if ($dataNascimento && checkdate($arrayData[1], $arrayData[2], $arrayData[0]) == false) {
        $erros[] = "Data inválida";
    }

    if (count($erros) == 0) {
        $con->exec("INSERT INTO efetivo (nome, nome_guerra, saram, cpf, om, data_nascimento, setor_id) VALUES ('$nome', '$nomeGuerra', '$saram','$cpf', '$om','$dataNascimento', '$setores')");


        $id = $con->lastInsertId();
        foreach ($cursos as $curso) {
            $con->exec("INSERT INTO efetivo_cursos (efetivo_id, curso_id) VALUES ('$id','$curso')");
        }

        echo '<div class="alert alert-success"><strong>Usuário cadastrado com sucesso</strong></div>';
    } else {
        echo "<ul class='alert alert-danger' >";
        foreach ($erros as $erro) :
            echo "<li>$erro</li>";
        endforeach;
        echo "</ul>";
    }
}
?>