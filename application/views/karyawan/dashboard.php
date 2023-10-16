<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .sidebar {
            height: 100%;
            width: 250px;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #333;
            padding-top: 20px;
        }

        .sidebar ul {
            list-style: none;
            padding: 0;
        }

        .sidebar ul li {
            padding: 10px 15px;
        }

        .sidebar ul li a {
            color: #fff;
            text-decoration: none;
        }

        .dashboard {
            margin-left: 250px;
            padding: 20px;
            width: 200px;
        }

        .card {
            width: 200px;
            padding: 20px;
            text-align: center;
            border: 1px solid #ccc;
            background-color: #f9f9f9;
            border-radius: 5px;
            margin: 10px;
            display: inline-block;
        }

        .card p {
            font-size: 24px;
            color: #007BFF;
            margin: 10px 0;
        }

        .fa-check,
        .fa-calendar-days,
        .fa-calculator {
            font-size: 36px;
            color: #007BFF;
        }
    </style>
</head>

<body>
    <div class="sidebar">
        <ul>
            <li class="active">
                <a href="<?php echo base_url('karyawan/dashboard') ?>"><i class="fa fa-user"></i>Dashboard Karyawan</a>
            </li>
            <li>
                <a href="<?php echo base_url('karyawan/history') ?>"><i class="fa fa-user"></i>History</a>
            </li>
            <li>
                <a href="<?php echo base_url('karyawan/menu_absen') ?>"><i class="fa fa-user"></i>Absen Karyawan</a>
            </li>
            <li>
                <a href="<?php echo base_url('karyawan/menu_izin') ?>"><i class="fa fa-user"></i>Izin Karyawan</a>
            </li>
        </ul>
    </div>
    <div class="dashboard">
        <div class="card">
            <i class="fa fa-check"></i>
            <p id="jumlahMasuk">100</p>
            Jumlah Masuk
        </div>
        <div class="card">
            <i class="fa fa-calendar-days"></i>
            <p id="jumlahIzin">25</p>
            Jumlah Izin
        </div>
        <div class="card">
            <i class="fa fa-calculator"></i>
            <p id="jumlahTotal">0</p>
            Total
        </div>
    </div>

    <script>
        const jumlahMasukElement = document.getElementById('jumlahMasuk');
        const jumlahIzinElement = document.getElementById('jumlahIzin');
        const jumlahTotalElement = document.getElementById('jumlahTotal');
        const jumlahMasuk = parseInt(jumlahMasukElement.textContent, 10);
        const jumlahIzin = parseInt(jumlahIzinElement.textContent, 10);
        const jumlahTotal = jumlahMasuk + jumlahIzin;
        jumlahTotalElement.textContent = jumlahTotal;
    </script>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Karyawan</title>
    <style>
        .order-card {
            color: #fff;
        }

        .bg-c-blue {
            background: linear-gradient(45deg, #171818, #181818);
        }

        .bg-c-green {
            background: linear-gradient(45deg, #171818, #181818);
        }


        .card {
            border-radius: 5px;
            -webkit-box-shadow: 0 1px 2.94px 0.06px rgba(4, 26, 55, 0.16);
            box-shadow: 0 1px 2.94px 0.06px rgba(4, 26, 55, 0.16);
            border: none;
            margin-bottom: 30px;
            -webkit-transition: all 0.3s ease-in-out;
            transition: all 0.3s ease-in-out;
        }

        .card .card-block {
            padding: 25px;
        }

        .order-card i {
            font-size: 26px;
        }

        .f-left {
            float: left;
        }

        .f-right {
            float: right;
        }
    </style>
    <!-- Tambahkan tag-head Anda di sini, seperti CSS dan JavaScript yang dibutuhkan -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="path/to/your/custom.css">
</head>

<body>
    <?php $this->load->view('components/sidebar_karyawan'); ?>
    <div class=" py-2 justify-content-center">
        <div class="row">
            <div class="col-md-3 col-xl-6">
                <div class="card bg-c-blue order-card">
                    <div class="card-block text-white">
                        <h6 class="m-b-20">Orders Received</h6>
                        <h2 class="text-right"><i class="fa fa-cart-plus f-left"></i><span class="f-right">486</span></h2>
                        <p class="m-b-0">Completed Orders</p>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-xl-6">
                <div class="card bg-c-green order-card">
                    <div class="card-block text-white">
                        <h6 class="m-b-20">Orders Received</h6>
                        <h2 class="text-right"><i class="fa fa-rocket f-left"></i><span class="f-right">486</span></h2>
                        <p class="m-b-0">Completed Orders</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="">
            <table class="table">
                <thead class="table-dark">
                    <tr class="text-center">
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Jam Masuk</th>
                        <th>Jam Pulang</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 0;
                    foreach ($absensi as $row) : $no++ ?>
                        <tr class="text-center">
                            <td><?php echo $no ?></td>
                            <td><?php echo $row->tanggal ?></td>
                            <td><?php echo $row->jam_masuk ?></td>
                            <td><?php echo $row->jam_pulang ?></td>
                            <td><?php echo $row->status ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <!-- penghubung dashboard -->
    </div>
    </div>
    </div>
    </div>
    <!-- Tambahkan tag-script Anda di sini, seperti JavaScript yang dibutuhkan -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="path/to/your/custom.js"></script>
</body>

</html>