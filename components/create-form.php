<?php
session_start();
require '../components/verify_sesstion.php';
?>
<!-- html code to obtain title and description of record to be added -->
<div class="row">
    Creating Form:
</div>
<div class="row">
    <label for="title">Record Title:</label> <input id="title" name="title" type="text" placeholder="Title" />
</div>
<div class="row">
    <label for="description">Description:</label> <input id="desc" name="desc" type="text" placeholder="Description" />
</div>
<div class="row">
    <!-- button to submit details to database -->
    <button id="cb" name="cb" type="submit">Submit</button>
</div>