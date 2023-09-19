<?php

namespace classes;

class User
{
    public function __construct(public $login, public $email, public $password, public $id=0)
    {
        $this->login=trim(htmlspecialchars($login));
        $this->password = password_hash(htmlspecialchars(trim($this->password)), PASSWORD_DEFAULT);
        $this->email = htmlspecialchars(trim($email));
    }
    function addUserOfDb(): bool
    {


        $pdo= Db::conect();

        $res = $pdo->prepare("SELECT count(*) FROM users_tab WHERE login = ?");

        $res->execute([$this->login]);
        $tmp = $res->fetch();

        if ($tmp['count(*)'] != '0') {
            $_SESSION['error'] = 'this login already exists';

            return false;
        }

        if ($this->login == '' || $this->password == '' || $this->email == '') {
            $_SESSION['error'] = 'all fields of the form must be filled in';

            return false;
        }
        if (strlen($this->login) < 3 || strlen($this->login) > 50) {

            $_SESSION['error'] = 'the login field was entered incorrectly';


            return false;
        }
        if (strlen($this->email) < 3 || strlen($this->email) > 50) {
            $_SESSION['error'] = 'the email field was entered incorrectly';

            return false;
        }


        $res = $pdo->prepare("INSERT INTO users_tab (login, password, email) VALUES (?, ?, ?)");
        $res->execute([$this->login, $this->password, $this->email]);
        if ($res->rowCount() > 0) $_SESSION['success'] = 'registration completed completed successfully';
        else $_SESSION['error'] = 'request execution error';
        return true;
    }

    static function getUserDb($login): User
    {
       $pdo=Db::conect();
        $res = $pdo->prepare("SELECT login,email FROM users_tab WHERE login = ?");
        $res->execute([$login]);
        $result[] = $res->fetch();
        return new User($result['login'],$result['email'],$result['password'],$result['id']);
    }


}