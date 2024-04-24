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
                    <h3 class="text-primary">Gestion une Local</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Page</a></li>
                        <li class="breadcrumb-item active">Ajouter Une Salle</li>
                    </ol>
                </div>
            </div>
            
            <div class="container-fluid">
                
                <div class="row">
                    <div class="col-lg-8" style="margin-left: 10%;">
                        <div class="card">
                            <div class="card-body">
                                <div class="input-states">
                                    <form class="form-horizontal" method="POST" action="pages/room.php" name="userform" enctype="multipart/form-data">

                                 
                                               
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label"  style="color: #135297"> Nom du Salle</label>
                                                <div class="col-sm-9">
                                                  <input type="text"  style="color: #135297" name="name" class="form-control" placeholder=" Saisir Non du Salle" required="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label"  style="color: #135297">Capacité</label>
                                                <div class="col-sm-9">
                                                  <input type="number"  style="color: #135297" min="0" name="strenght" class="form-control" placeholder=" Saisir La Capacité" required="">
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
