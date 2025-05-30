<?php
session_start();
$connection = mysqli_connect("localhost", "root", "", "crm_db") or die(mysqli_error($connection));

if (isset($_POST['submit'])) {
    $errors = [];
    
    if (empty($_POST['name'])) $errors[] = 'Клиент';
    if (empty($_POST['age'])) $errors[] = 'Телефон';
    if (empty($_POST['address'])) $errors[] = 'Сумма';
    if (empty($_POST['salary'])) $errors[] = 'Адрес';
    if (empty($_POST['more'])) $errors[] = 'Дополнительно';
    
    if (count($errors) > 0) {
        $_SESSION['error'] = "Заполните поля: " . implode(', ', $errors);
        header('Location: db1.php');
        exit();
    }
    
    $name = mysqli_real_escape_string($connection, $_POST['name']);
    $age = mysqli_real_escape_string($connection, $_POST['age']);
    $address = mysqli_real_escape_string($connection, $_POST['address']);
    $salary = mysqli_real_escape_string($connection, $_POST['salary']);
    $more = mysqli_real_escape_string($connection, $_POST['more']);
    
    $query = "INSERT INTO db_sql (name, age, address, salary, more)
              VALUES ('$name', '$age', '$address', '$salary', '$more')";
    
    if (mysqli_query($connection, $query)) {
        $_SESSION['success'] = "Сделка успешно добавлена!";
    } else {
        $_SESSION['error'] = "Ошибка: " . mysqli_error($connection);
    }
    
    header('Location: db1.php');
    exit();
}
?>