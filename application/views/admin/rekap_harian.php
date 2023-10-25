<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/responsive.css'); ?>">
    <style>
        /* Add your custom CSS styles here */
        body {
            font-family: Arial, sans-serif;
        }

        .main {
            margin: 2em;
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
            margin-bottom: 10px;
        }

        .btn {
            margin-right: 10px;
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

        .error-message {
            color: red;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <?php $this->load->view('components/sidebar_admin'); ?>
    <div class="main">
        <div class="container">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5>Rekap Harian</h5>
                </div>
                <div class="card-body">
                    <form action="<?= base_url('admin/rekap_harian'); ?>" method="get">
                        <div class="d-flex justify-content-between">
                            <input type="date" class="form-control" id="tanggal" name="tanggal" value="<?php echo isset($_GET['tanggal']) ? $_GET['tanggal'] : ''; ?>">
                            <button type="submit" name="submit" class="btn btn-sm btn-primary" formaction="<?php echo base_url('admin/export_harian') ?>">Export</button>
                            <button type="submit" class="btn btn-success">Filter</button>
                        </div>
                    </form>
                    <br>
                    <hr>
                    <br>
                    <div class="table-responsive">
                        <?php if (!empty($rekap_harian)) : ?>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Kegiatan</th>
                                        <th scope="col">Tanggal</th>
                                        <th scope="col">Jam Masuk</th>
                                        <th scope="col">Jam Pulang</th>
                                        <th scope="col">Keterangan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 0;
                                    foreach ($rekap_harian as $rekap) : $no++ ?>
                                        <tr>
                                            <td><?= $no; ?></td>
                                            <td><?= $rekap->kegiatan; ?></td>
                                            <td><?= $rekap->tanggal ?></td>
                                            <td><?= $rekap->jam_masuk; ?></td>
                                            <td><?= $rekap->jam_pulang; ?></td>
                                            <td><?= $rekap->keterangan_izin; ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        <?php else : ?>
                            <h5 class="text-center error-message">Tidak ada data untuk tanggal ini.</h5>
                            <p class="text-center">Silahkan pilih tanggal lain.</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>