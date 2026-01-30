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
                        if ($current_page > 1) {
                            // start 
                            echo '<li> <a href="records.php?page=1">1</a> </li>';
                        }
                        if ($current_page > 2) {
                            // prev 
                            $prev = $current_page - 1;
                            echo "<li> <a href='records.php?page=$prev'>&laquo;</a> </li>";
                        }
                        // current 
                        echo "<li> <a class='active' href='#'>$current_page</a> </li>";
                        if ($current_page < $total_pages - 1) {
                            // next 
                            $next = $current_page + 1;
                            echo "<li> <a href='records.php?page=$next'>&raquo;</a> </li>";
                        }
                        if ($current_page < $total_pages) {
                            // end 
                            echo "<li><a href='records.php?page=$total_pages'>$total_pages</a></li>";
                        }
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