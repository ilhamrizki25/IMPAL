<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>Battle Menu</title>
  <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/dashboard.css" />
  <link href=" https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700&display=swap" rel="stylesheet" />
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
  .container{
      height: 100%;
  }
</style>


<body style="background-image: url(<?php echo ('http://localhost/Tamagotchi/assets/img/BgBattle.jpg') ?>) ;">

    <div class="container d-flex justify-content-center align-items-lg-center">
    <div class="row">
    <a class="tomback" href="<?php echo base_url() ?>">
          <div class="box armory" style="background-color: red">
          
                  <img style="height: 128px; width:128px;" src="<?php echo base_url() ?>/assets/img/back.svg" alt="">
        
          </div>
          </a>
        <a href="<?= base_url();?>/Battle/multiplication" style="color: black">
          <div class="box armory">
            <img src="<?= base_url(); ?>/assets/img/mul.svg" alt="">
            <p>Multiplication</p>
          </div>
        <a>
          <a href="<?= base_url();?>/Battle/addition" style="color: black">
          <div class="box armory">
            <img src="<?= base_url();?>/assets/img/plus.svg" alt="">
            <p>Addition</p>
          </div>
          </a>
          </div>
          
</body>