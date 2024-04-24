<?php include('head.php');?>

<?php include('header.php');?>
<?php include('sidebar.php');?>

 <?php
 include('connect.php');
 date_default_timezone_set('Asia/Kolkata');
 $current_date = date('Y-m-d');

if(isset($_POST["btn_update"]))
{
    if($_POST["password"]!='')
    {
        if($_POST['password']==$_POST['cpassword'])
        {
            $passw = hash('sha256', $_POST['password']);
            function createSalt()
            {
                return '2123293dsj2hu2nikhiljdsd';
            }
            $salt = createSalt();
            $pass = hash('sha256', $salt . $passw);
            extract($_POST);
            $q1="UPDATE tbl_student SET stud_id='$stud_id', sfname='$sfname',slname='$slname',classname='$classname',semail='$semail',sgender='$sgender',sdob='$sdob',scontact='$scontact',saddress='$saddress',password='$pass' WHERE id='".$_GET['id']."'";
        }
        else
        {
            $_SESSION['error']='Password and Confirm Password';
            ?>
            <script type="text/javascript">
            window.location="edit_student.php?id=<?php echo $_GET['id']; ?>";
            </script>
            <?php
        }
      
    }
    else
    {
        $pass =$_POST['old_password'];
        extract($_POST);

      $q1="UPDATE tbl_student SET cne='$cne', cin='$cin',nom='$nom',prenom='$prenom',dateN='$dateN',semestre='$semestre',filiere='$filiere' where  id='".$_GET["id"]."'";
    }
    
  
    if ($conn->query($q1) === TRUE) {
      $_SESSION['success']=' Record Successfully Updated';
     ?>
<script type="text/javascript">
window.location="view_student.php";
</script>
<?php
} else {
      $_SESSION['error']='Something Went Wrong';
?>
<script type="text/javascript">
window.location="view_student.php";
</script>
<?php
}
}
?>
<?php
$que="SELECT * FROM tbl_student WHERE id='".$_GET["id"]."'";
$query=$conn->query($que);
while($row=mysqli_fetch_array($query))
{
    
    extract($row);

$cne = $row['cne'];
$cin = $row['cin'];
$nom = $row['nom'];
$prenom = $row['prenom'];
$dateN = $row['dateN'];
$semestre = $row['semestre'];
$filiere = $row['filiere'];
}

?> 

        <div class="page-wrapper">
            
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Gestion des étudiants</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Acceuil</a></li>
                        <li class="breadcrumb-item active">Modifier des étudiants</li>
                    </ol>
                </div>
            </div>
            
            <div class="container-fluid">
                
               
                <div class="row">
                    <div class="col-lg-8" style="margin-left: 10%;">
                        <div class="card">
                            <div class="card-title">
                               
                            </div>
                            <div class="card-body">
                                <div class="input-states">
                                    <form class="form-horizontal" method="POST" enctype="multipart/form-data" name="studentform">

                                    <!-- <input type="hidden" name="currnt_date" class="form-control" value="<?php echo $currnt_date;?>"> -->
                                
                                <div class="form-group">
                                    <div class="row">
                                        <label class="col-sm-3 control-label">CNE</label>
                                        <div class="col-sm-9">
                                          <input type="text" readonly  name="cne" class="form-control d-none d-lg-block" value="<?php echo $cne; ?>" placeholder="CNE" id="event" required="">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <label class="col-sm-3 control-label">CIN</label>
                                        <div class="col-sm-9">
                                          <input type="text" name="cin" readonly  value="<?php echo $cin; ?>" class="form-control" placeholder="CIN" id="event"  required="">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <label class="col-sm-3 control-label">Nom</label>
                                        <div class="col-sm-9">
                                          <input type="text" name="nom"  value="<?php echo $nom; ?>" class="form-control" placeholder="First Name" id="event" onkeydown="return alphaOnly(event);" required="">
                                        </div>
                                    </div>
                                </div>

                                 <div class="form-group">
                                    <div class="row">
                                        <label class="col-sm-3 control-label">Prenom</label>
                                        <div class="col-sm-9">
                                            <input type="text"  value="<?php echo $prenom; ?>"  name="prenom" id="lname" class="form-control" id="event" onkeydown="return alphaOnly(event);" placeholder="Last Name" required="">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                      <div class="row">
                                        <label class="col-sm-3 control-label">Date Naissance</label>
                                        <div class="col-sm-9">
                                          <input type="date"  value="<?php echo $dateN; ?>" name="dateN" class="form-control" placeholder="Birth Date">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
        <div class="row">
                                        <label class="col-sm-3 control-label">Semestre</label>
                                        <div class="col-sm-9">
                                            <select type="text"   name="semestre" id="semestre" class="form-control" placeholder="Surveillant" required="">
                                                <option value="<?php echo $semestre; ?>">Select Semestre</option>
                                                <option value="s1">S1</option>
                                                <option value="s2">S2</option>
                                                <option value="s3">S3</option>
                                                <option value="s4">S4</option>
                                                <option value="s5">S5</option>
                                                <option value="s6">S6</option>
                                                 
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <label class="col-sm-3 control-label">Filiere</label>
                                        <div class="col-sm-9">
                                        <select type="text" name="filiere"   id="filiere" class="form-control"   placeholder="Class" required="">
                                                <option value="<?php echo $filiere; ?>">--Select Filière--</option>
                                                    <?php  
                                                    $c1 = "SELECT * FROM tbl_class";
                                                    $result = $conn->query($c1);

                                                    if ($result->num_rows > 0) {
                                                        while ($row = mysqli_fetch_array($result)) {?>
                                                            <option value="<?php echo $row["classname"];?>">
                                                                <?php echo $row['classname'];?>
                                                            </option>
                                                            <?php
                                                        }
                                                    } else {
                                                    echo "0 results";
                                                        }
                                                    ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                  


                                        <button type="submit" name="btn_update" class="btn  btn-flat m-b-30 m-t-30" style="background-color: #135297;color: white">Modifier</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                  
                </div>
                
          
<?php include('footer.php');?>
<link rel="stylesheet" href="popup_style.css">
<script>
  var check = function() {
  if (document.getElementById('password').value ==
    document.getElementById('confirm_password').value) {
    document.getElementById('message').style.color = 'green';
    document.getElementById('message').innerHTML = 'Matching';
  } else {
    document.getElementById('message').style.color = 'red';
    document.getElementById('message').innerHTML = 'NOT Matching';
  }
}
</script>
<?php if(!empty($_SESSION['error'])) {  ?>
<div class="popup popup--icon -error js_error-popup popup--visible">
  <div class="popup__background"></div>
  <div class="popup__content">
    <h3 class="popup_content_title">
      Error 
    </h1>
    <p><?php echo $_SESSION['error']; ?></p>
    <p>
      <button class="button button--error" data-for="js_error-popup">Fermer</button>
    </p>
  </div>
</div>
<?php unset($_SESSION["error"]);  } ?>
    <script>
      var addButtonTrigger = function addButtonTrigger(el) {
  el.addEventListener('click', function () {
    var popupEl = document.querySelector('.' + el.dataset.for);
    popupEl.classList.toggle('popup--visible');
  });
};

Array.from(document.querySelectorAll('button[data-for]')).
forEach(addButtonTrigger);
    </script>
