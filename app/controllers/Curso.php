<?php

class Curso
{
    public function index()
    {
        $model = loadModel("CursoModel");
        $cursos = $model->getCursos();
        $dados = ["cursos" => $cursos];
        loadView("cursos/index", $dados);
    }
    public function create(){
        //$model = loadModel("CursoModel");
        //$curso = $model->getCursoVazio();
        //loadView("cursos/create", ['curso'=>$curso]);
        loadView("cursos/create");
    }
    public function edit($id){
       $model = loadModel("CursoModel");
       $curso = $model->getCurso($id);
       loadView("cursos/create", ['curso'=>$curso]);
    }
    public function salvar(){
        $model = loadModel("CursoModel");
        $model->salvar($_POST);
        header('Location: '. BASE_URL ."index.php/curso");
    }
    public function delete($id){
        $model = loadModel("CursoModel");
        $model->delete($id);
        header('Location: '. BASE_URL ."index.php/curso");
    }
}
