<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Absensi</title>
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

        .content {
            margin-left: 270px;
            padding: 20px;
        }

        .container {
            text-align: center;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        h1 {
            color: #333;
        }

        .absen-box {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
        }

        .absen-button {
            background-color: #007BFF;
            color: #fff;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
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
    <div class="content">
        <div class="container">
            <h1>Izin</h1>
            <input type="text" class="absen-box" id="absenInput" placeholder="Masukkan absensi di sini..."><br>
            <button class="absen-button">Izin</button>
        </div>
    </div>
</body>

</html>