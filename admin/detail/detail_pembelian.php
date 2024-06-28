<div class="'shadow p-3 mb-3 bg-white rounded">
    <h5><b>Welcome admin in detail pembelian Food Fresh</b></h5>
</div>

<?php
$id_pembelian = $_GET['id'];
$ambil = $koneksi->query("SELECT * FROM pembelian JOIN users
ON pembelian.id_users=users.id_users WHERE pembelian.id_pembelian='$id_pembelian'");

$detail = $ambil->fetch_assoc();
?>


<div class="row">
    <div class="col-md-4">
        <div class="card shadow bg-white">
            <div class="card-header text-center">
                <strong>DATA USERS</strong>
            </div>
            <div class="card-body row">
                <!-- NAMA -->
                <label class="col-md-4 col-form-label"> Nama : </label>
                <label class="col-md-8 col-form-label"><?php echo $detail['nama_users']; ?></label>
                <!-- email -->
                <label class="col-md-4 col-form-label"> Email : </label>
                <label class="col-md-8 col-form-label"><?php echo $detail['email_users']; ?></label>
                <!-- telepon -->
                <label class="col-md-4 col-form-label"> Telepon : </label>
                <label class="col-md-8 col-form-label"><?php echo $detail['telepon_users']; ?></label>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card shadow bg-white">
            <div class="card-header text-center">
                <strong>DATA PEMBELIAN</strong>
            </div>
            <div class="card-body row">
                <!-- tanggal -->
                <label class="col-md-4 col-form-label"> Tanggal : </label>
                <label class="col-md-8 col-form-label">
                    <?php echo date("d F Y", strtotime($detail['tanggal_pembelian'])); ?>
                </label>
                <!-- telepon -->
                <label class="col-md-4 col-form-label"> Total : </label>
                <label class="col-md-8 col-form-label">
                    Rp<?php echo number_format($detail['total_pembelian']); ?>
                </label>
            </div>
        </div>
    </div>
</div>

<?php
$pproduk = array();
$ambil = $koneksi->query("SELECT * FROM pembelian_produk JOIN produk
    ON pembelian_produk.id_produk = produk.id_produk
    WHERE pembelian_produk.id_pembelian = '$id_pembelian'");
while ($pecah = $ambil->fetch_assoc()) {
    $pproduk[] = $pecah;
}
?>

<div class="card shadow bg-white mt-3">
    <div class="card-body">
        <table class="table table-bordered table-hover table-striped" id="tables">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Harga</th>
                    <th>total</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($pproduk as $key => $value): ?>
                    <?php $subtotal = $value['harga_produk'] * $value['total']; ?>
                    <tr>
                        <td width="50"><?php echo $key + 1; ?></td>
                        <td><?php echo $value['nama_produk']; ?></td>
                        <td>Rp<?php echo number_format($value['harga_produk']); ?></td>
                        <td><?php echo $value['total']; ?></td>
                        <td>Rp<?php echo number_format($subtotal); ?></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>