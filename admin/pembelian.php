<div class="'shadow p-3 mb-3 bg-white rounded">
    <h5><b>Welcome in pembelian Food Fresh</b></h5>
</div>

<?php

$pembelian = array();
$ambil = $koneksi->query("SELECT*FROM pembelian JOIN users
 ON pembelian.id_users = users.id_users");
while($pecah = $ambil->fetch_assoc()) {
    $pembelian[] = $pecah;
}
?>

<div class="card shadow bg-white">
    <div class="card-body">
        <table class="table table-bordered table-hover table-striped" id="tables">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Tanggal </th>
                    <th>Total</th>
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($pembelian as $key => $value):?>   
                <tr>
                    <td width="50"><?php echo $key+1;?></td>
                    <td><?php echo $value['nama_users'];?></td>
                    <td><?php echo date("d F Y", strtotime( $value['tanggal_pembelian']));?></td>
                    <td>RP.<?php echo  number_format($value['total_pembelian']);?></td>
                    <td class="text-center" width="150">
                        <a href="index.php?halaman=detail_pembelian&id=<?php echo $value['id_pembelian'];?>" class="btn btn-sm btn-info">Detail</a>
                    </td>
                </tr>
                <?php endforeach?>
            </tbody>
        </table>
    </div>
</div>