<?php

    $id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);
    $title = filter_input(INPUT_GET, "title", FILTER_SANITIZE_STRING);
    $text = filter_input(INPUT_GET, "text", FILTER_SANITIZE_STRING);
?>

    <form action="saveUpdate.php" method="POST">
        <div>
        <label>Title</label>
        <input name="title" id="title" maxlength="255" required type="text" value="<?php print($title); ?>" />
        </div>
        <div>
        <label>Text</label>
        <textarea name="text" id="text" maxlength="255" required ><?php print($text); ?></textarea>
        </div>
        <div>
        <input type="hidden" name="id" value="<?php print($id); ?>" />
        </div>
        <input type="submit" value="Update" />
    </form>
