<div class="row">
    Updating Record
    <?php
    if ((isset($_GET['update'])) && (isset($_GET['title'])) && (isset($_GET['desc']))) {
        $id = $_GET['update'];
        $title = $_GET['title'];
        $desc = $_GET['desc'];
        echo $id;
    }
    ?>:
</div>
<div class="row">
    <label for="title">Record Title:</label> <input id="title" name="title" type="text" placeholder="Title"
        value="<?php echo htmlspecialchars($title); ?>" />
</div>
<div class="row">
    <label for="description">Description:</label> <input id="desc" name="desc" type="text" placeholder="Description"
        value="<?php echo htmlspecialchars($desc); ?>" />
</div>
<div class="row">
    <button id="ub" name="ub" type="submit" value="<?php echo htmlspecialchars($id); ?>">Update</button>
</div>