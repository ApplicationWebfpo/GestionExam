<?php session_start();?>
<?php include('head.php');?>
<link rel="stylesheet" href="popup_style.css">

   <?php
  include('connect.php');
if(isset($_POST['btn_login']))
{
$unm = $_POST['matricule'];

$passw = hash('sha256', $_POST['cin']);

function createSalt()
{
    return '2123293dsj2hu2nikhiljdsd';
}
$salt = createSalt();
$pass = hash('sha256', $salt . $passw);

 $sql = "SELECT * FROM tbl_teacher WHERE matricule='" .$unm . "' and cin = '". $pass."'";
    $result = mysqli_query($conn,$sql);
    $row  = mysqli_fetch_array($result);
    
     $_SESSION["id"] = $row['id'];
     $_SESSION["matricule"] = $row['matricule'];
     $_SESSION["cin"] = $row['cin'];
     $_SESSION["password"] = $row['password'];
     $_SESSION["temail"] = $row['temail'];
     $_SESSION["fname"] = $row['tfname'];
     $_SESSION["lname"] = $row['tlname'];
     $count=mysqli_num_rows($result);
     if($count==1 && isset($_SESSION["temail"]) && isset($_SESSION["password"])) {
    {       
        ?>
         <div class="popup popup--icon -success js_success-popup popup--visible">
  <div class="popup__background"></div>
  <div class="popup__content">
    <h3 class="popup__content__title">
     
Succès
    </h1>
    <p>Connectez-vous avec succès</p>
    <p>
    
     <?php echo "<script>setTimeout(\"location.href = 'teacher_panel.php';\",1500);</script>"; ?>
    </p>
  </div>
</div>
  
     <?php
    }
}
else {?>
     <div class="popup popup--icon -error js_error-popup popup--visible">
  <div class="popup__background"></div>
  <div class="popup__content">
    <h3 class="popup__content__title">
      Error 
    </h1>
    <p>Email ou mot de passe invalide</p>
    <p>
      <a href="teacher.php"><button class="button button--error" data-for="js_error-popup">Fermer</button></a>
    </p>
  </div>
</div>
       
        <?php
       
         }
    
    }
?>

    <div id="main-wrapper">
        <div class="unix-login">
             <?php
             $sql_login = "select * from manage_website"; 
             $result_login = $conn->query($sql_login);
             $row_login = mysqli_fetch_array($result_login);
             ?>
            <div class="container-fluid"  style="background-image: url('uploadImage/Logo/<?php echo $row_login['background_login_image'];?>');
 background-color: #5c4ac7;">
                <div class="row justify-content-center">
                    <div class="col-lg-4">
                        <div class="login-content card">
                            <div class="login-form">
                                <center><img src="img/logo.png" style="width:50%;"></center><br>
                                <form method="POST">
                                    <div class="form-group">
                                        <label>Matricule</label>
                                        <input type="text" name="matricule" class="form-control" placeholder="Entrez Matricule" required="">
                                    </div>
                                    <div class="form-group">
                                        <label>cin</label>
                                        <input type="text" name="cin" class="form-control" placeholder="CIN" required="">
                                    </div>
                                    <button type="submit" name="btn_login" class="btn btn-primary btn-flat m-b-30 m-t-30">
Se connecter</button>
                                  
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
	
    
    <script src="js/lib/jquery/jquery.min.js"></script>

    <script src="js/lib/bootstrap/js/popper.min.js"></script>
    <script src="js/lib/bootstrap/js/bootstrap.min.js"></script>

    <script src="js/jquery.slimscroll.js"></script>

    <script src="js/sidebarmenu.js"></script>

    <script src="js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>

    <script src="js/custom.min.js"></script>

</body>

</html>