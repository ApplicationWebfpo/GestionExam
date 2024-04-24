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
            <h3  style="color: #135297">Gestion des Enseignants</h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Ajouter des enseignants</li>
            </ol>
        </div>
    </div>

    <div class="container-fluid"  style="color: #135297">

        <div class="row">
            <div class="col-lg-8" style="margin-left: 10%;">
                <div class="card">
                    <div class="card-title">

                    </div>
                    <div class="card-body">
                        <div class="input-states">
                            <form class="form-horizontal" method="POST" action="pages/save_teacher.php"
                                name="teacherform" enctype="multipart/form-data">

                                <input type="hidden" name="currnt_date" class="form-control"
                                    value="<?php echo $currnt_date;?>">

                                <div class="form-group">
                                    <div class="row">
                                        <label  style="color: #135297" class="col-sm-3 control-label">Matricule</label>
                                        <div class="col-sm-9">
                                            <input   type="text" name="matricule" class="form-control"
                                                placeholder="Matricule"  style="color: #135297;" id="event" 
                                                required="">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <label  style="color: #135297"  class="col-sm-3 control-label">CIN</label>
                                        <div class="col-sm-9">
                                            <input  style="color: #135297" type="text" name="cin" class="form-control"
                                                placeholder="CIN" id="event" 
                                                required="">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <label  style="color: #135297" class="col-sm-3 control-label">Prenom</label>
                                        <div class="col-sm-9">
                                            <input  style="color: #135297" type="text" name="tfname" class="form-control"
                                                placeholder="Prenom" id="event" onkeydown="return alphaOnly(event);"
                                                required="">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <label class="col-sm-3 control-label"  style="color: #135297">Nom</label>
                                        <div class="col-sm-9">
                                            <input  style="color: #135297" type="text" name="tlname" id="lname" class="form-control" id="event"
                                                onkeydown="return alphaOnly(event);" placeholder="Nom"
                                                required="">
                                        </div>
                                    </div>
                                </div>




                                <div class="form-group">
                                    <div class="row">
                                        <label class="col-sm-3 control-label"  style="color: #135297">Filière</label>
                                        <div class="col-sm-9">
                                            <select  style="color: #135297" type="text" name="classname" id="class_id" class="form-control"
                                                placeholder="Class" required="">
                                                <option  style="color: #135297" value="">--Séléctionnez Filière--</option>
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
                                            <select type="text"  style="color: #135297" name="subjectname" id="subject_id" class="form-control"
                                                placeholder="Subject" required="">
                                                <option value=""  style="color: #135297">--Selectionnez Module--</option>
                                                <?php  
                                    $c1 = "SELECT * FROM `tbl_subject`";
                                    $result = $conn->query($c1);

                                    if ($result->num_rows > 0) {
                                        while ($row = mysqli_fetch_array($result)) {?>
                                                <option value="<?php echo $row["id"];?>" style="display: none;"
                                                    data-id="<?php echo $row["class_id"];?>">
                                                    <?php echo $row['subjectname'];?>
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
                                        <label  style="color: #135297" class="col-sm-3 control-label">Email</label>
                                        <div class="col-sm-9">
                                            <input  class="form-control" style="color: #135297" type="text"   name="temail" class="form-control"
                                                pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" placeholder="Email"
                                                required>
                                        </div>
                                    </div>
                                </div>
                               


                                <div class="form-group">
                                    <div class="row">
                                        <label class="col-sm-3 control-label">Genre</label>
                                        <div class="col-sm-9">
                                            <select  style="color: #135297" name="tgender" id="gender" class="form-control" required="">
                                                <option value=""  style="color: #135297">--Selectionnez Genre--</option>
                                                <option value="Male">Masculin</option>
                                                <option value="Female">Feminin</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <label class="col-sm-3 control-label">Date de naissance</label>
                                        <div class="col-sm-9">
                                            <input  style="color: #135297" type="date" name="tdob" class="form-control"
                                                placeholder="Saisir Date de Naissance">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <label class="col-sm-3 control-label">Contact</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="tcontact" class="form-control"
                                                placeholder="Votre telephone" id="tbNumbers" minlength="10"
                                                maxlength="10" onkeypress="javascript:return isNumber(event)"
                                                required="">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <label class="col-sm-3 control-label">Addresse</label>
                                        <div class="col-sm-9">
                                            <textarea class="form-control" rows="4" name="taddress"
                                                placeholder="Addresse" style="height: 120px;"></textarea>
                                        </div>
                                    </div>
                                </div>

                                <button type="submit" name="btn_save"
                                    class="btn btn-flat m-b-30 m-t-30" style="background-color: #135297;color: white">soumettre</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>



        <?php include('footer.php');?>
        <script>
            var check = function () {
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
        <script type="text/javascript">
            $('#class_id').change(function () {
                $("#subject_id").val('');
                $("#subject_id").children('option').hide();
                var class_id = $(this).val();
                $("#subject_id").children("option[data-id=" + class_id + "]").show();

            });
        </script>