<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <style>
        html {
        scroll-behavior: smooth;
        }

        body {
        background-color: #00FFAB;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
        font-family: 'Quicksand', sans-serif;
        font-weight: 700;
        }

        input,
        a,
        p,
        li {
        font-family: 'Roboto', sans-serif;
        font-weight: 300;
        }

        .btn {
        width: 200px;
        margin: 0 auto;
        }
        
        header.masthead {
        position: relative;
        background: url("https://img.freepik.com/free-vector/large-school-building-scene_1308-32058.jpg?w=2000") /*black no-repeat center center scroll*/;
        background-size: cover;
        padding-top: 12rem;
        padding-bottom: 8rem;
        }

        header.masthead .overlay {
        position: absolute;
        background-color: #1387FF;
        height: 100%;
        width: 100%;
        top: 0;
        left: 0;
        opacity: 0.3;
        }

        header.masthead h1 {
        font-size: 2rem;
        }

        @media (min-width: 768px) {
        header.masthead {
            padding-top: 12rem;
            padding-bottom: 12rem;
        }
        header.masthead h1 {
            font-size: 3rem;
        }
    }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
  <div class="container">
    <a class="navbar-brand" href="#" style="font-family: 'Quicksand', sans-serif;
  font-weight: 700;">Giuseppe Mele</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
          <a class="nav-link" href="#">Home
                <span class="sr-only">(current)</span>
              </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#services">Services</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#about">About</a>
        </li>
      </ul>
    </div>
  </div>
</nav>


  <!-- Masthead -->
  <header class="masthead text-white text-center">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-xl-9 mx-auto">
          <h1 class="mb-5" style="color: white; font-size: 4rem; text-shadow: 2px 4px 3px rgba(0,0,0,0.3);">Modern Business Landing Page Template</h1>
        </div>
        <div class="col-md-10 col-lg-8 col-xl-7 mx-auto">
          <div class="text-center">
          <a href='auth' class="btn btn-block btn-lg btn-primary">Login</a>
          </div>
        </div>
      </div>
    </div>
  </header>
</html>
