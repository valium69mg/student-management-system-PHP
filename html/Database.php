<?php
class Database {
    public $connection;
    public $host;
    public $database;
    public $port;
    public $user;
    private $password;

    private $connectionStatus = false;

    public function __construct($database, $host,$port,$user,$password) {
        $this->database = $database;
        $this->host = $host;
        $this->port = $port;
        $this->user = $user;
        $this->password = $password;
        try {
            $this->connection = new PDO("mysql" . ":host=" . $this->host . ';port=' . $this->port . ";dbname=" . $this->database, $this->user, $this->password);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->connectionStatus = true;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    //USERS 
    public function createUsersTable() {
        if ($this->connectionStatus === true) {
            try {
                $statement = "CREATE TABLE IF NOT EXISTS users( 
                    userid int AUTO_INCREMENT,
                    username varchar(25) NOT NULL,
                    password varchar(255) NOT NULL,
                    PRIMARY KEY (userid)
                );";
                $this->connection->query($statement);
                return true;
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        } else {
            return false;
        }
    }

    public function createUser($username,$password) {
        if ($this->connectionStatus === true) {
            try {
                $statement = "INSERT INTO users (username,password) VALUES (?,?)";
                $this->connection->prepare($statement)->execute([$username, password_hash($password,PASSWORD_DEFAULT)]);
                return true;
            }catch (PDOException $e) {
                return $e;
            }
        } else {
            return false;
        }
    }

    public function getAllUsers() {
        if ($this->connectionStatus === true) {
            try {
                $stmt = "SELECT * FROM users";
                $query = $this->connection->prepare($stmt,array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
                $query->execute();
                $data = $query->fetchAll(PDO::FETCH_ASSOC);
                return $data; // returns all users
                
            } catch (PDOException $e) {
                return $e;
            }
        } else {
            return false;
        }
    }

    public function getUserPassword($username) {
        if ($this->connectionStatus === true) {
            try {
                $stmt = "SELECT password FROM users WHERE username = ?";
                $query = $this->connection->prepare($stmt,array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
                $query->execute(array($username));
                $data = $query->fetchAll(PDO::FETCH_ASSOC);
                return $data[0]['password']; // returns user password
                
            } catch (PDOException $e) {
                return $e;
            }
        } else {
            return false;
        }
    }


}
