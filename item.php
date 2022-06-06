<?php
include_once("includes/database.php");
?>

<div class="page-action-links text-right">
            <a href="add_new_item.php" class="btn btn-success"><i class="glyphicon glyphicon-plus"></i> ADD NEW ITEM</a>
            <a href="item_image.php" class="btn btn-success"><i class="glyphicon glyphicon-plus"></i> ITEM IMAGES</a>
        </div>
<br>
<br>
<div class="col-sm-offset-2 col-sm-10">
                <h3>
                   <?php
                   if(isset($_SESSION['successMessage'])){
                       echo $_SESSION['successMessage'];
                       unset($_SESSION['successMessage']);
                   }?>
                </h3>
			</div>
<br>
<br>     
<div class="table-responsive">
        <table id="myTable-item" class="table table-bordered table-hover table-striped">
            <thead>
                <tr>
                    <th>Item Code</th>
                    <th>Generic Name</th>
                    <th>Brand</th>
                    <th>Type</th>
                    <th><center>Grams</center></th>
                    <th><center>Price</center></th>
                    <th><center>Man Date</center></th>
                    <th><center>Ex Date</center></th>
                    <th>
                        <center>Action</center>
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php
                // preparing select query for category table
                $query = "SELECT * FROM `item` ORDER BY `item_id` ASC";
                $items = mysqli_query($con,$query);
                ?>
                <?php foreach($items as $it): ?>
                    <tr align="center">
                        <td align="left"><?= $it['item_code']; ?></td>
                        <td align="left"><?= ucwords($it['item_name']); ?></td>
                        <td align="left"><?= $it['item_brand']; ?></td>
                        <td align="left"><?= $it['item_type']; ?></td>
                        <td><?= $it['item_grams']; ?></td>
                        <td><?= " ".number_format($it['item_price'], 2); ?></td>
                        <td><?= $it['manu_date']; ?></td>
                        <td><?= $it['ex_date']; ?></td>
                        <td>
                           <center>
                                <a href="edit_item.php?item_id=<?php echo $it['item_id']; ?>&operation=edit" class="btn btn-primary"><i class="glyphicon glyphicon-edit">EDIT ITEM</i></a>
                                <a href="delete_item.php?item_id=<?php echo $it['item_id']; ?>&operation=delete" class="btn btn-primary"><i class="glyphicon glyphicon-edit">DELETE ITEM</i></a>
                            </center>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
</div>