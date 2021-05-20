<?php
require '../Usuario.php';

class UsuarioDao implements Dao{
    private $pdo;

    public function __construct(PDO $p){
        $this -> pdo = $p;
    }
    
    public function create(Usuario $u){
        $sql = $this -> pdo -> prepare('INSERT INTO usuarios (nome, email, senha) VALUES (:nome, :email, :senha)');
        $sql -> bindValue(':nome', $u -> nome);
        $sql -> bindValue(':email', $u -> email);
        $sql -> bindValue(':senha', $u -> senha);
        $sql -> execute();

        $u->setId($this->pdo->lastInsertId());
        return $u;
    }
    public function findById($id){
        $sql = $this -> pdo -> prepare('SELECT * FROM usuarios WHERE id=:id');
        $sql -> bindValue(':id', $id);
        $sql -> execute();

        $usuario = new Usuario();
        if ($sql -> rowCount() > 0) {
            $dado = $sql -> fetch();
            $usuario -> setNome($dado['nome']);
            $usuario -> setNome($dado['email']);
            $usuario -> setNome($dado['senha']);
            $usuario -> setNome($id);

            return $usuario;
        }
        return false;
    }
    public function findAll(){

    }
    public function update(Usuario $u){

    }
    public function delete($id){

    }
}