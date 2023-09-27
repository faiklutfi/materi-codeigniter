<!DOCTYPE html>
<html>
<title>Update</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
<body>
<div class="d-flex">
    <?php $this->load->view('components/sidebar') ?>
<div class="container">
<?php $this->load->view('components/navbar') ?>
        <div class="min-vh-100">
          <div class='card w-75 m-auto p-3'>
        <h3 class="text-center ">Update Data Siswa</h3>
        <?php foreach($siswa as $data_siswa): ?>
        <form class="row" action="<?php echo base_url('admin/aksi_update_siswa'); ?>" enctype="multipart/form-data" method="post">
        <input type="hidden" name="id_siswa" value="<?php echo $data_siswa->id_siswa ?>">
            <div class="mb-3 col-6">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $data_siswa->nama_siswa ?>">
            </div>
            <div class="mb-3 col-6">
                <label for="nisn" class="form-label">NISN</label>
                <input type="text" class="form-control" id="nisn" name="nisn" value="<?php echo $data_siswa->nisn ?>">
            </div>
            <div class="mb-3 col-6">
                <label for="gender" class="form-label">Gender</label>
                <select class="form-select" aria-label="Default select example" name="gender">
                    <option selected value="<?php echo $data_siswa->gender ?>"><?php echo $data_siswa->gender ?></option>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
            </div>
            <div class="mb-3 col-6">
                <label for="kelas" class="form-label">Kelas</label>
                <select name="id_kelas" class="form-select">
                    <option selected value="<?php echo $data_siswa->id_kelas ?>"><?php echo tampil_full_kelas_byid($data_siswa->id_kelas) ?></option>
                    <?php echo tampil_full_kelas_byid($data_siswa->id_kelas) ?>
                    </option>
                    <?php foreach($kelas as $row): ?>
                    <option value="<?php echo $row->id ?>">
                        <?php echo $row->tingkat_kelas.' '.$row->jurusan_kelas ?>
                    </option>
                    <?php endforeach ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>
        <?php endforeach ?>
    </div>
          </div>
</div>
</div>
</body>
</html>
