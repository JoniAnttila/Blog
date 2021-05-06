<?php
function readComments($postId) {
    $servername = "localhost";
    $username = "blogUser";
    $password = "o4LnqYRLl6cfluFW";
    $dbname = 'blog';

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $conn->prepare("SELECT * FROM comments WHERE entry_id = :id ORDER BY added DESC");
        $stmt->bindValue(':id', $postId, PDO::PARAM_INT);

        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $result = $stmt->fetchAll();



        print("<ol>");
        foreach($result as $row) {
            print("<li>");
            print($row['text'] . " " . $row['added']);

            $commentId = $row['id'];
            $commentText = $row['text'];

            print(" | 
                <a href='deleteComment.php?commentId=$commentId'>Delete<a/> | 
                <a href='updateComment.php?commentId=$commentId&commentText=$commentText'>Update<a/>
            ");

            print("</li>");
        }
        print("</ol>");

        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
}
?>