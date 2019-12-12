<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>Dashboard</title>
  <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/dashboard.css" />
  <link href=" https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="<?= base_url(); ?>/assets/bootstrap/css/bootstrap.min.css" />
</head>

<body>
        
  <div id="App">
        <hr />
          <?php if ($this->session->flashdata()) { ?>
            <div class="alert alert-danger">
            <?=$this->session->flashdata('flash'); ?>
            </div>
        <?php } ?>
    <img class="Background-dash" src="<?= base_url(); ?>/assets/img/BG-Dashboard.png" alt="">
    <div class="row content">
      <!-- Left Side -->
      <div class="left col-md-2">
        <div class="profile-box">
          <img src="<?= base_url(); ?>/assets/img/Default-PP.png" alt="">
          <p><?php echo $ign?></p>
        </div>
      </div>
      <!-- End Left Side -->

      <!-- Right Side -->
      <div class="right col-md-10">
        <div class="row first-right">
          <div class="row">
            <!-- <div class="box calendar">
              <img src="<?= base_url(); ?>/assets/img/Calendar.svg" alt="">
            </div> -->
            <div class="box gold">
              <img src="<?= base_url(); ?>/assets/img/gold.svg" alt="">
              <p><?php echo $gold?></p>
            </div>
            <div class="box ruby">
              <img src="<?= base_url(); ?>/assets/img/ruby.svg" alt="">
              <p><?php echo $gem?></p>
            </div>
          </div>
          <div class="row">
            <!-- <div class="box email">
              <img src="<?= base_url(); ?>/assets/img/email.svg" alt="">
            </div> -->
            <a href="<?= base_url(); ?>login/logout">
            <div class="box setting">
              <img src="<?= base_url(); ?>/assets/img/dc.svg" alt=""> 
              <h5 style="color: black">Disconnect</h5>
            </div>
            </a>
          </div>
        </div>
        <div class="row">
          <div class="box armory" style="display: none">
            <img src="<?= base_url(); ?>/assets/img/armory.svg" alt="">
            <p>Armory</p>
          </div>
          <a href="<?= base_url();?>shop" style="color: black">
          <div class="box armory">
            <img src="<?= base_url();?>/assets/img/petshop.svg" alt="">
            <p>Pet Shop</p>
          </div>
          </a>
          <a href="<?= base_url();?>battle" style="color: black">
          <div class="box armory">
            <img src="<?= base_url(); ?>/assets/img/battle.svg" alt="">
            <p>Battle</p>
          </div>
          </a>
          <a href="<?= base_url();?>theinn" style="color: black">
          <div class="box armory">
              <img src="<?= base_url(); ?>/assets/img/theinn.svg" alt="">
              <p>The Inn</p>
          </div>
          </a>
          <a href="<?= base_url();?>restaurant" style="color: black">
          <div class="box armory">
              <img src="<?= base_url(); ?>/assets/img/restaurant.svg" alt="">
              <p>Restaurant</p>
          </div>
          </a>
        </div>
        <div class="row">
        <a href="<?= base_url();?>myacc" style="color: black">
          <div class="box profile">
            <img src="<?= base_url(); ?>/assets/img/profile.svg" alt="">
          </div>
        </a>
        <a href="<?= base_url();?>mypet" style="color: black">
          <div class="box pet">
            <img src="<?= base_url(); ?>/assets/img/pet.svg" alt="">
          </div>
        </a>
          <!-- <div class="box inventory">
            <img src="<?= base_url(); ?>/assets/img/inventory.svg" alt="">
          </div> -->
        </div>
      </div>
      <!-- End Right Side -->

    </div>
  </div>
  <div class="bottom-bar"></div>
</body>




</html>