<?php

    $id = filter_input(INPUT_GET, "entry_id", FILTER_SANITIZE_NUMBER_INT);

?>

    <form action="saveComment.php" method="POST">
        <div>
        <h5>Comment</h5>
        <label>Text:</label>
        <textarea name="text" id="text" maxlength="255" required></textarea>
        </div>
        <div>
        <input type="hidden" name="entryId" value="<?php print($id); ?>" />
        </div>
        <input type="submit" value="Add comment" />
    </form>