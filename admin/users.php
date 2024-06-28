<div class="'shadow p-3 mb-3 bg-white rounded">
    <h5><b>Welcome admin in Food Fresh</b></h5>
</div>

<?php
$users = array();
$ambil = $koneksi->query("SELECT * FROM users ");
while ($pecah = $ambil->fetch_assoc()) {
    $users[] = $pecah;
}
?>


<div class="card shadow bg-white">
    <div class="card-body">
        <table class="table table-bordered table-hover table-striped" id="tables">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Telepon</th>
                    <th>Foto</th>
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $key => $value):?>
                <tr>
                    <td width="50"><?php echo $key+1;?></td>
                    <td><?php echo $value['nama_users'];?></td>
                    <td><?php echo $value['email_users'];?></td>
                    <td><?php echo $value['telepon_users'];?></td>
                    <td><?php echo $value['foto_users'];?></td>
                    <td class="text-center" width="150">
                        <a href="#" class="btn btn-sm btn-danger">DELETE</a>
                    </td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>