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
    <div><br><h1>Calendrier des examens Session <?php echo $_POST['session'] ?> - Automne A.U 2023/2024</h1></div><br>
    <div class="page-wrapper" style="margin-top: 60px;">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive m-t-40">
                        <table  class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Filière</th>
                                  
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                               
                                ?>
                                <tr>
                              
                                    <td  class="text-center custom-td"><?php echo $_POST['filiere']; ?></td>
                                   
                                </tr>
                              
                            </tbody>
                        </table>
                    </div>
                    <style>
                           .custom-td {
                            color: #135297;

                            font-size: 30px;
    }
                        .table-striped tbody tr:nth-of-type(odd) {
                            background-color: #CCCCCC;
                        }
                        .table-striped tbody tr:nth-of-type(even) {
                            background-color: #FFFFFF;
                        }
                        .table-striped tbody tr td {
                            font-weight: bold;
                            /* color: #000000; */
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
                                    <table id="myTable" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                               
                                                <th>Semestre</th>
                                                <th>Epreuve</th>
                                                <th>Date-Heure</th>
                                                
                                                <th>Local</th>
                                               
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
                                    include 'connect.php';
                                    $a= $_POST['session'];$b= $_POST['filiere'];
                                   $sql1 = "SELECT * FROM  `exam`  where session ='$a' AND filiere='$b' ORDER BY semestre asc";
                                   $result1 = $conn->query($sql1);
                                   while($row = $result1->fetch_assoc()) { 
                                      ?>
                                            <tr>
                                           
                                                <td><?php echo $row['semestre']; ?></td>
                                                <td><?php echo $row['module']; ?></td>
                                                <td><?php echo $row['exam_date'].'à'.$row['start_time']; ?></td>
                                                <td><?php echo $row['local']; ?></td>
                                              
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


</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
        window.onload = function() {
            window.print();
        }
    </script>
</body>
</html>
