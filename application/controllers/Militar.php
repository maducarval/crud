<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Militar extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('MilitarModel', 'militarModel');
        $this->load->model('SetorModel', 'setorModel');
        $this->load->model('CursoModel','cursoModel');
    }
    public function carregaView($view, $dados=[])
    {
        $this->load->view('layouts/head.php');
        $this->load->view($view,$dados);
        $this->load->view('layouts/footer.php');
    }
    public function index()
    {
        $militares = $this->militarModel->getMilitares();
        $this->carregaView('militares/index', ['militares'=>$militares]);
    }
    public function create()
    {
        $cursos = $this->cursoModel->getCursos();
        $setores = $this->setorModel->getSetores();
        $this->carregaView('militares/create',['cursos'=>$cursos, 'setores'=>$setores]);
    }
    public function edit($idMilitar)
    {
        $militar = $this->militarModel->getMilitar($idMilitar);
        $cursos = $this->cursoModel->getCursos();
        $setores = $this->setorModel->getSetores();
        $this->carregaView('militares/create', ['militar'=>$militar, 'cursos'=>$cursos, 'setores'=>$setores]);
    }
    public function salvar()
    {
        $this->militarModel->salvar($this->input->post());
        $this->session->set_flashdata("status" , "success");
        $this->session->set_flashdata("msg_confirm", "Militar Salvo com Sucesso");
        redirect("militar/index");
    }
    public function delete($idMilitar)
    {
        $this->militarModel->delete($idMilitar);
        $this->session->set_flashdata('status', 'success');
        $this->session->set_flashdata('msg_confirm', 'Militar Apagado com Sucesso');
        redirect('militar/index');
    }
}