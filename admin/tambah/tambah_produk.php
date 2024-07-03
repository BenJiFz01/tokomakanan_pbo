<div class="'shadow p-3 mb-3 bg-white rounded">
    <h5><b>Welcome in Tambah Produk Food Fresh</b></h5>
</div>

<?php
$kategori = array();
$ambil = $koneksi->query("SELECT * FROM kategori");
while ($pecah = $ambil->fetch_assoc()) {
    $kategori[] = $pecah;
}
?>

<form method="post" enctype="multipart/form-data">
    <div class="card shadow bg-white">
        <div class="card-body">
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Nama Kategori: </label>
                <div class="col-sm-9">
                    <select name="id_kategori" class="form-control">
                        <option selected disabled>Pilih Nama Kategori</option>
                        <?php foreach ($kategori as $key => $value): ?>
                            <option value="<?php $value['id_kategori']; ?>">
                                <?php echo $value['nama_kategori']; ?>
                            </option>
                        <?php endforeach ?>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Nama Produk: </label>
                <div class="col-sm-9">
                    <input type="text" name="nama" class="form-control" placeholder="Masukan Nama Produk">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Harga Produk: </label>
                <div class="col-sm-9">
                    <input type="text" name="harga" class="form-control" placeholder="Masukan Harga Produk">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Foto Produk: </label>
                <div class="col-sm-9">
                    <div class="input-foto">
                        <input type="file" name="foto[]" class="form-control">
                    </div>
                    <span class="btn btn-sm btn-success mt-3 btn-tambah">
                        <i class="fas fa-plus"></i>
                    </span>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Deskripsi Produk: </label>
                <div class="col-sm-9">
                    <textarea type="text" name="deskripsi" class="form-control" placeholder="Masukan Deskripsi Produk"
                        ></textarea>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Stok Produk: </label>
                <div class="col-sm-9">
                    <input type="number" name="stok" class="form-control" placeholder="Masukan Stok Produk">
                </div>
            </div>
        </div>
        <div class="card-footer">
            <div class="row">
                <div class="col-md-11">
                    <button name="simpan" class="btn btn-sm btn-success">Simpan</button>
                </div>
                <div class="col-md-1 text-right">
                    <a href="index.php?halaman=produk" class="btn btn-sm btn-danger">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</form>

<?php
if(isset($_POST['simpan'])){
    echo"<pre>";
    print_r($_FILES['foto']);
    echo"</pre>";
}
?>