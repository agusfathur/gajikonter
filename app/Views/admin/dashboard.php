<?php 

$namabulan = ['','Januari', 'Februari', 'Maret','April','Mei','Juni','Juli','Agustus',
        'September','Oktober','November','Desember'];
if ((int)date('m')[0] == 0) {
    $bulan = $namabulan[date('m')[0]];
} else {
    $bulan = $namabulan[date('m')];
}
// $bulan = date('m')[0];
// dd($bulan);
// $bulan = $namabulan[date('m')];

?>

<div class="container-fluid">
    <div class="d-flex justify-content-between">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-bottom-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">Data Karyawan</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= count($dataKaryawan); ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-bottom-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">Data Divisi</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= count($dataDivisi); ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-briefcase  fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-bottom-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">Data Admin</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= count($dataAdmin); ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user-gear fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card shadow h-100 py-2" style="background-color: #7DE5ED;">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <h4 class="font-weight-bold text-dark text-uppercase mt-2"><?= date('d-m-Y'); ?></h4>
                        </div>
                        <div class="col-auto">
                            <i class="fa-solid fa-calendar-days fa-2x text-dark"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>


<div class="d-flex justify-content-between">

    <!-- Bar Chart -->
    <div class="col-xl-8 col-lg-7">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-dark">Data Pegawai Kehadiran Karyawan Bulan <?= $bulan.' '.date('Y'); ?></h6>
            </div>
            <!-- Card Body -->
            <div class="card-body" >
                <div class="chart-bar">
                    <canvas id="myBarChart"></canvas>
                </div>
            </div>

        </div>
    </div>
    
    <!-- Pie Chart -->
    <div class="col-xl-4 col-lg-5">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-dark">Data Jenis Kelamin Karyawan</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="chart-pie pt-4 pb-2">
                    <canvas id="myPieChart" ></canvas>
                </div>
                <div class="mt-4 text-center small" style="color: black;">
                    <span class="mr-2">
                        <i class="fas fa-circle text-primary"></i>Laki-laki
                    </span>
                    <span class="mr-2">
                        <i class="fas fa-circle" style="color: #CB1C8D;"></i>Perempuan
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>
    <script src="<?= base_url('js/Chart.js'); ?>"></script>
<script>
var ctx = document.getElementById("myPieChart");
var myPieChart = new Chart(ctx, {
  type: 'doughnut',
  data: {
    labels: ["Laki-laki", "Perempuan"],
    datasets: [{
      data: [ <?= $dataPerempuan; ?>,<?= $dataLaki; ?>,],
      backgroundColor: [ '#CB1C8D','#4e73df', '#36b9cc', '#dddfeb'],
      hoverBackgroundColor: ['#F56EB3', '#2e59d9', '#2c9faf', '#dddfeb'],
      hoverBorderColor: "rgba(234, 236, 244, 1)",
        
    }],
  },
  options: {
    maintainAspectRatio: false,
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      caretPadding: 10,
    },
    legend: {
      display: false
    },
    cutoutPercentage: 80,
  },
});
</script>
<script>
// Area Chart Example
var ctx = document.getElementById("myBarChart");
var myBarChart = new Chart(ctx, {
  type: 'bar',
  data:  {
    labels: [<?php foreach ($absen as $nama) {
        echo '"'.$nama['nama_karyawan'],'",';
    }; ?>],
    datasets : [{
        label: 'Data Kehadiran Karyawan',
        data: [<?php foreach ($absen as $hadir) {
            echo $hadir['hadir'], ',';
        } ?>],
        backgroundColor: ['#3B3486','#FB2576', '#A555EC'],
        
    }],
  },
  options: {
    responsive: true,
    maintainAspectRatio: false,
    scales: {
      yAxes: [{
        ticks: {
          beginAtZero:true
        }
      }]
    },
  }
});
</script>