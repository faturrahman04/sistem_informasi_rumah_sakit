<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title><?= $title ?></title>
  <base href="<?= base_url('assets') ?>/">
  <link rel="stylesheet" href="css/navbar.css">
  <link rel="stylesheet" href="css/home.css">
  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- IonIcons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
</head>

<body>
  <nav class="navbar">
    <div class="fill-nav">
      <h4><a href="">Faturrahman</a></h4>
      <ul>
        <li><a href="/">Home</a></li>
        <li><a href="/profile">Profile</a></li>
        <li><a href="/login">Login</a></li>
      </ul>
      <ul style="display: flex; width: 12%; justify-content: space-between;">
        <li><a href=""><i class="fab fa-facebook" style="font-size: 1.5rem;"></i></a></li>
        <li><a href=""><i class="fab fa-twitter" style="font-size: 1.5rem;"></i></a></li>
        <li><a href=""><i class="fab fa-instagram" style="font-size: 1.5rem;"></i></a></li>
      </ul>
    </div>
  </nav>