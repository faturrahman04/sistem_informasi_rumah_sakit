<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $title ?></title>
  <base href="<?= base_url('assets'); ?>/">
  <link rel="stylesheet" href="css/formstyle/regis.css">
</head>

<body>
  <div class="container">
    <div class="for-hero">
      <img src="dist/img/hero3.jpg" alt="">
    </div>

    <div class="for-form">
      <nav>
        <ul>
          <li><a href="/login">Login</a></li>
          <li><a class="active" href="/regis">Registrasi</a></li>
        </ul>
      </nav>
      <div style="position: relative; display: flex; align-items: center; min-height: 70vh; left: 6rem; top: 6rem;">
        <div class="form">
          <h1>Sign up</h1>
          <p style="margin-bottom: 1rem;">Silahkan untuk memasukkan detail Anda!</p>
          <form action="/daftar" method="post">
            <div class="username-box" style="height: 3.4rem; display: flex; flex-direction: column; padding: 0.3rem 0.7rem; box-sizing: border-box; border-radius: 3px;">
              <label for="username">Username</label>
              <input type="text" id="username" name="username" placeholder="Masukkan Username">
            </div>
            <div class="email-box" style="height: 3.4rem; display: flex; flex-direction: column; padding: 0.3rem 0.7rem; box-sizing: border-box; border-radius: 3px; margin-top: 0.6rem; transition: 100ms;">
              <label for="email">Email</label>
              <input class="email" type="email" id="email" name="email" placeholder="Masukkan Email">
            </div>
            <div class="password-box" style="height: 3.4rem; display: flex; flex-direction: column; padding: 0.3rem 0.7rem; box-sizing: border-box; border-radius: 3px; margin-top: 0.6rem; transition: 100ms;">
              <label for="password">Password</label>
              <input class="password" type="password" id="password" name="password" placeholder="Masukkan Password">
            </div>
            <div class="password-confirm-box" style="height: 3.4rem; display: flex; flex-direction: column; padding: 0.3rem 0.7rem; box-sizing: border-box; border-radius: 3px; margin-top: 0.6rem; transition: 100ms;">
              <label for="password2">Password</label>
              <input class="password-confirm" type="password" id="password2" name="password_confirm" placeholder="Konfirmasi Password">
            </div>
            <button style="transition: 400ms;" type="submit">Daftar</button>
          </form>
          <p style="margin-top: 0.5rem;">Sudah memiliki akun? <a href="/registration">Login</a></p>
        </div>
      </div>
    </div>
  </div>
  <script src="js/formscript/regis.js"></script>
</body>

</html>