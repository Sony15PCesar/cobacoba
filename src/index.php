
<?php

session_start();

include('koneksi.php'); ?>

<html>
<head>
    <title>CRUD PHP Mysql | Caritahu.id</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./vendor/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="./vendor/fontawesome/css/all.css">
    <script src="./js/jquery.min.js"></script>
    <script src="./vendor/bootstrap/js/bootstrap.js"></script>
    <script src="./vendor/fontawesome/js/all.js"></script>

</head>

<body>




<div class=" d-flex h-100 p-3 mx-auto flex-column"  style="margin: 0 50px">


    <div class="container">
        <header class="masthead mb-auto d-print-none">
            <div class="inner">
                <h3 class="masthead-brand">CRUD PHP Mysql -  Caritahu.id </h3> <br>
                <nav class="nav nav-masthead justify-content-left">
                    <a class="btn btn-dark" href="<?php echo $_PHP['SELFT'].'?act=utama'; ?>" style="margin-right: 20px">Home</a>
                    <a class="btn btn-primary" href="<?php echo $_PHP['SELFT'].'?act=create'; ?>" style="margin-right: 20px">Create</a>
                    <a class="btn btn-info" href="<?php echo $_PHP['SELFT'].'?act=showdata'; ?>" style="margin-right: 20px">Show Data</a>
                </nav>
            </div>
        </header><br><br>
    <?php

        echo $_SESSION['message'];
        unset($_SESSION['message']);

        $act = '';
        $act = $_GET['act'];
        if($act == 'utama') {
            include('utama.php');
        } else if($act == 'create') {
            include('form.php');
        } else if($act == 'update') {
            include('form.php');
        } else if($act == 'read') {
            include('read.php');
        } else if($act == 'delete') {
            include('delete.php');
        } else if($act == 'showdata') {
            include('showdata.php');
        } else {
            include('utama.php');
        }

        ?>
    </div>

    <footer class="mastfoot mt-auto">
        <div class="inner">
            <p>Source by <a href="https://www.caritahu.id">Caritahu.id</a></p>
        </div>
    </footer>
</div>


</body>
</html>