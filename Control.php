<?php



class Control {

    private static $instance;
    protected $table;
    private $nome;
    private $email;
    private $senha;
    private $cargo;

    public static function getInstance()
    {
        if (!isset(self::$instance)) {
            try {
                self::$instance = new PDO('mysql:host=localhost;dbname=bancodedados', "root", "");
                self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$instance->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }

        return self::$instance;
    }

    public static function prepare($sql)
    {
        return self::getInstance()->prepare($sql);
    }

    

    //abstract public function insert();
    //abstract public function update($id);

    public function find($id)
    {
        $sql  = "SELECT * FROM $this->table WHERE id = :id";
        $stmt = DB::prepare($sql);

        $stmt->bindValue(':id', $id, PDO::PARAM_INT);

        $stmt->execute();

        return $stmt->fetch();
    }

    public function findAll()
    {
        $sql  = "SELECT * FROM $this->table";
        $stmt = DB::prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll();
    }

    public function delete($id)
    {
        $sql  = "DELETE FROM $this->table WHERE id = :id";
        $stmt = DB::prepare($sql);

        $stmt->bindValue(':id', $id, PDO::PARAM_INT);

        return $stmt->execute();
    }



    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function setSenha($senha)
    {
        $this->senha = md5($senha);
    }

    public function setCargo($cargo)
    {
        $this->cargo = $cargo;
    }

    public function setEmail($email)
    {
        $conta = "/^[^0-9][a-zA-Z0-9\._-]+[@]";
        $domino = "[a-zA-Z0-9_]+([.]";
        $extensao = "[a-zA-Z0-9_]+)$/";
        $pattern = $conta.$domino.$extensao;

        if ((preg_match($pattern, $email))) {
            $this->email = $email;

            return true;
        } else {
            return false;
        }
    }

    public function insert()
    {
        try {
            $sql  = "INSERT INTO $this->table (nome, email, senha, id_cargo) VALUES (:nome, :email, :senha, :cargo)";
            $stmt = DB::prepare($sql);

            $stmt->bindValue(':nome', $this->nome, PDO::PARAM_STR);
            $stmt->bindValue(':email', $this->email, PDO::PARAM_STR);
            $stmt->bindValue(':senha', $this->senha, PDO::PARAM_STR);
            $stmt->bindValue(':cargo', $this->cargo, PDO::PARAM_INT);

            return $stmt->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function update($id)
    {
        try {
            $sql  = "UPDATE $this->table SET nome = :nome, email = :email, senha = :senha, id_cargo = :cargo WHERE id = :id";
            $stmt = DB::prepare($sql);

            $stmt->bindValue(':nome', $this->nome, PDO::PARAM_STR);
            $stmt->bindValue(':email', $this->email, PDO::PARAM_STR);
            $stmt->bindValue(':senha', $this->senha, PDO::PARAM_STR);
            $stmt->bindValue(':cargo', $this->cargo, PDO::PARAM_INT);
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);

            return $stmt->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }


    

}

?>