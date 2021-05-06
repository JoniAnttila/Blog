<?php 
    $text = filter_input(INPUT_POST, "text", FILTER_SANITIZE_STRING);
    $id = filter_input(INPUT_POST, "entryId", FILTER_SANITIZE_NUMBER_INT);

    $servername = "localhost";
    $username = "blogUser";
    $password = "o4LnqYRLl6cfluFW";
    $dbname = 'blog';

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    
        $stmt = $conn->prepare("INSERT INTO comments (entry_id,text) VALUES (:entry_id,:text)");
        $stmt->bindValue(':entry_id', $id, PDO::PARAM_INT);
        $stmt->bindValue(':text', $text, PDO::PARAM_STR);
        
        $stmt->execute();
        
        $uusiId = $conn->lastInsertId();
        header("Location: index.php");
        exit;
        } catch(PDOException $pdoex) {
            print "Tietojen tallennuksessa tapahtui virhe." . $pdoex->getMessage();
        }

?>