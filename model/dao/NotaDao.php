<?php
require 'model/Nota.php';

class NotaDao implements DaoNota{
    private $pdo;
    private $idUsuario;

    public function __construct(PDO $p, $idUsu){
        $this -> pdo = $p;
        $this -> pdo = $idUsu;
    }

    public function create(Nota $n){
        $sql = $this -> pdo -> prepare("INSERT INTO notas (idUsuario, corpo, aparece) VALUES (:iUsu, corpo, aparece)");
        $sql -> bindValue(':iUsu', $this -> idUsuario);
        $sql -> bindValue(':corpo', $n -> getCorpo());
        $sql -> bindValue(':aparece', $n -> getAparece());

        $sql -> execute();
        
        $n -> setIdNota($this -> pdo -> lastInsertId());
        return $n;
    }
    public function findById($id){

    }
    public function findAll(){
        $sql = $this -> pdo -> prepare("SELECT * FROM notas WHERE idUsuario=:idUsuario");
        $sql -> bindValue(':idUsuario', $this -> idUsu);
        $sql -> execute();
        
        if ($sql -> rowCount()>0){
            $resultado = $sql -> fetchAll(PDO::FETCH_ASSOC);
            return $resultado;
        }
        return false;
    }
    public function update(Nota $n){

    }
    public function delete($id){

    }
}