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
                        <a href="<?php echo base_url('admin') ?>" data-bs-toggle="collapse" class="nav-link px-0 align-middle ">
                            <i class="fa-solid fa-house"></i> <span class="ms-1 d-none d-sm-inline">home</span></a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('Keuangan/pembayaran') ?>" class="nav-link px-0 align-middle">
                            <i class="fa-solid fa-money-bill-wave"></i> <span class="ms-1 d-none d-sm-inline">Pembayaran</span></a>
                    </li>
                    <!-- <li>
                        <a href="<?php echo base_url('admin/akun') ?>" class="nav-link px-0 align-middle">
                            <i class="fa-solid fa-house-user"></i> <span class="ms-1 d-none d-sm-inline">Akun</span></a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('admin/keuangan') ?>" class="nav-link px-0 align-middle">
                            <i class="fa-solid fa-wallet"></i> <span class="ms-1 d-none d-sm-inline">keuangan</span></a>
                    </li> -->
                    <li>
                        <a style="margin-top: 485px;" href="<?php echo base_url('auth/logout'); ?>" class="nav-link px-0 align-middle">
                            <i class="fa-solid fa-right-from-bracket"></i> <span class="ms-1 d-none d-sm-inline"> Loguot</a>
                    </li>
                </ul>
                <hr>
            </div>
        </div>

        <div style="width:100%;">
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
          </ul>
        </div>
      </nav>
            <div class='card w-50 p-5' style="margin-top: 125px; margin-left:auto; margin-right: auto;">
                <h3 class='text-center '>pembayaran</h3>
                <form action="<?php echo base_url('Keuangan/aksi_tambah_pembayaran') ?>" method="post" enctype="multipart/from-data" class="text-center">
                    <div class="row">
                        <div class="col-6">
                            <label for="id_siswa" class="form-label">Nama Siswa</label>
                            <select name="id_siswa" class="form-select">
                                <option selected>pilih Nama Siswa</option>
                                <?php foreach ($siswa as $row) : ?>
                                    <option value="<?php echo $row->id_siswa ?>">
                                        <?php echo $row->nama_siswa ?>
                                    </option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="col-6">
                            <label for="jenis_pembayaran" class="form-label">Jenis Pembayaran</label>
                            <select name="jenis_pembayaran" class="form-select">
                                <option value=" "> </option>
                                <option value="Pembayaran SPP">Pembayaran SPP</option>
                                <option value="Pembayaran Praktek">Pembayaran Praktek</option>
                                <option value="Pembayaran Uang Gedung">Pembayaran Uang Gedung</option>
                                <option value="Pembayaran Seragam">Pembayaran Seragam</option>
                            </select>
                        </div>
                        <div style="margin-left: 25%;" class="col-6">
                            <label for="tottal_pembayaran" class="form-label"><b>Total</b></label>
                            <input type="number" class="form-control" id="tottal_pembayaran" name="total_pembayaran">
                        </div>

                        <br>
                        <button style="margin-left: 35%; margin-top: 10px;" type="submit" class="btn btn-primary w-25" name="submit">Tambah</button>
                </form>
            </div>
        </div>
    </div>
</body>