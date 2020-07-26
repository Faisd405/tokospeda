<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Lovely Metal</title>

    <?php
      if(isset($_GET['pesan'])){
        if($_GET['pesan'] == "semua"){
          $message = "Tolong Diisi Lengkap";
          echo "<script type='text/javascript'>alert('$message');</script>";
        }
      }
    ?>
  </head>
  <body>
    
    <!-- Navbar -->
      <nav class="navbar navbar-expand-sm navbar-light bg-light">
        <a class="navbar-brand" href="#">LOVELY METAL</a>
        <h5 style="margin-right: 20px;"> Barang Masuk </h5>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Action
              </a>

              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Barang Masuk</a>
                <a class="dropdown-item" href="keluar.php">Barang Keluar</a>
              </div>
            </li>
          </ul>

                        <!-- Button trigger modal -->
              <button style="margin-right: 10px;" type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#exampleModalCenter">
                Barang Masuk
              </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalCenterTitle">Barang Masuk</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                        <div class="modal-body">

                          <!-- Form Modal -->
                          <form action="updatemasuk.php" method="post">
                            <div class="form-row">
                              <div class="form-group col-md-6">
                                <label for="nama">Nama Sepeda</label>
                                <!-- NAMA SEPEDA -->
                                <select id="nama" class="form-control" name="namaspeda" onchange="autofill(this.value), autofillm(this.value)">
                                  <option selected>Nama Sepeda</option>

                                  <?php
                                  include 'koneksi.php';
                                  $sepeda = mysqli_query($koneksi, "SELECT * FROM masuk");
                                  while($data = mysqli_fetch_array($sepeda)){
                                  ?>
                                    <option value="<?php echo $data['nama']; ?>"><?php echo $data['nama']; ?></option>
                                  <?php
                                    }
                                  ?>  
                                </select>
                              </div>

                              <!-- MODEL SEPEDA ANJIR KOK BARANG -->
                              <!-- Model Pake Autofill -->
                              <div class="form-group col-md-6">
                                <label for="model">Model Barang</label>
                                <select id="model" class="form-control" name="modelspeda">
                                  <option selected disabled="">Model Barang</option>
                                  <option id="autofillmodels"></option>
                                </select>
                              </div>
                            </div>
                            <div class="form-row">
                              <div class="form-group col-md-6">
                                <label for="tgl">Tanggal Barang Masuk</label>
                                <input type="date" class="form-control" id="tgl" name="tglspeda">
                              </div>
                              <div class="form-group col-md-4">
                                <label for="merk">Merk</label>
                                <select id="merk" class="form-control" name="merkspeda">
                                  <option selected disabled="">Choose...</option>
                                  <option id="autofillmerk"></option>
                                </select>
                              </div>
                                <div class="form-group col-md-2">
                                <label for="qty">Qty</label>
                                <input type="number" class="form-control" id="qty" name="qtyspeda">
                              </div>
                            </div>

                          
                      </div>
                    <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Save changes</button>
                  </form>
                </div>
              </div>
            </div>
          </div>

          <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
          </form>
        </div>
      </nav>

    <!-- Tabel -->
    <table class="table table-bordered">
  <thead style="text-align: center;">
    <tr>
      <th scope="col">No</th>
      <th scope="col">Nama</th>
      <th scope="col">Merk</th>
      <th scope="col">Model</th>
      <th scope="col">Kuantitas</th>
      <th scope="col">Tanggal Barang Masuk</th>
      <th scope="col">Tanggal Input Data</th>
    </tr>
  </thead>
  <tbody>
    <tr>
        <?php 
        include 'koneksi.php';
        $sepeda = mysqli_query($koneksi, "SELECT * FROM masuk");
        $nomor = 1;
        while($data = mysqli_fetch_array($sepeda)){
        ?>
        <tr>
          <td><?php echo $nomor++; ?></td>
          <td><?php echo $data['nama']; ?></td>
          <td><?php echo $data['merk']; ?></td>
          <td><?php echo $data['model']; ?></td>
          <td><?php echo $data['qty']; ?></td>
          <td><?php echo $data['tgl']; ?></td>
          <td><?php echo $data['time']; ?></td>

        </tr>
        <?php } ?>
    </tr>
  </tbody>
</table>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    <!-- Autofill Javascript Modals -->
    <script>
      function autofill(str) {
        var xhttp;
        if (str == "") {
          document.getElementById("autofillmodels").innerHTML = "";
          return;
        }
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
          document.getElementById("autofillmodels").innerHTML = this.responseText;
          }
        };
        xhttp.open("GET", "autofillmodelmasuk.php?q="+str, true);
        xhttp.send();
      }
      function autofillm(str) {
        var xhttp;
        if (str == "") {
          document.getElementById("autofillmerk").innerHTML = "";
          return;
        }
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
          document.getElementById("autofillmerk").innerHTML = this.responseText;
          }
        };
        xhttp.open("GET", "autofillmerkmasuk.php?q="+str, true);
        xhttp.send();
      }
      
    </script>
  </body>
</html>