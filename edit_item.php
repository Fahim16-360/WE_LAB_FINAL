<?php
include_once("includes/database.php");
?>

<div class="modal fade" id="modal-item">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
            <?php
            if(isset($_GET['item_id'])){
            $item_id = $_GET['item_id'];
            $query = "SELECT * from `item` WHERE `item_id`= ".$_GET['item_id'];
                if($result=mysqli_query($con,$query)){
                $items = mysqli_fetch_array($result);
                }
            }
            ?>
            <a href="item.php" class="btn btn-success"><i class="glyphicon glyphicon-plus"></i> ALL ITEM LISTS</a>
			</div>
            <br>
            <br>
			<div class="modal-body">
			<div class="col-sm-offset-2 col-sm-10">
                <h3>
                   <?php
                   if(isset($_SESSION['successMessage'])){
                       echo $_SESSION['successMessage'];
                       unset($_SESSION['successMessage']);
                   }?>
                </h3>
			</div>
            <form action="edit_item.php" method="POST" class="form-horizontal" role="form">
				<form class="form-horizontal" role="form" id="form-item">
				<input type="hidden" id="item-id">
				  <div class="form-group">
				    <label class="control-label col-sm-3" for="">Generic Name:</label>
				    <div class="col-sm-9">
				      <input type="text" maxlength="50" class="form-control" name="item_name" placeholder="Enter Generic Name" required="" autofocus="">
				    </div>
				  </div>
				  <div class="form-group">
				    <label class="control-label col-sm-3" for="">Price:</label>
				    <div class="col-sm-9"> 
				      <input type="number" min="0.1" step="any" class="form-control" name="item_price" placeholder="Enter Price" required="">
				    </div>
				  </div>

				  <div class="form-group">
				    <label class="control-label col-sm-3" for="">Item Code:</label>
				    <div class="col-sm-9">
				      <input type="text" maxlength="50" class="form-control" name="item_code" placeholder="Enter Item Code" required="" autofocus="">
				    </div>
				  </div>

				  <div class="form-group">
				    <label class="control-label col-sm-3" for="">Brand Name:</label>
				    <div class="col-sm-9">
				      <input type="text" maxlength="50" class="form-control" name="item_brand" placeholder="Enter Brand Name" required="" autofocus="">
				    </div>
				  </div>

				  <div class="form-group">
				    <label class="control-label col-sm-3" for="">Grams:</label>
				    <div class="col-sm-9">
				      <input type="text" maxlength="50" class="form-control" name="item_grams" placeholder="Enter Gram/s" required="" autofocus="">
				    </div>
				  </div>

				  <<div class="form-group">
				    <label class="control-label col-sm-3" for="">Item Type Name:</label>
				    <div class="col-sm-9">
				      <input type="text" maxlength="50" class="form-control" name="item_type" placeholder="Enter Type Name" required="" autofocus="">
				    </div>
				  </div>

				  <div class="form-group"> 
				    <div class="col-sm-offset-2 col-sm-10">
				      <button name="update" type="submit" class="btn btn-default">Save
				        <span class="glyphicon glyphicon-save" aria-hidden="true"></span>
				      </button>
				    </div>
				  </div>
			</form>
			</div>

<?php
    if(isset($_POST['update'])){
        extract($_REQUEST);
        $update_query = "UPDATE `item` SET `item_name`='$item_name',`item_price`='$item_price',`item_price`='$item_code',`item_code`='$item_brand',`item_brand`='$item_brand',`item_type`='$item_type',`item_grams`='$item_grams' WHERE `item_id`='$item_id'";
        if(mysqli_query($con,$update_query)){
            $_SESSION['successMessage'] = "Item information updated into database";
            header("location: edit_item.php");
        }else{
            echo "You have ans error ".mysqli_error($con);
        }
    }
?>