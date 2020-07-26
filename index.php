<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Lovely Metal</title>
  </head>
  <body>

    <!-- Navbar -->
      <nav class="navbar navbar-expand-sm navbar-light bg-light">
        <a class="navbar-brand" href="#">LOVELY METAL</a>
        <h5 style="margin-right: 20px;"> Beranda </h5>
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
                <a class="dropdown-item" href="masuk.php">Barang Masuk</a>
                <a class="dropdown-item" href="keluar.php">Barang Keluar</a>
              </div>
            </li>
          </ul>

          <form class="form-inline my-2 my-lg-0" method="post">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="nt">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="submit">Search</button>
        
        </div>
      </nav>

    <!-- Tabel -->
        <table class="table table-bordered">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Nama</th>
          <th scope="col">Merk</th>
          <th scope="col">Model</th>
          <th scope="col">Kuantitas</th>
        </tr>
      </thead>

      <tbody id="myTable">
        
        <?php 
        include 'koneksi.php';
        if(!ISSET($_POST['submit'])){
        $sepeda = mysqli_query($koneksi, "SELECT * FROM masuk");
        $awok = mysqli_query($koneksi, "SELECT masuk.qty-keluar.qty as hasil FROM masuk join keluar on masuk.nama=keluar.nama");
       
        $nomor = 1;
        while($data = mysqli_fetch_array($sepeda)){
        ?>
        <tr>
          <td><?php echo $nomor++; ?></td>
          <td><?php echo $data['nama']; ?></td>
          <td><?php echo $data['merk']; ?></td>
          <td><?php echo $data['model']; ?></td>
          <td><?php echo $data1 = mysqli_fetch_array($awok)['hasil']; ?></td>
        </tr>
        <?php 
        } 
      }
        if(ISSET($_POST['submit'])){
        $cari = $_POST['nt'];
        $sepeda = mysqli_query($koneksi, "SELECT * FROM masuk where nama like '%$cari%'");
        $awok = mysqli_query($koneksi, "SELECT masuk.qty-keluar.qty as hasil FROM masuk join keluar on masuk.nama=keluar.nama");
        
        $nomor = 1;
        while($data = mysqli_fetch_array($sepeda)){
        ?>
        <tr>
          <td><?php echo $nomor++; ?></td>
          <td><?php echo $data['nama']; ?></td>
          <td><?php echo $data['merk']; ?></td>
          <td><?php echo $data['model']; ?></td>
          <td><?php echo $data1 = mysqli_fetch_array($awok)['hasil']; ?></td>
        </tr>
        <?php
        }
      }
        ?>
        
      </tbody>
    </table>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>