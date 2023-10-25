<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>

<body>
    <?php foreach ($user as $user) : ?>
        <?php $this->load->view('components/sidebar_karyawan'); ?>
        <div class="row">
            <!-- profil -->
            <div class="col-xl-4">
                <div class="card mb-4 mb-xl-0">
                    <div class="card-header bg-primary text-white text-center">Foto Profil</div>
                    <div class="card-body text-center justify-content-center">
                        <img class="img-account-profile rounded-circle mb-2 w-25 mx-auto " src="<?php echo base_url('images/' . $user->image) ?>" alt="">
                        <div class="small font-italic text-muted">Harus berbentuk jpg/jpeg/png.</div>
                        <p class="small font-italic text-muted mb-4">Disarankan berukuran 1:1</p>
                        <form action="<?php echo base_url('karyawan/edit_foto'); ?>" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="<?php echo $user->id; ?>">
                            <label for="image" class="btn btn-primary">
                                Edit Foto
                                <input type="file" id="image" name="image" accept="image/*" style="display: none;">
                            </label>
                            <button type="submit" class="btn btn-success">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- untuk edit akun -->
            <div class="col-xl-8">
                <div class="d-flex align-items-center">
                    <div class="card w-100 m-auto p-3 text-dark">
                        <h3 class="text-center p-3">Akun</h3>
                        <form action="<?php echo base_url('karyawan/edit_profile') ?>" method="post" class="row" enctype="multipart/form-data">
                            <div class="mb-3 col-6">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" value="<?php echo $user->email ?>" class="form-control" id="email" name="email">
                            </div>
                            <div class="mb-3 col-6">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control" value="<?php echo $user->username ?>" id="username" name="username">
                            </div>
                            <div class="mb-3 col-6">
                                <label for="first_name" class="form-label">First Name</label>
                                <input type="text" class="form-control" value="<?php echo $user->first_name ?>" id="first_name" name="first_name">
                            </div>
                            <div class="mb-3 col-6">
                                <label for="last_name" class="form-label">Last Name</label>
                                <input type="text" class="form-control" value="<?php echo $user->last_name ?>" id="last_name" name="last_name">
                            </div>
                            <div class="mb-3 col-6">
                                <label for="password" class="form-label">Password lama</label>
                                <input type="password" class="form-control" id="password" name="password">
                                <span class="" onclick="togglePassword('password')"><i id="icon-password" class="fas fa-eye"></i></span>
                            </div>
                            <div class="mb-3 col-6">
                                <label for="password_baru" class="form-label">Password Baru</label>
                                <input type="text" class="form-control" id="password_baru" name="password_baru">
                            </div>
                            <div class="mb-3 col-6">
                                <label for="konfirmasi_password" class="form-label">Konfirmasi Password Baru</label>
                                <input type="text" class="form-control" id="konfirmasi_password" name="konfirmasi_password">
                            </div>
                            <!-- <div class="mb-3 col-12">
                    <label for="kelas" class="form-label">Foto</label>
                    <input type="file" class="form-control" id="foto" name="foto">
                </div> -->
                            <button type="submit" class="btn btn-dark" name="submit">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- penghubung dashboard -->
        </div>
        </div>
        </div>
        </div>
        <script>
            function togglePassword(inputId) {
                var x = document.getElementById(inputId);
                var icon = document.getElementById("icon-" + inputId);

                if (x.type === "password") {
                    x.type = "text";
                    icon.classList.remove("fa-eye");
                    icon.classList.add("fa-eye-slash");
                } else {
                    x.type = "password";
                    icon.classList.remove("fa-eye-slash");
                    icon.classList.add("fa-eye");
                }
            }
        </script>
    <?php endforeach ?>
</body>

</html>