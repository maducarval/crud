<?php
include_once("Banco.php");
$con = Banco::conectar();
?>
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
                <a href="?page=curso" class="btn">Voltar</a>
                <button type="submit" class="btn">Cadastrar</button>
            </div>
        </div>
    </form>
    <?php
    if ($_POST) {
        $nomeCurso = $_POST["nomeCurso"];
        $siglaCurso = $_POST["siglaCurso"];

        $erros = [];

        if (strlen($nomeCurso) < 2) {
            $erros[] = "Nome inválido";
        }

        if (strlen($siglaCurso) < 1) {
            $erros[] = "Sigla inválida";
        }


        if (count($erros) == 0) {

            $con->exec("INSERT INTO cursos (nome_curso, sigla_curso) VALUES ('$nomeCurso','$siglaCurso')");

            echo '<div class="alert alert-success"><strong>Curso cadastrado com sucesso</strong></div>';
        } else {
            echo "<ul class='alert alert-danger' >";
            foreach ($erros as $erro) :
                echo "<li>$erro</li>";
            endforeach;
            echo "</ul>";
        }
    }
    ?>