<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Curso extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('CursoModel', 'cursoModel');
    }

    public function carregaView($view, $dados=[])
    {
        $this->load->view('layouts/head.php');
        $this->load->view($view,$dados);
        $this->load->view('layouts/footer.php');
    }

    public function index()
    {
        $cursos = $this->cursoModel->getCursos();
        $this->carregaView("cursos/index", ["cursos"=>$cursos]);
        
    }
    public function create()
    {
        $this->carregaView("cursos/create");
    }
    public function edit($id)
    {
        $curso = $this->cursoModel->getCurso($id);
        $this->carregaView("cursos/create", ['curso'=>$curso]);
     }
     public function salvar()
     {
        $this->cursoModel->salvar($this->input->post());
        $this->session->set_flashdata('status','success');
        $this->session->set_flashdata('msg_confirm','Curso Salvo com Sucesso!');
        redirect('curso/index');
    }
    public function delete($id)
    {
        $this->cursoModel->delete($id);
        $this->session->set_flashdata('status', 'success');
        $this->session->set_flashdata('msg_confirm', 'Curso Apagado com Sucesso');
        redirect('curso/index');
    }

}
