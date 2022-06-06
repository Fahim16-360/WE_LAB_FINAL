<?php
include_once("includes/database.php");
?>
<div class="page-action-links text-right">
            <a href="item.php" class="btn btn-success"><i class="glyphicon glyphicon-plus"></i> ALL ITEMS</a>
            <a href="add_item_image.php" class="btn btn-success"><i class="glyphicon glyphicon-plus"></i> ADD ITEM IMAGE</a>
        </div>
<br>
<br>
<div class="container">
    <div class="gallery">
        <?php
        $latest_query = "SELECT * FROM `item_image` ORDER BY `item_id`";
        $images = mysqli_query($con,$latest_query);
        ?>
        <?php
            while($image=mysqli_fetch_assoc($images))
            { ?>
                <figure class="gallery__item">
                    <img width="50px" height="50px" src="item_image/<?php echo $image['item_image']; ?>" class="gallery__img">
                    <?php echo $image['item_name']; ?>
                </figure>
        <?php
            } ?>
    </div>
</div>