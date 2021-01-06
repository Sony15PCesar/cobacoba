
<?php


$data = $conn->query("SELECT * FROM karyawan");
// and somewhere later:





?>

<script>

    function showdel(nik) {

        $('#btndel').attr('href','?act=delete&NIK=' + nik);
        $('#myModal').modal('show');
    }



</script>


<table class="table table-responsive w-100 d-block d-md-table" style="min-width: 100%">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">NIK</th>
        <th scope="col">NAMA</th>
        <th scope="col">ALAMAT</th>
        <th scope="col">TANGGAL LAHIR</th>
        <th scope="col">EMAIL</th>
        <th scope="col">ACTION</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $no = 1;
    while($row = $data->fetch_assoc()){


        echo '<tr>
        <td > '.$no.'</td >
        <td >'.$row['NIK'].'</td >
        <td >'.$row['NAMA'].'</td >
        <td >'.$row['ALAMAT'].'</td >
        <td >'.$row['TANGGAL_LAHIR'].'</td >
        <td >'.$row['EMAIL'].'</td >
        <td >
        <a href="?act=update&NIK='.$row['NIK'].'"><i class="fas fa-edit" title="Edit"></i></a>
        <a href="?act=read&NIK='.$row['NIK'].'"><i class="fas fa-eye" title="View"></i></a>
        <a href="#myModal5" onclick="showdel(\''.$row['NIK'].'\');" class="" data-toggle="modal"><i class="fas fa-trash" title="Delete"></i></a>
        </td >
        </tr >';
        $no++;
    }
    ?>
    </tbody>
</table>


<div id="myModal" class="modal fade">
    <div class="modal-dialog modal-confirm">
        <div class="modal-content">
            <div class="modal-header">
                <div class="icon-box">
                    <i class="fas fa-times" style="font-size: 500%"></i>
                </div>
                <h4 class="modal-title">Are you sure?</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <p>Do you really want to delete these records? This process cannot be undone.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button>

                <a id="btndel" href="#" class="btn btn-danger" style="color: #FFFFFF">Delete</a>
            </div>
        </div>
    </div>
</div>