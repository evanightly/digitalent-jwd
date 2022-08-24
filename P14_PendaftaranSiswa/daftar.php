<?php include_once './layout/header.php'; ?>

<div class="container pt-3">

    <h1>Formulir Pendaftaran Siswa Baru</h1>
    <div class="col">
        <form class="needs-validation" action="controller/siswa.php" method="post" novalidate>
            <div class="form-group">
                <label class="form-label" for="nama">Nama</label>
                <input id="nama" class="form-control" type="text" name="siswa[nama]" maxlength="50" required>
                <div class="invalid-feedback">
                    Nama tidak boleh melebihi 50 digit
                </div>
            </div>
            <div class="form-group mt-2">
                <label class="form-label" for="alamat">Alamat</label>
                <textarea class="form-control" name="siswa[alamat]" id="alamat" cols="30" rows="3" required></textarea>
                <div class="invalid-feedback">
                    Alamat harus diisi
                </div>
            </div>
            <div class="form-group mt-2">
                <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="siswa[jenis_kelamin]" value="L" id="l" required>
                    <label class="form-check-label" for="l">
                        Laki laki
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="siswa[jenis_kelamin]" value="P" id="p">
                    <label class="form-check-label" for="p">
                        Perempuan
                    </label>
                </div>
            </div>
            <div class="form-group mt-2">
                <label class="form-label" for="agama">Agama</label>
                <input id="agama" class="form-control" type="text" name="siswa[agama]" maxlength="10" required>
                <div class="invalid-feedback">
                    Kolom harus diisi
                </div>
            </div>
            <div class="form-group mt-2">
                <label class="form-label" for="sekolah_asal">Sekolah asal</label>
                <textarea class="form-control" name="siswa[sekolah_asal]" id="sekolah_asal" cols="30" rows="3" required></textarea>
                <div class="invalid-feedback">
                    Kolom harus diisi
                </div>
            </div>
            <div class="col d-flex align-items-center mt-3">
                <button name="create" type="submit" class="btn btn-primary me-3">Submit</button>
                <a href="/<?= PROJECT_FOLDER ?>">Kembali ke index</a>
            </div>
        </form>
    </div>
</div>

<?php include_once './layout/footer.php'; ?>