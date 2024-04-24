<?php include('head.php');?>
<?php include('header.php');?>

<?php include('sidebar.php');?>   
<?php
//  date_default_timezone_set('Asia/Kolkata');
 $current_date = date('Y-m-d');

 $sql_currency = "select * from manage_website"; 
             $result_currency = $conn->query($sql_currency);
             $row_currency = mysqli_fetch_array($result_currency);
?>    
      
        <div class="page-wrapper" style="color: #135297">
            
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 style="color: #135297">Acceuil</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Page</a></li>
                        <li class="breadcrumb-item active">Acceuil</li>
                    </ol>
                </div>
            </div>
            
            <div class="container-fluid">
        <?php
        // session_start();

        // Vérifiez si l'utilisateur est authentifié
        if(isset($_SESSION['id']) && isset($_SESSION['username'])) {
            // Récupérez l'ID de l'utilisateur
            $user_id = $_SESSION['id'];
        
            // Récupérez le nom d'utilisateur de l'utilisateur
            $username = $_SESSION['username'];
        
            // Affichez l'ID et le nom d'utilisateur sur la page d'accueil
            // echo "Bienvenue, $username (ID: $user_id)";
        } else {
            // Redirigez l'utilisateur vers la page de connexion s'il n'est pas authentifié
            header("Location: login.php");
            exit();
        }
        ?>
       
        
                      <div class="row">
                    <div class="col-md-4">
                    <div class="card shadow">
          <div class="card-body bg-white">
                            <div class="media ">
                                <div class="media-left meida media-middle" class="student-icon">
                                    <span><i class="ti-user f-s-40"></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                    <?php $sql="SELECT COUNT(*) FROM `tbl_teacher`";
                                $res = $conn->query($sql);
                                $row=mysqli_fetch_array($res);?> 
                                    <h2 style="color: #135297"><?php echo $row[0];?></h2>
                                    <p class="m-b-0" style="color: #135297">Total Enseignements</p>
                                </div>
                            </div>
                        </div>
    </div>
                    </div>
                    <div class="col-md-4">
                    <div class="card shadow">
          <div class="card-body bg-white">
                            <div class="media ">
                                <div class="media-left meida media-middle">
                                    <span><i class="ti-id-badge f-s-40"></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                <?php $sql="SELECT COUNT(*) FROM `tbl_student`";
                                $res = $conn->query($sql);
                                $row=mysqli_fetch_array($res);?>
                                    <h2 style="color: #135297"><?php echo $row[0];?></h2>
                                    <p class="m-b-0" style="color: #135297">Total Etudiants</p>
                                </div>
                            </div>
                        </div>
    </div>
                    </div>
                    <div class="col-md-4">
                    <div class="card shadow">
          <div class="card-body bg-white">
                            <div class="media ">
                                <div class="media-left meida media-middle">
                                    <span><i class="ti-pencil f-s-40"></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                    <?php $sql="SELECT COUNT(*) FROM `tbl_class`";
                                $res = $conn->query($sql);
                                $row=mysqli_fetch_array($res);?>
                                    <h2 style="color: #135297"><?php echo $row[0];?></h2>
                                    <p class="m-b-0" style="color: #135297">Total Filières</p>
                                </div>
                            </div>
                        </div>
    </div>
                    </div>
                    <div class="col-md-4">
                      <div class="card shadow">
                             <div class="media ">
                                <div class="media-left meida media-middle">
                                    <span><i class="ti-write f-s-40"></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                     <?php $sql="SELECT COUNT(*) FROM `tbl_subject`";
                                $res = $conn->query($sql);
                                $row=mysqli_fetch_array($res);?> 
                                    <h2 class="" style="color: #135297"><?php echo $row[0];?></h2>
                                    <p class="m-b-0" style="color: #135297">Total Modules</p>
                                </div>
                            </div>
                        </div>
                           </div>
                           <div class="col-md-4">
                      <div class="card shadow">
                             <div class="media ">
                                <div class="media-left meida media-middle">
                                    <span><i class="ti-location-pin f-s-40"></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                     <?php $sql="SELECT COUNT(*) FROM `room`";
                                $res = $conn->query($sql);
                                $row=mysqli_fetch_array($res);?> 
                                    <h2 style="color: #135297"><?php echo $row[0];?></h2>
                                    <p class="m-b-0" style="color: #135297">Total Locals</p>
                                </div>
                            </div>
                        </div>
                           </div>
                    </div>
                   


                
            </div>
             <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 style="color: #135297">Voir Liste Des Examens</h3> </div>
                
            </div>
            <div class="card">
                            <div class="card-body">
                            
                                <div class="table-responsive m-t-40">
                                    <table id="myTable" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th style="color: #135297">Examen Module</th>
                                                <th style="color: #135297">Filière</th>
                                                <th style="color: #135297">Local</th>
                                                <th style="color: #135297">Date</th>
                                                <th style="color: #135297">Heure de Début</th>
                                                <th style="color: #135297">Action</th> 
                                            </tr>
                                        </thead>
                                        <tbody>
                                    <?php 
                                    include 'connect.php';
                                   $sql1 = "SELECT * FROM  `exam`";
                                   $result1 = $conn->query($sql1);
                                   while($row = $result1->fetch_assoc()) { 
                                      ?>
                                            <tr>
                                            <td><?php echo $row['module']; ?></td>
                                                <td><?php echo $row['filiere']; ?></td>
                                                <td><?php echo $row['local']; ?></td>
                                                <td><?php echo $row['exam_date']; ?></td>
                                                <td><?php echo $row['start_time']; ?></td>
                                                <td>
                                                <a href="view_exam.php?id=<?=$row['id'];?>"><button type="button" class="btn btn-xs btn-danger" ><i class="fa fa-trash"></i></button></a>
                                                </td>
                                            </tr>
                                          <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    
        </div>
            
            <?php include('footer.php');?>