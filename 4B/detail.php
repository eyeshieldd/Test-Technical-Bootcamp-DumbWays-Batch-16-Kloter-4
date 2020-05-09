<?php
include('koneksi.php'); //agar index terhubung dengan database, maka koneksi sebagai penghubung harus di include
$id = $_GET["id"];
?>

<!DOCTYPE html>
<html>

<head>
    <title>LK21</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <style>
    * {
        font-family: "Trebuchet MS";
    }

    h1 {
        text-transform: uppercase;
        color: salmon;
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
            <h2>Detail Film</h2>
            <table class="table">
                <thead>

                </thead>
                <tbody>
                    <?php
                    # jalankan query untuk menampilkan data berdasarkan id
                    $query = "SELECT a.title, a.durasi, b.name as genre,c.name as writer,d.name as director, a.deskripsi
                                FROM Film AS a
                                LEFT JOIN Genre AS b
                                ON a.id_genre = b.id
                                LEFT JOIN Writer AS c
                                ON a.id_writer = c.id
                                LEFT JOIN Director AS d
                                ON a.id_genre = d.id
                                WHERE a.id = $id";
                    $result = mysqli_query($koneksi, $query);

                    # mengecek apakah ada error ketika menjalankan query
                    if (!$result) {
                        die("Query Error: " . mysqli_errno($koneksi) .
                            " - " . mysqli_error($koneksi));
                    }
                    # perulangan untuk menampilkan data dalam tabel detail
                    while ($row = mysqli_fetch_assoc($result)) {

                    ?>
                    <tr>
                        <td>title :</td>
                        <td><?php echo $row['title']; ?></td>
                    </tr>
                    <tr>
                        <td>durasi :</td>
                        <td><?php echo $row['durasi']; ?></td>
                    </tr>
                    <tr>
                        <td>title :</td>
                        <td><?php echo $row['title']; ?></td>
                    </tr>
                    <tr>
                        <td>genre :</td>
                        <td><?php echo $row['genre']; ?></td>
                    </tr>
                    <tr>
                        <td>writer :</td>
                        <td><?php echo $row['writer']; ?></td>
                    </tr>
                    <tr>
                        <td>deskripsi :</td>
                        <td><?php echo $row['deskripsi']; ?></td>
                    </tr>


                    <?php
                    }
                    ?>

                </tbody>
            </table>
        </div>

    </div>

</body>

</html>