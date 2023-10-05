<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>

<body style="overflow: hidden;">
  <!-- <h1>selamat datang <?php echo $this->session->userdata('username') ?></h1>
    <a href="<?php echo base_url('auth/logout'); ?>"
        class="btn btn-primary">
        loguot
</a> -->

  <div class="d-flex">
    <div class="col-12 bg-dark" style="width: 15%;">
      <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
        <a href="/" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
          <span class="fs-5 d-none d-sm-inline">INFO SEKOLAH</span>
        </a>
        <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
          <li class="nav-item">

          </li>
          <!-- <li>
                        <a href="#submenu1" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                            <i class="fa-solid fa-gauge-high"></i> <span class="ms-1 d-none d-sm-inline">Dashboard</span> </a>
                        <ul class="collapse show nav flex-column ms-1" id="submenu1" data-bs-parent="#menu">
                        </ul>
                    </li> -->
          <li>
            <a href="<?php echo base_url('admin/siswa') ?>" data-bs-toggle="collapse" class="nav-link px-0 align-middle ">
              <i class="fa-solid fa-house"></i> <span class="ms-1 d-none d-sm-inline">home</span></a>
          </li>
          <li>
            <a href="<?php echo base_url('admin/siswa') ?>" class="nav-link px-0 align-middle">
              <i class="fa-solid fa-money-bill-wave"></i> <span class="ms-1 d-none d-sm-inline">siswa</span></a>
          </li>
          <!-- <li>
                        <a href="<?php echo base_url('admin/akun') ?>" class="nav-link px-0 align-middle">
                            <i class="fa-solid fa-house-user"></i> <span class="ms-1 d-none d-sm-inline">Akun</span></a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('admin/lagout') ?>" class="nav-link px-0 align-middle">
                            <i class="fa-solid fa-wallet"></i> <span class="ms-1 d-none d-sm-inline">keuangan</span></a>
                    </li> -->
          <li>
            <a style="margin-top: 470px;" href="<?php echo base_url('auth/logout'); ?>" class="nav-link px-0 align-middle">
              <i class="fa-solid fa-right-from-bracket"></i> <span class="ms-1 d-none d-sm-inline"> Loguot</a>
          </li>
        </ul>
        <hr>
      </div>
    </div>

    <div class="container py-1 h-auto text-center">
      <nav class="navbar navbar-expand-lg navbar" style="background-color: #e3f2fd;">
        <a class="navbar-brand" href="#"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
          <ul class="navbar-nav ml-50% mt-2 mt-lg-0">
            <li class="nav-item active">
              <a class="nav-link" href="tampilan"><i class="fa-solid fa-house-chimney-user"></i> Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#"><i class="fa-solid fa-link"></i> Link</a>
            </li>
            <li class="nav-item">
              <!-- Tombol Export -->
              <a href="<?php echo base_url('admin/export') ?>" class="bg-blue-500 hover:bg-blue-700 text-dark font-bold py-2 px-4 rounded"><i class="fas fa-file-export mr-2"></i> Export</a>
            </li>
            <li class="nav-item">
              <!-- Tombol Import -->
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#importModal">
                Import
              </button>
            </li>
          </ul>

        </div>
      </nav>
      <h1 style="background-color:blue; height: 60px;">Siswa</h1>
      <table class="table">
        <thead>
          <th scope="col">No</th>
          <th scope="col">Foto Siswa</th>
          <th scope="col">Nama siswa</th>
          <th scope="col">NISN</th>
          <th scope="col">Gender</th>
          <th scope="col">Kelas</th>
          <th scope="col">Aksi</th>
          </tr>

        </thead>
        <tbody classs="table-grup-divider">
          <?php $no = 0;
          foreach ($siswa as $row) :
            $no++ ?>
            <td class="border border-black"><?php echo $no; ?></td>
            <td class="border border-black"><img src="<?php echo base_url(
                                                        'images/siswa/' . $row->foto
                                                      ); ?>" width="50" alt=""></td>
            <td class="border border-black"><?php echo $row->nama_siswa; ?></td>
            <td class="border border-black"><?php echo $row->nisn; ?></td>
            <td class="border border-black"><?php echo $row->gender; ?></td>
            <td class="border border-black"><?php echo tampil_full_kelas_byid($row->id_kelas); ?></td>
            <td>
              <a href="<?php echo base_url('admin/ubah_siswa/') . $row->id_siswa ?>" class="btn btn-primary">Ubah</a>
              <button onclick="hapus(<?php echo $row->id_siswa; ?>)" class="btn btn-danger">
                Hapus
              </button>
            </td>
            </tr>
          <?php endforeach ?>
        </tbody>
      </table>
      <a href="<?php echo base_url('admin/tambah_siswa') ?>"><button type="submit" class="btn btn-primary w-25" name="submit">Tambah</button></a>
    </div>
    <!-- Modal Import -->
    <div class="modal" id="importModal" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Import File</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <!-- Form untuk memilih file -->
            <form class="mt-5" method="post" enctype="multipart/form-data" action="<?= base_url('admin/import') ?>">
              <input type="file" name="file" />
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- tutup modal -->
  </div>
  <!-- Tambahkan script jQuery dan Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <script>
    function hapus(id) {
      var yes = confirm('Yakin Di Hapus?');
      if (yes == true) {
        window.location.href = "<?php echo base_url('admin/hapus_siswa/') ?>" + id;
      }
    }
  </script>
  <script>
    function openModal() {
      document.getElementById('importModal').classList.remove('hidden');
    }

    function closeModal() {
      document.getElementById('importModal').classList.add('fadeOut');
      setTimeout(function() {
        document.getElementById('importModal').classList.add('hidden');
        document.getElementById('importModal').classList.remove('fadeOut');
      }, 300);
    }

    document.getElementById('importButton').addEventListener('click', openModal);
  </script>
</body>

</html>