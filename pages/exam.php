
<?php
date_default_timezone_set('Asia/Kolkata');
$current_date = date('Y-m-d');
include('../connect.php');
extract($_POST);


$sql = "SELECT exam_date, start_time FROM exam";
$result = $conn->query($sql);

$reservations = array();
if ($result->num_rows > 0) {
    // Stockage des réservations dans un tableau
    while ($row = $result->fetch_assoc()) {
        $reservations[] = array(
            'exam_date' => $row['exam_date'],
            'start_time' => $row['start_time']
        );
    }
}

// Fonction pour vérifier si une date et une heure sont déjà réservées
function isReserved($reservations, $exam_date, $start_time) {
      foreach ($reservations as $reservation) {
          if ($reservation['exam_date'] == $exam_date && $reservation['start_time'] == $start_time) {
              return true; // La date et l'heure sont déjà réservées
          }
      }
      return false; // La date et l'heure ne sont pas réservées
  }

  if (isReserved($reservations, $exam_date, $start_time)) {
      $mess="Cette heure  est Non disponible pour une réservation.";
     $_SESSION['er']='Cette heure  est Non disponible pour une réservation.';
     
      header("Location: ../add_exam.php?erreur=heure+Non+disponible");
      exit();
  } 
  
  else  
  {
      echo "Cette heure est disponible pour une réservation.";
  



echo"$module $semestre $filiere','$module','$semestre','$session','$sur1','$sur2','$sur3','$local','$exam_date','$start_time','$end_time'";
session_start();

if(isset($_SESSION['id']) && isset($_SESSION['username'])) {
      // Récupérez l'ID de l'utilisateur
      $user_id = $_SESSION['id'];
  
      // Récupérez le nom d'utilisateur de l'utilisateur
  
  
      // Affichez l'ID et le nom d'utilisateur sur la page d'accueil
      echo   $user_id;
  } 

 
   $sql = "INSERT INTO `exam` (`filiere`,`module`,`semestre`,`session`,`surUn`,`surDeux`,`surTroix`,`local`,`exam_date`,`start_time`,`end_time`) VALUES ('$filiere','$module','$semestre','$session','$sur1','$sur2','$sur3','$local','$exam_date','$start_time','$end_time')";
 if ($conn->query($sql) === TRUE) {
      $_SESSION['success']=' Record Successfully Added';
     ?>
<script type="text/javascript">
window.location="../view_exam.php";
</script>
<?php
} else {
      $_SESSION['error']='Something Went Wrong';
?>
<script type="text/javascript">
window.location="../view_exam.php";
<?php } ?>
</script>
<?php } ?>




