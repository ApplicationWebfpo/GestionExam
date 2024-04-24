
<?php include('head.php');?>
<?php include('header.php');?>
<?php include('sidebar.php');

if(isset($_GET['id']))
{ ?>
<div class="popup popup--icon -question js_question-popup popup--visible">
  <div class="popup__background"></div>
  <div class="popup__content">
    <h3 class="popup__content__title">
      Sure
    </h1>
    <p>Etes-vous sûr de supprimer cet enregistrement ?</p>
    <p>
      <a href="del_exam.php?id=<?php echo $_GET['id']; ?>" class="button button--success" data-for="js_success-popup">Oui</a>
      <a href="view_exam.php" class="button button--error" data-for="js_success-popup">Non</a>
    </p>
  </div>
</div>
<?php } ?>


        <div class="page-wrapper"  style="color: #135297">
            
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 style="color: #135297"> Voir l'Examen</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Voir liste Des Examen</li>
                    </ol>
                </div>
            </div>
            
            <div class="container-fluid">
               
                 <div class="card">
                            <div class="card-body">
                            <a href="add_exam.php"><button class="btn "style="background-color: #135297;color: white">Ajouter Examen</button></a>
                                <div class="table-responsive m-t-40">
                                    <table  class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th style="color: #135297">Filière</th>
                                                <th style="color: #135297">Exam Module</th>
                                                <th style="color: #135297">Semestre</th>
                                                <th style="color: #135297">Surveillant</th>
                                                <th style="color: #135297">Local</th>
                                                <th style="color: #135297">Date</th>
                                                <th style="color: #135297">Heure de début</th>
                                                <th style="color: #135297">Heure de fin</th>
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
                                                <td><?php echo $row['filiere']; ?></td>
                                                <td><?php echo $row['module']; ?></td>
                                                <td><?php echo $row['semestre']; ?></td>
                                                <td><?php
                                                echo $row['surUn']."<br/>".$row['surDeux']."<br/>".$row['surTroix'];
                                               
                                                 ?></td>
                                                <td><?php echo $row['local']; ?></td>
                                                <td><?php echo $row['exam_date']; ?></td>
                                                <td><?php echo $row['start_time']; ?></td>
                                                <td><?php echo $row['end_time']; ?></td>
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