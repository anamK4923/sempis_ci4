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
<a href="/jadwal" class="nav-item nav-link"><i class="fa-solid fa-calendar-days me-2"></i>Jadwal</a>
<a href="/presensi" class="nav-item nav-link active"><i class="fa-solid fa-user-graduate me-2"></i>Data Presensi</a>
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
                <h5>Tabel Data Presensi</h5>
                <div class="headerHelp d-flex align-items-center flex-row gap-2">
                    <h5><a class="btn btn-sm btn-info mt-1" href="/presensi/tambah">Tambah</a></h5>
                </div>
            </div>
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th scope="col">NIS</th>
                        <th scope="col">Kehadiran</th>
                        <th scope="col">Hadir</th>
                        <th scope="col">Ijin</th>
                        <th scope="col">Sakit</th>
                        <th scope="col">Alpha</th>
                        <th scope="col">Total Pertemuan</th>
                        <th scope="col">Persentase Kehadiran</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($presensi as $p) : ?>
                        <tr>
                            <form action="/presensi/update/<?= $p['nis']; ?>" method="POST">
                                <th scope="row"><?= $p['nis']; ?></th>
                                <input type="hidden" name="nis" value="<?= $p['nis']; ?>">
                                <td>
                                    <select class="form-select" id="kode_ruang" aria-label="Floating label select example" name="kehadiran">
                                        <option value="">----- PILIH -----</option>
                                        <option value="hadir">Hadir</option>
                                        <option value="sakit">Sakit</option>
                                        <option value="ijin">Ijin</option>
                                        <option value="alpha">Alpha</option>
                                    </select>
                                </td>
                                <td><?= $p['hadir']; ?></td>
                                <input type="hidden" name="hadir" value="<?= $p['hadir']; ?>">
                                <td><?= $p['ijin']; ?></td>
                                <input type="hidden" name="ijin" value="<?= $p['ijin']; ?>">
                                <td><?= $p['sakit']; ?></td>
                                <input type="hidden" name="sakit" value="<?= $p['sakit']; ?>">
                                <td><?= $p['alpha']; ?></td>
                                <input type="hidden" name="alpha" value="<?= $p['alpha']; ?>">
                                <td><?= $p['total_pertemuan']; ?></td>
                                <input type="hidden" name="total_pertemuan" value="<?= $p['total_pertemuan']; ?>">
                                <td><?= $p['persentase']; ?>%</td>
                                <input type="hidden" name="persentase" value="<?= $p['persentase']; ?>">
                                <td><button type="submit" class="btn btn-sm btn-success">Submit</button></td>
                            </form>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>