<?php 
    $commentId = filter_input(INPUT_GET, "commentId", FILTER_SANITIZE_NUMBER_INT);

    $servername = "localhost";
    $username = "blogUser";
    $password = "o4LnqYRLl6cfluFW";
    $dbname = 'blog';

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    
        $stmt = $conn->prepare("DELETE FROM comments WHERE id = :commentId");
        $stmt->bindValue(':commentId', $commentId, PDO::PARAM_INT);
        
        $stmt->execute();
        
        $uusiId = $conn->lastInsertId();
        header("Location: index.php");
        exit;
        } catch(PDOException $pdoex) {
            print "Tietojen tallennuksessa tapahtui virhe." . $pdoex->getMessage();
        }

?>