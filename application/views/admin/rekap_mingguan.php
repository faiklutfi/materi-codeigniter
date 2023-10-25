<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/responsive.css'); ?>">
    <style>
        /* Add your custom CSS styles here */
        .main {
            margin: 2em;
            /* Adjust the margin as needed */
        }

        .container {
            width: 75%;
        }

        .card {
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .card-header {
            background-color: #f5f5f5;
            padding: 10px;
            border-bottom: 1px solid #ccc;
        }

        .card-body {
            padding: 20px;
        }

        .input-group {
            margin: 10px 0;
        }

        .btn {
            margin: 5px;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
        }

        .table th,
        .table td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: center;
        }

        .text-center {
            text-align: center;
        }
    </style>
</head>

<body>
    <?php $this->load->view('components/sidebar_admin'); ?>
    <div class="container mt-4">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h5 class="m-0">Rekap Mingguan</h5>
            </div>
            <div class="card-body">
                <form action="<?= base_url('admin/rekap_mingguan'); ?>" method="get" class="mb-4">
                    <div class="row g-3">
                        <div class="col-md-5">
                            <label for="start_date" class="form-label">Tanggal Awal</label>
                            <input type="date" class="form-control" id="start_date" name="start_date" value="<?php echo isset($_GET['start_date']) ? $_GET['start_date'] : ''; ?>">
                        </div>
                        <div class="col-md-5">
                            <label for="end_date" class="form-label">Tanggal Akhir</label>
                            <input type="date" class="form-control" id="end_date" name="end_date" value="<?php echo isset($_GET['end_date']) ? $_GET['end_date'] : ''; ?>">
                        </div>
                        <div class="col-md-2">
                            <button type="submit" name="submit" class="btn btn-sm btn-primary" formaction="<?php echo base_url('admin/export_mingguan') ?>">Export</button>
                            <button type="submit" class="btn btn-success">Filter</button>
                        </div>
                    </div>

            </div>
            </form>
            <hr>
            <div class="table-responsive">
                <?php if (empty($absensi)) : ?>
                    <h5 class="text-center">Tidak ada data di minggu ini.</h5>
                    <p class="text-center">Silakan pilih rentang tanggal lain.</p>
                <?php else : ?>
                    <table class="table table-hover">
                        <thead class="table-primary">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Kegiatan</th>
                                <th scope="col">Jam Masuk</th>
                                <th scope="col">Jam Pulang</th>
                                <th scope="col">Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 0;
                            foreach ($absensi as $rekap) : $no++; ?>
                                <tr>
                                    <td><?= $no; ?></td>
                                    <td><?= $rekap->tanggal; ?></td>
                                    <td><?= $rekap->kegiatan; ?></td>
                                    <td><?= $rekap->jam_masuk; ?></td>
                                    <td><?= $rekap->jam_pulang; ?></td>
                                    <td><?= $rekap->keterangan_izin; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php endif; ?>
            </div>
        </div>
    </div>
    </div>
</body>

</html>