
<?php include('head.php');?>
<?php include('header.php');?>
<?php include('sidebar.php');

if(isset($_GET['id']))
{ ?>
<div class="popup popup--icon -question js_question-popup popup--visible">
  <div class="popup__background"></div>
  <div class="popup__content">
    <h3 class="popup__content__title">
      Sûr
    </h1>
    <p>Etes-vous sûr de supprimer ce étudiant ?</p>
    <p>
      <a href="del_student.php?id=<?php echo $_GET['id']; ?>" class="button button--success" data-for="js_success-popup">Oui</a>
      <a href="view_student.php" class="button button--error" data-for="js_success-popup">Non</a>
    </p>
  </div>
</div>
<?php } ?>

<div class="page-wrapper" style="color: #135297">
    <div class="row page-titles" style="color: #135297">
        <div class="col-md-5 align-self-center">
            <h3 style="color: #135297">Voir étudiants</h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Acceuil</a></li>
                <li class="breadcrumb-item active">Voir étudiants</li>
            </ol>
        </div>
    </div>
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
            <?php if(isset($useroles)){ if(in_array("add_student",$useroles)){ ?> 
    <form action="import_students.php" method="post" enctype="multipart/form-data">
        <input class="btn" type="file" name="file" accept=".csv" >
        <input type="submit" value="Importer un fichier CSV" class="btn " style="background-color: #135297;color: white">
        
    </form>
<?php } } ?>

                <div style="color: #135297" class="table-responsive m-t-40">
                    <table id="myTable" class="table table-bordered table-striped">
                        <thead style="color: #135297">
                            <tr>
                                <th style="color: #135297">CNE</th>
                                <th style="color: #135297">CIN</th>
                                <th style="color: #135297">Nom</th>
                                <th style="color: #135297">Prenom</th>
                                <th style="color: #135297">Date Naissance</th>
                                <th style="color: #135297">Semestre</th>
                                <th style="color: #135297">Filiere</th>
                                <th style="color: #135297">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            include 'connect.php';
                            $sql = "SELECT * FROM `tbl_student`";
                            $result = $conn->query($sql);

                            while($row = $result->fetch_assoc()) { 
                            ?>
                            <tr>
                                <td><?php echo $row['cne']; ?></td>
                                <td><?php echo $row['cin']; ?></td>
                                <td><?php echo $row['nom']; ?></td>
                                <td><?php echo $row['prenom']; ?></td>
                                <td><?php echo $row['dateN']; ?></td>
                                <td><?php echo $row['semestre']; ?></td>
                                <td><?php echo $row['filiere']; ?></td>
                                <td>
                                    <?php if(isset($useroles)){ if(in_array("edit_student",$useroles)){ ?> 
                                        <a href="edit_student.php?id=<?=$row['id'];?>"><button type="button" class="btn btn-xs btn-primary" ><i class="fa fa-plus-square"></i></button></a>
                                    <?php } } ?>
                                    <?php if(isset($useroles)){ if(in_array("delete_student",$useroles)){ ?> 
                                        <a href="view_student.php?id=<?=$row['id'];?>"><button type="button" class="btn btn-xs btn-danger" ><i class="fa fa-trash"></i></button></a>
                                    <?php } } ?>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
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
