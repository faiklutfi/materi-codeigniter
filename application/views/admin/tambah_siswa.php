<!DOCTYPE html>
<html>
<title>Tambah</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
<body>

<div class="d-flex">
<?php $this->load->view('components/sidebar') ?>
<div class="container">
        <div class="min-vh-100">
          <div class='card w-75 m-auto p-3'>
        <h3 class="text-center ">Tambah Data Siswa</h3>
        <form action="<?php echo base_url('admin/aksi_tambah_siswa'); ?>" enctype="multipart/form-data" method="post" class="row">
            <div class="mb-3 col-6">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama">
            </div>
            <div class="mb-3 col-6">
                <label for="nisn" class="form-label">NISN</label>
                <input type="text" class="form-control" id="nisn" name="nisn">
            </div>
            <div class="mb-3 col-6">
                <label for="gender" class="form-label">Gender</label>
                <select class="form-select" aria-label="Default select example" name="gender">
                    <option selected>Pilih Gender</option>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
            </div>
            <div class="mb-3 col-6">
                <label for="kelas" class="form-label">Kelas</label>
                <select name="id_kelas" class="form-select">
                    <option selected>Pilih Kelas</option>
                    <?php foreach($kelas as $row): ?>
                    <option value="<?php echo $row->id ?>">
                        <?php echo $row->tingkat_kelas.' '.$row->jurusan_kelas ?>
                    </option>
                    <?php endforeach ?>
                </select>
            </div>
            <div class="mb-3 col-6">
                <label for="foto" class="form-label">Foto</label>
                <input type="file" class="form-control" id="foto" name="foto">
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>
    </div>
          </div>
</div>
</div>
</body>
</html>
