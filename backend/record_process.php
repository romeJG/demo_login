<?php
// connect to database 
include '../db/db_con.php';
// start the session 
session_start();
// verify is the session is valid 
require '../components/verify_sesstion.php';

// check if method is post and if at least one of the buttons are pressed 
if (($_SERVER['REQUEST_METHOD'] === 'POST') && ((isset($_POST['cb'])) || (isset($_POST['ub'])) || (isset($_POST['db'])))) {
    // steps when the create button is pressed 
    if (isset($_POST['cb'])) {
        // title and descriptions would be received from the form
        // recorder username would obtained from the session 
        // all 3 inputs would be trimmed of whitespace
        $title = trim($_POST['title']);
        $des = trim($_POST['desc']);
        $name = trim($_SESSION['name']);
        $recid = trim($_SESSION['user_id']);
        // if at least one field is empty, return to records page with query incomplete in field create
        if (empty($title) || empty($des) || empty($name) || empty($recid)) {
            header('Location: ../pages/records.php?create=inc');
            exit();
        }
        // prepare pdo to insert into database with sql query 
        $stmt = $pdo->prepare('INSERT INTO records (record_title, descriptions, recorder_name, recorder_id) VALUES (?, ?, ?, ?)');
        // check if title, description, and recorder username were inserted into database 
        if ($stmt->execute([$title, $des, $name, $recid])) {
            // successful insertion and return to records page with query success in field create
            header('Location: ../pages/records.php?create=success');
            exit();
        } else {
            // failed insertion and return to records page with query failed in field create
            header('Location: ../pages/records.php?create=failed');
            exit();
        }
    }
    // steps when update button was pressed 
    else if (isset($_POST['ub'])) {
        // id of the row being updated is taken from the value of the specific button pressed 
        // title and descriptions would be received from the form
        // recorder username would obtained from the session 
        // all 4 inputs would be trimmed of whitespace
        $id = trim($_POST['ub']);
        $title = trim($_POST['title']);
        $des = trim($_POST['desc']);
        $name = trim($_SESSION['name']);
        $recid = trim($_SESSION['user_id']);
        // if any of the field is empty, return to records page with query incomplete in field update
        if (empty($id) || empty($title) || empty($des) || empty($name) || empty($recid)) {
            header('Location: ../pages/records.php?update=inc');
            exit();
        }
        // prepare pdo to update specific row of database with sql query and provided id 
        $stmt = $pdo->prepare('UPDATE records SET record_title = ?, descriptions = ?, recorder_name = ?, recorder_id = ? WHERE id = ?');
        // check if title, description, recorder username, and id were injected in the sql query 
        if ($stmt->execute([$title, $des, $name, $recid, $id])) {
            // successful update and return to records page with query success in field update
            header('Location: ../pages/records.php?update=success');
            exit();
        } else {
            // failed update and return to records page with query failed in field update
            header('Location: ../pages/records.php?update=failed');
            exit();
        }
    }
    // steps when delete button was pressed 
    else if (isset($_POST['db'])) {
        // id of the row being deleted is taken from the value of the specific button pressed 
        // value of id is trimmed as well
        $id = trim($_POST['db']);
        // if field is empty, return to records page with query incomplete in field delete
        if (empty($id)) {
            header('Location: ../pages/records.php?delete=inc');
            exit();
        }
        // gets the current data of that row 
        $stmt = $pdo->prepare('SELECT * FROM records WHERE id = ?');
        if ($stmt->execute([$id])) {
            // to insert new data 
            $recorded = $stmt->fetch();
            $title = trim($recorded['record_title']);
            $desc = trim($recorded['descriptions']);
            $name = trim($recorded['recorder_name']);
            $recid = trim($recorded['recorder_id']);
            $creation = trim($recorded['created_at']);

            $stmt = $pdo->prepare('INSERT INTO deleted (prev_id, record_title, descriptions, recorder_name, recorder_id, created_at) VALUES (?, ?, ?, ?, ?, ?)');
            // success in adding data to deleted table 
            if ($stmt->execute([$id, $title, $desc, $name, $recid, $creation])) {
                // to delete from records
                $stmt = $pdo->prepare('DELETE FROM records WHERE id = ?');
                // check if sql query is successfully executed
                if ($stmt->execute([$id])) {
                    // successful delete and return to records page with query success in field delete 
                    header('Location: ../pages/records.php?delete=success');
                    exit();
                } else {
                    // failed delete and return to records page with query failed in field delete 
                    header('Location: ../pages/records.php?delete=failed');
                    exit();
                }
            } else {
                // failed adding new data and return to records page with query failed in field delete 
                header('Location: ../pages/records.php?delete=failed');
                exit();
            }
        } else {
            // id does not exists and return to records page with query failed in field delete 
            header('Location: ../pages/records.php?delete=failed');
            exit();
        }
    }
} else {
    header('Location: ../pages/records.php');
    exit();
}

