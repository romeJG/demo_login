<!DOCTYPE html>
<html lang="en">
<?php
session_start();
require '../components/verify_sesstion.php';
$pageTitle = "Records";
require '../components/header.php';
require "../db/db_con.php" ?>

<body>
    <div class="row">
        This is Records
    </div>
    <div class="row">
        <a href="dashboard.php">Dashboard</a>
    </div>
    <div class="row">
        <?php include '../components/table.php' ?>
    </div>
    <div class="row">
        <div class="col">
            <button id="cb" name="cb" class="lit" type="button" onclick="create()">
                Create
            </button>
        </div>
        <div class="col">
            <button id="ub" name="ub" class="lit" type="button" onclick="update()">
                Update
            </button>
        </div>
        <div class="col">
            <button id="db" name="db" class="lit" type="button" onclick="del()">
                Delete
            </button>
        </div>
    </div>
    <div class="col">
        <form action="../backend/record_process.php" method="POST">
            <div id="c0"> </div>
        </form>
    </div>

    <script src="../script/records.js"></script>
    <?php include '../components/footer.php' ?>
</body>

</html>