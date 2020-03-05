<?php

class Database 
{

	private $host = "localhost";
	private $dbName = "api_wine";
	private $username = "root";
	private $password = "";
	private $connection;

    public function getConnection() {

    $this->connection = null;

    try {
        $this->connection = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->dbName, $this->username, $this->password);
        $this->connection->exec("set names utf8");
	} catch(PDOException $exception) {
        echo "Connection error: " . $exception->getMessage();
    }

    return $this->connection;
	}

}
?>
}