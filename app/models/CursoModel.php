<?php
include_once("./app/models/Banco.php");

class CursoModel
{
    public function getCursos()
    {
      $con = Banco::conectar();
      $cursos = $con->query("SELECT * FROM cursos")->fetchAll(PDO::FETCH_OBJ);
      return $cursos;
    }
    public function getCurso($id){
        $con = Banco::conectar();
        $curso = $con->query("SELECT * FROM cursos WHERE id=$id")->fetch(PDO::FETCH_OBJ);
        return $curso;
    }
    public function getCursoVazio(){
        $cursoVazio = new stdClass();
        $cursoVazio->id = ""; 
        $cursoVazio->nome_curso = "";
        $cursoVazio->sigla_curso = "";
        return $cursoVazio;
    }
    public function salvar($post){
        if($post["id"]){
            $this->update($post);
        }else{
            $this->create($post);
        }
    }
    private function create($dados){
        $con = Banco::conectar();
        $nomeCurso = $dados["nome_curso"];
        $siglaCurso = $dados["sigla_curso"];
        $con->exec("INSERT INTO cursos (nome_curso, sigla_curso) VALUES ('$nomeCurso','$siglaCurso')");
    }
    private function update($dados){
        $con = Banco::conectar();
        $id = $dados["id"];
        $nomeCurso = $dados["nome_curso"];
        $siglaCurso = $dados["sigla_curso"];
        $con->query("UPDATE cursos SET nome_curso = '" . $nomeCurso . "', sigla_curso = '" . $siglaCurso . "' WHERE id='$id'");
    }
    public function delete($id){
        $con = Banco::conectar();        
        $con->exec("DELETE FROM cursos WHERE id=$id");
    }
   }
