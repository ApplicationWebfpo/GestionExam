
<?php
date_default_timezone_set('Asia/Kolkata');
$current_date = date('Y-m-d');
include('../connect.php');
$passw = hash('sha256', $_POST['password']);
function createSalt()
{
    return '2123293dsj2hu2nikhiljdsd';
}
$salt = createSalt();
$pass = hash('sha256', $salt . $passw);

$image = $_FILES['image']['name'];
$target = "../uploadImage/Profile/".basename($image);

if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
      $msg = "Image uploaded successfully";
    }else{
      $msg = "Failed to upload image";
    }
    include 'connect.php';
    $sql = "SELECT * FROM `tbl_teacher`";
                                       
     $result = $conn->query($sql);

  //  while($row = $result->fetch_assoc()) { 
  //  $sql1="SELECT * FROM `tbl_subject` WHERE id='".$row['subjectname']."'";
  //    $result1=$conn->query($sql1);
  //    $row1=$result1->fetch_assoc();
  //    $sql2="SELECT * FROM `tbl_class` WHERE id='".$row['classname']."'";
  //    $result2=$conn->query($sql2);
  //    $row2=$result2->fetch_assoc();
  //   } 
extract($_POST);
   $sql = "INSERT INTO admin (username, email, fname, lname, gender,  dob,contact,    address,created_on,image,group_id)VALUES ('user', '$email', '$fname', '$lname', '$gender', '$dob', '$contact', '$address','$current_date','$image','$group_id')";
 if ($conn->query($sql) === TRUE) {
      $_SESSION['success']=' Record Successfully Added';
     ?>
<script type="text/javascript">
window.location="../view_user.php";
</script>
<?php
} else {
      $_SESSION['error']='Something Went Wrong';
?>
<script type="text/javascript">
window.location="../view_user.php";
</script>
<?php } ?>