<?php
include('koneksi.php'); //agar index terhubung dengan database, maka koneksi sebagai penghubung harus di include

?>
<!DOCTYPE html>
<html>

<head>
    <title>LK31</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <style type="text/css">
    * {
        font-family: "Trebuchet MS";
    }

    h1 {
        text-transform: uppercase;
        color: salmon;
    }

    button {
        background-color: dodgerblue;
        color: #fff;
        padding: 10px;
        text-decoration: none;
        font-size: 12px;
        border: 0px;
        margin-top: 20px;
    }

    label {
        margin-top: 10px;
        float: left;
        text-align: left;
        width: 100%;
    }

    input {
        padding: 6px;
        width: 100%;
        box-sizing: border-box;
        background: #f8f8f8;
        border: 2px solid #ccc;
        outline-color: salmon;
    }

    div {
        width: 100%;
        height: auto;
    }

    .base {
        width: 400px;
        height: auto;
        padding: 20px;
        margin-left: auto;
        margin-right: auto;
        background: #ededed;
    }
    </style>
</head>

<body class="">
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
    <br>
    <form method="POST" action="proses_tambah_film.php" enctype="multipart/form-data">
        <section class="base">
            <div>
                <label>title</label>
                <input type="text" name="title" autofocus="" required="" />
            </div>
            <div>
                <label>durasi</label>
                <input type="text" name="durasi" />
            </div>
            <div>
                <label>Rating</label>
                <input type="text" name="rating" />
            </div>

            <div>
                <label>genre</label>
                <select class="form-control" name="id_genre">
                    <option>pilih</option>

                    <?php
                    $query = "SELECT * FROM Genre";
                    $result = mysqli_query($koneksi, $query);
                    print_r($result);
                    while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <option value="<?= $row['id'] ?>"><?= $row['name'] ?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
            <div>
                <label>writer</label>
                <select class="form-control" name="id_writer">
                    <option>pilih</option>

                    <?php
                    $query = "SELECT * FROM Writer";
                    $result = mysqli_query($koneksi, $query);
                    print_r($result);
                    while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <option value="<?= $row['id'] ?>"><?= $row['name'] ?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
            <div>
                <label>director</label>
                <select class="form-control" name="id_director">
                    <option>pilih</option>

                    <?php
                    $query = "SELECT * FROM Director";
                    $result = mysqli_query($koneksi, $query);
                    while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <option value="<?= $row['id'] ?>"><?= $row['name'] ?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
            </div>
            <div>
                <label>Deskripsi</label>
                <input type="text" name="deskripsi" />
            </div>

            <div>
                <label>photo</label>
                <input type="file" name="photo" required="" />
            </div>
            <div>
                <button type="submit">Simpan Produk</button>
            </div>
        </section>
    </form>
</body>

</html>