<?php

namespace App;

class Crud {

public function insert(Control $n){

    $sql  = "INSERT INTO Names (firstname,lastname) VALUES (?,?)";
    $stmt = Conect::prepare($sql);

    //$stmt->bindValue(':nome', $this->nome, \PDO::PARAM_STR);
    $stmt->bindValue(1, $n->getFirstName());
    $stmt->bindValue(2, $n->getLastName());

    return $stmt->execute();

/*
    $sql = 'INSERT INTO Names (firstname,lastname) VALUES (?,?)' ;

    $stmt = Conect::prepare($sql);
    $stmt->bindValue(1, $nome->getFirstName());
    $stmt->bindValue(2, $nome->getLastName());

    $stmt->execute();
    */
}

public function select() {

    $sql = "SELECT * FROM Names";

    $stmt = Conect::prepare($sql);
    $stmt->execute();

   if($stmt->rowCount() > 0) {
        $resultado = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $resultado;
    } else {
        return [];
    }
    //return $stmt->fetchAll();

}

public function selectOne(Control $n) {

    $sql = "SELECT * FROM Names WHERE id = ?";

    $stmt = Conect::prepare($sql);
    $stmt->bindValue(1, $n->getId());
    $stmt->execute();

   if($stmt->rowCount() > 0) {
        $resultado = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $resultado;
    } else {
        return [];
    }
    //return $stmt->fetchAll();

}


public function update(Control $n) {

    $sql = "UPDATE Names SET firstname = ?, lastname = ? WHERE id = ?";

    $stmt = Conect::prepare($sql);
    $stmt->bindValue(1, $n->getFirstName());
    $stmt->bindValue(2, $n->getLastName());
    $stmt->bindValue(3, $n->getId());

    $stmt->execute();

}

public function delete($id) {
    
    $sql = "DELETE FROM Names WHERE id=?";

    $stmt = Conect::prepare($sql);
    $stmt->bindValue(1, $id);
    $stmt->execute();
}


}
?>