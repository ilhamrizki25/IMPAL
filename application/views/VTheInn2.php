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
  
  
  <h1>Welcome <strong><?php echo $IGN ?></strong> to The Inn! </h1>
  <h1>You Have  <strong style="color: #FFD700"><?php echo $Gold ?> </strong> to spent</h1>

  <h3>Price: <strong>Duration</strong> * 2Gold to Recover <strong>Duration</strong> Stamina</h3>
 
  <form method="post" action="Rest">
    <?php foreach ($data as $d ) {?>
            <h1>=Selected=</h1>
            <h1>Pet Name: <?php echo $d->pet_name ?></h1>
            <h1>Stamina: <?php echo $d->stamina ?> / <?php echo $d->max_stamina ?></h1>
            <input style="visibility: hidden;" type text="text" name="pet" value="<?php echo $d->pet_id ?>">
            <h1>Input Duration: <input type="text" name="duration"><br></h1>
            <div class="row">
              <div class="col-lg-2">
                
              </div>
              <div class="col-lg-8">
                <input class="boxpet btn-primary" type="Submit" value="Submit">
              </div>
              <div class="col-lg-2">
                
              </div>
            </div>
            
    <?php } ?>
  </form>
  <br>
  <form method="get" action="<?php echo ('http://localhost/Tamagotchi/dashboard')?>">
    <div class="row">
              <div class="col-lg-2">
                
              </div>
              <div class="col-lg-8">
                <input class="boxpet btn-danger" type="Submit" value="Cancel"> 
              </div>
              <div class="col-lg-2">
                
              </div>
            </div>
    
  </form>
  <br><br>
</div>
  

</body> 