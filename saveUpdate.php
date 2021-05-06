<?php 
    $title = filter_input(INPUT_POST, "title", FILTER_SANITIZE_STRING);
    $text = filter_input(INPUT_POST, "text", FILTER_SANITIZE_STRING);
    $id = filter_input(INPUT_POST, "id", FILTER_SANITIZE_NUMBER_INT);

    $servername = "localhost";
    $username = "blogUser";
    $password = "o4LnqYRLl6cfluFW";
    $dbname = 'blog';

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $update = $conn->prepare('UPDATE entry SET title = :title, text = :text WHERE id = :id');
        $update->bindValue(":title", $title, PDO::PARAM_STR);
        $update->bindValue(":text", $text, PDO::PARAM_STR);
        $update->bindValue(":id", $id, PDO::PARAM_INT);
        $update->execute();

        header("Location: http://localhost/blog/index.php");

    } catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    }

?>