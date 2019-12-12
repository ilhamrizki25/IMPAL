<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>Battlefield</title>
  <link rel="stylesheet" type="text/css" href="<?php echo ('http://localhost/Tamagotchi/assets/css/Style.css') ?>">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>


<body class="BdPetS" style="background-image: url(<?php echo ('http://localhost/Tamagotchi/assets/img/BGBattle.jpg') ?>) ;">
<br><br><br><br><br>
<div class="container berbox">
  
  
    <h1>Welcome <strong><?php echo $IGN ?></strong> to the Battlefield! </h1>
    <h1>You choose <?php echo $mode ?> as your mode in battle </h1>
    <br><br>
    <h1>Question:</h1>
    <h1> <?php echo $angka1 ?> <?php echo $operand ?> <?php echo $angka2 ?> </h1>
    <form method="post" action="<?php base_url()?>validate" id='Soal'>
    <div><span id="display" style="color:#FF0000;font-size:24px"></span></div>
        <input class="boxpet" type="text" name="jawabanUser" placeholder="Your Answer"> 
        <input class="boxpet" type="text" name="jawabanSoal" placeholder="Your Answer" value="<?php echo $jawaban ?>" style="display: none;">
        <input class="boxpet" type="text" name="pet" placeholder="Your Answer" value="<?php echo $idpet ?>" style="display: none;">
        <br><br>
    <input class="boxpet btn-primary" type="submit" value="Submit" id="submited">
    </form>
    <br>
  <br><br><br>
  <script>
            var div = document.getElementById('display');
            var submitted = document.getElementById('submited');

              function CountDown(duration, display) {

                        var timer = duration, minutes, seconds;

                      var interVal=  setInterval(function () {
                            minutes = parseInt(timer / 60, 10);
                            seconds = parseInt(timer % 60, 10);

                            minutes = minutes < 10 ? "0" + minutes : minutes;
                            seconds = seconds < 10 ? "0" + seconds : seconds;
                    display.innerHTML ="<b>" + minutes + "m : " + seconds + "s" + "</b>";
                            if (timer > 0) {
                               --timer;
                            }else{
                       clearInterval(interVal)
                                SubmitFunction();
                             }

                       },1000);

                }

              function SubmitFunction(){
                submitted.innerHTML="Time is up!";
                document.getElementById('Soal').submit();

               }
               CountDown(10,div);
            </script>
</div>
  

</body>