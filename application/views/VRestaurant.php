<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>Restaurant</title>
  <link rel="stylesheet" type="text/css" href="<?php echo ('http://localhost/Tamagotchi/assets/css/Style.css') ?>">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>


<body class="BdPetS" style="background-image: url(<?php echo ('http://localhost/Tamagotchi/assets/img/BGRestaurant.jpg') ?>) ;">
<br><br><br><br><br>
<div class="container berbox">
    <h1>Welcome <strong><?php echo $IGN ?></strong> to Restaurant! </h1>
    <h1>You Have  <strong style="color: #FFD700"><?php echo $Gold ?> </strong> to spent</h1>
    <h1>Choose Your Pet</h1>
    <form method="post" action="CRestaurant/getForm">
    <select class="boxpet" name="pet">
    <?php foreach ($data as $d ) {?>  
        <?php echo '<option value="'.$d->pet_id.'">' .$d->pet_name. '</option>' ?>
    <?php } ?>
    </select>
    <br><br>
    <input class="boxpet btn-primary" type="submit" value="Submit">
    </form>
    <br>
    <form method="post" action="dashboard">
        <input class="boxpet btn-danger" type="submit" value="Go Back">
    </form>
  <br><br><br>
</div>
</body>