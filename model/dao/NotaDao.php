<?php
class NotaDao implements DaoNota{
    private $pdo;
    private $idUsuario;

    public function __construct(PDO $p, $idUsu = 0){
        $this -> pdo = $p;
        $this -> idUsuario = $idUsu;
    }

    public function create(Nota $n){
        $sql = $this -> pdo -> prepare("INSERT INTO notas (idUsuario, corpo, aparece) VALUES (:iUsu, :corpo, :aparece)");
        $sql -> bindValue(':iUsu', $this -> idUsuario);
        $sql -> bindValue(':corpo', $n -> getCorpo());
        $sql -> bindValue(':aparece', $n -> getAparece());

        $sql -> execute();
        
        $n -> setIdNota($this -> pdo -> lastInsertId());
        return $n;
    }
    public function findById($id){
        $sql = $this -> pdo -> prepare("SELECT * FROM notas WHERE idNota=:idNota");
        $sql -> bindValue(':idNota', $id);
        $sql -> execute();
        
        if ($sql -> rowCount()>0){
            $resultado = $sql -> fetch(PDO::FETCH_ASSOC);
            return $resultado;
        }
        return false;
    }
    public function findAll(){
        $sql = $this -> pdo -> prepare("SELECT * FROM notas WHERE idUsuario=:idUsuario");
        $sql -> bindValue(':idUsuario', $this -> idUsuario);
        $sql -> execute();
        
        if ($sql -> rowCount()>0){
            $resultado = $sql -> fetchAll(PDO::FETCH_ASSOC);
            return $resultado;
        }
        return false;
    }
    public function update(Nota $n){
        $sql = $this -> pdo -> prepare("UPDATE notas SET corpo=:corpo WHERE idNota=:idNota");
        $sql -> bindValue(':idNota', $n -> getIdNota());
        $sql -> bindValue(':corpo', $n -> getCorpo());
        $sql -> execute();
    }
    public function delete($id){
        $sql = $this -> pdo -> prepare("DELETE FROM notas WHERE idNota=:idNota");
        $sql -> bindValue(':idNota', $id);
        $sql -> execute();

        return true;
    }
}