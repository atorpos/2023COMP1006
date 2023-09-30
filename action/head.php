<?php
echo '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Information Form</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.1/css/fontawesome.min.css" integrity="sha384-QYIZto+st3yW+o8+5OHfT6S482Zsvz2WfOzpFSXMF9zqeLcFV0/wlZpMtyFcZALm" crossorigin="anonymous">
</head>
<body>
<div class="container mt-5">
    <h1><a href="https://s.awoz.co/class/comp1006/form.html">Student Record Update</a></h1>
    <form action="../action/detail_submit.php" method="post">
        <div class="form-group">
            <label for="record_type">Record Type</label>
            <select class="form-control" id="record_type" name="record_type" required>
                 <option value="grade">Grade</option>
                 <option value="attendance">Attendance</option>
            </select>
        </div>
        <div class="form-group">
            <label for="record_value">Record Value</label>
            <input type="number" class="form-control" id="name" name="record_value" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    ';