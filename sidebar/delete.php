<?php
session_start();
if(!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit();
}

$strconn = mysqli_connect("localhost", "root", "", "crm_db");
if(!$strconn) {
    $_SESSION['error'] = "Ошибка подключения: " . mysqli_connect_error();
    header("Location: db2.php");
    exit();
}

if(isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $query = "DELETE FROM db_sql WHERE id = $id";
    
    if(mysqli_query($strconn, $query)) {
        $_SESSION['success'] = "Сделка успешно удалена!";
    } else {
        $_SESSION['error'] = "Ошибка удаления: " . mysqli_error($strconn);
    }
} else {
    $_SESSION['error'] = "Не указан ID сделки";
}

header("Location: db2.php");
exit();
?>