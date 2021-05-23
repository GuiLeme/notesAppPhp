<?php
class Nota{
    private $idNota;
    private $idUsuario;
    private $corpo;
    private $aparece;

    public function getCorpo(){
        return $this -> email;
    }
    public function setCorpo($e){
        $this -> email = $e;
    }
    public function getAparece(){
        return $this -> nome;
    }
    public function setAparece($n){
        $this -> nome = $n;
    }
    public function getIdNota(){
        return $this -> idNota;
    }
    public function setIdNota($i){
        $this -> idNota = $i;
    }
    public function getIdUsuario(){
        return $this -> idUsuario;
    }
    public function setIdUsuario($i){
        $this -> idUsuario = $i;
    }
}

interface DaoNota{
    public function create(Nota $n);
    public function findById($id);
    public function findAll();
    public function update(Nota $n);
    public function delete($id);
}