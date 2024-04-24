
<?php include('head.php');?>

<?php include('header.php');?>
<?php include('sidebar.php');?>

 <?php
 include('connect.php');
 date_default_timezone_set('Asia/Kolkata');
 $current_date = date('Y-m-d');
if(isset($_POST["btn_update"]))
{
    extract($_POST);
    
      $q1="UPDATE `room` SET `name`='$name',`type_id`='$type_id',`strenght`='$strenght' WHERE `id`='".$_GET['id']."'";
 
    if ($conn->query($q1) === TRUE) {
      $_SESSION['success']=' Record Successfully Updated';
     ?>
<script type="text/javascript">
window.location="view_subject.php";
</script>
<?php
} else {
      $_SESSION['error']='Something Went Wrong';
?>
<script type="text/javascript">
window.location="view_room.php";
</script>
<?php
}

}
?>

<?php
$que="SELECT * from `room` WHERE id='".$_GET["id"]."'";
$query=$conn->query($que);
while($row=mysqli_fetch_array($query))
{
   
    extract($row);
$name = $row['name'];
$type_id = $row['type_id'];
$strenght = $row['strenght'];
}

?> 


   


 
        <div class="page-wrapper">
         
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Gestion des salles</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Gestion des salles</li>
                    </ol>
                </div>
            </div>
         
            <div class="container-fluid">
                
                <div class="row">
                    <div class="col-lg-8" style="    margin-left: 10%;">
                        <div class="card">
                            <div class="card-title">
                               
                            </div>
                            <div class="card-body">
                                <div class="input-states">
                                    <form class="form-horizontal" method="POST" enctype="multipart/form-data" name="subjectform">

                                   <input type="hidden" name="currnt_date" class="form-control" value="<?php echo $currnt_date;?>">
                                    <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">Type de salle</label>
                                                <div class="col-sm-9">
                                                    <select type="text" name="type_id" class="form-control"   placeholder="Room Type" required="">
                                                        <option value="">--Select Type salle--</option>
                                                            <?php  
                                                            $c1 = "SELECT * FROM `room_type`";
                                                            $result = $conn->query($c1);

                                                            if ($result->num_rows > 0) {
                                                                while ($row = mysqli_fetch_array($result)) {?>
                                                                    <option value="<?php echo $row["id"];?>" <?php if($row["id"]==$type_id){ echo "selected"; } ?>>
                                                                        <?php echo $row['roomname'];?>
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
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">Nom</label>
                                                <div class="col-sm-9">
                                                  <input type="text" name="name" class="form-control" placeholder="Nom"  value="<?php echo $name; ?>" required="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">capacité de salle</label>
                                                <div class="col-sm-9">
                                                  <input type="number" min="0" name="capacité" class="form-control" value="<?php echo $strenght; ?>" placeholder="capacité" required="">
                                                </div>
                                            </div>
                                        </div>

                                       
                                        <button type="submit" name="btn_update" class="btn btn-flat m-b-30 m-t-30"style="background-color: #135297;color: white">Modifier</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                  
                </div>
   
<?php include('footer.php');?>

