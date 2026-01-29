<!DOCTYPE html>
<html lang="en">
<?php
session_start();
require '../components/verify_sesstion.php';
$pageTitle = "Deleted Records";
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
                This is Deleted Records
            </div>
            <div class="col">
                <a href="dashboard.php">Dashboard</a>
            </div>
            <div class="col">
                <a href="records.php">Records</a>
            </div>
        </div>
        <form action="../backend/restore_process.php" method="POST">
            <div class="row">
                <div class="col">
                    <?php include '../components/deleted_table.php' ?>
                </div>
            </div>
        </form>
    </div>
    <script src="../script/records.js"> </script>
    <?php include '../components/footer.php' ?>
</body>

</html>