<?php
require_once ('../config/dbconnect.php');
$tid = $_GET['tid'];
try {
    $dbconnect = new dbconnect();

    $dbconnect->getConnection();
    $conn = $dbconnect->conn;

    $sql = "Select * from assignment_student_details where comp_id = :tid and type = 'grade';";
    $stmt = $conn->prepare($sql);

    $stmt->bindParam(':tid', $tid);

    $stmt->execute();

    $outputvalue = $stmt->fetchAll(PDO::FETCH_ASSOC);


} catch (PDOException $exception) {
    echo "Connection error: ". $exception->getMessage();
}