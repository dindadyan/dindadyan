
<h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card text-white mb-4" style="background-color: rgb(153, 50, 204);">
                                    <div class="card-body">
                                    <?php                                    
                                    echo mysqli_num_rows(mysqli_query($koneksi, "SELECT*FROM kategori"));  
                                    ?>
                                    Total Kategori</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#"></a>
                                        <div class="small text-white"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                            <div class="card text-white mb-4" style="background-color: rgb(139, 0, 140);">
                                    <div class="card-body">
                                    <?php                                    
                                    echo mysqli_num_rows(mysqli_query($koneksi, "SELECT*FROM buku"));  
                                    ?>
                                    Total Buku</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#"></a>
                                        <div class="small text-white"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                            <div class="card text-white mb-4" style="background-color: rgb(128, 0, 128);">
                                    <div class="card-body">
                                    <?php                                    
                                    echo mysqli_num_rows(mysqli_query($koneksi, "SELECT*FROM ulasan"));  
                                    ?>
                                    Total Ulasan</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#"></a>
                                        <div class="small text-white"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                            <div class="card text-white mb-4" style="background-color: rgb(102, 51, 153);">
                                    <div class="card-body">
                                    <?php                                    
                                    echo mysqli_num_rows(mysqli_query($koneksi, "SELECT*FROM user"));  
                                    ?>
                                    Total User</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#"></a>
                                        <div class="small text-white"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <table class="table table-bordered"> 
                                    <tr>
                                    <td width="200">Nama</td>
                                        <td width="1"></td>
                                        <td><?php echo $_SESSION['user']['level']; ?></td>
                                    </tr>
                                    <tr>
                                        <td width="200">Level User</td>
                                        <td width="1"></td>
                                        <td><?php echo $_SESSION['user']['level']; ?></td>
                                    </tr>
                                    <tr>
                                        <td width="200">Tanggal Login</td>
                                        <td width="1"></td>
                                        <td><?php echo date('d-m-Y'); ?></td>
                                    </tr>      
                                </table>
                            </div>
                        </div>
                        <!DOCTYPE html>
<html>
<head>
    <title>Grafik Peminjaman Buku</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>

<?php
// Koneksi ke database (sesuaikan dengan detail koneksi Anda)
$host = 'localhost'; // Host database
$user = 'root'; // Username database
$password = ''; // Password database
$database = 'ukk_perpus'; // Nama database
$koneksi = mysqli_connect($host, $user, $password, $database);

// Periksa koneksi
if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Query untuk mengambil data peminjaman buku
$query = "SELECT tanggal_peminjaman, COUNT(*) as total_peminjaman FROM peminjaman GROUP BY tanggal_peminjaman";
$result = mysqli_query($koneksi, $query);

// Inisialisasi array untuk menyimpan data
$tanggal_peminjaman = [];
$total_peminjaman = [];

while ($row = mysqli_fetch_assoc($result)) {
    $tanggal_peminjaman[] = $row['tanggal_peminjaman'];
    $total_peminjaman[] = $row['total_peminjaman'];
}
?>
<style>
    @media(max-width: 720px) { 
        .chart-container  {
            min-height: 100vh; 
        };
    };
</style>
<div class="x_panel">
    <div class="x_title">
        <h2>Grafik Peminjaman</h2>
        <ul class="nav navbar-right panel_toolbox">
            <li>
                <a class="close-link"><i class="fa fa-close"></i></a>
            </li>
        </ul>
        <div class="clearfix"></div>
    </div>
    <div class="x_content d-flex justify-content-center">
        <div class="chart-container row justify-content-around my-5" style="position: relative; height:40vh; width:80vw">
            <canvas id="myChart"></canvas>
            <canvas id="myPie"></canvas>
        </div>
    </div>
</div>
<!-- Grafik -->
<canvas id="myChart" width="40" height="40"></canvas>

<script>
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: <?php echo json_encode($tanggal_peminjaman); ?>,
            datasets: [{
                label: 'Total Peminjaman Buku',
                data: <?php echo json_encode($total_peminjaman); ?>,
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>

</body>
</html>
