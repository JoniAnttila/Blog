<!DOCTYPE html>
<html lang="en">
<head>
    <title>Blog</title>
</head>
<body>
    <h1>My blog</h1>
    <form action="save.php" method="POST">
        <div>
            <label>Title</label>
            <input name="title" id="title" type="text" maxlength="255" required>
        </div>
        <div>
            <label>Text</label>
            <textarea name="text" id="text" maxlength="255" required></textarea>
        </div>
        <input type="submit" value="Add new" />
    </form>
    <div id="entries">
        <?php
        require "readComments.php";

        $servername = "localhost";
        $username = "blogUser";
        $password = "o4LnqYRLl6cfluFW";
        $dbname = 'blog';
    
        try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
        $stmt = $conn->prepare("SELECT id, title, text, added FROM entry");
        $stmt->execute();
    
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $result = $stmt->fetchAll();
        
        foreach($result as $row) {
            print("<h3>");
            print($row["title"]);
            print("</h3>");

            print("<p><i>");
            print($row["text"]);
            print("</i></p>");

            $postId = $row["id"];
            $title = $row["title"];
            $text = $row["text"];

            print("<a href='delete.php?id=$postId'>Delete<a/>");

            print("&nbsp; | &nbsp;");

            print ("<a href='update.php?id=$postId&title=$title&text=$text'>Update<a/>");

            // kommentit

            print("<h5>Comments</h5>");

            readComments($postId);
            
            print("<a href='comments.php?entry_id=$postId&comment='>Leave a comment</a>");

            print("<hr/>");
        }
    
        } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
        }
        ?>
    </div>
</body>
</html>