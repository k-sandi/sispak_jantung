<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/theme.css" type="text/css"> </head>
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/bootstrap/bootstrap.min.js"></script>
<body>
  <nav class="navbar navbar-expand-md bg-secondary navbar-dark">
    <div class="container">
      <a class="navbar-brand" href="#">Sistem Pakar</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link text-putih" href="<?php echo base_url(); ?>">Home</a>
          </li>
          <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url(); ?>Home/try_pemeriksaan">Deteksi Penyakit</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url(); ?>Home/about">About</a>
          </li>
        </ul>
        <form class="form-inline m-0">
          <a href="<?php echo base_url(); ?>global/login" class="btn btn-primary text-capitalize text-putih">Login / Register Member</a>
        </form>
      </div>
    </div>
  </nav>

  <?php echo $content;?>

  <div class="bg-dark text-white">
    <div class="container">
      <div class="row">
        <div class="p-4 col-md-4">
          <h2 class="mb-4 text-secondary">Sistem Pakar</h2>
          <p class="text-white">Sistem Pakar Deteksi Penyakit Jantung dengan Metode Fuzzy Inferensi Sugeno.</p>
        </div>
        <div class="p-4 col-md-4">
          <h2 class="mb-4 text-secondary">Mapsite</h2>
          <ul class="list-unstyled">
            <a href="<?php echo base_url(); ?>" class="text-white">Home</a>
            <br>
            <a href="<?php echo base_url(); ?>global/login" class="text-white">Login</a>
            <br>
            <a href="<?php echo base_url(); ?>global/register" class="text-white">Register</a>
            <br>
            <br>
            <a href="<?php echo base_url(); ?>Home/try_pemeriksaan" class="text-white">Deteksi Penyakit</a>
            <br>
            <br>
            <a href="<?php echo base_url(); ?>Home/about" class="text-white">About</a>
            <br>

          </ul>
        </div>
        <div class="p-4 col-md-4">
          <h2 class="mb-4">Contact</h2>
          <p>
            <a href="tel:+246 - 542 550 5462" class="text-white"><i class="fa d-inline mr-3 text-secondary fa-phone"></i></a>022-2009562</p>
          <p>
            <a href="mailto:info@pingendo.com" class="text-white"><i class="fa d-inline mr-3 text-secondary fa-envelope-o"></i></a>Poltekpos.ac.id</p>
          <p>
            <a href="https://goo.gl/maps/AUq7b9W7yYJ2" class="text-white" target="_blank"><i class="fa d-inline mr-3 fa-map-marker text-secondary"></i></a>Bandung, Jawa Barat</p>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 mt-3">
          <p class="text-center text-putih">© Copyright 2019 Politeknik Pos Indonesia</p>
        </div>
      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>

</html>
