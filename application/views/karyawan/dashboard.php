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

        <div class="">
            <table class="table">
                <thead class="table-dark">
                    <tr class="text-center">
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Kegiatan</th>
                        <th>Keterangan Izin</th>
                        <th>Jam Masuk</th>
                        <th>Jam Pulang</th>
                        <th>Status</bth>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 0;
                    foreach ($absensi as $row) : $no++ ?>
                        <tr class="text-center">
                            <td><?php echo $no; ?></td>
                            <td><?php echo $row->tanggal; ?></td>
                            <td><?php echo $row->kegiatan; ?></td>
                            <td><?php echo $row->keterangan_izin; ?></td>
                            <td><?php echo $row->jam_masuk; ?></td>
                            <td><?php echo $row->jam_pulang; ?></td>
                            <td><?php echo $row->status; ?></td>
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