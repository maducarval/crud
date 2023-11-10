<?php

class SetorModel extends CI_Model
{
    public function getSetores()
    {
        return $this->db->get("setor")->result();
    }
    public function getSetor($id)
    {
        $this->db->where("id", $id);
       return $this->db->get("setor")->row();
    }
    public function salvar($post)
    {
        if($post["id"]){
            $this->update($post);
        }else{
            $this->create($post);
        }
    }
    private function create($post)
    {
        unset($post["id"]);
        return $this->db->insert("setor", $post);
    }
    private function update($post)
    {
        $this->db->where("id", $post["id"]);
        $this->db->update("setor", $post);
    }
    public function delete($id)
    {
        $this->db->where("id", $id);
        $this->db->delete("setor");
    }
}
