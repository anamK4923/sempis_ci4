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
<div class="container-fluid pt-4 px-4">
    <div class="col-12">
        <div class="bg-secondary rounded h-100 p-4">
            <div class="headerTable mb-2">
                <h5>Tabel Data Nilai</h5>
            </div>
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th scope="col">NIS</th>
                        <th scope="col">Kode Mapel</th>
                        <th scope="col">Kode Kelas</th>
                        <th scope="col">Tugas 1</th>
                        <th scope="col">Tugas 2</th>
                        <th scope="col">Tugas 3</th>
                        <th scope="col">UTS</th>
                        <th scope="col">UAS</th>
                        <th scope="col">Rata-rata</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($nilai as $n) : ?>
                        <tr>
                            <th scope="row"><?= $n['nis']; ?></th>
                            <td><?= $n['kode_mapel']; ?></td>
                            <td><?= $n['kode_ruang']; ?></td>
                            <td><?= $n['tugas_1']; ?></td>
                            <td><?= $n['tugas_2']; ?></td>
                            <td><?= $n['tugas_3']; ?></td>
                            <td><?= $n['uts']; ?></td>
                            <td><?= $n['uas']; ?></td>
                            <td><?= $n['rata_rata']; ?></td>
                            <td>
                                <a class="btn btn-sm btn-success" href="/nilai/edit/<?= $n['nis']; ?>">Edit</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>