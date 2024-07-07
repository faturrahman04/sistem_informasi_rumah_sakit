<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $title ?></title>
  <base href="<?= base_url('assets'); ?>/">
  <link rel="stylesheet" href="css/formstyle/login.css">
</head>

<body>
  <div class="container body-style">
    <div class="for-form">
      <nav>
        <ul>
          <li><a class="active" href="/login">Login</a></li>
          <li><a href="/regis">Registrasi</a></li>
        </ul>
      </nav>
      <div style="display: flex; align-items: center; min-height: 70vh; left: 6rem; position: absolute; top: 6rem;">
        <div class="form">
          <h1>Login</h1>
          <p style="margin-bottom: 1rem;">Silahkan untuk memasukkan detail Anda!</p>

          <?php if (session()->getFlashdata('msg')) : ?>
            <div class="error" style="color: #ef444d; margin-bottom: 0.5rem;"><?= session()->getFlashdata('msg') ?></div>
          <?php endif; ?>

          <form action="/proses" method="post">
            <div class="username-box" style="height: 3.4rem; display: flex; flex-direction: column; padding: 0.3rem 0.7rem; box-sizing: border-box; border-radius: 3px;">
              <label for="username">Username</label>
              <input type="text" id="username" name="username" placeholder="Masukkan Username">
            </div>
            <div class="password-box" style="height: 3.4rem; display: flex; flex-direction: column; padding: 0.3rem 0.7rem; box-sizing: border-box; border-radius: 3px; margin-top: 0.6rem; position: relative; transition: 100ms;">
              <label for="password">Password</label>
              <input class="password" type="password" id="password" name="password" placeholder="Masukkan Password">
            </div>
            <button style="transition: 400ms;" type="submit">Masuk</button>
          </form>
          <p style="margin-top: 0.5rem;">Belum memiliki akun? <a href="/registration">Daftar</a></p>
        </div>
      </div>

    </div>

    <div class="for-hero">
      <img src="dist/img/hero2.jpg" alt="">
    </div>
  </div>
  <script src="js/formscript/login.js"></script>
</body>

</html>