<?php
require_once ('../config/dbconnect.php');

try {
    $dbconnect = new dbconnect();

    $dbconnect->getConnection();
    $conn = $dbconnect->conn;

    $sql = "Select * from comp1006 order by id desc;";
    $stmt = $conn->prepare($sql);

    $stmt->execute();

    $outputvalue = $stmt->fetchAll(PDO::FETCH_ASSOC);

    header('Content-Type: application/json');
    echo json_encode($outputvalue);


} catch (PDOException $exception) {
    echo "Connection error: " . $exception->getMessage();
}