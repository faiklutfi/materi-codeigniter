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

        /* CSS untuk tabel */
        .table {
            margin-top: 5px;
            border-collapse: collapse;
            width: 100%;
        }

        .table th,
        .table td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
        }

        .table th {
            background-color: #333;
            color: #fff;
        }

        .table tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        /* CSS untuk h2 */
        h2 {
            color: #333;
            font-size: 24px;
            margin-bottom: 10px;
        }

        /* CSS untuk tombol */
        .btn {
            padding: 8px 16px;
            text-decoration: none;
            margin-right: 10px;
            background-color: #6699ff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
        }

        .btn:hover {
            background-color: #555;
        }

        /* CSS untuk teks tengah */
        .text-center {
            text-align: center;
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
        <h2>Data Absen</h2>
        <table class="table">
            <thead class="table-dark">
                <tr class="text-center">
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Jam Masuk</th>
                    <th>Jam Pulang</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($absensi as $row) : ?>
                    <tr class="text-center">
                        <td><?php echo $no = 1; ?></td>
                        <td><?php echo $row->date ?></td>
                        <td><?php echo $row->jam_masuk ?></td>
                        <td><?php echo $row->jam_pulang ?></td>
                        <td><?php echo $row->status ?></td>
                        <td>
                            <?php if ($row->status == 'done') : ?>
                                Izin
                            <?php else : ?>
                                <a href="<?php echo site_url('employee/pulang/' . $row->id); ?>" class="btn btn-success" id="pulangButton_<?php echo $row->id; ?>">Pulang</a>
                                <a href="" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i>Ubah</a>
                                <button class="btn btn-danger"><i class="fa-solid fa-trash-can"></i>Hapus</button>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <td>

        </a>
    </td>
</body>

</html>