<?php 
    $commentId = filter_input(INPUT_POST, "commentId", FILTER_SANITIZE_NUMBER_INT);
    $commentText = filter_input(INPUT_POST, "commentText", FILTER_SANITIZE_STRING);

    $servername = "localhost";
    $username = "blogUser";
    $password = "o4LnqYRLl6cfluFW";
    $dbname = 'blog';

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    
        $stmt = $conn->prepare("UPDATE comments SET text = :commentText WHERE id = :id");
        $stmt->bindValue(':commentText', $commentText, PDO::PARAM_STR);
        $stmt->bindValue(':id', $commentId, PDO::PARAM_INT);
        
        $stmt->execute();
        
        $uusiId = $conn->lastInsertId();
        header("Location: index.php");
        exit;
        } catch(PDOException $pdoex) {
            print "Tietojen tallennuksessa tapahtui virhe." . $pdoex->getMessage();
        }

?>