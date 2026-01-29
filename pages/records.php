<!DOCTYPE html>
<html lang="en">
<?php
session_start();
require '../components/verify_sesstion.php';
$pageTitle = "Records";
require '../components/header.php';
require "../db/db_con.php" ?>
<style>
    td {
        text-align: center;
        vertical-align: middle;
    }
</style>

<body>
    <div class="flex-wrapper">
        <div class="row">
            <div class="col">
                This is Records
            </div>
            <div class="col">
                <a href="dashboard.php">Dashboard</a>
            </div>
            <div class="col">
                <a href="deleted.php">Deleted Records</a>
            </div>
        </div>
        <form action="../backend/record_process.php" method="POST">
            <div class="row">
                <div class="col">
                    <?php include '../components/record_table.php' ?>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <button id="cb" name="cb" class="lit" type="button" onclick="add()">
                        Create
                    </button>
                </div>
                <div class="col">
                    <div id="c0"> </div>
                </div>
            </div>
        </form>
    </div>
    <script src="../script/records.js"> </script>
    <?php include '../components/footer.php' ?>
</body>

</html>