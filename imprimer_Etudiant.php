<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Convocation_Fpo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>

    <div><img src="./fpo.jpg" style="display: block; margin: 0 auto; max-width: 300px;"></div>
    <div><br><h1>Liste de Surveillance</h1></div><br>
    <div class="page-wrapper" style="margin-top: 60px;">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive m-t-40">
                        <table  class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                <th>Numero Examen</th>
                                    <th>CNE</th>
                                    <th>CIN</th>
                                    <th>Nom</th>          
                                    <th>Prénom</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                include 'connect.php';
                                session_start();
                                $user_id = $_SESSION['id'];
                                $sql2 = "SELECT * FROM  admin where id=$user_id ;";
                                $result2 = $conn->query($sql2);
                               
                                while($row = $result2->fetch_assoc()) { 
                                ?>
                                <tr>
                                <?php $a= $row['lname']; ?>
                                  <td><?php echo$row['id']; ?></td>
                                    <td><?php echo$row['cne']; ?></td>
                                    <td><?php echo$row['cin']; ?></td>
                                    <td><?php echo $row['lname']; ?></td>
                                    <td><?php echo $row['fname']; ?></td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <style>
                        .table-striped tbody tr:nth-of-type(odd) {
                            background-color: #CCCCCC;
                        }
                        .table-striped tbody tr:nth-of-type(even) {
                            background-color: #FFFFFF;
                        }
                        .table-striped tbody tr td {
                            font-weight: bold;
                            color: #000000;
                        }
                        .table th {
                            text-align: center;
                             background-color: #aed6f1;
                              color: black; /* Pour changer la couleur du texte en blanc */
                        }
                        h1 {
                            text-align: center;
                            color: #0D1468;
                            font-style: italic;
                        }
                        h4 {
                            color: #0D1468;
                            font-style: italic;
                        }
   
                    </style>
                    
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <div class="card">
                                <div class="card-body">
                                    <form action="#" method="POST">
                                    </form>
                                    <br>
                                    <table class="table table-hover table-bordered border-primary table-striped">
                                        <thead>
                                            <tr style="background-color:#aed6f1 ;">
                                                <th scope="col">FILIERE</th>
                                                <th scope="col">SEMESTRE</th>
                                                <th scope="col">MODULE</th>
                                                <th scope="col">LOCAL</th>
                                                <th scope="col">DATE</th>
                                                <th scope="col">HEURE D</th>
                                                <th scope="col">HEURE F</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            include 'connect.php';
                                            $sql1 = "SELECT * FROM  `exam` ,`tbl_student` where tbl_student.semestre =exam.semestre and tbl_student.nom='$a'";
                                            $result1 = $conn->query($sql1);
                                            while($row = $result1->fetch_assoc()) { 
                                            ?>
                                            <tr>
                                                <td><?php echo $row['filiere']; ?></td>
                                                <td><?php echo $row['semestre']; ?></td>
                                                <td><?php echo $row['module']; ?></td>
                                                <td><?php echo $row['local']; ?></td>
                                                <td><?php echo $row['exam_date']; ?></td>
                                                <td><?php echo $row['start_time']; ?></td>
                                                <td><?php echo $row['end_time']; ?></td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Image de conseigne -->
    <br><br><br><div>
<h4>CONSIGNES AUX SURVEILLANTS :</h4> 
<h6> &#10003; Avant le début de l'épreuve, les élèves s'installent à leur table en mettant leurs sacs, documents personnels et téléphones portables hors de leur portée. Seuls les éléments explicitement autorisés sur le sujet sont permis, tels que les calculatrices, ou dans le cadre d'un aménagement d'épreuve spécifique.
</h6>
<h6> &#10003; Les téléphones portables doivent être éteints et rangés dans les sacs. Tout élève surpris avec son téléphone portable avant le début de l'épreuve se le verra confisqué, et il lui sera restitué à la fin de l'épreuve. Les téléphones ne peuvent pas servir d'horloge pendant l'épreuve.
</h6>
<h6>&#10003; Chaque élève doit remplir immédiatement l'en-tête de ses copies, notamment avec son numéro de candidat figurant sur la convocation. Chaque élève doit également émarger sur la liste de présence.
</h6>
<h6>&#10003; L'émargement peut se faire à l'entrée en salle ou en circulant parmi les élèves une fois l'épreuve commencée. L'identification peut se faire à l'aide de la carte d'étudiant ou d'une pièce d'identité.
</h6>
<h6>&#10003; Avant la distribution des sujets, il est crucial de vérifier que le sujet correspond bien à l'épreuve prévue.
</h6>
<h6>&#10003; Pendant la distribution des sujets, les élèves doivent vérifier que le sujet se rapporte à l'épreuve attendue et vérifier la pagination.
</h6>
<h6>&#10003; En début d'épreuve, inscrire au tableau l'heure de début et de fin de l'épreuve et rappeler le temps restant si nécessaire.
</h6>
<h6>&#10003; Pendant l'épreuve, en cas d'erreur dans le sujet signalée par un élève, ne pas corriger l'erreur de sa propre initiative, mais alerter immédiatement le chef d'établissement. En cas de suspicion de fraude, arrêter immédiatement la fraude, mais laisser l'élève finir de composer et rédiger un rapport sur l'incident.
</h6>
<h6>&#10003; Au moment du ramassage des copies, les regrouper par sujet pour faciliter la numérisation. Vérifier que les en-têtes sont correctement remplis sur chaque copie, faire numéroter les pages et s'assurer que tous les élèves présents rendent une copie, même blanche.
</h6>
<h6>&#10003; Pour les candidats absents, ne pas prévoir de copie blanche dans la case signature sur la liste d'émargement. En cas d'absence justifiée.
</h6>

</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
        window.onload = function() {
            window.print();
        }
    </script>
</body>
</html>
