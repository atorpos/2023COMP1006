<?php
    require '../action/GetDataDetails.php';
    include '../action/head.php';
    echo '<input type="hidden" id="tid" name="tid" value="'. $tid. '"></form>
    </div>';
    if(empty($_GET)) {
        header("Location: https://s.awoz.co/class/comp1006/form.html");
    }
    $getvakue = $_GET;
    include_once ('../config/dbconnect.php');
    if($getvakue['tid']) {
        $tid = $getvakue['tid'];
    } else {
        header("Location: https://s.awoz.co/class/comp1006/form.html");
    }
    $getdetails = new GetDataDetails($tid);
    $result = $getdetails->get_record_details();
    if(!is_array($result) || count($result) === 0) {
        echo '<div class="container mt-5"><div class="row justify-content-center"><div class="col-md-6"><div class="alert alert-danger text-center" role="alert">
                    NO record found.
                </div></div></div></div>';
    } else {
        echo '<div class="container mt-5">
    <table id="data-table" class="table table-striped table-bordered">
        <thead class="thead-dark">
        <tr>
            <th>ID</th>
            <th>Type</th>
            <th>Value</th>
            <th>Updated time</th>
            <th></th>
        </tr>
        </thead>
        <tbody>';
        foreach ($result as $v) {
            $display_time = date("Y-m-d H:i:s", $v['created_time']);
            echo '<tr><td>'. $v['id']. '</td><td>'. $v['name']. '</td><td>'. $v['value']. '</td><td>'. $display_time.'</td></tr>' ;
        }

        echo'</tbody></table>';
    }
    include "../action/footer.php";