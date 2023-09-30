<?php
require_once ('../config/dbconnect.php');

if ($_POST) {
    $student_name = $_POST['name'];
    $student_id = $_POST['student_id'];
    $student_email = $_POST['email'];
    $student_description = $_POST['description'];

    try {
        $dbconnect = new dbconnect();

        $dbconnect->getConnection();
        $conn = $dbconnect->conn;

        $sql = "INSERT INTO comp1006(student_name, student_number, email, description) VALUES (:sname, :sid, :semail, :sdesc);";
        $stmt = $conn->prepare($sql);

        $stmt->bindParam(':sname', $student_name);
        $stmt->bindParam(':sid', $student_id);
        $stmt->bindParam(':semail', $student_email);
        $stmt->bindParam(':sdesc', $student_description);

        $stmt->execute();

        header("Location: ../comp1006/form.html");

    } catch (PDOException $exception) {
        echo "Connection error: " . $exception->getMessage();
    }


}