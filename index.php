<?php

include('includes/functions.php');
include('includes/config.php');

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
    color: #fff;
    background-color: #848484;
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
  #step-1-box > div {
    width: 25vmin;
    display: inline-block;
    box-sizing: border-box;
    margin: 0.4vw;
  }
  #step-1-box > .assignment > a > img {
    width: 100%;
    border: 0.4vw solid #fff;
    box-sizing: border-box;
  }



    
  </style>

  </head>
<body>

  <div id="step-1">

    <div id="step-1-box">

        <div class="assignment">
            <a href="/radio">
                <img src="/images/radio.png">
            </a>
        </div>

    </div>

  </div>

  <?php brickmmo_footer(); ?>

</body>
</html>