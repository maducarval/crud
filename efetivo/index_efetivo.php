<?php
include_once("Banco.php");
$con = Banco::conectar();
if (isset($_POST["id"]) && isset($_POST["acao"]) && $_POST['acao'] == "deletar") {
    $id = $_POST["id"];
    $con->exec("DELETE FROM efetivo WHERE id='$id'");
}


$efetivo = $con->query("SELECT efetivo.* , setor.nome_setor,  setor.sigla_setor FROM `efetivo` LEFT JOIN setor ON efetivo.setor_id = setor.id;")->FetchAll(5);

$cursos = $con->query("SELECT efetivo_cursos.*, cursos.sigla_curso FROM `efetivo_cursos` INNER JOIN cursos ON cursos.id=efetivo_cursos.curso_id INNER JOIN efetivo ON efetivo.id=efetivo_cursos.efetivo_id;")->FetchAll(5);

foreach ($efetivo as $militar) {
    $militar->cursos = [];
}

$x = [];
$x[] = 3;
$x[] = 5;


foreach ($efetivo as $militar) :

    foreach ($cursos as $curso) {

        if ($curso->efetivo_id == $militar->id) {
            $militar->cursos[] = $curso->sigla_curso;
        }
    }

endforeach;
?>
<div class="container-fluid">
    <a class="btn btn-success pull-right" href="?page=cadastrar_efetivo">Novo Registro</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>id</th>
                <th>nome</th>
                <th>nome de guerra</th>
                <th>saram</th>
                <th>CPF</th>
                <th>OM</th>
                <th>Data de nascimento</th>
                <th>Setor</th>
                <th>Cursos</th>
                <th>Ação</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($efetivo as $militar) : ?>

                <tr>
                    <td><?php echo $militar->id ?></td>
                    <td><?php echo $militar->nome ?></td>
                    <td><?php echo $militar->nome_guerra ?></td>
                    <td><?php echo $militar->saram ?></td>
                    <td><?php echo $militar->cpf ?></td>
                    <td><?php echo $militar->om ?></td>
                    <td><?php echo $militar->data_nascimento ?></td>
                    <td><?php echo $militar->sigla_setor ?></td>
                    <td><?php echo implode(" | ", $militar->cursos) ?></td>
                    <td>
                        <a class="btn" href="?page=atualizar_efetivo&id=<?php echo $militar->id ?>">Editar</a>
                        <a href="" class="btn btn-danger btnDelete" data-id="<?php echo $militar->id ?>" data-toggle="modal" data-target="#modalDelete">Excluir</a>

                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>

    </table>
</div>

<?php include("delete_efetivo.php") ?>
