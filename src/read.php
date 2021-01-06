

<?php


if(isset($_GET['NIK'])) {

    $stmt = $conn->prepare("SELECT * FROM karyawan where NIK = :nik");
    $stmt->execute([':nik' => $_GET['NIK']]);
    $data = $stmt->fetch();

    $nik = htmlentities(stripslashes($data['NIK']));
    $nama = htmlentities(stripslashes($data['NAMA']));
    $alamat = htmlentities(stripslashes($data['ALAMAT']));
    $tanggal_lahir = htmlentities(stripslashes($data['TANGGAL_LAHIR']));
    $email = htmlentities(stripslashes($data['EMAIL']));

}



?>


<script>

    function cetak() {

        window.print();
    }

</script>

<h1>View Data</h1>

<table class=   "table table-user-information">
    <tbody>
    <tr>
        <td>Nik:</td>
        <td><?php echo $nik; ?></td>
    </tr>
    <tr>
        <td>Nama:</td>
        <td><?php echo $nama; ?></td>
    </tr>
    <tr>
        <td>Alamat:</td>
        <td><?php echo $alamat; ?></td>
    </tr>
    <tr>
        <td>Tanggal Lahir</td>
        <td><?php echo $tanggal_lahir ?></td>
    </tr>

    <tr>
        <td>Email</td>
        <td><?php echo $email; ?></td>
    </tr>
    </tbody>
</table>
<label class="btn btn-info d-print-none" onclick="cetak();"><i class="fas fa-print" style="font-size: 200%"></i> Print</label>

