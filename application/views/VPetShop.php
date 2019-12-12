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
<!-- <br><br><br><br><br> -->
<div class="container berbox">
  
  <?php foreach ($data as $d ) {?>
  <h1>Welcome <?php echo $d->IGN ?> to the Pet Shop! </h1>
  <h1 style="display: inline" >You Have <strong class="goldcolor" style="display: inline" ><?php echo $d->Gold ?> Gold</strong>  to spent</h1>
  <?php } ?>
  <form action="<?= base_url(); ?>Pet/new" method='post'>
  <div class="row">
    <div class="col colC">
      <img src="<?php echo ('http://localhost/Tamagotchi/assets/img/dog.png') ?>" alt="dog" height="100" width="100"><br>
      <input type="radio" name="gender" value="Dog">
      <h1>Speciality</h1>
      <h1>Max Stamina +20</h1>
    </div>
    <div class="col colC">
      <img src="<?php echo ('http://localhost/Tamagotchi/assets/img/cat.png') ?>" alt="cat" height="100" width="100"><br>
      <input type="radio" name="gender" value="Cat">
      <h1>Speciality</h1>
      <h1>Max HP +50</h1  >
    </div>
  </div>
    <div class="col colC">
      <h1 style="display: inline;">Price: </h1> <h1 class="goldcolor" style="display: inline;"> 50Gold</h1>
      <h1>Name:</h1>
      <label for="name"></label><input class="boxpet" type="text" name="name" id="name"><br>
    </div>
    <br>
    <div class="col colC">
      <input class="boxpet btn btn-primary" type="submit" value="Submit" style="font-size: 68px;">
    </div>
    <br>
  </form>
  <form action="<?= base_url(); ?>">
    <input class="boxpet btn btn-danger" type="submit" value="Go Back" style="font-size: 68px;">
  </form>
</div>
  

</body>