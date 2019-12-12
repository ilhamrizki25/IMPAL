<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>My Account</title>
  <link rel="stylesheet" type="text/css" href="<?php echo ('http://localhost/Tamagotchi/assets/css/Style.css') ?>">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body class="BdAcc" style="background-image: url(<?php echo ('http://localhost/Tamagotchi/assets/img/BGPet.jpg') ?>) ;">

<br><br><br><br><br><br><br><br><br>

<?php foreach ($data as $d ) {?>
    <div class="container berbox">
    <div class="row">
            <div class="col">
            <h1> <strong>Player Profile</strong></h1>
            </div>
            <div class="col">   
            </div>
            <div class="col"> 
            </div>
        </div>
   
        <div class="row">
            <div class="col">
                <h1>Name</h1>
            </div>
            <div class="col">
                <h1>:</h1>
            </div>
            <div class="col">
                <h1><?php echo $d->IGN ?></h1>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <h1>Gold</h1>
            </div>
            <div class="col">
                <h1>:</h1>
            </div>
            <div class="col">
                <h1 class="goldcolor"><?php echo $d->Gold ?></h1>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <h1>Ruby</h1>
            </div>
            <div class="col">
                <h1>:</h1>
            </div>
            <div class="col">
                <h1 class="rubycolor"><?php echo $d->Gem ?></h1>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <h1>Number of Pet</h1>
            </div>
            <div class="col">
                <h1>:</h1>
            </div>
            <div class="col">
                <h1><?php echo $d->jPet ?></h1>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <a class="tomback" href="<?php echo base_url() ?>">
                    <img src="<?php echo base_url() ?>/assets/img/back.svg" alt="">
                </a>
                    
            </div>
            <div class="col">
                
            </div>
            <div class="col">
                
            </div>
        </div>
        
        <br>
    </div>

    <?php } ?>
    
</body>