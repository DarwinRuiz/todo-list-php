<?php
require_once(realpath(dirname(__FILE__) . '/../database/connection.php'));

$connection = new Connection();
$pdo = $connection->connect();



if (isset($_POST['add-task'])) {
    $task = $_POST['task'];
    $query_insert = "INSERT INTO tasks (task_nm) VALUES (?)";
    $stmt = $pdo->prepare($query_insert);
    $stmt->bindParam(1, $task, PDO::PARAM_STR);
    $stmt->execute();
}


if (isset($_GET['task_id'])) {
    $task_id = $_GET['task_id'];
    $query_delete = "DELETE FROM tasks WHERE task_id = ?";
    $stmt = $pdo->prepare($query_delete);
    $stmt->bindParam(1, $task_id, PDO::PARAM_INT);
    $stmt->execute();
}

if (isset($_POST['task_id'])) {
    $task_id = $_POST['task_id'];
    $completed = (isset($_POST['completed'])) ? 1 : 0;


    $query_update = "UPDATE tasks SET completed = ? WHERE task_id = ?";
    $stmt = $pdo->prepare($query_update);
    $stmt->bindParam(1, $completed, PDO::PARAM_INT);
    $stmt->bindParam(2, $task_id, PDO::PARAM_INT);
    $stmt->execute();
}


$query_select = "SELECT task_id, task_nm, completed FROM tasks";
$todos = $pdo->query($query_select)->fetchAll(PDO::FETCH_ASSOC);
