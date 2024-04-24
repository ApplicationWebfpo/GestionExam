<?php session_start();
 include('connect.php');
    if(!isset($_SESSION["email"])){
    ?>
    <script>
    window.location="login.php";
    </script>
    <?php
    
} else { 

 
    ?>
   
    <div id="main-wrapper">
        
        <div class="header">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
              
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.php">
                        
                         <?php
             $sql_header_logo = "select * from manage_website"; 
             $result_header_logo = $conn->query($sql_header_logo);
             $row_header_logo = mysqli_fetch_array($result_header_logo);
             ?>
                        <b><img src="./img/logo.png" alt="homepage"  class="dark-logo img-fluid" style="width:300px;height: 93px;"/></b>
                    </a>
                </div>
                
                <div class="navbar-collapse">
                    
                    <ul class="navbar-nav mr-auto mt-md-0">
                        
                        <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted  " href="javascript:void(0)"><i class="mdi mdi-menu"></i></a> </li>
                        <li class="nav-item m-l-10"> <a class="nav-link sidebartoggler hidden-sm-down text-muted  " href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                        <li class="nav-item m-l-10 mt-2"> 
                        <?php 
                                include 'connect.php';
                                // session_start();
                                $user_id = $_SESSION['id'];
                                $sql2 = "SELECT * FROM  admin  where id=$user_id ;";
                                $result2 = $conn->query($sql2);
                               
                                while($row = $result2->fetch_assoc()) { 
                                ?>
                            <h1 style="color: #135297"><?php echo $row['lname'].' '.$row['fname']; ?></h1>

<?php } ?>
                        </li>
                    </ul>
                    
                    <ul class="navbar-nav my-lg-0">

                    
                        
                        <li class="nav-item dropdown">
                            <a class="  " href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?php 
                                $sql = "select * from admin where id = '".$_SESSION["id"]."'";
                                $query=$conn->query($sql);
                                while($row=mysqli_fetch_array($query))
                                    {
                                     
                                      extract($row);
                                      $fname = $row['fname'];
                                      $lname = $row['lname'];
                                      $email = $row['email'];
                                      $contact = $row['contact'];
                                      $dob1 = $row['dob'];
                                      $gender = $row['gender'];
                                      $image = $row['image'];
                                    }
                                                                    ?>
                                 <i class="fa fa-user-circle fa-4x" aria-hidden="true"></i>
                                 <!--  <img src="img/logo.png" alt="user" class="profile-pic"  /></a> -->
                      
                                <div class="dropdown-menu dropdown-menu-right animated zoomIn">
                                <ul class="dropdown-user">
                                    <li style="color: #135297"><a href="profile.php"><i class="ti-user"></i> Profile</a></li>
                                   
                                     <!-- <li><a href="changepassword.php"><i class="ti-key"></i> Changed Password</a></li> -->
                                  
                                    <li style="color: #135297"><a href="logout.php"><i class="fa fa-power-off"></i> Déconnecter</a></li>
                                </ul>
                            </div>
                            
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
       
        <?php } ?>