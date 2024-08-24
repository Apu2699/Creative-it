<?php 
session_start();
require '../db.php';
?>
<?php require '../includes/header.php';?>
<div class="row">
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header bg-primary">
                <h3 class="text-white">Edit Profile Info</h3>
            </div>
            <div class="card-body">
                <?php if(isset($_SESSION['updated'])){ ?>
                    <div class="alert alert-success"><?=$_SESSION['updated']?></div>
                    <?php }
                     unset($_SESSION['updated']) ?>
                <form action="profile_update.php"method="POST">
                    <div class="mb-3">
                        <label class="form label">Name</label>
                        <input type="text" class="form-control" name="name" value="<?=$after_assoc_logged['name']?>">
                        <input type="hidden" name="user_id" value="<?=$after_assoc_logged['id']?>">
                    </div>
                    <div class="mb-3">
                        <label class="form label">Email</label>
                        <input type="email" class="form-control" name="email" value="<?=$after_assoc_logged['email']?>">
                    </div>
                    <div class="mb-3">
                        <label class="form label">Division</label>
                        <select name="division" class="form-control">
                        <option value="Dhaka" <?=($after_assoc_logged['division']=='Dhaka'?'selected':'')?>>Dhaka</option>
                        <option value="Barishal" <?=($after_assoc_logged['division']=='Barishal'?'selected':'')?>>Barishal</option>
                        <option value="Khulna" <?=($after_assoc_logged['division']=='Khulna'?'selected':'')?>>Khulna</option>
                        <option value="Pabna" <?=($after_assoc_logged['division']=='Pabna'?'selected':'')?>>Pabna</option>
                       </select>
                    </div>
                    <div class="mb-3">
                        <label class="form label">Gender</label>
                        <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gender" id="flexRadioDefault1" value="male" <?=($after_assoc_logged['gender']=='male'?'checked':'')?>>
                                    <label class="form-check-label" for="flexRadioDefault1">
                                    Male
                                    </label>
                                    </div>
                                    <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gender" id="flexRadioDefault2"  value="female" <?=($after_assoc_logged['gender']=='female'?'checked':'')?>>
                                    <label class="form-check-label" for="flexRadioDefault2">
                                    Female
                                </label>
                            </div>



                        </div>
                        <div class="mb-3">
                            <button type="Submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                    </div>
                </form>
            </div>




















    <div class="col-lg-4">
    <div class="card">
            <div class="card-header bg-primary">
                <h3 class="text-white">Change Password</h3>
            </div>
            <div class="card-body">
                <?php if(isset($_SESSION['pass_update'])){?>
                    <div class="alert alert-success"><?=$_SESSION['pass_update']?></div>
                <?php } 
                unset($_SESSION['pass_update']) ?>
                <form action="password_update.php" method="POST">
                    <div class="mb-3">
                        <input type="hidden" name="user_id" value="<?=$after_assoc_logged['id']?>">
                        <label for="" class="form-label">Current password</label>
                        <input type="password" name="current_password" class= "form-control">
                        <?php if(isset($_SESSION['c_pass_err'])) {?>
                            <strong class="text-danger"><?=$_SESSION['c_pass_err']?></strong>
                        <?php } 
                        unset($_SESSION['c_pass_err']) ?>
                            </div>
                    <div class="mb-3">
                        <label for="" class="form-label">New password</label>
                        <input type="password" name="password" class= "form-control">
                        <?php if(isset($_SESSION['pass_err'])) { ?>
                            <strong class="text-danger"><?=$_SESSION['pass_err']?></strong>
                        <?php }
                        unset($_SESSION['pass_err']) ?>
                      
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Confirm password</label>
                        <input type="password" name="confirm_password" class= "form-control">
                        <?php if(isset($_SESSION['conpass_err'])) {?>
                            <strong class="text-danger"><?=$_SESSION['conpass_err']?></strong>
                        <?php } 
                        unset($_SESSION['conpass_err']) ?>
                    </div>
                    <div class="mt-4">
                    <button type="submit" class="btn btn-primary">Update Password</button>
                    </div>
                </form>
            </div>
            </div>
            </div>
















    <div class="col-lg-4">
        <div class="card">
            <div class="card-header bg-primary">
                <h3 class="text-white">Update Profile Photo</h3>
            </div>
            <div class="card-body">
                <?php if(isset($_SESSION['photo'])){ ?>
                    <div class="alert alert-success"><?=$_SESSION['photo']?></div>
                    <?php }
                     unset($_SESSION['photo'])?>
                <form action="photo_update.php" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <input type="hidden" name= "user_id" value= "<?=$after_assoc_logged['id']?>">
                        <label for="" class="form-label">Upload Photo</label>
                        <input type="file" name="photo" class="form-control"  onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                        <?php if(isset($_SESSION['err'])){ ?>
                            <strong class="text-danger"><?=$_SESSION['err']?></strong>
                        <?php } 
                        unset($_SESSION['err']) ?>
                        <div class="mt-2">
                            <img src="../uploads/users/<?=$after_assoc_logged['photo']?>" id="blah" width="200" alt="">
                        </div>
                    </div>
                        </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Update</button>
                        </div>
</form>
</div>

</div>
</div>
</div>


<?php require '../includes/footer.php';?>