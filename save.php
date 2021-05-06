<?php

$servername = "localhost";
$username = "blogUser";
$password = "o4LnqYRLl6cfluFW";
$dbname = 'blog';

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $conn->beginTransaction();

    $title = filter_input(INPUT_POST,'title',FILTER_SANITIZE_STRING);
    $text = filter_input(INPUT_POST,'text',FILTER_SANITIZE_STRING);

    $stmt = $conn->prepare("INSERT INTO entry (title,text) VALUES (:title,:text)");

    $stmt->bindValue(':title', $title, PDO::PARAM_STR);
    $stmt->bindValue(':text', $text, PDO::PARAM_STR);
    $stmt->execute();

    $conn->commit();
    
    $uusiId = $conn->lastInsertId();
    header("Location: index.php");
    exit;
    } catch(PDOException $pdoex) {
        $conn->rollBack();
        print "Tietojen tallennuksessa tapahtui virhe." . $pdoex->getMessage();
    }
    ?>
