<?php

class Post {

    private $conn;
    private $table = "posts";

    public $id;
    public $title;
    public $body;
    public $author;
    public $modified_at;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function read() {
        $sql = "SELECT id, title, body, author, modified_at FROM {$this->table} ORDER BY id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt;
    }

    public function read_one() {
        $sql = "SELECT id, title, body, author, modified_at FROM {$this->table} WHERE id=? LIMIT 1";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $this->id);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->title = $row['title'];
        $this->body = $row['body'];
        $this->author = $row['author'];
        $this->modified_at = $row['modified_at'];
    }

    public function create() {
        $sql = "INSERT INTO {$this->table}
                SET title = :title,
                    body = :body,
                    author = :author
                ";
        $stmt = $this->conn->prepare($sql);
        //sanitize data
        $this->title = htmlspecialchars(strip_tags(($this->title)));
        $this->body = htmlspecialchars(strip_tags(($this->body)));
        $this->author = htmlspecialchars(strip_tags(($this->author)));
        $stmt->bindParam('title', $this->title);
        $stmt->bindParam('body', $this->body);
        $stmt->bindParam('author', $this->author);

        if($stmt->execute()) {
            return true;
        }
        printf("Error: %s.\n", $stmt->error);
        return false;
    }

    public function update() {
        $sql = "UPDATE {$this->table}
                SET title = :title,
                    body = :body,
                    author = :author
                WHERE id = :id";

        $stmt = $this->conn->prepare($sql);
        //sanitize data
        $this->title = htmlspecialchars(strip_tags(($this->title)));
        $this->body = htmlspecialchars(strip_tags(($this->body)));
        $this->author = htmlspecialchars(strip_tags(($this->author)));
        $this->id = htmlspecialchars(strip_tags(($this->id)));
        $stmt->bindParam('title', $this->title);
        $stmt->bindParam('body', $this->body);
        $stmt->bindParam('author', $this->author);
        $stmt->bindParam('id', $this->id);

        if($stmt->execute()) {
            return true;
        }

        printf("Error: %s.\n", $stmt->error);
        return false;
    }

    public function delete() {
        $sql = "DELETE FROM {$this->table} WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $this->id = htmlspecialchars(strip_tags(($this->id)));
        $stmt->bindParam('id', $this->id);

        if($stmt->execute()) {
            return true;
        }
        printf("Error: %s.\n", $stmt->error);
        return false;

    }
}
