
<?php include('head.php');?>
<?php include('header.php');?>
<?php include('sidebar.php');
 date_default_timezone_set('Asia/Kolkata');
 $current_date = date('Y-m-d');
 ?>
<div class="page-wrapper">
            
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Rapport Des Examens</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Acceuil</a></li>
                        <li class="breadcrumb-item active">Examens Rapport</li>
                    </ol>
                </div>
            </div>
          
            <div class="container-fluid">                    
               <div class="card">
                        
                            <div class="card-body">
                                <div class="table-responsive m-t-40">
                                <form action="listExam.php" method="POST">
                                <div class="row">
                                                <!-- <label class="col-sm-3 control-label"  style="color: #135297">Session</label> -->
                                               
                                                <div class="col-sm-3">
                                                    <select type="text"  style="color: #135297" name="filiere" id="filiere" class="form-control"   placeholder="Class" required="">
                                                        <option value=""  style="color: #135297">--Select Filière--</option>
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
                                                <div class="col-sm-3">
                                                    <select type="text"  style="color: #135297" name="session" id="session" class="form-control" placeholder="Surveillant" required="">
                                                        <option value="">Select Session</option>
                                                        <option value="Normal">Normal</option>
                                                        <option value="Rattrappage">Rattrappage</option>
                                                       
                                                         
                                                    </select>
                                                </div>
                                                <div class="col-sm-3">
                                               
           <div class="d-grid gap-2">
                   <input id="saveForm" class="btn " style="background-color: #135297;color: white" type="submit" name="submit" value="Imprimer Les exames du chaque Filière">
           </div>
       </form>

                                                </div>
                                            </div>
                                        
                                
                            
                                    <table id="myTable" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Filière</th>
                                                <th>Semestre</th>
                                                <th>Epreuve</th>
                                                <th>Date-Heure</th>
                                                
                                                <th>Local</th>
                                                <th>Session</th>
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
                                            <td><?php echo $row['filiere']; ?></td>
                                                <td><?php echo $row['semestre']; ?></td>
                                                <td><?php echo $row['module']; ?></td>
                                                <td><?php echo $row['exam_date'].'à'.$row['start_time']; ?></td>
                                                <td><?php echo $row['local']; ?></td>
                                                <td><?php echo $row['session']; ?></td>
                                            </tr>
                                          <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div> 
        </div>
               
            

<?php include('footer.php');?>

<link rel="stylesheet" href="popup_style.css">
<?php if(!empty($_SESSION['success'])) {  ?>
<div class="popup popup--icon -success js_success-popup popup--visible">
  <div class="popup__background"></div>
  <div class="popup__content">
    <h3 class="popup__content__title">
    Succès
    </h1>
    <p><?php echo $_SESSION['success']; ?></p>
    <p>
      <button class="button button--success" data-for="js_success-popup">Fermer</button>
    </p>
  </div>
</div>
<?php unset($_SESSION["success"]);  
} ?>
<?php if(!empty($_SESSION['error'])) {  ?>
<div class="popup popup--icon -error js_error-popup popup--visible">
  <div class="popup__background"></div>
  <div class="popup__content">
    <h3 class="popup__content__title">
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