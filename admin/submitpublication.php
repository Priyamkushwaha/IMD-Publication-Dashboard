<!-- header start -->
<?php
include("header.php");

$showalert=1;
if(isset($_POST["add"]))
{
    include('../mainincludeofindex/dbconnection.php');
    $name=$_POST["name"];
    $title=$_POST["title"];
    $journal=$_POST["journal"];
    $month=$_POST["month"];
    $year=$_POST["year"];
    $volume=$_POST["volume"];
    $pageno=$_POST["pageno"];
    $impactfactor=$_POST["impactfactor"];
    $doi=$_POST["doi"];
    $status=$_POST["status"];
    $email=$_SESSION["useremail"];

    $existssql="SELECT * FROM publication WHERE title='$title'";
    $result=mysqli_query($conn,$existssql);
    $row=mysqli_num_rows($result);
    if($row>0)
    {
      $showalert=2;  
    } 
    else{
    $sql="INSERT INTO `publication` ( `name`, `title`, `journal`, `month`, `year`, `volume`, `pageno`, `impactfactor`, `doi`, `status`, `email`) VALUES ( '$name', '$title', '$journal','$month','$year','$volume', '$pageno', '$impactfactor', '$doi', '$status', '$email')";
    $result= mysqli_query($conn,$sql);
    if($result)
      {
        $showalert=3; 
      }
    }
}
?>
<!-- header end -->
<div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div class="bg-white" id="sidebar-wrapper">
            <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom"><i
                    class="fas fa-user-secret me-2"></i>IMD Admin</div>
            <div class="list-group list-group-flush my-3">
                <a href="imdadmin.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-tachometer-alt me-2"></i>IMD Dashboard</a>
                <a href="mydashboard.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-tachometer-alt me-2"></i>My Dashboard</a>
                <a href="submitpublication.php" class="list-group-item list-group-item-action bg-transparent second-text active"><i
                        class="fas fa-regular fa-upload me-2"></i>Submit Publication</a>
                <a href="logout.php" class="list-group-item list-group-item-action bg-transparent text-danger fw-bold"><i
                        class="fas fa-power-off me-2"></i>Logout</a>
            </div>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                <div class="d-flex align-items-center">
                    <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
                    <h2 class="fs-2 m-0">Publication</h2>
                </div>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle second-text fw-bold" href="#" id="navbarDropdown"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-user me-2"></i>Welcome-<?php echo $_SESSION["username"] ?>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#">Profile</a></li>
                                <li><a class="dropdown-item" href="#">Settings</a></li>
                                <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>

            <div class="container-fluid px-4">
                    <?php
                       if($showalert==2){ 
                         echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                         <strong>Type unique title!</strong>
                         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                         </div>';
                        }
                        if($showalert==3){ 
                            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Successfully created!</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>';
                           }
                    ?>
                     
                    <div class="row my-5 col-sm-8 mx-3 jumbotron">
                        <h3 class="fs-4 mb-3">Enter Details</h3>
                        <div class="col">
                      
                        <form class="row g-3" action="/imd/admin/submitpublication.php" method="post">
                           <div class="col-md-6">
                               <label for="name" class="form-label">Name</label>
                               <input type="text" class="form-control" id="name" name="name" required>
                           </div>
                           <div class="col-md-6">
                               <label for="title" class="form-label">Title of the Research Paper</label>
                               <input type="text" class="form-control" id="title" name="title" required>
                           </div>
                           <div class="col-12">
                               <label for="journal" class="form-label">Journal</label>
                               <input type="text" class="form-control" id="journal" name="journal" required>
                           </div>
                           <div class="col-3">
                               <label for="month" class="form-label">Month</label>
                               <input type="text" class="form-control" id="month" name="month" required>
                           </div>
                           <div class="col-3">
                               <label for="year" class="form-label">Year</label>
                               <input type="text" class="form-control" id="year" name="year" required>
                           </div>
                           <div class="col-3">
                               <label for="volume" class="form-label">Volume</label>
                               <input type="text" class="form-control" id="volume" name="volume" required>
                           </div>
                           <div class="col-3">
                               <label for="pageno" class="form-label">PageNo.</label>
                               <input type="text" class="form-control" id="pageno" name="pageno" required placeholder="Start-End">
                           </div>
                           <div class="col-md-6">
                               <label for="impactfactor" class="form-label">Impact Factor</label>
                               <input type="text" class="form-control" id="impactfactor" name="impactfactor" required>
                           </div>
                           <div class="col-md-6">
                               <label for="status" class="form-label">Status</label>
                               <select id="status" class="form-select"  name="status" required>
                               <option selected value="">Choose...</option>
                               <option value="submitted">Submitted</option>
                               <option value="accepted">Accepted</option>
                               <option value="published">Published</option>
                               </select>
                           </div>
                           <div class="col-12">
                           <label for="doi" class="form-label">DOI Number</label>
                           <input type="text" class="form-control" id="doi" name="doi" required>
                           </div>
                           <div class="col-12">
                           <button type="submit" class="btn btn-primary" name="add">Add</button>
                            </div>
                        </form>
                    
                    </div>
                </div>
            </div>
        </div>
         <!-- /#page-content-wrapper -->
</div>

<!-- footer start -->
<?php
include("footer.php")
?>
<!-- footer end -->