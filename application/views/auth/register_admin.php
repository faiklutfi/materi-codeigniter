<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<style>
    body {
        background-image: url(https://foto.data.kemdikbud.go.id/getImage/20328986/12.jpg);
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
</style>

<body class="flex min-h-screen justify-center items-center bg-black/50">
    <div class="flex flex-col w-1/3 p-6 h-1/2 rounded-md sm:p-10  dark:text-gray-100">
        <div class="mb-8 text-center">
            <h1 class="my-3 text-4xl font-bold text-white"> Register admin</h1>
        </div>
        <form action="<?php echo base_url('register/aksi_register'); ?>" method="post" class="space-y-12">
            <div class="space-y-4">
                <div>
                    <label for="username" class="block mb-2 text-sm text-white">Username </label>
                    <input type="username" name="username" id="username" placeholder=" username" autocomplete="off" class="w-full px-3 py-2 border rounded-md dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100" fdprocessedid="kq4yx">
                </div>
                <div>
                    <label for="email" class="block mb-2 text-sm text-white">Email </label>
                    <input type="email" name="email" id="email" placeholder=" email" autocomplete="off" class="w-full px-3 py-2 border rounded-md dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100" fdprocessedid="kq4yx">
                </div>
                <div>
                    <label for="role" class="block mb-2 text-sm text-white">Role </label>
                    <input type="role" name="role" id="role" placeholder=" role" autocomplete="off" class="w-full px-3 py-2 border rounded-md dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100" fdprocessedid="kq4yx">
                </div>
                <div>
                    <label for="Nama depan" class="block mb-2 text-sm text-white">Nama depan </label>
                    <input type="Nama depan" name="Nama depan" id="role" placeholder=" Nama depan" autocomplete="off" class="w-full px-3 py-2 border rounded-md dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100" fdprocessedid="kq4yx">
                </div>
                <div>
                    <label for="Nama belakang" class="block mb-2 text-sm text-white">Nama belakang </label>
                    <input type="Nama belakang" name="role" id="Nama belakang" placeholder=" Nama belakang" autocomplete="off" class="w-full px-3 py-2 border rounded-md dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100" fdprocessedid="kq4yx">
                </div>
                <div>
                    <div class="flex justify-between mb-2">
                        <label name="password" for="password" class="text-sm text-white">Password</label>

                    </div>
                    <input type="password" name="password" id="password" placeholder="password" autocomplete="off" class="w-full px-3 py-2 border rounded-md dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100" fdprocessedid="3gj54k">
                </div>
            </div>
            <div class="space-y-2">
                <div>
                    <button type="submit" class="w-full px-8 py-3 font-semibold rounded-md text-white font-bolder" fdprocessedid="r78vz9">REGISTER</button>
                </div>
                <p class="px-6 text-sm text-center text-white">Sudah Punya Akun?
                    <a rel="noopener noreferrer" href="<?php echo base_url('auth/'); ?>">Login</a>.
                </p>
                <p class="px-6 text-sm text-center text-white">Sudah Punya Akun?
                    <a rel="noopener noreferrer" href="<?php echo base_url('auth/'); ?>">register admin</a>.
                </p>
            </div>
        </form>
    </div>
</body>

</html>