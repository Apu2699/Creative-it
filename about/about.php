<?php 
session_start();
require '../db.php';
require '../includes/header.php';

$select = "SELECT * FROM abouts";
$select_res = mysqli_query($db_connection, $select);
$assoc_abouts = mysqli_fetch_assoc($select_res);
?>
<div class="row">
    <div class="col-lg-8">
        <div class="card-header bg-primary">
            <h3 class="text-white">Update About Section Content</h3>
        </div>
        <div class="card-body">
            <?php if(isset($_SESSION['about'])){ ?>
                <div class="alert alert-success"><?=$_SESSION['about']?></div>
            <?php } unset($_SESSION['about'])?>
            <form action="Update.php" method="POST">
                <div class="mb-3">
                <label for="" class="form-label">Designation</label>
                <input type=" text" name="designation" class="form-control" value="<?=$assoc_abouts['designation']?>">
                </div>
                <div class="mb-3">
                <label for="" class="form-label">Name</label>
                <input type=" text" name="name" class="form-control" value="<?=$assoc_abouts['name']?>">
                </div>
                <div class="mb-3">
                <label for="" class="form-label">Description</label>
               <textarea name="desp" class="form-control" rows="5"><?=$assoc_abouts['desp']?>"></textarea>
                </div>
                <div class="mb-3">
                 <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php require '../includes/footer.php'; ?>