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
                <a href="<?php echo base_url('employee/dashboard') ?>"><i class="fa fa-user"></i>Dashboard Karyawan</a>
            </li>
            <li>
                <a href="<?php echo base_url('employee/history') ?>"><i class="fa fa-user"></i>History</a>
            </li>
            <li>
                <a href="<?php echo base_url('employee/menu_absen') ?>"><i class="fa fa-user"></i>Absen Karyawan</a>
            </li>
            <li>
                <a href="<?php echo base_url('employee/menu_izin') ?>"><i class="fa fa-user"></i>Izin Karyawan</a>
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