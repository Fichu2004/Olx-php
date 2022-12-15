<!DOCTYPE html>
<html lang="pl">
<html>
<head>
    <meta charset="UTF-8">
    <title>Rejestracja</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .d1
        {
            background: blue;
            height: 800px;
            width: 500px;
            border: 50%;
            outline: 5px black solid;
            font-size: 20px;
            text-align: center;
            color: white;
        }
        input
        {
            background: lightgrey;
        }
        button
        {
            background: lightgrey;
        }
        </style>
</head>
<body>
    <!-- <form method="POST" action="register.php">
        <input type="text" name="name" placeholder="Login" required>
        <input type="email" name="email" placeholder="E-mail" required>
        <input type="password" name="password" placeholder="Hasło" required>
        <input type="submit" name="submit" value="Wyślij">
    </form> -->
   
    <body>
<?php
        $con = new mysqli("127.0.0.1","root","","sklep");
        echo '<form method="POST">';
        $res = $con->query("SELECT * FROM users");
        $cos = $res->fetch_all();

        echo '<center><div class="d1"><h1>Rejestracja:</h1><br> Nazwa Użytkownika: <input name="login"><br> Haslo: <input name="password" type="password"><br><input type="submit">';
        if($_POST!=NULL)
        {
            if($_POST['login']!="" && $_POST['password']!="")
            {
                $sqlquery = "INSERT INTO `users` (name,password,isadmin) VALUES ('".$_POST['login']."', '".$_POST['password']."', '0');";
                $con->query($sqlquery);
                header('location: index.php');
            }
        }
        echo '</form>';

        echo '<form action="index.php"><button>Logowanie</button></form></center></div>';
    ?>
</body>
</html>