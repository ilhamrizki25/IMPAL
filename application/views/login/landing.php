<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>Login</title>
  <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="<?= base_url(); ?>/assets/bootstrap/css/bootstrap.min.css" />
</head>

<style>
  html,
  body {
    font-family: "Roboto Condensed", sans-serif;
    width: 100%;
    height: 100%;
    overflow: hidden;
  }

  #App {
    width: 100%;
    height: 100%;
    /* display: flex; */
  }

  #Info {
    background-color: #c4c4c4;
    /* background-image: url("../assets/img/BG-Regis.png"); */
  }

  #Info h1 {
    font-size: 90px;
    letter-spacing: 18px;
    text-transform: uppercase;
    font-weight: 700;
    margin-top: 20px;
  }

  #Info img {
    height: 60%;
  }

  #Login {
    font-size: 18px;
  }

  #Login a {
    font-size: 14px;
  }

  #Login h1 {
    margin-bottom: 50px;
  }

  #Login form {
    display: flex;
    flex-direction: column;
    justify-content: center;
  }

  #Info,
  #Login {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
  }
</style>

<body>
  <div class="row" id="App">

    <!-- Left Side -->
    <div id="Info" class="col-lg-7">
      <img src="<?= base_url(); ?>/assets/img/Landing.png" alt="" />
      <h1>adventure</h1>
    </div>

    <!-- Right Side -->
    <div id="Login" class="col-lg-5">
      <form class="col-md-9" action="<?= base_url(); ?>login/doLogin" method="post">
        <h1 class="d-flex justify-content-center">Login Tamagotchi Adventure</h1>
        <?php if ($this->session->flashdata()) { ?>
        <div class="alert alert-success">
            <?= $this->session->flashdata('msg'); ?>
        </div>
        <?php } ?>
        <div class="form-group">
          <label for="email">Email or Username</label>
          <input type="text" name="email" required class="form-control" id="email">
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" name="password" required class="form-control" id="password">
          <!-- <a href="">Forgot password?</a> -->
        </div>
        <button type="submit" class="btn btn-primary my-2 container-fluid">Login</button>
        <a href="<?= base_url(); ?>register" class="d-flex justify-content-center">Register new account</a>
      </form>
    </div>

  </div>
</body>

</html>