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
<a href="/guru" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Data Karyawan</a>
<a href="/siswa" class="nav-item nav-link active"><i class="fa-solid fa-user-graduate me-2"></i>Data Siswa</a>
<a href="/jadwal" class="nav-item nav-link"><i class="fa-solid fa-calendar-days me-2"></i>Jadwal</a>
<a href="/poin" class="nav-item nav-link"><i class="fa-solid fa-book me-2"></i>Poin</a>
<a href="/mapel" class="nav-item nav-link"><i class="fa-solid fa-book-open me-2"></i>Data Mapel</a>
<a href="/kelas" class="nav-item nav-link"><i class="fa-solid fa-landmark me-2"></i>Data Kelas</a>
<a href="/users" class="nav-item nav-link"><i class="fa-solid fa-circle-user me-2"></i>Data Users</a>
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
<div class="container-fluid pt-2 px-4 d-flex justify-content-center">
    <div class="col-sm-12 col-xl-9">
        <div class="bg-secondary rounded h-100 p-4">
            <h6 class="mb-4">Edit Data Jadwal</h6>

            <form action="/jadwal/update/<?= $jadwal['id']; ?>" method="post">
                <?= csrf_field(); ?>
                <input type="hidden" name="id" value="<?= $jadwal['id']; ?>">
                <div class="form-floating mb-3">
                    <select class="form-select" id="hari" aria-label="Floating label select example" name="hari">
                        <option value="">----- PILIH -----</option>
                        <option value="Senin">Senin</option>
                        <option value="Selasa">Selasa</option>
                        <option value="Rabu">Rabu</option>
                        <option value="Kamis">Kamis</option>
                        <option value="Jumat">Jumat</option>
                        <option value="Sabtu">Sabtu</option>
                        <option value="Minggu">Minggu</option>
                    </select>
                    <label for="floatingSelect">Hari</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="time" class="form-control" id="jam_mulai" placeholder="Jam Dimulai" name="jam_mulai" value="<?= $jadwal['jam_mulai']; ?>">
                    <label for="floatingInput">Jam Dimulai</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="time" class="form-control" id="jam_selesai" placeholder="Jam Selesai" name="jam_selesai" value="<?= $jadwal['jam_selesai']; ?>">
                    <label for="floatingInput">Jam Selesai</label>
                </div>
                <div class="form-floating mb-3">
                    <select class="form-select" id="kode_ruang" aria-label="Floating label select example" name="kode_ruang">
                        <option value="">----- PILIH -----</option>
                        <?php foreach ($kelas as $k) : ?>
                            <option value="<?= $k['kode_ruang']; ?>"><?= $k['nama_ruang']; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <label for="floatingSelect">Kelas</label>
                </div>
                <div class="form-floating mb-3">
                    <select class="form-select" id="kode_mapel" aria-label="Floating label select example" name="kode_mapel">
                        <option value="">----- PILIH -----</option>
                        <?php foreach ($mapel as $m) : ?>
                            <option value="<?= $m['kode_mapel']; ?>"><?= $m['nama_mapel']; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <label for="floatingSelect">Mata Pelajaran</label>
                </div>
                <div class="form-floating mb-3">
                    <select class="form-select" id="nip" aria-label="Floating label select example" name="nip">
                        <option value="">----- PILIH -----</option>
                        <?php foreach ($guru as $g) : ?>
                            <option value="<?= $g['nip']; ?>"><?= $g['nama_guru']; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <label for="floatingSelect">Nama Guru</label>
                </div>
                <div class="button d-flex justify-content-between">
                    <button type="submit" class="btn btn-primary">Edit</button>
                    <a class="btn btn-danger" href="/siswa">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>