<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <div class="d-flex">
        <?php $this->load->view('components/sidebar') ?>
        <div class="container-fluid">
            <?php $this->load->view('components/navbar') ?>
            <div class="card">
                <div class="card-header">
                    <h1 class="text-center">Account</h1>
                </div>
                <div class="card-body">
                        <?php foreach($user as $users) : ?>
                        <form class="row" action="<?php echo base_url('account/aksi_ubah_akun'); ?>" enctype="multipart/form-data" method="post" class="row">
                            <div class="mb-3 col-6">
                                <label for="exampleInputEmail1" class="form-label">Email</label>
                                <input type="email" class="form-control" value="<?php echo $users->email ?>" name="email">
                            </div>
                            <div class="mb-3 col-6">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control" value="<?php echo $users->username ?>" name="username">
                            </div>
                            <div class="mb-3 col-6">
                                <label for="exampleInputPassword1" class="form-label">Password Baru</label>
                                <input type="password" class="form-control" name="password_baru">
                            </div>
                            <div class="mb-3 col-6">
                                <label for="exampleInputPassword1" class="form-label">Konfirmasi Password</label>
                                <input type="password" class="form-control" name="konfirmasi_password">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                        <?php endforeach ?> 
                    </div>
                </div>
            </div>
    </div>
</body>
</html>