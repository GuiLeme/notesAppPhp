<?php
class Usuario{
    private $id;
    private $nome;
    private $email;
    private $senha;

    public function getEmail(){
        return $this -> email;
    }
    public function setEmail($e){
        $this -> email = $e;
    }
    public function getNome(){
        return $this -> nome;
    }
    public function setNome($n){
        $this -> nome = $n;
    }
    public function getId(){
        return $this -> id;
    }
    public function setId($i){
        $this -> id = $i;
    }
    public function getSenha(){
        return $this -> senha;
    }
    public function setSenha($s){
        $this -> senha = $s;
    }
    public function strToUsu($u){
        $u = explode(";", $u);

        $this -> id = (int)$u['0'];
        $this -> email = $u['1'];
        $this -> nome = $u['2'];
    }
}

interface Dao{
    public function create(Usuario $u);
    public function findById($id);
    public function findAll();
    public function update(Usuario $u);
    public function delete($id);
}