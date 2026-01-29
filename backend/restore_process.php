<?php
// connect to database 
include '../db/db_con.php';
// start the session 
session_start();
// verify is the session is valid 
require '../components/verify_sesstion.php';

// check if method is post and if at least one of the buttons are pressed 
// steps when restore button was pressed 
if (($_SERVER['REQUEST_METHOD'] === 'POST') && (isset($_POST['rb']))) {
    // id of the row being restored is taken from the value of the specific button pressed 
    // value of id is trimmed as well
    $id = trim($_POST['rb']);
    // if field is empty, return to deleted page with query incomplete in field restore
    if (empty($id)) {
        header('Location: ../pages/deleted.php?restore=inc');
        exit();
    }
    // gets the current data of that row 
    $stmt = $pdo->prepare('SELECT * FROM deleted WHERE id = ?');
    if ($stmt->execute([$id])) {
        // to insert new data 
        $deleted_data = $stmt->fetch();
        $prev_id = trim($deleted_data['prev_id']);
        $title = trim($deleted_data['record_title']);
        $desc = trim($deleted_data['descriptions']);
        $name = trim($deleted_data['recorder_name']);
        $recid = trim($deleted_data['recorder_id']);
        $creation = trim($deleted_data['created_at']);

        $stmt = $pdo->prepare('INSERT INTO records (id, record_title, descriptions, recorder_name, recorder_id, created_at) VALUES (?, ?, ?, ?, ?, ?)');
        // success in adding data to records  
        if ($stmt->execute([$prev_id, $title, $desc, $name, $recid, $creation])) {
            // to delete from deleted 
            $stmt = $pdo->prepare('DELETE FROM deleted WHERE id = ?');
            // check if sql query is successfully executed
            if ($stmt->execute([$id])) {
                // successful delete and return to deleted page with query success in field delete 
                header('Location: ../pages/deleted.php?restore=success');
                exit();
            } else {
                // failed delete and return to deleted page with query failed in field delete 
                header('Location: ../pages/deleted.php?restore=failed');
                exit();
            }
        } else {
            // failed adding new data and return to deleted page with query failed in field delete 
            header('Location: ../pages/deleted.php?restore=failed');
            exit();
        }
    } else {
        // id does not exists and return to deleted page with query failed in field delete 
        header('Location: ../pages/deleted.php?restore=failed');
        exit();
    }

} else {
    header('Location: ../pages/deleted.php');
    exit();
}

