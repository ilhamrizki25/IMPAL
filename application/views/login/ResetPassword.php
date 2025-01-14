<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>Reset Password</title>
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
    height: 100%;
    /* color: white; */
    background-image: url("<?= base_url(); ?>/assets/img/BG-Regis.png");
  }

  .PasswordForm {
    height: 100%;
    width: 40%;
    display: flex;
    flex-direction: column;
    justify-content: center;  
    align-items: center;
    background-color: #F2F1E3;
    box-shadow: 2px 2px 10px 0px rgba(0,0,0,0.75);
  }

  .title {
    margin-bottom: 20px;
  }

  .btn-primary {
    margin-top: 20px;
  }

  form {
    display: flex;
    flex-direction: column;
    justify-content: center;
  }

</style>

<body>
  <div id="App">
    <div class="PasswordForm container col-6">
      <form class="col-md-10" action="">
        <h1 class="d-flex justify-content-center title">Change Password</h1>
        <div class="form-group">
          <label for="validationTooltip01">New Password</label>
          <input type="password" class="form-control" id="password1" />
        </div>
        <div class="form-group">
          <label for="validationTooltip01">Confirm Password</label>
          <input type="password" class="form-control" id="password2" />
        </div>
        <button class="btn btn-primary container-fluid" type="submit">Change Password</button>
      </form>
    </div>
  </div>
</body>

</html>