
<?php
date_default_timezone_set('Asia/Kolkata');
$current_date = date('Y-m-d');
include('../connect.php');
// $passw = hash('sha256', $_POST['password']);
function createSalt()
{
    return '2123293dsj2hu2nikhiljdsd';
}
$salt = createSalt();
// $pass = hash('sha256', $salt . $passw);
extract($_POST);
echo $cne;
echo $cin;
   $sql = "INSERT INTO `tbl_student`(`cne`,`cin`,`nom`, `prenom`, `dateN`, `semestre`,`filiere`) VALUES ('$cne','$cin','$nom', '$prenom', '$dateN', '$semestre','$filiere')";
   $req = "INSERT INTO admin (cne,cin,username,email,fname,lname) VALUES ('$cne','$cin','etudiant', '$temail','$nom','$prenom')";
  if ($conn->query($req) === TRUE) {
       $_SESSION['success']=' Record Successfully Added';
      
  }
 if ($conn->query($sql) === TRUE) {
      $_SESSION['success']=' Record Successfully Added';
     ?>
     
<script type="text/javascript">
window.location="../view_student.php";
</script>
<?php
} else {
      $_SESSION['error']='Something Went Wrong';
?>
<script type="text/javascript">
window.location="../view_student.php";
</script>
<?php } ?>