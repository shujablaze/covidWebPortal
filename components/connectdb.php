<?php
if(!$conn = mysqli_connect('localhost','root','calculas','testcov')){
        $error_response = "error: " . mysqli_connect_error();
        die($error_response);
    }
?>