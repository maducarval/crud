<?php

class Setor
{
    public function index()
    {
        $model = loadModel("SetorModel");
        $setores = $model->getSetores();
        loadView("setores/index", ["setores" => $setores]);
    }
    public function create()
    {
        loadView("setores/create");
    }
    public function edit($id)
    {
        $model = loadModel("SetorModel");
        $setor = $model->getSetor($id);
        loadView("setores/create", ['setor' => $setor]);
    }
    public function salvar()
    {
        $model = loadModel("setorModel");
        $model->salvar($_POST);
        header('Location:' . BASE_URL . "index.php/setor");
    }
    public function delete($id){
        $model = loadModel("SetorModel");
        $model->delete($id);
        header('Location:' . BASE_URL . "index.php/setor");
    }
}
