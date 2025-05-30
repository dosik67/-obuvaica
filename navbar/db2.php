<?php
session_start();
if(!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>CRM-система | Сделки</title>
    <link rel="icon" href="../assets/images/favicon.png">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        html,body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
        .btn {
            background-color: #f44336;
            color: white;
            padding: 5px 10px;
            text-align: center;
            text-decoration: none;
            border-radius: 5px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #65B1F7;
            color: white;
        }
        tr:hover {background-color: #f5f5f5;}
    </style>
</head>
<body>
<div class="w3-main" style="margin-left:300px;margin-top:43px;">
    <?php
    $strconn = mysqli_connect("srv-pleskdb34.ps.kz:3306","zh1","","shyntass_test"");
    if(!$strconn) {
        echo "Connection failed: " . mysqli_connect_error();
    }
    ?>
    <header class="w3-container" style="background-color: #333; color: white; padding: 20px;">
        <center><h1>Управление сделками</h1></center>
    </header>
    <div class="w3-container">
        <br>
        <table class="w3-table w3-striped w3-bordered">
            <tr>
                <th>Сделка №</th>
                <th>Клиент</th>
                <th>Телефон</th>
                <th>Сумма</th>
                <th>Адрес</th>
                <th>Дополнительно</th>
                <th>Дата</th>
                <th>Действие</th>
            </tr>
            <?php
            $query = "SELECT id, name, age, address, salary, more, date FROM db_sql";
            $result = mysqli_query($strconn, $query);
            while($row = mysqli_fetch_assoc($result)) {
                echo '<tr>';
                echo '<td>' . htmlspecialchars($row['id']) . '</td>';
                echo '<td>' . htmlspecialchars($row['name']) . '</td>';
                echo '<td>' . htmlspecialchars($row['age']) . '</td>';
                echo '<td>' . htmlspecialchars($row['address']) . '</td>';
                echo '<td>' . htmlspecialchars($row['salary']) . '</td>';
                echo '<td>' . htmlspecialchars($row['more']) . '</td>';
                echo '<td>' . htmlspecialchars($row['date']) . '</td>';
                echo '<td><a class="btn" href="delete.php?id=' . $row['id'] . '">Удалить</a></td>';
                echo '</tr>';
            }
            ?>
        </table>
    </div>
</div>
</body>
</html>