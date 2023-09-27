<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js"></script>
    <script src="https://use.fontawesome.com/releases/v5.7.2/css/all.css"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <style>
      a {
          text-decoration: none;
      }
      .login-page {
          width: 100%;
          height: 100vh;
          display: inline-block;
          display: flex;
          align-items: center;
      }
      .form-right i {
          font-size: 100px;
      }
    </style>
</head>
<body>
<div class="login-page bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
              <!-- <h3 class="mb-3">Login Now</h3> -->
                <div class="bg-white shadow rounded">
                    <div class="row">
                        <div class="col-md-7 pe-0">
                            <div class="form-left h-100 py-5 px-5">
                            <form action="<?php echo base_url(); ?>Auth/aksi_login" method="post" class="row g-4">
                              <div class="col-12">
                                  <label>Email<span class="text-danger">*</span></label>
                                  <div class="input-group">
                                      <div class="input-group-text"><i class="fa-solid fa-user icon-black"></i></div>
                                      <input type="email" class="form-control" placeholder="Enter Email" name="email">
                                  </div>
                              </div>
                              <div class="col-12">
                                  <label>Password<span class="text-danger">*</span></label>
                                  <div class="input-group">
                                      <div class="input-group-text"><i class="fa-solid fa-lock icon-black"></i></div>
                                      <input type="password" class="form-control" id="passwordField" placeholder="Enter Password" name="password">
                                  </div>
                              </div>
                              <div class="col-sm-6">
                                  <div class="form-check">
                                      <input class="form-check-input" type="checkbox" id="showPasswordCheckbox" onchange="togglePasswordVisibility()">
                                      <label class="form-check-label" for="showPasswordCheckbox">Show Password</label>
                                  </div>
                              </div>
                              <div class="col-12">
                                  <button type="submit" class="btn btn-primary px-4 float-end mt-4">login</button>
                              </div>
                            </form>
                            </div>
                        </div>
                        <div class="col-md-5 ps-0 d-none d-md-block">
                            <div class="form-right h-100 bg-primary text-white text-center pt-5">
                                <i class="bi bi-bootstrap"></i>
                                <h2 class="fs-1">Welcome Back!!!</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function togglePasswordVisibility() {
        var passwordField = document.getElementById("passwordField");
        var showPasswordCheckbox = document.getElementById("showPasswordCheckbox");
        if (showPasswordCheckbox.checked) {
            passwordField.type = "text";
        } else {
            passwordField.type = "password";
        }
    }
</script>
  
<!-- <div class="login-container">
    <section class="vh-100">
  <div class="container-fluid h-custom">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-md-9 col-lg-6 col-xl-5">
        <img src="https://binusasmg.sch.id/ppdb/logobinusa.png"
          class="img-fluid" alt="logo binus" style="width: 60%">
      </div>
      <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
        <form action="<?php echo base_url(); ?>Auth/aksi_login" method="post">
          <div class="d-flex flex-row align-items-center justify-content-center">
            <h1 class="lead fw-normal mb-0 me-3">SISTEM INFORMASI SEKOLAH</h1>
          </div>

          <div class="divider d-flex align-items-center my-4">
            <p class="text-center fw-bold mx-3 mb-0">SMK BINA NUSANTARA</p>
          </div>

          <div class="form-outline mb-4">
                <label class="form-label" for="form3Example3">Email</label>
                <input type="email" id="form3Example3" class="form-control form-control-lg"
                placeholder="Email" name="email"/>
          </div>

          <div class="form-outline mb-3">
                <label class="form-label" for="form3Example4">Password</label>
                <input type="password" id="form3Example4" class="form-control form-control-lg"
                placeholder="Password" name="password" />
          </div>

          <div class="text-center text-lg-start mt-4 pt-2">
            <button type="submit" class="btn btn-primary btn-lg"
              style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>
          </div>

        </form>
      </div>
    </div>
  </div>
  <div
    class="d-flex flex-column flex-md-row text-center text-md-start justify-content-between py-4 px-4 px-xl-5 bg-primary">
    <div class="text-white mb-3 mb-md-0">
      SMK BINA NUSANTARA
    </div>
    <div>
      <a href="#!" class="text-white me-4">
        <i class="fab fa-facebook-f"></i>
      </a>
      <a href="#!" class="text-white me-4">
        <i class="fab fa-twitter"></i>
      </a>
      <a href="#!" class="text-white me-4">
        <i class="fab fa-google"></i>
      </a>
      <a href="#!" class="text-white">
        <i class="fab fa-linkedin-in"></i>
      </a>
    </div>
  </div>
</section> -->
</body>
</html>
