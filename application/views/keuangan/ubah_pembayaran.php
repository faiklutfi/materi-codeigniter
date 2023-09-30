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
                <?php foreach ($pembayaran as $data_pembayaran): ?>
                    <form action="<?php echo base_url('keuangan/aksi_ubah_pembayaran') ?>" enctype="multipart/form-data"
                        method="POST" class="grid grid-cols-2 gap-4">
                        <input name="id" type="hidden" value="<?php echo $data_pembayaran->id ?>">
                        <div class="mb-4 col-span-1">
                            <label for="siswa" class="block text-gray-700 font-bold mb-2">Siswa</label>
                            <select id="siswa" name="siswa" class="w-full border border-gray-300 p-2 rounded-lg" required>
                                <option selected value="<?php $data_pembayaran->id_siswa ?>">
                                    <?php echo tampil_full_siswa_byid($data_pembayaran->id_siswa) ?>
                                </option>
                                <?php foreach ($siswa as $row): ?>
                                    <option value="<?php echo $row->id_siswa ?>">
                                        <?php echo $row->nama_siswa ?>
                                    </option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="mb-4 col-span-1">
                            <label for="total" class="block text-gray-700 font-bold mb-2">Total
                                Pembayaran</label>
                            <div class="relative">
                                <span class="text-gray-700 font-bold absolute top-2 left-3">Rp</span>
                                <input type="text" id="total" name="total"
                                    class="pl-10 w-full border border-gray-300 p-2 rounded-lg"
                                    value="<?php echo $data_pembayaran->total_pembayaran ?>" required>
                            </div>
                        </div>
                        <div class="mb-4 col-span-1">
                            <label for="jenis" class="block text-gray-700 font-bold mb-2">Jenis Pembayaran</label>
                            <select id="jenis" name="jenis" class="w-full border border-gray-300 p-2 rounded-lg" required>
                                <option selected value="<?php echo $data_pembayaran->jenis_pembayaran ?>">
                                    <?php echo $data_pembayaran->jenis_pembayaran ?>
                                </option>
                                <option value="SPP">SPP</option>
                                <option value="Uang Gedung">Uang Gedung</option>
                                <option value="Uang Seragam">Uang Seragam</option>
                            </select>
                        </div>
                        <button type="submit"
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded col-span-2">
                            Ubah Pembayaran
                        </button>
                    </form>
                <?php endforeach ?>
            </div>
        </div>
    </div>
    </div>
</body>

</html>