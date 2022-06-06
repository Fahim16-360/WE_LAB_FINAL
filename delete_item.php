<?php
include_once("includes/database.php");

if(isset($_GET['item_id'])){
        $delete_query = "DELETE FROM `item` WHERE `item_id`=".$_GET['item_id'];
        if(mysqli_query($con,$delete_query)){
            $_SESSION['successMessage']="item deleted from database";
            header("location: item.php");
        }else{
            echo "Something went wrong".mysqli_error($con);
        }
    }
?>