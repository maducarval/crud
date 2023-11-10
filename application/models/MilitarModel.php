<?php
class MilitarModel extends CI_Model
{
    public function getMilitares()
    {
        $militares = $this->db->get("militares")->result();
        foreach ($militares as $militar) {
            $militar->cursos = $this->getCursosByMilitar($militar->id);
            $militar->setor = $this->getSetorMilitar($militar->id);
        }
        return $militares;
    }
    private function getCursosByMilitar($idMilitar)
    {
        $this->db->select("cursos.*");
        $this->db->from("militares_cursos");
        $this->db->where("militar_id", $idMilitar);
        $this->db->join("cursos", "cursos.id = militares_cursos.curso_id");
        $resultado = $this->db->get()->result();
        return $resultado;
    }
    private function getSetorMilitar($idMilitar)
    {
        $this->db->select("militares.id , setor.nome_setor,  setor.sigla_setor");
        $this->db->from("militares");
        $this->db->where("militares.id", $idMilitar);
        $this->db->join("setor", "militares.setor_id = setor.id", "left");
        $resultado = $this->db->get()->result();
        return $resultado;
    }
    public static function cursosToString($cursos)
    {
        $novoArray = array_map(function ($curso) 
        {
            return $curso->sigla_curso;
        }, $cursos);
        return implode(" | ", $novoArray);
    }
    public function getMilitar($idMilitar)
    {
        $this->db->where("id", $idMilitar);
        $militar = $this->db->get("militares")->row();
        $militar->cursos = $this->getCursosByMilitar($militar->id);
        $militar->setor = $this->getSetorMilitar($militar->id);
        return $militar;
    }
    public function delete($idMilitar)
    {
        $this->db->where("id", $idMilitar);
        $this->db->delete("militares");
    }
   
    private function update($post)
    {
        $cursosMilitar = isset($post["cursos"])?$post["cursos"]:[];

        unset($post["cursos"]);

        $this->db->where("id", $post["id"]);
        $this->db->update("militares", $post);

        $id = $post["id"];
        $this->saveCursos($id, $cursosMilitar);
    }
    private function create($post)
    {
        $cursosMilitar = isset($post["cursos"])?$post["cursos"]:[];

        unset($post["cursos"]);
        
        $this->db->insert("militares", $post);
        $id = $this->db->insert_id();

        $this->saveCursos($id, $cursosMilitar);
    }
    private function saveCursos($idMilitar, $cursosMilitar)
    {
    $this->db->where("militar_id", $idMilitar);
    $this->db->delete("militares_cursos");

    if(isset($cursosMilitar))
    {
        $dadosCurso=[];
        foreach ($cursosMilitar as $curso) 
        {
        $dadosCurso[] = ["militar_id" =>$idMilitar, "curso_id"=>$curso];
        }
        $this->db->insert_batch("militares_cursos",$dadosCurso );
    }
}
public function salvar($post)
{
    if ($post["id"]) {
        $this->update($post);
    } else {
        $this->create($post);
    }
}
}
