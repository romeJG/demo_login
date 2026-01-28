<?php
include '../db/db_con.php';
session_start();
require '../components/verify_sesstion.php';

if (($_SERVER['REQUEST_METHOD'] === 'POST') && ((isset($_POST['cb'])) || (isset($_POST['ub'])) || (isset($_POST['db'])))) {
    if (isset($_POST['cb'])) {
        $title = trim($_POST['title']);
        $des = trim($_POST['desc']);
        $name = trim($_SESSION['name']);
        if (empty($title) || empty($des) || empty($name)) {
            header('Location: ../pages/records.php?create=inc');
            exit();
        }
        $stmt = $pdo->prepare('INSERT INTO records (record_title, descriptions, recorder_name) VALUES (?, ?, ?)');
        if ($stmt->execute([$title, $des, $name])) {
            header('Location: ../pages/records.php?create=success');
            exit();
        } else {
            header('Location: ../pages/records.php?create=failed');
            exit();
        }
    } else if (isset($_POST['ub'])) {
        $id = trim($_POST["id"]);
        $title = trim($_POST['title']);
        $des = trim($_POST['desc']);
        $name = trim($_SESSION['name']);
        if (empty($id) || empty($title) || empty($des) || empty($name)) {
            header('Location: ../pages/records.php?update=inc');
            exit();
        }
        $stmt = $pdo->prepare('UPDATE records SET record_title = ?, descriptions = ?, recorder_name = ? WHERE id = ?');
        if ($stmt->execute([$title, $des, $name, $id])) {
            header('Location: ../pages/records.php?update=success');
            exit();
        } else {
            header('Location: ../pages/records.php?update=failed');
            exit();
        }
    } else if (isset($_POST['db'])) {
        $id = trim($_POST['db']);
        if (empty($id)) {
            header('Location: ../pages/records.php?delete=inc');
            exit();
        }
        $stmt = $pdo->prepare('DELETE FROM records WHERE id = ?');
        if ($stmt->execute([$id])) {
            header('Location: ../pages/records.php?delete=success');
            exit();
        } else {
            header('Location: ../pages/records.php?delete=failed');
            exit();
        }
    }
} else {
    header('Location: ../pages/records.php');
    exit();
}

