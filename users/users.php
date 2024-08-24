<?php 
session_start();
require '../db.php';
$select_user = "SELECT * FROM users2";
$select_user_res = mysqli_query($db_connection, $select_user);
?>

<?php require '../includes/header.php';?>
<div class="row">
    <div class="col-lg-8">
        <div class="card">
        <?php  if(isset ($_SESSION['success'])){?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong><?=$_SESSION['success']?></strong> 
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                     </div> 
                <?php } unset($_SESSION['succes'])?>
            <div class="card-header bg-primary">
                <h3 class="text-white">Users List</h3>
                <a href="" class="btn btn-light" data-toggle="modal" data-target="#newuser">Add New</a>
                <div class="modal fade" id="newuser">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                         <div class="modal-content">
                             <div class="modal-header">
                                <h4 class="modal-title">Add New User</h4>
                                 <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                 </button>
                               </div>
                               <div class="modal-body">
                                <form action="../register_post.php" method="POST">
                                    <div class="mb-3">
                                        <label  class="form-label">Name</label>
                                        <input type="text" name="name" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label  class="form-label">Email</label>
                                        <input type="email" name="email" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">Password</label>
                                        <input type="password" name="password" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <button type="submit" class="btn btn-primary">Add User</button>
                                    </div>
                                </form>
                                </div>
                             </div>
                        </div>
                     </div>
                  </div> 
            <div class="card-body">
                <?php 
                if(isset($_SESSION['del'])){ ?>
                    <div class="alert alert-success">
                        <?=$_SESSION['del']?>
                    </div>
                <?php 
               } unset($_SESSION['del']) ?>
                <table class= "table table-bordered">
                    <tr>
                        <th>SL</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <?php if($after_assoc_logged['role'] == 1){ ?>
                        <th>Action</th>
                        <?php } ?>
                    </tr>
                    <?php foreach($select_user_res as $index=> $user){ ?>
                    <tr>
                        <td><?= $index+1 ?></td>
                        <td><?= $user['name'] ?></td>
                        <td><?= $user['email'] ?></td>
                        <td>
                            <?php
                             if($user['role']==1) {
                                echo 'Super Admin';
                            } 
                             elseif($user['role']==2) {
                                echo 'Admin';
                            } 
                            elseif($user['role']==3) {
                                echo 'Moderator';
                            } 
                            elseif($user['role']==4) {
                                echo 'Editor';
                            } 
                            else{
                                echo 'Not Assigend';
                            }
                            ?>
                        </td>
                        <?php if($after_assoc_logged['role'] == 1){ ?>
                        <td>
                        <div class="d-flex"> 
                             <a data-link="user_delete.php?id=<?= $user['id']?>" data-toggle="modal" data-target="#exampleModalCenter" title="Delete User" class="del btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
                           </div>
                        </td>
                        <?php } ?>
                    </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>
    <?php if($after_assoc_logged['role'] == 1){ ?>
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header bg-primary">
                <h3 class="text-white">Assign Role</h3>
            </div>
            <div class="card-body">
                <?php if(isset($_SESSION['role'])) { ?>
                    <div class="alert alert-success"><?=$_SESSION['role']?></div>
                <?php } unset($_SESSION['role'])?>
                <form action="role.php" method="POST">
                    <div class="mb-3">
                        <label for="" class="form-label">Select User</label>
                        <select name="user_id" class="form-control">
                            <option value="">Select User</option>
                            <?php foreach($select_user_res as $user){ ?>
                            <option value="<?=$user['id']?>"><?=$user['name']?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Select Role</label>
                        <select name="role_id" class="form-control">
                            <option value="">Select Role</option>
                            
                            <option value="1">Super Admin</option>
                            <option value="2">Admin</option>
                            <option value="3">Moderator</option>
                            <option value="4">Editor</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Assign Role</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php } ?>
</div>

<div class="modal fade" id="exampleModalCenter">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
               <h4 class="modal-title">Are You Sure To Delete Data ?</h4>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-footer">
                   <button type="button" class="btn btn-info" data-dismiss="modal">No ! Sorry My Mistake</button>
                   <button type="button" class="btn btn-danger yes">Yes . Delete Data</button>
                </div>
            </div>
        </div>
    </div>


    <?php require '../includes/footer.php'?>

<script>
  $('.del').click(function(){
var link = $(this).attr('data-link');
$('.yes').click(function(){
window.location.href = link;
})
  })
</script>