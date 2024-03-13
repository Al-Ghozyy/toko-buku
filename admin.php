<?php

require "config.php";
// susunan mysqli_query = variabel koneksi, query
 $query = "SELECT kategori.nama_kategori, berita.* FROM berita INNER JOIN kategori ON berita.kategori_id = kategori.id";
 $berita = mysqli_query($connect, $query);
// Hasilnya adalah Array Asosiatif (Key => Value)
// var_dump(mysqli_fetch_assoc($kategori));
// mysqli_fetch_assoc( $kategori );
// Hasilnya adalah Array Numeric
// var_dump(mysqli_fetch_row($kategori));
// mysqli_fetch_array();
// var_dump($kategori);
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Manage News</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
  <div class="container">
    <h3 class="mt-5 fw-bold">Aplikasi Manajemen Buku</h3>
    <p>&copy;Copyright by Bambang @2023</p>
    <div class="row mt-5">
      <div class="col-md-3">
        <h5 class="fw-bold">Main Menu</h5>
        <ul>
        <a href=""></a>
        <li>Index</li>
        </ul>
        <ul>
        <a href=""></a>
        <li>Admin</li>
        </ul>
        <ul>
        <a href=""></a>
        <li>Pegadaan</li>
        </ul>
      </div>
      <div class="col-md-9">
        <!-- <a href="tambah.php">
          <button class="btn btn-primary btn-sm float-end">
            <i class="fa fa-circle-plus me-1"></i>Tambah Data</button>
        </a> -->
        <h4 class="fw-bold ">Data Buku</h4>
        <table class="table mt-4">
          <thead class="table-dark">
            <tr>
              <th scope="col">#</th>
              <th scope="col">Kategori</th>
              <th scope="col">Nama Buku</th>
              <th scope="col">Harga</th>
              <th scope="col">Stok</th>
              <th scope="col">Penerbit</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <?php
            $no = 1;
            foreach ($berita as $gori) {
            ?>
            <tr>
              <th scope="row"><?= $no++ ?></th>
              <td><?= $gori["judul"] ?></td>
              <td><?= $gori["nama_kategori"] ?></td>
              <td class=""><?php

              if (strlen($gori["deskripsi"]) > 100) {
            
                echo substr($gori["deskripsi"]. 0, 100) . " [....]";
              } else {
                echo $gori["deskripsi"];
              }
              ?>
                <a href="detail.php?id=<?= $gori["id"] ?>" type="button" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Detail">
                  <button class="btn btn-sm btn-info">
                    <i class="fa fa-eye"></i>
                  </button>
                </a>
                <a href="edit.php?id=<?= $gori["id"] ?>" type="button" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Edit">
                  <button class="btn btn-sm btn-warning">
                    <i class="fa fa-pencil-square"></i>
                  </button>
                </a>
                <a href="hapus.php?id=<?= $gori["id"] ?>" onclick="return confirm('Apakah anda yakin data ini akan dihapus ?')" type="button" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Hapus">
                  <button class="btn btn-sm btn-danger">
                    <i class="fa fa-trash"></i>
                  </button>
                </a>
              </td>
            </tr>
            <?php
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <!-- Fontawesome -->
  <script src="https://kit.fontawesome.com/1362f867b8.js" crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/6f420dea23.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
  </script>
  <!-- Popper -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
    integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
  </script>
  <script>
  const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
  const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
  </script>
</body>

</html>