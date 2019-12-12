<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>Registration Form</title>
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

  .Registration {
    height: 100%;
    width: 40%;
    display: flex;
    flex-direction: column;
    justify-content: center;  
    align-items: center;
    background-color: #F2F1E3;
    box-shadow: 2px 2px 10px 0px rgba(0,0,0,0.75);
  }

  form {
    height: 20%;
  }

  .title {
    margin-bottom: 20px;
  }

  .btn-primary {
    margin-top: 20px;
  }

  p, a {
    font-size: 14px ;
  }

  form {
    display: flex;
    flex-direction: column;
    justify-content: center;
  }

</style>

<body>
  <div id="App">
    <div class="Registration container col-6">
      <form class="col-md-10" action="<?= base_url(); ?>register/doRegister" method="post">
          <h1 class="d-flex justify-content-center title">Registration Form</h1>
          <hr />
          <?php if ($this->session->flashdata()) { ?>
            <div class="alert alert-danger">
            <?=$this->session->flashdata('errors'); ?>
            </div>
          <?php } ?>
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" name="name" required class="form-control" id="name">
        </div>
        <div class="form-group">
          <label for="email">Email address:</label>
          <input type="email" name="email" required class="form-control" id="email">
        </div>
        <div class="form-group">
          <label for="username">Username:</label>
          <input type="username" name="username" required class="form-control" id="username">
        </div>
        <div class="form row">
          <div class="form-group col-md-6">
            <label for="password1">Password</label>
            <input type="password" name="password1" class="form-control" id="password1" />
          </div>
          <div class="form-group col-md-6">
            <label for="password2">Confirm Password</label>
            <input type="password" name="password2" class="form-control" id="password2" />
          </div>
        </div>
        <div class="form-group">
          <label for="Question">Security Question</label>
          <select class="form-control" id="SecurityQuestion" name="question" id="question">
            <option value ="1">Nama hewan peliharaan pertamamu?</option>
            <option value ="2">Siapa nama sahabatmu?</option>
            <option value ="3">Dimana kota anda dilakhirkan?</option>
          </select>
        </div>
        <div class="form-group">
          <label for="Answer">Answer</label>
          <input type="text" name="answer" class="form-control" id="answer" />
        </div>
        <button class="btn btn-primary container-fluid" type="submit">Create Account</button>
        <p class="d-flex justify-content-center my-2">Already have an account?  <a href="<?= base_url(); ?>login""> Sign in </a></p>
      </form>
    </div>
  </div>
</body>

</html>