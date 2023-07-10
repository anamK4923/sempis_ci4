<?= $this->extend('layout/template'); ?>

<?= $this->section('sidebar'); ?>
<a href="/" class="nav-item nav-link"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
<!-- <div class="nav-item dropdown">
    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>Elements</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="button.html" class="dropdown-item">Buttons</a>
                            <a href="typography.html" class="dropdown-item">Typography</a>
                            <a href="element.html" class="dropdown-item">Other Elements</a>
                        </div>
                    </div> -->
<a href="/nilai" class="nav-item nav-link active"><i class="fa fa-th me-2"></i>Data Nilai</a>
<a href="/jadwal" class="nav-item nav-link"><i class="fa-solid fa-calendar-days me-2"></i>Jadwal</a>
<a href="/presensi" class="nav-item nav-link"><i class="fa-solid fa-user-graduate me-2"></i>Data Presensi</a>
<!-- <a href="/" class="nav-item nav-link"><i class="fa-solid fa-book me-2"></i>Poin</a>
<a href="/" class="nav-item nav-link"><i class="fa-solid fa-landmark me-2"></i>Data Kelas</a>
<a href="/" class="nav-item nav-link"><i class="fa-solid fa-book-open me-2"></i>Data Mapel</a>
<a href="/" class="nav-item nav-link"><i class="fa-solid fa-circle-user me-2"></i>Data Users</a> -->
<!-- <a href="form.html" class="nav-item nav-link"><i class="fa fa-keyboard me-2"></i>Forms</a>
                    <a href="table.html" class="nav-item nav-link"><i class="fa fa-table me-2"></i>Tables</a>
                    <a href="chart.html" class="nav-item nav-link"><i class="fa fa-chart-bar me-2"></i>Charts</a> -->
<!-- <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="far fa-file-alt me-2"></i>Pages</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="signin.html" class="dropdown-item">Sign In</a>
                            <a href="signup.html" class="dropdown-item">Sign Up</a>
                            <a href="404.html" class="dropdown-item">404 Error</a>
                            <a href="blank.html" class="dropdown-item">Blank Page</a>
                        </div>
                    </div> -->
<?= $this->endsection(); ?>

<?= $this->section('content'); ?>
<div class="container-fluid pt-4 px-4 d-flex justify-content-center">
    <div class="col-sm-12 col-xl-10">
        <div class="bg-secondary rounded h-100 p-4">
            <h6 class="mb-4">Tambah Nilai</h6>
            <form action="/nilai/update/<?= $nilai['nis']; ?>" method="post">
                <?= csrf_field(); ?>
                <input type="hidden" name="nis" value="<?= $nilai['nis']; ?>">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="kode_mapel" placeholder="Kode mapel" name="kode_mapel" value="<?= $nilai['kode_mapel']; ?>" autofocus>
                    <label for="floatingInput">Kode mapel</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="kode_ruang" placeholder="Kode ruang" name="kode_ruang" value="<?= $nilai['kode_ruang']; ?>" autofocus>
                    <label for="floatingInput">Kode ruang</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="tugas_1" placeholder="Tugas 1" name="tugas_1" value="<?= $nilai['tugas_1']; ?>" autofocus>
                    <label for="floatingInput">Tugas 1</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="tugas_2" placeholder="Tugas 2" name="tugas_2" value="<?= $nilai['tugas_2']; ?>" autofocus>
                    <label for="floatingInput">Tugas 2</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="tugas_3" placeholder="Tugas 3" name="tugas_3" value="<?= $nilai['tugas_3']; ?>" autofocus>
                    <label for="floatingInput">Tugas 3</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="uts" placeholder="UTS" name="uts" value="<?= $nilai['uts']; ?>" autofocus>
                    <label for="floatingInput">UTS</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="uas" placeholder="UAS" name="uas" value="<?= $nilai['uas']; ?>" autofocus>
                    <label for="floatingInput">UAS</label>
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>