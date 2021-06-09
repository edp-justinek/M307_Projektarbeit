<?php

class TaskController
{
    public function tasklist(){
        $pdo = db();
        $statement = $pdo->prepare('SELECT * FROM task');
        $statement->execute();
        $result = $statement->fetchAll();
        require 'app/Views/task.view.php';
    }

    public function new(){
        $pdo = db();
        $statement = $pdo->prepare('INSERT INTO task SET title=:title');
        $statement->bindParam(':title', $_POST['title']);
        $statement->execute();
        $this->tasklist();
        header("Location:/modul-307/M307_Projektarbeit/tasklist");
    }

    public function delete(){
        $pdo = db();
        $statement = $pdo->prepare('DELETE FROM task WHERE id=:id');
        $statement->bindParam(':id', $_GET['id']);
        $statement->execute();
        $this->tasklist();
        header("Location:/modul-307/M307_Projektarbeit/tasklist");
    }
    public function edit(){
        $pdo = db();
        $statement = $pdo->prepare('SELECT * FROM task WHERE id=:id');
        $statement->bindParam(':id', $_GET['id']);
        $statement->execute();

        $result = $statement->fetch();
        require 'app/Views/taskedit.view.php';
    }
    public function update(){
        $pdo = db();
        $statement = $pdo->prepare('UPDATE task SET title=:title, completed=:completed WHERE id=:id');
        $statement->bindParam(':id', $_POST['id']);
        $statement->bindParam(':title', $_POST['title']);
        $statement->bindParam(':completed', $_POST['completed']);
        $statement->execute();
        header("Location:/modul-307/M307_Projektarbeit/tasklist");
    }

}


