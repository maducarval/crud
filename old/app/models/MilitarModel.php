<?php
include_once("./app/models/Banco.php");
class MilitarModel
{
    public function getMilitares()
    {
        $con = Banco::conectar();
        $stm =  $con->query("SELECT * FROM militares");
        $militares = $stm->fetchAll(PDO::FETCH_OBJ);
        foreach ($militares as $militar) {
            $militar->cursos = $this->getCursosByMilitar($militar->id);
            $militar->setor = $this->getSetorMilitar($militar->id);
        }
        return $militares;
    }

    public function getMilitar($id)
    {
        $con = Banco::conectar();
        $stm = $con->prepare("SELECT * FROM militares WHERE id=?");
        $stm->bindValue(1, $id);
        $stm->execute();
        $militar = $stm->fetch(PDO::FETCH_OBJ);
        $militar->cursos = $this->getCursosByMilitar($militar->id);
        $militar->setor = $this->getSetorMilitar($militar->id);
        return $militar;
    }

    public function getCursosByMilitar($idMilitar)
    {
        $con = Banco::conectar();
        $stm = $con->prepare("SELECT * FROM  militares_cursos INNER JOIN cursos ON cursos.id = militares_cursos.curso_id WHERE militar_id=?");
        $stm->bindValue(1, $idMilitar);
        $stm->execute();
        $cursosMilitar = $stm->fetchAll(PDO::FETCH_OBJ);
        return $cursosMilitar;
    }
    public function getSetorMilitar($idMilitar)
    {
        $con = Banco::conectar();
        $stm = $con->prepare("SELECT militares.* , setor.nome_setor,  setor.sigla_setor FROM militares LEFT JOIN setor ON militares.setor_id = setor.id WHERE militares.id=?");
        $stm->bindValue(1, $idMilitar);
        $stm->execute();
        $setorMilitar = $stm->fetchAll(PDO::FETCH_OBJ);
        return $setorMilitar;
    }
    private function create($post)
    {
        $con = Banco::conectar();
        $nome = $post["nome"];
        $nomeGuerra = $post["nome_guerra"];
        $saram = $post["saram"];
        $cpf = $post["cpf"];
        $om = $post["om"];
        $dataNascimento = $post["data_nascimento"];
        $setor = $post["setor"];
        $cursosMilitar = $post["cursos"];

        $stm = $con->prepare("INSERT INTO militares (nome, nome_guerra, saram, cpf, om, data_nascimento, setor_id) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stm->bindValue(1, $nome);
        $stm->bindValue(2, $nomeGuerra);
        $stm->bindValue(3, $saram);
        $stm->bindValue(4, $cpf);
        $stm->bindValue(5, $om);
        $stm->bindValue(6, $dataNascimento);
        $stm->bindValue(7, $setor);
        $stm->execute();

        $id = $con->lastInsertId();
        $cursosMilitar = $post["cursos"];
        $this->saveCursos($id, $cursosMilitar);
    }
    private function saveCursos($idMilitar, $cursosMilitar)
    {
        $con = Banco::conectar();
        $stm = $con->prepare("DELETE FROM militares_cursos WHERE militar_id=?");
        $stm->bindValue(1, $idMilitar);
        $stm->execute();
        foreach ($cursosMilitar as $curso) {
            $inserirCursos = $con->prepare("INSERT INTO militares_cursos (militar_id, curso_id) VALUES (?, ?)");
            $inserirCursos->bindValue(1, $idMilitar);
            $inserirCursos->bindValue(2, $curso);
            $inserirCursos->execute();
        }
    }

   

    private function update($post)
    {
        $con = Banco::conectar();
        $id = $post["id"];
        $nome = $post["nome"];
        $nomeGuerra = $post["nome_guerra"];
        $saram = $post["saram"];
        $cpf = $post["cpf"];
        $om = $post["om"];
        $dataNascimento = $post["data_nascimento"];
        $setor = $post["setor"];
        $cursosMilitar = $post["cursos"];

        $stm = $con->prepare("UPDATE militares SET
            nome = ?,
            nome_guerra = ?, 
            saram = ?, 
            cpf = ?,
            om = ?, 
            data_nascimento = ?, 
            setor_id = ?
            WHERE id = ?");
        $stm->execute([$nome, $nomeGuerra, $saram, $cpf, $om, $dataNascimento, $setor, $id]);

        $this->saveCursos($id, $cursosMilitar);
    }
    public function salvar($post)
    {
        if ($post["id"]) {
            $this->update($post);
        } else {
            $this->create($post);
        }
    }


    public static function cursosToString($cursos)
    {
        $novoArray = array_map(function ($curso) {
            return $curso->sigla_curso;
        }, $cursos);
        return implode("|", $novoArray);
    }
    public function delete($id)
    {
        $con = Banco::conectar();
        $con->exec("DELETE FROM militares WHERE id=$id");
    }
}
