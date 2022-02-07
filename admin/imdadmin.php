<?php
include('../mainincludeofindex/dbconnection.php');
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
                <a href="imdadmin.php" class="list-group-item list-group-item-action bg-transparent second-text active"><i
                        class="fas fa-tachometer-alt me-2"></i>IMD Dashboard</a>
                <a href="mydashboard.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
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
                                <h3 class="fs-2"><?php
                                $sql = "SELECT * FROM publication WHERE status='Submitted'";
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
                                $sql = "SELECT * FROM publication WHERE status='Accepted'";
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
                                $sql = "SELECT * FROM publication WHERE status='published'";
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
                                $sql = "SELECT * FROM publication";
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
                             <thead >
                                <tr>
                                    <th scope="col">S.No</th>
                                    <th scope="col">Author-Name</th>
                                    <th scope="col">Title of the Research Paper</th>
                                    <th scope="col">Journal</th>
                                    <th scope="col">Month-Year, Volume, PageNo.</th>
                                    <th scope="col">Impact Factor</th>
                                    <th scope="col">DOI Number</th>
                                    <th scope="col">Status(submitted/accepted/Published)</th>
                               </tr>
                             </thead>
                             <tbody>
                               <?php
                                  $sql = "SELECT * FROM publication";
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
                                         <td>". $row['month'] ."-". $row['year'] .",". $row['volume'] .",". $row['pageno'] ."</td>
                                         <td>". $row['impactfactor'] ."</td>
                                         <td>". $row['doi'] ."</td>
                                         <td>". $row['status'] ."</td>
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
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>

var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Submitted', 'Accepted', 'Published'],
        datasets: [{
            label: '',
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