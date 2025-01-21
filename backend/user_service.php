<?php

class UserService {

    private $conection;
    private $user;

    public function __construct(Conection $conection, User $user) {

        $this->conection = $conection->conect();
        $this->user = $user;
    }

    public function insertInto() {

        $query = 'INSERT INTO users (nome, email, senha) VALUES (:nome, :email, MD5(:senha));';
        $stmt = $this->conection->prepare($query);
        $stmt->bindValue(':nome', $this->user->__get('name'));
        $stmt->bindValue(':email', $this->user->__get('email'));
        $stmt->bindValue(':senha', $this->user->__get('password'));
        $stmt->execute();
    }

    public function get() {

        $query = 'SELECT * FROM users';
        $stmt = $this->conection->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function update() {

        $query = 'UPDATE users SET nome=:nome, email=:email, senha=MD5(:senha) WHERE id=:id;';
        $stmt = $this->conection->prepare($query);
        $stmt->bindValue(':id', $this->user->__get('id'));
        $stmt->bindValue(':nome', $this->user->__get('name'));
        $stmt->bindValue(':email', $this->user->__get('email'));
        $stmt->bindValue(':senha', $this->user->__get('password'));
        $stmt->execute();
    }

    public function delete() {

        $query = 'DELETE FROM users WHERE id=:id';
        $stmt = $this->conection->prepare($query);
        $stmt->bindValue(':id', $this->user->__get('id'));
        $stmt->execute();
    }
}

?>