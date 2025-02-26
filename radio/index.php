<?php

include('../functions.php'); 

?>
<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link href="https://fonts.googleapis.com/css?family=Lora" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=PT+Sans+Narrow" rel="stylesheet">

  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <script src="https://kit.fontawesome.com/57a8a8c892.js" crossorigin="anonymous"></script>

  <title>Demos | BrickMMO</title>

  <style>

  body {
    margin: 0;
    padding: 0;
    height: 100%;
    font-family: 'Lora', serif;
    color: #000;
    background-color: #fff;
  }

  #step-1 {
    display: flex;
    align-items: center;
    justify-content: center;
    height: 100vh;
  }
  #step-1-box {
    position: relative;
    text-align: center;
    width: 100%;
  }

    
  </style>

    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

  </head>
<body>

  <div id="step-1">

    <div id="step-1-box">


        <div class="w3-container" style="max-width:1200px; margin: auto;">

            <textarea class="w3-input w3-border w3-margin-bottom" style="height: 500px; max-height: 80%;" id="prompt"></textarea>
            
            <button type="button" id="generate" class="w3-btn w3-padding w3-black">
                <i class="fas fa-play"></i> Generate Audio
            </button>
            <button type="button" id="reset" class="w3-btn w3-padding w3-black">
                <i class="fas fa-undo-alt"></i> Reset
            </button>

        </div>
  
    </div>

  </div>

  <?php brickmmo_footer('light'); ?>

  <script src="radio.js"></script>

</body>
</html>