
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
                    <h3 style="color: #135297">Gestion Des Etudiants </h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Page</a></li>
                        <li class="breadcrumb-item active">Ajouter Un Etudiant</li>
                    </ol>
                </div>
            </div>
            
            <div class="container-fluid">
                
                <div class="row">
                    <div class="col-lg-8" style="    margin-left: 10%;">
                        <div class="card">
                            <div class="card-title"  style="color: #135297">
                               
                            </div>
                            <div class="card-body"  style="color: #135297">
                                <div class="input-states">
                                    <form class="form-horizontal"  style="color: #135297" method="POST" action="pages/save_student.php" name="studentform" enctype="multipart/form-data">

                                   <!-- <input type="hidden" name="currnt_date" class="form-control" value="<?php echo $currnt_date;?>"> -->
                                
                                        <div class="form-group">
                                            <div class="row"  style="color: #135297">
                                                <label class="col-sm-3 control-label" style="color: #135297">CNE</label>
                                                <div class="col-sm-9">
                                                  <input type="text"   name="cne" class="form-control" placeholder="saisir cne" style="color: #135297" id="event" required="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label"  style="color: #135297">CIN</label>
                                                <div class="col-sm-9">
                                                  <input type="text"  style="color: #135297" name="cin" class="form-control" placeholder="Saisir cin" id="event"  required="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label"  style="color: #135297">Nom</label>
                                                <div class="col-sm-9">
                                                  <input type="text"  style="color: #135297" name="nom" class="form-control" placeholder="Saisir Nom" id="event" onkeydown="return alphaOnly(event);" required="">
                                                </div>
                                            </div>
                                        </div>

                                         <div class="form-group"  style="color: #135297">
                                            <div class="row">
                                                <label class="col-sm-3 control-label"  style="color: #135297">Prenom</label>
                                                <div class="col-sm-9">
                                                    <input type="text"  style="color: #135297"  name="prenom" id="lname" class="form-control" id="event" onkeydown="return alphaOnly(event);" placeholder="Saisir Prenom" required="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                              <div class="row">
                                                <label class="col-sm-3 control-label"  style="color: #135297">Date Naissance</label>
                                                <div class="col-sm-9">
                                                  <input type="date"  style="color: #135297" name="dateN" class="form-control" placeholder="Saisir Date Du Naissance">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                <div class="row">
                                                <label class="col-sm-3 control-label"  style="color: #135297">Semestre</label>
                                                <div class="col-sm-9">
                                                    <select  style="color: #135297" type="text" name="semestre" id="semestre" class="form-control" placeholder="Saisir Semestre" required="">
                                                        <option value=""  style="color: #135297">Selectionnez Semestre</option>
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
                                                <label class="col-sm-3 control-label"  style="color: #135297">Filière</label>
                                                <div class="col-sm-9">
                                                <select  style="color: #135297" type="text" name="filiere" id="filiere" class="form-control"   placeholder="Filière" required="">
                                                        <option value=""  style="color: #135297">--Séléctionnez Filière--</option>
                                                            <?php  
                                                            $c1 = "SELECT * FROM `tbl_class`";
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
                                        

                                        <button type="submit" name="btn_save" class="btn  btn-flat m-b-30 m-t-30" style="background-color: #135297;color: white">Valider</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                  
                </div>

<?php include('footer.php');?>
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