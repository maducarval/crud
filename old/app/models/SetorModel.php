<?php
include_once("./app/models/Banco.php");
class SetorModel
{
    public function getSetores()
    {
        $con = Banco::conectar();
        $setores = $con->query("SELECT * FROM setor")->fetchAll(PDO::FETCH_OBJ);
        return $setores;
    }
    public function getSetor($id){
        $con = Banco::conectar();
        $setor = $con->query("SELECT * FROM setor WHERE id=$id")->fetch(PDO::FETCH_OBJ);
        return $setor;
    }
    public function getSetorVazio(){
        $setorVazio = new stdClass();
        $setorVazio->id = ""; 
        $setorVazio->nome_setor = "";
        $setorVazio->sigla_setor = "";
        return $setorVazio;
    }
    public function salvar($post){
        if($post["id"]){
            $this->update($post);
        }else{
            $this->create($post);
        }
    }
    private function create($post){
        $con = Banco::conectar();
        $nomeSetor = $post["nome_setor"];
        $siglaSetor = $post["sigla_setor"];
        $con->exec("INSERT INTO setor (nome_setor, sigla_setor) VALUES ('$nomeSetor', '$siglaSetor')");
    }
    private function update($post){
        $con = Banco::conectar();
        $id = $post["id"];
        $nomeSetor = $post["nome_setor"];
        $siglaSetor = $post["sigla_setor"];
        $con->query("UPDATE setor SET nome_setor = '" . $nomeSetor . "', sigla_setor = '" . $siglaSetor . "' WHERE id='$id'");
    }
    public function delete($id){
        $con = Banco::conectar();
        $con->exec("DELETE FROM setor WHERE id=$id");
    }
}
