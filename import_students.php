<?php
include 'connect.php'; // Include your database connection file

if (isset($_FILES['file'])) {
    $file = $_FILES['file']['tmp_name'];
    $handle = fopen($file, "r");

    while (($data = fgetcsv($handle, 1000, ";")) !== false) {
        $cne = $data[0]; // Assuming the CSV file format is consistent with your database schema
        $cin = $data[1];
        $nom = $data[2];
        $prenom = $data[3];
        $dateN = $data[4];
        $semestre = $data[5];
        $filiere = $data[6];

        // Insert data into your database table
        $sql = "INSERT INTO `tbl_student` (`cne`, `cin`, `nom`, `prenom`, `dateN`, `semestre`, `filiere`) 
                VALUES ('$cne', '$cin', '$nom', '$prenom', '$dateN', '$semestre', '$filiere')";
        $conn->query($sql);
        $req = "INSERT INTO admin (cne,cin,username,email,fname,lname) VALUES ('$cne','$cin','etudiant', '$nom.$prenom@gmail.com','$nom','$prenom')";
        if ($conn->query($req) === TRUE) {
             $_SESSION['success']=' Record Successfully Added';
            
        }
    }

    fclose($handle);
    header("Location: view_student.php"); // Redirect to the page where you display students
    exit;
}
?>
