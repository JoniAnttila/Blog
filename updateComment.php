<?php

    $id = filter_input(INPUT_GET, "commentId", FILTER_SANITIZE_NUMBER_INT);

?>

    <form action="saveUpdateComment.php" method="POST">
        <div>
        <h5>Comment</h5>
        <label>Edit Text:</label>
        <textarea name="commentText" value="<?php print($commentText); ?>" maxlength="255" required></textarea>
        </div>
        <div>
        <input type="hidden" name="commentId" value="<?php print($id); ?>" />
        </div>
        <input type="submit" value="Add comment" />
    </form>