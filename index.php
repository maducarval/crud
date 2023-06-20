<!DOCTYPE html>
<html lang="en">
<?php $page = isset($_GET["page"]) ? $_GET["page"] : "efetivo"; ?>
<?php include_once("header.php") ?>

<body>
    <?php include_once("navbar.php") ?>

    <?php

    $pages = [
        "efetivo" => "efetivo/index_efetivo.php",
        "curso" => "curso/index_cursos.php",
        "setor" => "setor/index_setor.php",
        "cadastrar_efetivo" => "efetivo/cadastrar_efetivo.php",
        "cadastrar_curso" => "curso/cadastrar_curso.php",
        "cadastrar_setor" => "setor/cadastrar_setor.php",
        "atualizar_efetivo" => "efetivo/atualizar_efetivo.php",
        "atualizar_curso" => "curso/atualizar_curso.php",
        "atualizar_setor" => "setor/atualizar_setor.php",
        "notFound" => "notFound.html"
    ];

    if (!isset($pages[$page])) {
        $page = "notFound";
    }

    include_once($pages[$page]);

    ?>
</body>

</html>