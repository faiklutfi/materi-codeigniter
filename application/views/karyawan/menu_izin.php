<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="path/to/your/custom.css">
    <style>
        /* Custom CSS for your page */
        .form-container {
            margin-top: 50px;
            border: 1px solid #d4d4d4;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }

        #izinForm {
            max-width: 100%;
        }

        #keterangan {
            width: 100%;
        }

        #ajukanButton {
            background-color: #343a40;
            color: #fff;
            border: none;
        }

        #ajukanButton:hover {
            background-color: #23272b;
        }
    </style>
</head>

<body>
    <?php $this->load->view('components/sidebar_karyawan'); ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 form-container">
                <h1 class="text-center">Form Izin Karyawan</h1>
                <form action="<?= base_url('karyawan/menu_izin'); ?>" method="post" id="izinForm">
                    <div class="mb-3">
                        <label for="keterangan">Keterangan Izin</label>
                        <textarea class="form-control" id="keterangan" name="keterangan" rows="4" required></textarea>
                    </div>
                    <button type="button" class="btn btn-dark" id="ajukanButton">Ajukan Izin</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="path/to/your/custom.js"></script>
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.3/dist/sweetalert2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        $(document).ready(function() {
            $('#ajukanButton').click(function() {
                Swal.fire({
                    title: 'Ajukan Izin',
                    text: 'Apakah Anda yakin ingin mengajukan izin ini?',
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, Ajukan!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Jika pengguna mengonfirmasi, submit form
                        $('#izinForm').submit();
                    }
                });
            });
        });
    </script>
</body>

</html>