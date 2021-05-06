<?php

$id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);

$servername = "localhost";
$username = "blogUser";
$password = "o4LnqYRLl6cfluFW";
$dbname = 'blog';

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $conn->prepare("DELETE FROM entry WHERE id=(:id)");
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    $stmt->execute();

    header("Location: http://localhost/blog/index.php");
    exit;
    } catch(PDOException $pdoex) {
        print "Tietojen tallennuksessa tapahtui virhe." . $pdoex->getMessage();
    }
    ?>