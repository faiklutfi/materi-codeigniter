<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REKAP BULANAN</title>
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
            display: flex;
            justify-content: space-between;
            align-items: center;
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

        select.form-control {
            width: 200px;
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

</head>

<body>
    <?php $this->load->view('components/sidebar_admin'); ?>
    <div class="main m-4">
        <div class="container w-75">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5>Rekap Bulanan</h5>
                </div>
                <div class="card-body">
                    <form action="<?= base_url('admin/rekap_bulanan'); ?>" method="get">
                        <div class="d-flex justify-content-between">
                            <select class="form-control" id="bulan" name="bulan">
                                <option>Pilih Bulan</option>
                                <option value="1" <?php if (isset($_GET['bulan']) && $_GET['bulan'] == '1') echo 'selected'; ?>>Januari
                                </option>
                                <option value="2" <?php if (isset($_GET['bulan']) && $_GET['bulan'] == '2') echo 'selected'; ?>>
                                    Februari</option>
                                <option value="3" <?php if (isset($_GET['bulan']) && $_GET['bulan'] == '3') echo 'selected'; ?>>Maret
                                </option>
                                <option value="4" <?php if (isset($_GET['bulan']) && $_GET['bulan'] == '4') echo 'selected'; ?>>April
                                </option>
                                <option value="5" <?php if (isset($_GET['bulan']) && $_GET['bulan'] == '5') echo 'selected'; ?>>Mei
                                </option>
                                <option value="6" <?php if (isset($_GET['bulan']) && $_GET['bulan'] == '6') echo 'selected'; ?>>Juni
                                </option>
                                <option value="7" <?php if (isset($_GET['bulan']) && $_GET['bulan'] == '7') echo 'selected'; ?>>Juli
                                </option>
                                <option value="8" <?php if (isset($_GET['bulan']) && $_GET['bulan'] == '8') echo 'selected'; ?>>Agustus
                                </option>
                                <option value="9" <?php if (isset($_GET['bulan']) && $_GET['bulan'] == '9') echo 'selected'; ?>>
                                    September</option>
                                <option value="10" <?php if (isset($_GET['bulan']) && $_GET['bulan'] == '10') echo 'selected'; ?>>
                                    Oktober</option>
                                <option value="11" <?php if (isset($_GET['bulan']) && $_GET['bulan'] == '11') echo 'selected'; ?>>
                                    November</option>
                                <option value="12" <?php if (isset($_GET['bulan']) && $_GET['bulan'] == '12') echo 'selected'; ?>>
                                    Desember</option>
                            </select>
                            <button type="submit" name="submit" class="btn btn-sm btn-primary" formaction="<?php echo base_url('admin/export_bulanan') ?>">Export</button>
                            <button type="submit" class="btn btn-success">Filter</button>
                        </div>
                    </form>
                    <br>
                    <hr>
                    <br>
                    <div class="table-responsive">
                        <?php if (empty($rekap_harian)) : ?>
                            <h5 class="text-center">Tidak ada data dibulan ini.</h5>
                            <p class="text-center">Silahkan pilih Bulan lain.</p>
                        <?php else : ?>
                            <?php foreach ($rekap_bulanan as $data) : ?>
                                <table class="table" data-month="<?= $data['bulan'] ?>">
                                    <thead>
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
                                        <?php $data_found = false; ?>
                                        <?php foreach ($rekap_harian as $rekap_harian) : ?>
                                            <?php if (date('n', strtotime($rekap_harian['tanggal'])) == $data['bulan']) : ?>
                                                <?php $data_found = true; ?>
                                                <tr>
                                                    <td><?= $rekap_harian['id']; ?></td>
                                                    <td><?= $rekap_harian['tanggal']; ?></td>
                                                    <td><?= $rekap_harian['kegiatan']; ?></td>
                                                    <td><?= $rekap_harian['jam_masuk']; ?></td>
                                                    <td><?= $rekap_harian['jam_pulang']; ?></td>
                                                    <td><?= $rekap_harian['keterangan_izin']; ?></td>
                                                </tr>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                        <?php if (!$data_found) : ?>
                                            <tr>
                                                <td colspan="7">Tidak ada data untuk bulan ini.</td>
                                            </tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>