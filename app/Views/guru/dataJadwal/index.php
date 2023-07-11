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
<a href="/nilai" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Data Nilai</a>
<a href="/jadwal" class="nav-item nav-link active"><i class="fa-solid fa-calendar-days me-2"></i>Jadwal</a>
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
<div class="container-fluid pt-4 px-4">
    <div class="col-12">
        <div class="bg-secondary rounded h-100 p-4">
            <div class="headerTable mb-2">
                <h5>Tabel Data Jadwal</h5>
                <div class="headerHelp d-flex align-items-center flex-row gap-2">
                    <!-- <form class="d-none d-md-flex ms-4"> -->
                    <!-- <i class="fa-solid fa-magnifying-glass" style="color: #005eff;"></i> -->
                    <!-- <input class="form-control bg-dark border-0 mb-1" type="search" placeholder="Search">
                    </form> -->
                    <?php if (in_groups('Admin TU')) { ?>
                        <h5><a class="btn btn-sm btn-info mt-1" href="/jadwal/tambah">Tambah</a></h5>
                    <?php }; ?>
                </div>
            </div>
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th scope="col">Hari</th>
                        <th scope="col">Jam Dimulai</th>
                        <th scope="col">Jam Selesai</th>
                        <th scope="col">Kelas</th>
                        <th scope="col">Mata Pelajaran</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($jadwalGuru as $j) : ?>
                        <tr>
                            <th scope="row"><?= $j['hari']; ?></th>
                            <td><?= $j['jam_mulai']; ?></td>
                            <td><?= $j['jam_selesai']; ?></td>
                            <td><?= $j['nama_ruang']; ?></td>
                            <td><?= $j['nama_mapel']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>