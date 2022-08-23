<?php include_once './layout/header.php'; ?>

<div class="container">
    <?php if (isset($_SESSION['message'])) { ?>
        <div class="toast-container position-fixed top-0 end-0 p-3" data-bs-delay="3000">
            <div id="flashMessage" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header">
                    <img src="assets/images/malachite.jpg" class="rounded rounded-1 me-2" alt="...">
                    <strong class="me-auto"> <?= $_SESSION['message']['type'] ?></strong>
                    <small>minutes ago</small>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body">
                    <?= $_SESSION['message']['body'] ?>
                </div>
            </div>
        </div>
    <?php session_destroy();
    } ?>
    <div class="col">
        <button type="button" class="btn btn-outline-success my-3" data-bs-toggle="modal" data-bs-target="#tambahDataBaru">
            Tambah Data Baru
        </button>

    </div>

    <div class="modal fade" id="tambahDataBaru" tabindex="-1" aria-labelledby="tambahDataBaruLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header border-1 border-bottom">
                    <h5 class="modal-title" id="tambahDataBaruLabel">Tambah Data Baru</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form class="needs-validation" action="controller/siswa.php" method="post" novalidate>
                    <div class="modal-body">
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
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button name="create" type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-sm table-hover">
            <thead>
                <tr class="table-primary">
                    <th>No</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Jenis Kelamin</th>
                    <th>Agama</th>
                    <th>Sekolah Asal</th>
                    <th>Tindakan</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                $data = $mysqli->query('SELECT * FROM siswa ORDER BY createdAt DESC');
                if ($data) {
                    while ($siswa = $data->fetch_assoc()) { ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $siswa["nama"] ?></td>
                            <td><?= $siswa["alamat"] ?></td>
                            <td><?= $siswa["jenis_kelamin"] === 'L' ? 'Laki-laki' : 'Perempuan' ?></td>
                            <td><?= $siswa["agama"] ?></td>
                            <td><?= $siswa["sekolah_asal"] ?></td>
                            <td>
                                <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#update<?= $siswa['id'] ?>">Edit</button>
                                <form class="d-inline" action="controller/siswa.php" method="post">
                                    <button type="submit" value=<?= $siswa["id"] ?> name="delete" class="btn btn-sm btn-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        <div class="modal fade" id="update<?= $siswa['id'] ?>" tabindex="-1" aria-labelledby="updateDataBaruLabel<?= $siswa['id'] ?>" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header border-1 border-bottom">
                                        <h5 class="modal-title" id="updateDataBaruLabel<?= $siswa['id'] ?>">Edit Data</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="controller/siswa.php" method="post">
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label class="form-label" for="nama">Nama</label>
                                                <input id="nama" class="form-control" type="text" name="siswa[nama]" maxlength="50" value="<?= $siswa["nama"] ?>" required>
                                                <div class="invalid-feedback">
                                                    Nama tidak boleh melebihi 50 digit
                                                </div>
                                            </div>
                                            <div class="form-group mt-2">
                                                <label class="form-label" for="alamat">Alamat</label>
                                                <textarea class="form-control" name="siswa[alamat]" id="alamat" cols="30" rows="3" minlength="1" required><?= $siswa["alamat"] ?></textarea>
                                                <div class="invalid-feedback">
                                                    Alamat harus diisi
                                                </div>
                                            </div>
                                            <div class="form-group mt-2">
                                                <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="siswa[jenis_kelamin]" value="L" id="l<?= $siswa["id"] ?>" <?= $siswa['jenis_kelamin'] === 'L' ? htmlspecialchars("checked") : '' ?>>
                                                    <label class="form-check-label" for="l<?= $siswa["id"] ?>">
                                                        Laki laki
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="siswa[jenis_kelamin]" value="P" id="p<?= $siswa["id"] ?>" <?= $siswa['jenis_kelamin'] === 'P' ? htmlspecialchars("checked") : '' ?>>
                                                    <label class="form-check-label" for="p<?= $siswa["id"] ?>">
                                                        Perempuan
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="form-group mt-2">
                                                <label class="form-label" for="agama">Agama</label>
                                                <input id="agama" class="form-control" type="text" name="siswa[agama]" maxlength="10" value="<?= $siswa["agama"] ?>" required>
                                                <div class="invalid-feedback">
                                                    Kolom harus diisi
                                                </div>
                                            </div>
                                            <div class="form-group mt-2">
                                                <label class="form-label" for="sekolah_asal">Sekolah asal</label>
                                                <textarea class="form-control" name="siswa[sekolah_asal]" id="sekolah_asal" cols="30" rows="3" required><?= $siswa["sekolah_asal"] ?></textarea>
                                                <div class="invalid-feedback">
                                                    Kolom harus diisi
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <input type="hidden" name="siswa[id]" value="<?= $siswa['id'] ?>">
                                            <button type="submit" name="update" class="btn btn-primary">Update</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                <?php
                    }
                } ?>
            </tbody>
        </table>
    </div>
    <div class="d-flex justify-content-between">
        <?= sprintf("<p class='d-inline-block'>Total: %s </p>", $no - 1) ?>
        <a href="/<?= PROJECT_FOLDER ?>">Kembali ke index</a>
    </div>
</div>
<?php include_once './layout/footer.php'; ?>