<?php
include('koneksi.php'); //agar index terhubung dengan database, maka koneksi sebagai penghubung harus di include
?>
<!DOCTYPE html>
<html>

<head>
    <title>LK31</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <style>
    * {

        font-family: "Trebuchet MS";
    }

    h1 {
        text-transform: uppercase;
        color: salmon;
    }

    .checked {
        color: orange;
    }
    </style>
</head>

<body style="color: black">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-link" href="index.php">
            <h3><span style="color: darkgoldenrod">LK31</span></h3>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="tambah_film.php">add film <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="tambah_genre.php">add genre <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="tambah_director.php">add director <span
                            class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="tambah_writer.php">add writer <span class="sr-only">(current)</span></a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="jumbotron bg-light">
        <div class="container">
            <div class="row">
                <?php
                # jalankan query untuk menampilkan semua data 
                $result = mysqli_query($koneksi, $query);
                # mengecek apakah ada error ketika menjalankan query
                if (!$result) {
                    die("Query Error: " . mysqli_errno($koneksi) .
                        " - " . mysqli_error($koneksi));
                }


                # cetak dengan perulangan while
                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <div class="col-sm-6 col-md-4 col-lg-3 mt-3">
                    <div class="card border-dark mb-3">
                        <img class="card-img-top" <img src="gambar/<?php echo $row['photo']; ?>"
                            style="max-height: 270px;">
                        <div class="card-block">
                            <p class="card-title"> <span class="fa fa-star checked"></span>
                                <span><?php echo $row['rating']; ?></span></p>
                            <p class="card-title"><?php echo $row['title']; ?></p>

                        </div>

                        <div class="card-footer">
                            <a class="btn btn-warning btn-sm" href="detail.php?id=<?php echo $row['id']; ?>">detail</a>
                        </div>
                    </div>
                </div>


                <?php
                }
                ?>
            </div>
        </div>
    </div>

</body>

</html>