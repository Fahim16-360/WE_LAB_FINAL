<?php
include_once("includes/database.php");
?>

<!DOCTYPE html>
<html lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>National Safari Park Admin</title>

		<!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap-theme.min.css">

	</head>
<body>

<div class="page-action-links text-right">
            <a href="item.php" class="btn btn-success"><i class="glyphicon glyphicon-plus"></i> ALL ITEMS</a>
            <a href="item_image.php" class="btn btn-success"><i class="glyphicon glyphicon-plus"></i> ALL ITEM IMAGE</a>
        </div>

<div class="col-md-3"></div>
<div class="col-md-6">
	<div class="panel panel-success">
		<div class="panel-heading">
			<h3 class="panel-title">Add Image</h3>
		</div>
		<div class="panel-body">
			<form action="add_item_image.php" method="POST" enctype="multipart/form-data" class="form-horizontal" role="form" id="form-login">
              <div class="form-group">
			    <label class="control-label col-sm-2" for="un">Image Title</label>
			    <div class="col-sm-10">
			      <input type="text" name="item_name" class="form-control" id="un" placeholder="Enter Image Title" autofocus="" required="required">
			    </div>
			  </div>
              <div class="form-group">
			    <label class="control-label col-sm-2" for="un">Image</label>
			    <div class="col-sm-10">
			      <input type="file" name="item_image" class="form-control" id="un" placeholder="Enter Image" autofocus="" required="required">
			    </div>
			  </div>
			  </div>
              <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                    <h3>
                        <?php
                        if(isset($_SESSION['successMessage'])){
                        echo $_SESSION['successMessage'];
                        unset($_SESSION['successMessage']);
                        }?>
                    </h3>
			        </div>
                </div>
			  <div class="form-group"> 
			    <div class="col-sm-offset-2 col-sm-10">
			      <button name="save" type="submit" class="btn btn-default">Submit
			        <span class="glyphicon glyphicon-check" aria-hidden="true"></span>
			      </button>
			    </div>
			  </div>
			</form>
		</div>
	</div>
</div>
</body>
</html>

<?php
if(isset($_POST['save'])){
    extract($_REQUEST);

	$target_directory = "item_image/";
	$uploaded_image = $_FILES['item_image']['tmp_name'];
	$ext = pathinfo($_FILES['item_image']['name'],PATHINFO_EXTENSION);
    $total_image_name = $image_name.".".$ext;

	if(move_uploaded_file($uploaded_image,"item_image/".$total_image_name)){
		$insert_query = "INSERT INTO `item_image` (`item_name`,`item_image`) VALUES ('$image_name','$total_image_name')";
	//  echo $insert_query;
		if(mysqli_query($con,$insert_query)){
			$_SESSION['successMessage'] = "New image added and stored into database";
		header("location: add_item_image.php");
		}else{
			echo "You have ans error ".mysqli_error($con);
		}
	}
?>

<?php } ?>