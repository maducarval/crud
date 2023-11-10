<?php

defined('BASEPATH') or exit('No direct script access allowed');
class Setor extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('SetorModel', 'setorModel');
    }

    public function carregaView($view, $dados=[]){
        $this->load->view('layouts/head.php');
        $this->load->view($view,$dados);
        $this->load->view('layouts/footer.php');
    }

    public function index()
    {
        $setores = $this->setorModel->getSetores();
        $this->carregaView("setores/index", ["setores"=>$setores]);
        
    }
    public function create()
    {
        $this->carregaView("setores/create");
    }
    public function edit($id)
    {
        $setor = $this->setorModel->getSetor($id);
        $this->carregaView("setores/create", ['setor'=>$setor]);;
    }
    public function salvar()
    {
        $this->setorModel->salvar($this->input->post());
        $this->session->set_flashdata("status" , "success");
        $this->session->set_flashdata("msg_confirm", "Setor Salvo com Sucesso");
        redirect("setor/index");
    }
    public function delete($id)
    {
        $this->setorModel->delete($id);
        $this->session->set_flashdata('status', 'success');
        $this->session->set_flashdata('msg_confirm', 'Setor Apagado com Sucesso');
        redirect('setor/index');
    }
}
