<html>
    <head>
        <style>
        .d1
        {
            background: blue;
            height: 800px;
            width: 500px;
            border: 5px solid black;
            border-radius: 50px;
            font-size: 20px;
            text-align: center;
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
        <center>
    <?php
    session_start();
    $con = new mysqli("127.0.0.1","root","","sklep");
    echo '<form method="POST">';
    $res = $con->query("SELECT * FROM users");
    $cos = $res->fetch_all();

    $res1 = $con->query("SELECT * FROM offers");
    $cos1 = $res1->fetch_all();
    echo '<center><div class="d1"> Zalogowany jako: '.$_SESSION["current_user"].'<h1>Wystaw:</h1><br> Nazwa przedmiotu: <input name="name"><br> Opis: <input name="description"><br><input type="submit">';
    if($_POST!=NULL)
    {
            $sqlquery = "INSERT INTO `offers` VALUES ('".count($cos1)."', '".$_POST['name']."', '".$_POST['description']."','".$_SESSION["current_user"]."');";
            $con->query($sqlquery);
            header('location: strona.php');
    }
    echo '</form>';

    echo '<a href="strona.php"><button>Wróć</button></a></center></div>';
    ?>
        </div></center>
    </body>
</html>