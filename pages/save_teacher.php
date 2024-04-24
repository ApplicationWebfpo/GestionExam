
<?php
date_default_timezone_set('Asia/Kolkata');
$current_date = date('Y-m-d');
include('../connect.php');

function createSalt()
{
    return '2123293dsj2hu2nikhiljdsd';
}
$salt = createSalt();

extract($_POST);
   $sql = "INSERT INTO `tbl_teacher` (`matricule`,`cin`,`tfname`, `tlname`, `classname`, `subjectname`, `temail`, `tgender`, `tdob`, `tcontact`, `taddress`) VALUES ('$matricule','$cin','$tfname', '$tlname', '$classname', '$subjectname', '$temail','$tgender', '$tdob', '$tcontact', '$taddress')";
   $req = "INSERT INTO admin (cne,cin,username,email,fname,lname) VALUES ('$matricule','$cin','professeur', '$temail','$tfname','$tlname')";
  if ($conn->query($sql) === TRUE) {
       $_SESSION['success']=' Record Successfully Added';
      
     ?>
     
<script type="text/javascript">
window.location="../view_teacher.php";
</script>
<?php
 } else {
      $_SESSION['error']='Something Went Wrong';
 ?>
<script type="text/javascript">
window.location="../view_teacher.php";
</script>
<?php 
 }
?>
<?php
 if ($conn->query($req) === TRUE) {
  $_SESSION['success']=' Record Successfully Added';
 }
 else{
  $_SESSION['error']='Something Went Wrong';
 }
 ?>