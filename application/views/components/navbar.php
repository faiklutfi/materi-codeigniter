<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar</title>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-primary">
  <div class="container-fluid">
    <!-- <a class="navbar-brand" href="#">Navbar</a> -->
    <h1>Selamat datang, </h1>
    <!-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button> -->
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      <strong class="text-dark"><?php echo $this->session->userdata('username') ?></strong>
      </ul>
      <ul>
        <a href="<?php echo base_url('account'); ?>" class="flex items-center p-2 text-black-900 rounded-lg dark:text-white hover:bg-black-100 dark:hover:bg-black-700 group">
           <svg class="flex-shrink-0 w-5 h-5 text-black-500 transition duration-75 dark:text-black-400 group-hover:text-black-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
              <path d="M14 2a3.963 3.963 0 0 0-1.4.267 6.439 6.439 0 0 1-1.331 6.638A4 4 0 1 0 14 2Zm1 9h-1.264A6.957 6.957 0 0 1 15 15v2a2.97 2.97 0 0 1-.184 1H19a1 1 0 0 0 1-1v-1a5.006 5.006 0 0 0-5-5ZM6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Z"/>
           </svg>
        </a>
      </ul>
    </div>
  </div>
</nav>
<div class="mb-4"></div>
</body>
</html>