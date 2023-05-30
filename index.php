<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Samuels Guestbook</h1>

    <form action="index.php" method="post">
        <lable for="name">Name: </lable>
        <input type="text" name="name" />
        <br />
        <lable for="email">Email: </lable>
        <input type="text" name="email" />
        <br />
        <lable for="homep">Homepage: </lable>
        <input type="text" name="homep" />
        <br />
        <lable for="tel">tel: </lable>
        <input type="text" name="tel" />
        <br />
        <lable for="comment">Comment: </lable>
        <input type="text" name="comment" />
        <br />
        <input type="submit" " value="lägg till">           

    </form>
    <?php

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "mydb";
    $conn = new mysqli($servername, $username, $password, $dbname);


    $stmt = $conn->prepare("INSERT INTO Guestbook (name, email, homep, comment, time) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $name, $email, $homep, $comment, $timestamp);


    $name = $_POST["name"];
    $email = $_POST["email"];
    $homep = $_POST["homep"];
    $comment = $_POST["comment"];
    $timestamp = date("Y-m-d H:i:s");
    $sql = $stmt->execute();
    header("location:result.php"); 


    $stmt->close();
    $conn->close();
    
    ?>
</body>

</html
