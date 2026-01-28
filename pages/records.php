<!DOCTYPE html>
<html lang="en">
<?php
session_start();
require '../components/verify_sesstion.php';
$pageTitle = "Records";
require '../components/header.php';
require "../db/db_con.php" ?>

<body>
    <div class="flex-wrapper">
        <div class="row row-split">
            <div class="col">
                This is Records
            </div>
            <div class="col">
                <a href="dashboard.php">Dashboard</a>
            </div>
        </div>
        <form action="../backend/record_process.php" method="POST">
            <div class="row row-single">
                <div class="col">
                    <?php include '../components/table.php' ?>
                </div>
            </div>
            <div class="row row-split">
                <div class="col">
                    <button id="cb" name="cb" class="lit" type="button" onclick="create()">
                        Create
                    </button>
                </div>
                <div class="col">
                    <div id="c0"> </div>
                </div>
            </div>
        </form>
    </div>
    <script src="../script/records.js"></script>
    <?php include '../components/footer.php' ?>
</body>

</html>