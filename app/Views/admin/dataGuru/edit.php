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
<a href="/guru" class="nav-item nav-link active"><i class="fa fa-th me-2"></i>Data Karyawan</a>
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
<div class="container-fluid pt-2 px-4 d-flex justify-content-center">
  <div class="col-sm-12 col-xl-9">
    <div class="bg-secondary rounded h-100 p-4">
      <h6 class="mb-4">Edit Data Guru</h6>

      <form action="/guru/update/<?= $guru['id_karyawan']; ?>" method="post">
        <?= csrf_field(); ?>
        <input type="hidden" name="id_karyawan" value="<?= $guru['id_karyawan']; ?>">
        <div class="form-floating mb-3">
          <input type="text" class="form-control" id="nama_guru" placeholder="name@example.com" name="nama_guru" value="<?= $guru['nama_guru']; ?>">
          <label for="floatingInput">Nama Guru</label>
        </div>
        <div class="form-floating mb-3">
          <input type="text" class="form-control" id="alamat" placeholder="alamat" name="alamat" value="<?= $guru['alamat']; ?>">
          <label for="floatingInput">Alamat</label>
        </div>
        <div class="form-floating mb-3">
          <input type="date" class="form-control" id="tgl_lahir" placeholder="tgl" name="tgl_lahir" value="<?= $guru['tgl_lahir']; ?>">
          <label for="floatingPassword">Tanggal Lahir</label>
        </div>
        <div class="form-floating mb-3">
          <select class="form-select" id="jenis_kelamin" aria-label="Floating label select example" name="jenis_kelamin">
            <option selected value="Pria">Pria</option>
            <option value="Wanita">Wanita</option>
          </select>
          <label for="floatingSelect">Jenis Kelamin</label>
        </div>
        <div class="form-floating mb-3">
          <input type="text" class="form-control" id="no_hp" placeholder="Nomer HP" name="no_hp" value="<?= $guru['no_hp']; ?>">
          <label for="floatingInput">No HP</label>
        </div>
        <div class="form-floating mb-3">
          <input type="text" class="form-control" id="no_hp" placeholder="Email" name="email" value="<?= $guru['email']; ?>">
          <label for="floatingInput">Email</label>
        </div>
        <div class="form-floating mb-3">
          <select class="form-select" id="jabatan" aria-label="Floating label select example" name="jabatan">
            <option selected value="TU">TU</option>
            <option value="Guru Matpel">Guru Matpel</option>
          </select>
          <label for="floatingSelect">Jenis Kelamin</label>
        </div>
        <div class="form-floating mb-3">
          <input type="text" class="form-control" id="lulusan" placeholder="Lulusan" name="lulusan" value="<?= $guru['lulusan']; ?>">
          <label for="floatingInput">Lulusan</label>
        </div>
        <div class="button d-flex justify-content-between">
          <button type="submit" class="btn btn-primary">Edit</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?= $this->endSection(); ?>