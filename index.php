<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Arsip Surat</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin - v2.1.0
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <span class="d-none d-lg-block">Arsip</span>
      </a>
    </div>

  </header>
  <!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="index.php">
          <i class="bi bi-star"></i>
          <span>Arsip</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="about.php">
          <i class="bi bi-exclamation-triangle"></i>
          <span>About</span>
        </a>
      </li>

    </ul>

  </aside>
  <!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Arsip Surat</h1>
      <p class="breadcrumb">
        Berikut ini adalah surat-surat yang telah terbit dam diarsipkan
        Klik "Lihat" pada kolom aksi untuk menampilkan surat
      </p>
      <!-- <div class="search-bar"> -->
        <div class="search-form d-flex align-items-center" >
        <h6>Cari surat: &nbsp;</h6>
          <input type="text" name="cari" id="cari" placeholder="Search" title="Enter search keyword">
          <button title="Search" onclick="myFunction()">Cari</button>
</div>

        <script>
          function myFunction() {
            // Declare variables
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("cari");
            filter = input.value.toUpperCase();
            table = document.getElementById("arsiptabel");
            tr = table.getElementsByTagName("tr");

            // Loop through all table rows, and hide those who don't match the search query
            for (i = 0; i < tr.length; i++) {
              td = tr[i].getElementsByTagName("td")[1];
              if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                  tr[i].style.display = "";
                } else {
                  tr[i].style.display = "none";
                }
              }
            }
          }
        </script>
      <!-- </div> -->
    </div><!-- End Page Title -->
    

    <section class="section dashboard">
      <div class="row">
      
        <!-- Left side columns -->
          <div class="row">
            <!-- Table -->
            <div class="col-12">
              <div class="card top-selling">
                <div class="card-body pb-0">
                  <br>
                  <table id="arsiptabel" class="table table-borderless">
                    <thead>
                      <tr>
                        <th scope="col">Nomor Surat</th>
                        <th scope="col">Kategori</th>
                        <th scope="col">Judul</th>
                        <th scope="col">Waktu Pengarsipan</th>
                        <th scope="col">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                      require_once('koneksi.php');

                        $sql = "SELECT * FROM surat";
                        $res = mysqli_query($con,$sql);
                        $result = array();

                        while($row = mysqli_fetch_array($res)){
                    ?>
                      <tr>
                        <th><?php echo $row['nomor']?></th>
                        <td><?php echo $row['kategori']?></td>
                        <td><?php echo $row['judul']?></td>
                        <td><?php echo $row['waktu']?></td>
                        <td>
                          <a onClick="javascript: return confirm('Apakah Anda yakin ingin menghapus surat ini?');" href="delete.php?id=<?php echo $row['id']?>"><button class="btn-danger">Hapus</button></a>
                          <a href="<?php echo $row['file']?>"><button class="btn-warning">Unduh</button></a>
                          <a href="lihat.php?id=<?php echo $row['id']?>"><button class="btn-primary">Lihat >></button></a>
                        </td>
                      </tr>
                    <?php
                        }
                    ?>
                    </tbody>
                  </table>

                </div>

              </div>
            </div><!-- End Top Selling -->
            <div class="text-left">
              <a href="unggah.php"><button>Arsipkan surat</button></a>
            </div>
        </div><!-- End Left side columns -->

       
      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>NiceAdmin</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
      Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/chart.js/chart.min.js"></script>
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>