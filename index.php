<?php
/*if(empty($_SERVER['HTTPS']) || $_SERVER['HTTPS'] == "off"){
    $redirect = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    header('HTTP/1.1 301 Moved Permanently');
    header('Location: ' . $redirect);
    exit();
}*/
include 'functions.php';
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description"
        content="Demo source code dengan E-Voting pemilihan umum berbasis web dengan PHP dan MySQL." />
    <meta name="keywords"
        content="E-Voting, Pemilihan Umum, Pemilihan Kepala Desa, Tugas Akhir, Skripsi, Jurnal, Source Code, PHP, MySQL, CSS, JavaScript, Bootstrap, jQuery" />
    <meta name="author" content="sarjanakomedi.com" />
    <link rel="icon" href="assets/images/favicon1.ico" />
    <link rel="canonical" href="http://sarjanakomedi.com/demo/evoting/" />

    <title>Pemilihan Ketua BEM TA 2023</title>
    <link href="assets/css/journal-bootstrap.min.css" rel="stylesheet" />
    <link href="assets/css/general.css" rel="stylesheet" />
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container">
        <header style="background: url(header02.png); height: 300px;">
            <div class="row">
                <div class="col-md-3">

                </div>
                <div class="col-md-6"></div>
                <div class="col-md-3"></div>
            </div>
        </header>
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                        aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="?">E-Voting BEM</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <?php if ($_SESSION['level'] !== 'admin') : ?>
                        <li><a href="?m=pilkada"><span class="glyphicon glyphicon-calendar"></span> Pemilu</a></li>
                        <li><a href="?m=tanda_terima"><span
                                    class="glyphicon glyphicon-glyphicon glyphicon-cloud"></span> login pemilih</a></li>
                        <li><a href="?m=daftar_peserta"><span
                                    class="glyphicon glyphicon-glyphicon glyphicon-user"></span> Calon Ketua</a></li>

                        <?php endif ?>

                        <?php if ($_SESSION['level'] != 'admin' || !$_SESSION['login']) : ?>
                        <li><a href="?m=login"><span class="glyphicon glyphicon-lock"></span> Panitia</a>
                        </li>
                        <?php endif ?>
                        <?php if ($_SESSION['level'] == 'admin') : ?>
                        <li><a href="?m=pencalon"><span class="glyphicon glyphicon-user"></span> Pencalon</a></li>
                        <li><a href="?m=pemilih"><span class="glyphicon glyphicon-th-large"></span> Pemilih</a></li>
                        <li><a href="?m=hasil_voting"><span
                                    class="glyphicon glyphicon-glyphicon glyphicon-signal"></span> Hasil Voting</a></li>
                        <?php endif ?>

                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <?php if ($_SESSION['login']) : ?>
                        <li><a href="?m=password"><span class="glyphicon glyphicon-lock"></span> Password</a></li>
                        <li><a href="aksi.php?act=logout"><span class="glyphicon glyphicon-log-out"></span> Logout</a>
                        </li>
                        <?php endif ?>
                    </ul>
                </div>
                <!--/.nav-collapse -->
            </div>
        </nav>
        <div class="">
            <?php
            if (file_exists($mod . '.php')) {
                if ($mod == 'tanda_terima' && $_SESSION['level'] != 'pemilih') {
                    redirect_js('?m=login_pemilih');
                } else {
                    include $mod . '.php';
                }
            } else
                include 'pilkada.php';
            ?>
        </div>
    </div>
    <footer class="footer">
        <div class="container">
            <p>Copyright &copy; <?= date('Y') ?>. BEM UBSI Kabupaten Karawang<em class="pull-right">Departement Dalam
                    Negri</em>
            </p>
        </div>
    </footer>
</body>

</html>