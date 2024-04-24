<?php session_start();?>
<?php include('head.php');?>
<link rel="stylesheet" href="popup_style.css">

   <?php
  include('connect.php');
if(isset($_POST['btn_login']))
{
// echo $_POST['cne'];
$unm = $_POST['cne'];

$passw = $_POST['cin'];
// echo $passw;
function createSalt()
{
    return '2123293dsj2hu2nikhiljdsd';
}
$salt = createSalt();
// $pass = hash('sha256', $salt . $passw);

 $sql = "SELECT * FROM admin WHERE cne='" .$unm . "' and cin = '". $passw."'";
    $result = mysqli_query($conn,$sql);
    $row  = mysqli_fetch_array($result);
  //  echo


  try {
     $_SESSION["id"] = $row['id']??'';
     $_SESSION["cne"] = $row['cne']??'';
     $_SESSION["cin"] = $row['cin']??'';
     $_SESSION["username"] = $row['username']??'';
    //  $_SESSION["password"] = $row['password'];
     $_SESSION["email"] = $row['email']??'';
     $_SESSION["fname"] = $row['fname']??'';
     $_SESSION["lname"] = $row['lname']??'';
    }
    catch(Exception $e) {
     
    }
   
    //  $_SESSION["image"] = $row['image'];
     $count=mysqli_num_rows($result);
     if($count==1 && isset($_SESSION["cne"]) && isset($_SESSION["cin"])) {
    {       
        ?>
         <div class="popup popup--icon -success js_success-popup popup--visible">
  <div class="popup__background"></div>
  <div class="popup__content">
    <h3 class="popup__content__title">
    Succès
    </h1>
    <p>Authentification Réussite</p>
    <p>
    
     <?php echo "<script>setTimeout(\"location.href = 'index.php';\",1500);</script>"; ?>
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
      Erreur
    </h1>
    <p>Mot de Passe Incorect</p>
    <p>
      <a href="login.php"><button class="button button--error" data-for="js_error-popup">Fermer</button></a>
    </p>
  </div>
</div>
       
        <?php
       
         }
    
    }
?>

    <div id="main-wrapper" >
        <div class="unix-login" >
             <?php
            //  $sql_login = "select * from manage_website"; 
            //  $result_login = $conn->query($sql_login);
            //  $row_login = mysqli_fetch_array($result_login);
             ?>
            <div class="container-fluid"  style="background-image: uploadImage/Logo/1.png ">
                <div class="row justify-content-center" >
                    <div class="col-lg-4">
                        <div class="login-content card shadow" style=" box-shadow: 0 4px 8px 0 rgba(0,0,0,0.5);">
                            <div class="login-form">
                                <center><img src="uploadImage/Logo/1.png" style="width:50%;"></center><br>
                                <form method="POST">
                                    <div class="form-group">
                                        <label>
                                        <h5 style="color: #135297;">  
                                        CNE||Nemuro_Matriculation </h5></label>
                                        <input type="text" name="cne" class="form-control" placeholder="Saisir votre CNE ou Numero Matriclation" required="" style="color: #135297;">
                                    </div>
                                    <div class="form-group">
                                    <label>
                                        <h5 style="color: #135297;">  
                                      CIN </h5></label>
                                        <input type="text" name="cin" class="form-control" placeholder="Saisir Votre CIN" required="" style="color: #135297;">
                                    </div>
                                    <div class="checkbox">
                                           <label class="pull-right">
                                                <!-- <a href="forgot_password.php">Forgotten Password?</a> -->
                                           </label>   
                                    </div>
                                    <button type="submit" name="btn_login" class="btn  btn-flat m-b-30 m-t-30" style="background-color: #135297;color:white">Se Connecter</button>
                                  
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