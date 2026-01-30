<!DOCTYPE html>
<html lang="en">
<?php
session_start();
require '../components/verify_sesstion.php';
$pageTitle = "Records";
require '../components/header.php';
require "../db/db_con.php";
?>

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
                    <?php include '../components/record_table.php'; ?>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <ul class="pagination">
                        <li>
                            <a
                                href="records.php?page=<?php echo $total_pages; ?>&action=add&pg=<?php echo $current_page; ?>">
                                Create
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col">
                    <ul class="pagination">
                        <?php
                        $firstDisabled = ($current_page <= 1) ? 'disabled' : '';
                        echo "<li><a class='$firstDisabled' href='records.php?page=1'>1</a></li>";

                        $prevDisabled = ($current_page <= 1) ? 'disabled' : '';
                        $prevPage = ($current_page > 1) ? $current_page - 1 : 1;
                        echo "<li><a class='$prevDisabled' href='records.php?page=$prevPage'>&laquo;</a></li>";

                        echo "<li><a class='active' href='#'>$current_page</a></li>";

                        $nextDisabled = ($current_page >= $total_pages) ? 'disabled' : '';
                        $nextPage = ($current_page < $total_pages) ? $current_page + 1 : $total_pages;
                        echo "<li><a class='$nextDisabled' href='records.php?page=$nextPage'>&raquo;</a></li>";

                        $lastDisabled = ($current_page >= $total_pages) ? 'disabled' : '';
                        echo "<li><a class='$lastDisabled' href='records.php?page=$total_pages'>$total_pages</a></li>";
                        ?>
                    </ul>
                </div>
            </div>
        </form>
    </div>
    <script src="../script/records.js"> </script>
    <?php include '../components/footer.php' ?>
</body>

</html>