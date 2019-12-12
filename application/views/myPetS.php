<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>PetShop</title>
  <link rel="stylesheet" type="text/css" href="<?php echo ('http://localhost/Tamagotchi/assets/css/Style.css') ?>">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>


<body class="BdPetS" style="background-image: url(<?php echo ('http://localhost/Tamagotchi/assets/img/BGPet.jpg') ?>) ;">
<br><br><br>
<div class="container berbox">
  
  
  <h1>Welcome <strong><?php echo $IGN ?></strong> to Pet Profile! </h1>

 
    <?php foreach ($data as $d ) {?>
            <h1>=Selected=</h1>
            <h1>Pet Name: <?php echo $d->pet_name ?></h1>
            <h1>Level: <?php echo $d->level ?> </h1>
            <h1>Stamina: <?php echo $d->stamina ?> / <?php echo $d->max_stamina ?></h1>
            <h1>HP: <?php echo $d->hp ?> / <?php echo $d->max_hp ?> </h1>
            <h1>Attack: <?php echo $d->attack ?> </h1>
            <h1>Exp: <?php echo $d->exp ?> / <?php echo $d->exp_up ?> </h1>
            
            
    <?php } ?>
  <br>
  <form method="get" action="<?php echo ('http://localhost/Tamagotchi/dashboard')?>">
    <div class="row">
              <div class="col-lg-2">
                
              </div>
              <div class="col-lg-8">
                <input class="boxpet btn-danger" type="Submit" value="Back"> 
              </div>
              <div class="col-lg-2">
                
              </div>
            </div>
    
  </form>
  <br><br>
</div>
  

</body> 