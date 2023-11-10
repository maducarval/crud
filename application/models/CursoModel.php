<?php

class CursoModel extends CI_Model 
{
    public function getCursos()
    {
        return $this->db->get("cursos")->result();
       
    }
    public function getCurso($id)
    {
        $this->db->where('id', $id);
        return $this->db->get("cursos")->row();       
    }
    public function salvar($post)
    {
        if($post["id"]){
            $this->update($post);
        }else{
            $this->create($post);
        }
    }
    private function update($post)
    {
        $this->db->where("id", $post["id"]);
        $this->db->update("cursos", $post);
    }
    private function create($post)
    {
       unset($post["id"]);
       return $this->db->insert("cursos", $post);
    }
    public function delete($id)
    {
        $this->db->where("id", $id);
        $this->db->delete("cursos");
    }
}