<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            background-image: url(https://www.gotravelly.com/blog/wp-content/uploads/2019/10/Gunung-Fuji-Jepang-1024x640.jpg);
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }

        .card-title {
            color: #fff;
        }

        .card {
            background-color: rgba(0, 0, 0, 0.2);
            padding: 20px;
        }

        .logo {
            max-width: 200px;
            height: auto;
            display: block;
            margin: 0 auto 40px;
        }

        .custom-button {
            font-size: 10px;
            width: 150px
        }

        .footer {
            background-color: rgba(0, 0, 0, 0.7);
            padding: 10px;
            color: #fff;
        }

        .ddd {
            text-align: center;
        }
    </style>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>

<body class="body">
    <div class="container ">

        <div class="card mt-5 w-50 justify-content-center mx-auto bg-transparent">
            <h3 class="card-header mx-auto text-fold text-center" style="color:red"><strong>LOGIN</strong></h3>
            <div class="card-body">
                <form action="<?php echo base_url(); ?>auth/aksi_login" method="post" class="space-y-12">
                    <br>
                    <div class="mb-3">
                        <div class="ddd">
                            <label for="email" class="block mb-2 text-sm text-center" style="color:yellow">Email Address</label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="Input your email" aria-describedby="emailHelp">
                        </div>

                        <br>
                        <br>
                        <div class="flex justify-between mb-2">
                            <div class="ddd">
                                <label for="password" class="text-sm" style="color:yellow">Password</label>
                                <input type="password" class="form-control" name="password" id="password" placeholder="Input your password" autocomplete="off">
                            </div>
                        </div>

                        <br>
                        <div class="d-grid gap-2 col-6 mx-auto">
                            <button type="submit" class="btn btn-primary text-bg-info">Login </button>
                            <div class="text-center">
                                <br>
                                <br>
                                <a href="auth/register" style="color:red"><strong>Register</strong></a>
                            </div>
                </form>
            </div>
        </div>
    </div>
    </div>

</body>

</html>