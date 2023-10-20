<?php

class Militar
{
    public function index()
    {
        $model = loadModel("MilitarModel");
        $militares = $model->getMilitares();
        $dados = ["militares" => $militares];
        loadView("militares/index", $dados);
    }
    public function create(){
        $modelCurso = loadModel("CursoModel");
        $cursos = $modelCurso->getCursos();
        $modelSetor = loadModel("SetorModel");
        $setores = $modelSetor->getSetores();
        loadView("militares/create", ['cursos'=>$cursos, 'setores'=>$setores]);
    }
    public function edit($id){
        $model = loadModel("MilitarModel");
        $militar = $model->getMilitar($id);
        $modelCurso = loadModel("CursoModel");
        $cursos = $modelCurso->getCursos();
        $modelSetor = loadModel("SetorModel");
        $setores = $modelSetor->getSetores();
        loadView("militares/create", ['militar'=>$militar, 'cursos'=>$cursos, 'setores'=>$setores]);
    }
    public function salvar(){
        $model = loadModel("MilitarModel");
        $model->salvar($_POST);
        header('Location: '. BASE_URL ."index.php/militar");
    }
    public function delete($id){
        $model = loadModel("MilitarModel");
        $model->delete($id);
        header('Location:' . BASE_URL . "index.php/militar");
    }
}
