<?php
include('../mainincludeofindex/dbconnection.php');
$showalert=1;
$delete=false;
if(isset($_POST['update']))
{
    $sno=$_POST['usno'];
    $name=$_POST["uname"];
    $title=$_POST["utitle"];
    $journal=$_POST["ujournal"];
    $month=$_POST["umonth"];
    $year=$_POST["uyear"];
    $volume=$_POST["uvolume"];
    $pageno=$_POST["upageno"];
    $impactfactor=$_POST["uimpactfactor"];
    $doi=$_POST["udoi"];
    $status=$_POST["ustatus"];

    $existssql="SELECT * FROM publication WHERE title='$title'";
    $result=mysqli_query($conn,$existssql);
    $row=mysqli_num_rows($result);
    if($row>0)
    {
      $showalert=2;  
    }
    else{ 

    $sql = "UPDATE `publication` SET `name`='$name', `title`='$title', `journal`='$journal', `month`='$month', `year`='$year', `volume`='$volume' `pageno`='$pageno', `impactfactor`='$impactfactor', `doi`='$doi', `status`='$status' WHERE `publication`.`sno`='$sno'";
    $result = mysqli_query($conn, $sql);
    if($result)
    {
        $showalert=3;
    }
    }
}
if(isset($_POST['delete']))
{
    $sno=$_POST["dsno"];

    $sql= "DELETE FROM publication WHERE publication.sno='$sno'";
    $result = mysqli_query($conn, $sql);
    if($result)
    {
        $delete=true;
    }
    
}
?>
<!-- header start -->
<?php
include("header.php");
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
                <a href="mydashboard.php" class="list-group-item list-group-item-action bg-transparent second-text active"><i
                        class="fas fa-tachometer-alt me-2"></i>My Dashboard</a>
                <a href="submitpublication.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
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
                    <h2 class="fs-2 m-0">Dashboard</h2>
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
                <div class="row g-3 my-2">
                    <div class="col-md-3">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2">
                                <?php
                                $email=$_SESSION["useremail"];
                                $sql = "SELECT * FROM publication WHERE status='Submitted' AND email='$email'";
                                $result = mysqli_query($conn, $sql);
                                $num =mysqli_num_rows($result);
                                $arr[0] = array($num);
                                echo $num;
                                ?>
                                </h3>
                                <p class="fs-5">Submitted</p>
                            </div>
                            <i class="fas fa-regular fa-file fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2">
                                <?php
                                $email=$_SESSION["useremail"];
                                $sql = "SELECT * FROM publication WHERE status='Accepted' AND email='$email'";
                                $result = mysqli_query($conn, $sql);
                                $num =mysqli_num_rows($result);
                                $arr[1] = array($num);
                                echo $num;
                                ?>
                                </h3>
                                <p class="fs-5">Accepted</p>
                            </div>
                            <i
                                class="fas fa-regular fa-file fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2">
                                <?php
                                $email=$_SESSION["useremail"];
                                $sql = "SELECT * FROM publication WHERE status='Published' AND email='$email'";
                                $result = mysqli_query($conn, $sql);
                                $num =mysqli_num_rows($result);
                                $arr[2] = array($num);
                                echo $num;
                                ?>
                                </h3>
                                <p class="fs-5">Published</p>
                            </div>
                            <i class="fas fa-regular fa-file fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2">
                                <?php
                                $email=$_SESSION["useremail"];
                                $sql = "SELECT * FROM publication WHERE email='$email'";
                                $result = mysqli_query($conn, $sql);
                                $num =mysqli_num_rows($result);
                                echo $num;
                                ?>
                                </h3>
                                <p class="fs-5">Total</p>
                            </div>
                            <i class="fas fa-thin fa-book fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>
                    <?php
                       if($showalert==2){ 
                        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Type unique title!</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
                       }
                       if($showalert==3){ 
                         echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                         <strong>Successfully Updated!</strong>
                         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                         </div>';
                        }
                        if($delete){ 
                            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Successfully Deleted!</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>';
                           }
                    ?>
                    <div class="d-flex align-items-center">
                    <h2 class="fs-2 m-0">Status</h2>
                    </div>
                    <div class="col-md-6">
                    <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                    
                    <canvas id="myChart" width="400" height="400"></canvas>
                    </div>
                    
                    </div>
                    <div class="col-md-6">
                    <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                    
                    <canvas id="myChart1" width="400" height="400"></canvas>
                    </div>
                    
                    </div>
                </div>

                <div class="row my-5">
                    <h3 class="fs-4 mb-3">Records</h3>
                    <div class="col table-responsive">
                    <table class="table table-striped table-hover table-bordered align-middle" id="myTable">
                             <thead>
                                <tr>
                                    <th scope="col">S.No</th>
                                    <th scope="col">Author-Name</th>
                                    <th scope="col">Title of the Research Paper</th>
                                    <th scope="col">Journal</th>
                                    <th scope="col">Month</th>
                                    <th scope="col">Year</th>
                                    <th scope="col">Volume</th>
                                    <th scope="col">PageNo.</th>
                                    <th scope="col">Impact Factor</th>
                                    <th scope="col">DOI Number</th>
                                    <th scope="col">Status(submitted/accepted/Published)</th>
                                    <th scope="col">Actions</th>
                               </tr>
                             </thead>
                             <tbody>
                               <?php
                                  $email=$_SESSION["useremail"];
                                  $sql = "SELECT * FROM publication WHERE email='$email'";
                                  $result = mysqli_query($conn, $sql);
                                  $sno=1;
                                  while($row = mysqli_fetch_assoc($result))
                                    {
                                    echo 
                                        "<tr>
                                         <th scope='row'>". $sno ."</th>
                                         <td>". $row['name'] ."</td>
                                         <td>". $row['title'] ."</td>
                                         <td>". $row['journal'] ."</td>
                                         <td>". $row['month'] ."</td>
                                         <td>". $row['year'] ."</td>
                                         <td>". $row['volume'] ."</td>
                                         <td>". $row['pageno'] ."</td>
                                         <td>". $row['impactfactor'] ."</td>
                                         <td>". $row['doi'] ."</td>
                                         <td>". $row['status'] ."</td>
                                         <td><button class='edit btn btn-sm' data-toggle='tooltip' title='Update'><i id=".$row['sno']." class='fas fa-pen fs-10 primary-text border rounded-full secondary-bg p-1'></i></button><button class='delete btn btn-sm' data-toggle='tooltip' title='Delete'><i id=d".$row['sno']." class='far fa-trash-alt fs-10 primary-text border rounded-full secondary-bg p-1'></i></button></td>
                                        </tr>";
                                        $sno++;
                                    } 
                               ?>
                            </tbody>
                       </table> 
                    </div>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->
        <!--  update modal start -->
    
        <?php
        include("./updatemodal.php");
        ?>
        <!-- update modal end-->
        </div>
        <!-- /#page-content-wrapper -->
        <!-- delete modal start-->
        <?php
        include("./deletemodal.php");
        ?>
        <!-- delete modal end-->
    </div>
    
    </div>
    <script>
    edits = document.getElementsByClassName('edit');
    Array.from(edits).forEach((element)=>{
        element.addEventListener("click",(e)=>{
            console.log("edit", );
            let tr = e.target.parentNode.parentNode.parentNode;
            nam = tr.getElementsByTagName("td")[0].innerText;
            title = tr.getElementsByTagName("td")[1].innerText;
            journal = tr.getElementsByTagName("td")[2].innerText;
            month = tr.getElementsByTagName("td")[3].innerText;
            year = tr.getElementsByTagName("td")[4].innerText;
            volume = tr.getElementsByTagName("td")[5].innerText;
            pageno = tr.getElementsByTagName("td")[6].innerText;
            impactfactor = tr.getElementsByTagName("td")[7].innerText;
            doi = tr.getElementsByTagName("td")[8].innerText;
            status = tr.getElementsByTagName("td")[9].innerText;
            uname.value = nam;
            utitle.value = title;
            ujournal.value = journal;
            umonth.value = month;
            uyear.value = year;
            uvolume.value = volume;
            upageno.value = pageno;
            uimpactfactor.value = impactfactor;
            udoi.value = doi;
            ustatus.value = status;
            usno.value = e.target.id;
            $('#updatemodal').modal('toggle');
        });
    });
</script>
<script>
    deletes = document.getElementsByClassName('delete');
    Array.from(deletes).forEach((element)=>{
        element.addEventListener("click",(e)=>{
            console.log("delete", );
            dsno.value = e.target.id.substr(1,);
            $('#deletemodal').modal('toggle');
        });
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>

var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Submitted', 'Accepted', 'Published'],
        datasets: [{
            label: 'Publication',
            data: <?php echo json_encode($arr); ?>,
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)'
            ],
            borderWidth: 1,
            hoverBorderWidth:3,
            hoverBorderColor: '#000'
        }]
    }
});
var ctx = document.getElementById('myChart1').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'pie',
    data: {
        labels: ['Submitted', 'Accepted', 'Published'],
        datasets: [{
            label: '# of Votes',
            data: <?php echo json_encode($arr); ?>,
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)'
            ],
            borderWidth: 1,
            hoverBorderWidth:3,
            hoverBorderColor: '#000'
        }]
    }
});
</script>

<!-- footer start -->
<?php
include("footer.php");
?>
<!-- footer end -->