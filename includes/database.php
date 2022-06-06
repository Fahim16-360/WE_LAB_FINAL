<?php
    $con = mysqli_connect("localhost","root","","183-16-360");

    if(!$con){
        die("There is an error please try again later".mysqli_connect_error());
    }
?>