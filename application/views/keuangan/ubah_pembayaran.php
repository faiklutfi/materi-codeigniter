<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>

<body style="overflow: hidden;">
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
                        <a href="<?php echo base_url('keuangan') ?>" data-bs-toggle="collapse" class="nav-link px-0 align-middle ">
                            <i class="fa-solid fa-house"></i> <span class="ms-1 d-none d-sm-inline">home</span></a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('Keuangan/pembayaran') ?>" class="nav-link px-0 align-middle">
                            <i class="fa-solid fa-money-bill-wave"></i> <span class="ms-1 d-none d-sm-inline">Pembayaran</span></a>
                    </li>
                    <!-- <li>
                        <a href="<?php echo base_url('keuangan/akun') ?>" class="nav-link px-0 align-middle">
                            <i class="fa-solid fa-house-user"></i> <span class="ms-1 d-none d-sm-inline">Akun</span></a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('keuangan/keuangan') ?>" class="nav-link px-0 align-middle">
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

        <div class="flex-1 flex flex-col overflow-hidden">
            <header class="flex justify-between items-center p-4 bg-white border-b-2 border-gray-100">
                <h1 class="text-4xl">Ubah Pembayaran</h1>
            </header>

            <div class="my-8 mx-4"> <!-- Tambahkan margin di sini -->
                <div class="bg-white p-6 rounded-lg shadow-lg contrast-50">
                    <?php foreach ($pembayaran as $data_pembayaran) : ?>
                        <form class="row" action="<?php echo base_url('keuangan/aksi_ubah_pembayaran'); ?>" enctype="multipart/form-data" method="post">
                            <input type="hidden" name="id" value="<?php echo $data_pembayaran->id ?>">
                            <div class="mb-3 col-6">
                                <label for="siswa" class="form-label">Nama Siswa</label>
                                <select name="id_siswa" class="form-select">
                                    <option selected value="<?php echo $data_pembayaran->id_siswa ?>"><?php echo tampil_nama_siswa($data_pembayaran->id_siswa) ?>
                                        <?php foreach ($siswa as $row) : ?>
                                    <option value="<?php echo $row->id_siswa ?>">
                                        <?php echo $row->nama_siswa ?>
                                    </option>
                                <?php endforeach ?>
                                </select>
                            </div>
                            <div class="mb-3 col-6">
                                <label for="jenis_pembayaran" class="form-label">Jenis Pembayaran</label>
                                <select class="form-select" aria-label="Default select example" name="jenis_pembayaran">
                                    <option selected value="<?php echo $data_pembayaran->jenis_pembayaran ?>"><?php echo $data_pembayaran->jenis_pembayaran ?></option>
                                    <option value="SPP">SPP</option>
                                    <option value="Uang Gedung">Uang Gedung</option>
                                    <option value="Seragam">Seragam</option>
                                </select>
                            </div>
                            <div class="mb-3 col-6">
                                <label for="total_pembayaran" class="form-label">Total Pembayaran</label>
                                <input type="text" class="form-control" id="total_pembayaran" name="total_pembayaran" value="<?php echo $data_pembayaran->total_pembayaran ?>">
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