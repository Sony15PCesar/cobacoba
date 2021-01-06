

<?php





if(isset($_POST['NIK'])) {

    $nik = htmlentities(stripslashes($_POST['NIK']));
    $nama = htmlentities(stripslashes($_POST['NAMA']));
    $alamat = htmlentities(stripslashes($_POST['ALAMAT']));
    $tanggal_lahir = htmlentities(stripslashes($_POST['TANGGAL_LAHIR']));
    $email = htmlentities(stripslashes($_POST['EMAIL']));




    try {

        if($_GET['act'] == 'create') {


            $stmt = $conn->prepare("INSERT INTO karyawan
            VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param("sssss",$nik, $nama, $alamat, $tanggal_lahir, $email);

            if (
                $stmt &&
                $stmt -> execute() &&
                $stmt -> affected_rows === 1
            ) {

                $_SESSION['message'] = '<div class="alert alert-success" role="alert">
                    <strong>Success !</strong> Data saved !
                  </div>';
                header('location:index.php?act=showdata');
            } else {
                echo $conn -> error;
            }

        } else if($_GET['act'] == 'update') {
            $stmt = $conn->prepare("UPDATE karyawan 
            set NAMA = ?, ALAMAT = ?, TANGGAL_LAHIR = ?, EMAIL = ? where NIK = ?");
            $stmt->bind_param('sssss', $nama, $alamat, $tanggal_lahir, $email,$nik);


            if (
                $stmt &&
                $stmt -> execute() &&
                $stmt -> affected_rows === 1
            ) {
                $_SESSION['message'] = '<div class="alert alert-success" role="alert">
                <strong>Success !</strong> Data updated !
              </div>';

                header('location:index.php?act=update&NIK='.$nik);
            } else {
                echo $conn -> error;
            }





        }
    }
    catch(PDOException $e)
    {
        echo '<div class="alert alert-danger" role="alert">
                <strong>Error!</strong> '.$e->getMessage().'
              </div>';
    }


}



if(isset($_GET['NIK']) && $_GET['act'] == 'update') {

    $stmt = $conn->prepare("SELECT * FROM karyawan where NIK = ?");
    $stmt->bind_param("s",$_GET['NIK']);
    $stmt->execute();
    $result = $stmt->get_result();
    $data = $result->fetch_assoc();

    $nik = htmlentities(stripslashes($data['NIK']));
    $nama = htmlentities(stripslashes($data['NAMA']));
    $alamat = htmlentities(stripslashes($data['ALAMAT']));
    $tanggal_lahir = htmlentities(stripslashes($data['TANGGAL_LAHIR']));
    $email = htmlentities(stripslashes($data['EMAIL']));

}



?>


<form id="create" class="form-horizontal" method="post">
    <div class="form-group row">
        <label class="control-label col-sm-2" >NIK:</label>
        <div class="col-sm-5">
            <input type="text" class="form-control" id="NIK" name="NIK" value="<?php echo $nik; ?>">
        </div>
    </div>
    <div class="form-group row">
        <label class="control-label col-sm-2" >Nama</label>
        <div class="col-sm-5">
            <input type="text" class="form-control" id="NAMA" name="NAMA" value="<?php echo $nama; ?>">
        </div>
    </div>
    <div class="form-group row">
        <label class="control-label col-sm-2" >Alamat</label>
        <div class="col-sm-5">
            <textarea class="form-control" id="ALAMAT" name="ALAMAT"><?php echo $alamat; ?></textarea>

        </div>
    </div>
    <div class="form-group row">
        <label class="control-label col-sm-2" >Tanggal Lahir</label>
        <div class="col-sm-5">
            <input type="date" data-date-format="DD MMMM YYYY" class="form-control" id="TANGGAL_LAHIR" name="TANGGAL_LAHIR" value="<?php echo $tanggal_lahir; ?>">
        </div>
    </div>
    <div class="form-group row">
        <label class="control-label col-sm-2" for="EMAIL" >Email</label>
        <div class="col-sm-5">
            <input type="email" class="form-control" id="EMAIL" name="EMAIL" value="<?php echo $email; ?>">
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</form>



