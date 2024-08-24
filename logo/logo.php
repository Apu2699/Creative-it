<?php
session_start();
require '../db.php';
require '../includes/header.php';

$logo = "SELECT * FROM logos";
$logo_res = mysqli_query($db_connection, $logo);
$after_assoc_logo = mysqli_fetch_assoc($logo_res);
?>
<div class="row">
    <div class="col-lg-8 m-auto">
        <div class="card">
            <div class="card-header bg-primary">
                <h3 class="text-white">Change Logo</h3>
            </div>
            <div class="card-body">
                <form action="logo_update.php" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="" class="form-label">Change Header Logo</label>
                        <input type="file" name="header_logo" class="form-control" onchange="document.getElementById('Opu').src = window.URL.createObjectURL(this.files[0])">
                        <div class="my-2">
                            <img src="../uploads/logo/<?=$after_assoc_logo['header_logo']?>" id="Opu" alt="" width="200">
                        </div>
                        <?php if(isset(  $_SESSION['er'])){ ?>
                            <strong class="text-danger"><?=$_SESSION['er']?></strong>
                        <?php } 
                        unset($_SESSION['er'])?>
                     </div>
                     <div class="mb-3">
                        <label for="" class="form-label">Change Footer Logo</label>
                        <input type="file" name="footer_logo" class="form-control" onchange="document.getElementById('Opu2').src = window.URL.createObjectURL(this.files[0])">
                        <div class="my-2">
                            <img src="../uploads/logo/<?=$after_assoc_logo['footer_logo']?>" id="Opu2" alt="" width="200">
                        </div>
                     </div>
                     <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Update Logo</button>
                     </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php require '../includes/footer.php'; ?>
