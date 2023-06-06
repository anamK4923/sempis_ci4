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
<a href="/guru" class="nav-item nav-link active"><i class="fa fa-th me-2"></i>Data Guru</a>
<a href="/siswa" class="nav-item nav-link"><i class="fa-solid fa-user-graduate me-2"></i>Data Siswa</a>
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
<div class="container-fluid pt-4 px-4">
    <div class="col-12">
        <div class="bg-secondary rounded h-100 p-4">
            <div class="headerTable mb-2">
                <h5>Tabel Data Guru</h5>
                <div class="headerHelp d-flex align-items-center flex-row gap-2">
                    <form class="d-none d-md-flex ms-4">
                        <!-- <i class="fa-solid fa-magnifying-glass" style="color: #005eff;"></i> -->
                        <input class="form-control bg-dark border-0 mb-1" type="search" placeholder="Search">
                    </form>
                    <h5><a class="btn btn-sm btn-info mt-1" href="/guru/tambah">Tambah</a></h5>
                </div>
            </div>
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th scope="col">NIP</th>
                        <th scope="col">Nama Guru</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Tanggal Lahir</th>
                        <th scope="col">Jenis Kelamin</th>
                        <th scope="col">No HP</th>
                        <th scope="col">Email</th>
                        <th scope="col">Jabatan</th>
                        <th scope="col">Lulusan</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($guru as $g) : ?>
                        <tr>
                            <th scope="row"><?= $g['nip']; ?></th>
                            <td><?= $g['nama_guru']; ?></td>
                            <td><?= $g['alamat']; ?></td>
                            <td><?= $g['tgl_lahir']; ?></td>
                            <td><?= $g['jenis_kelamin']; ?></td>
                            <td><?= $g['no_hp']; ?></td>
                            <td><?= $g['email']; ?></td>
                            <td><?= $g['jabatan']; ?></td>
                            <td><?= $g['lulusan']; ?></td>
                            <td>
                                <a class="btn btn-sm btn-success" href="">Edit</a>
                                <a class="btn btn-sm btn-primary" href="/guru/hapus/<?= $g['nip']; ?>">Hapus</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>