<?php
require '../config/dbconnect.php';

class GetDataDetails
{
    private $get_result;

    public function __construct($tid) {
        $this->tid = $tid;
    }

    public function get_record_details(){
        $dbconnect = new dbconnect();

        $dbconnect->getConnection();
        $conn = $dbconnect->conn;

        $sql = "SELECT * FROM assignment_student_details WHERE comp_id = :tid;";
        $stmt = $conn->prepare($sql);

        $stmt->bindParam(':tid', $this->tid);
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if($results !== false) {
            $rowCount = count($results);

            if ($rowCount > 0) {
                // Query was successful and returned rows
                return $results;
            } else {
                // Query was successful, but no rows were returned
                return "Query was successful, but no rows were returned.";
            }
        } else {
            echo "Query failed.";
        }
    }

    public function set_record_details($type, $value, $update_time) {
            $dbconnect = new dbconnect();

            $dbconnect->getConnection();
            $conn = $dbconnect->conn;
            $sql = "INSERT INTO assignment_student_details(comp_id, `name`, `value`, created_time) VALUES(:comd_id, :name, :value, :created_time);";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':comd_id', $this->tid);
            $stmt->bindParam(':name', $type, PDO::PARAM_STR);
            $stmt->bindParam(':value', $value, PDO::PARAM_STR);
            $stmt->bindParam(':created_time', $update_time);

            if($stmt->execute()) {
                return "success";
            } else {
                echo "Error". $stmt->errorInfo();
            }
    }
}