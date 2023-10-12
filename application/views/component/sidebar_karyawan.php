<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Karyawan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />


    <!-- Tambahkan CSS kustom untuk tampilan sidebar -->
    <style>
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
            /* Sesuaikan dengan lebar sidebar */
            padding: 20px;
        }
    </style>
</head>

<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <ul>
            <li><a href="dashboard_karyawan"><i class="fa-solid fa-inbox"></i>
                    Dashboard Karyawan</a></li>
            <li><a href="dashboard"><i class="fa-solid fa-user-tie"></i>
                    Dashboard</a></li>
            <li><a href="absensi"><i class="fa-solid fa-id-card-clip"></i>
                    Absensi</a></li>
            <li><a href="menu_absensi"><i class="fa-solid fa-square-caret-down"></i>
                    menu Absensi</a></li>
            <li><a href="menu_izin"><i class="fa-brands fa-mizuni"></i>
                    menu izin</a></li>
            <!-- Tambahkan tautan-tautan lain sesuai kebutuhan -->
            <li><a href="logout"><i class="fa-solid fa-arrow-right-from-bracket"></i>
                    Logout</a></li> <!-- Tambahkan tautan Logout -->
            <!-- Tambahkan tautan-tautan lain sesuai kebutuhan -->
        </ul>
    </div>

    <!-- Konten utama -->
    <div class="content">
        <!-- Isi konten utama halaman di sini -->
    </div>
</body>

</html>