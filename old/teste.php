<?php
include_once("Banco.php");
$con = Banco::conectar();
$bomDia = "bom dia";

print_r($con);
$sql = "INSERT INTO efetivo (nome, nome_guerra, saram, cpf, om, data_nascimento, setor_id) VALUES ('maria', 'teste', '1234','123456789', 'cca','10/01/2003', 'sai')";

$con->exec($sql);
$id = $con->lastInsertId();
var_dump($id);


?>