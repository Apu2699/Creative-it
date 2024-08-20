<?php session_start(); ?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    
    <style>
        .pass {
            position: relative;
        }
        .pass i {
            width: 35px;
            height:35px;
            background-color:green;
            color:white;
            text-align:center;
            line-height:35px;
            position:absolute;
            top:33px;
            right:0;
            border-top-right-radius:5px;
            border-bottom-right-radius:5px;
        }
    </style>
     
</head>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-6 m-auto">
                <div class="card">
                    <div class="card-header bg-success">
                        <h3 class="text-white">Registration form</h3>
                    </div>
                    <div class="card-body">
                    <?php  if(isset ($_SESSION['success'])){?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                          <strong><?=$_SESSION['success']?></strong> 
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div> 
                        <?php } unset($_SESSION['succes'])?>
                        <form action="register_post.php" method="POST">
                              <div class="mb-3">
                                <?php if(isset($_SESSION['name'])){
                                    $name = $_SESSION['name'];
                                    
                                }
                                else{
                                    $name = '';
                                } 
                                 ?>
                                 <label for="" class="form-label">Full Name</label>
                                <input type="text" class="form-control" name="name" value="<?=$name?>">
                                <?php if(isset($_SESSION['name_err'])){?>
                                   <strong class="text-danger"><?=$_SESSION['name_err']?></strong> 
                                    <?php }unset($_SESSION['name_err'])?>
                                </div>
                                <div class="mb-3">
                                <?php if(isset($_SESSION['email'])){
                                    $email = $_SESSION['email'];
                                    
                                }
                                else{
                                    $email = '';
                                } 
                                 ?>
                                 <label class="form-label">Email Address</label>
                                <input type="email" class="form-control" name="email" value="<?=$email?>" >
                                <?php if(isset($_SESSION['email_err'])){?>
                                   <strong class="text-danger"><?=$_SESSION['email_err']?></strong> 
                                    <?php }unset($_SESSION['email_err'])?>
                                </div>
                                <div class="mb3 pass">
                                    <label for="" class="form-label">Password</label>
                                    <input type="password" class="form-control" name="password" id="show">
                                <?php if(isset($_SESSION['pass_err'])){?>
                                   <strong class="text-danger"><?=$_SESSION['pass_err']?></strong> 
                                    <?php }unset($_SESSION['pass_err'])?>
                                    <i class="fa-solid fa-eye click"></i>
                                </div>
                                <div class="mb3">
                                    <label for="" class="form-label">Confirm Password</label>
                                    <input type="password" class="form-control" name="confirm_password">
                                    <?php if(isset($_SESSION['conpass_err'])){?>
                                   <strong class="text-danger"><?=$_SESSION['conpass_err']?></strong> 
                                    <?php }unset($_SESSION['conpass_err'])?>
                                </div>
                                
                                <div class="mb3">
                                <?php if(isset($_SESSION['division'])){
                                    $division = $_SESSION['division'];
                                    
                                }
                                else{
                                    $division = '';
                                } 
                               
                                ?>
                                
                                <select class="form-select" name="division"aria-label="Default select example">
                                    <option value="">Select Your division</option>
                                    <option value="Dhaka"<?=($division == 'Dhaka'?'selected':'')?>>Dhaka</option>
                                    <option value="Barishal"<?=($division == 'Barishal'?'selected':'')?>>Barishal</option>
                                    <option value="Khulna"<?=($division == 'Khulna'?'selected':'')?>>Khulna</option>
                                    <option value="Pabna"<?=($division == 'Pabna'?'selected':'')?>>Pabna</option>
                                </select>
                                <?php if(isset($_SESSION['division_err'])){?>
                                   <strong class="text-danger"><?=$_SESSION['division_err']?></strong> 
                                    <?php }unset($_SESSION['division_err'])?>
                                </div>
                            
                                <div class="mb3">
                                <?php if(isset($_SESSION['gender'])){
                                    $gender = $_SESSION['gender'];
                                    
                                }
                                else{
                                    $gender = '';
                                } 
                               
                                ?>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gender" id="flexRadioDefault1" value="male"<?=($gender == 'male'?'checked':'')?>>
                                    <label class="form-check-label" for="flexRadioDefault1">
                                    Male
                                    </label>
                                    </div>
                                    <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gender" id="flexRadioDefault2"  value="female" <?=($gender == 'female'?'checked':'')?>>
                                    <label class="form-check-label" for="flexRadioDefault2">
                                    Female
                                </label>
                             </div>
                             <?php if(isset($_SESSION['gender_err'])){?>
                                   <strong class="text-danger"><?=$_SESSION['gender_err']?></strong> 
                                    <?php }unset($_SESSION['gender_err'])?>
                                </div>
                                    <div class="mb-3">
                                <button type="submit" class="btn btn-success">Register</button>
                              </div>
                           </div>       
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" ></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $('.click').click(function(){
            var pass = document.getElementById('show');
            if(pass.type == 'password'){
                pass.type = 'text';
            }
            else{
                pass.type= 'password';
            }
        })
    </script>
    
</body>

</html>
<?php
unset($_SESSION['name']);
unset($_SESSION['email']);
unset($_SESSION['division']);
unset($_SESSION['gender']);
?>
