<?php include('head.php');?>

<?php include('header.php');?>
<?php include('sidebar.php');?>

 <?php
 include('connect.php');
 date_default_timezone_set('Asia/Kolkata');
 $current_date = date('Y-m-d');

?>

        <div class="page-wrapper">
           
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3  style="color: #135297">Gestion Des Modules</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Page</a></li>
                        <li class="breadcrumb-item active"  style="color: #135297">Ajouter Un Module</li>
                    </ol>
                </div>
            </div>
            
            <div class="container-fluid"  style="color: #135297">
                
                <div class="row">
                    <div class="col-lg-8" style="margin-left: 10%;">
                        <div class="card">
                            <div class="card-body">
                                <div class="input-states">
                                    <form class="form-horizontal" method="POST" action="pages/save_subjects.php" name="userform" enctype="multipart/form-data">

                                   <!-- <input type="hidden" name="currnt_date" class="form-control" value="<?php echo $currnt_date;?>"> -->
                                   <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label"  style="color: #135297">Filière</label>
                                                <div class="col-sm-9">
                                                    <select type="text"  style="color: #135297" name="class_id" class="form-control"   placeholder="Class" required="">
                                                        <option value="">--Selectionnez Filière--</option>
                                                            <?php  
                                                            $c1 = "SELECT * FROM `tbl_class`";
                                                            $result = $conn->query($c1);

                                                            if ($result->num_rows > 0) {
                                                                while ($row = mysqli_fetch_array($result)) {?>
                                                                    <option value="<?php echo $row["id"];?>">
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
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label"  style="color: #135297">Module</label>
                                                <div class="col-sm-9">
                                                  <input type="text"  style="color: #135297" name="subjectname" class="form-control" placeholder="Saisir Un Module" id="event" onkeydown="return alphaOnly(event);" required="">
                                                </div>
                                            </div>
                                        </div>
                                        <button type="Valider" name="btn_save" class="btn  btn-flat m-b-30 m-t-30" style="background-color: #135297;color: white">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                  
                </div>
                
        
<?php include('footer.php');?>
