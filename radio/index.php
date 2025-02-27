<?php

include('../includes/functions.php'); 
include('../includes/config.php'); 

if ($handle = opendir('audio')) 
{
    while (false !== ($file = readdir($handle))) 
    {
        if ($file != "." && $file != "..") 
        {
            // echo 'File: '.$file.'<br>';
            // echo 'Time: '.filemtime('audio/'.$file).'<br>';

            if(filemtime('audio/'.$file) < time() - 60 * 60 * 3)
            { 
                // echo 'Delete: audio/'.$file.'<br>';
                unlink('audio/'.$file);
            }
        }
    }
    closedir($handle);
}

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

  #step-1,
  #overlay {
    display: flex;
    align-items: center;
    justify-content: center;
    height: 100vh;
  }
  #step-1-box,
  #overlay-box {
    position: relative;
    text-align: center;
    width: 100%;
  }

  #overlay {
    background-color: rgba(0, 0, 0, 0.8);
    height: 100vh;
    width: 100vw;
    position: absolute;
    z-index: 100;
    display: none;
  }

  #response_input,
  #script_input {
    -display: none;
  }

  textarea { 
    height: 300px; 
    max-height: 60%;
    box-sizing: border-box;
    width: 100%;
  }
    
  </style>

    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

  </head>
<body>

  <div id="overlay">
      <div id="overlay-box">

          <div class="w3-panel w3-black w3-center">
              <h2>
                  <i class="fas fa-spinner fa-spin"></i>
                  <span id="message"></span>
              </h2>
          </div>

      </div>
  </div>

  <div id="step-1">

    <div id="step-1-box">


        <div class="w3-container" style="max-width:1200px; margin: auto;">

            <button type="button" id="prompt_button" class="w3-btn w3-padding w3-black w3-margin-bottom">
                <i class="fas fa-terminal"></i> Prompt
            </button>
            <button type="button" id="response_button" class="w3-btn w3-padding w3-black w3-margin-bottom">
                <i class="fas fa-reply"></i> Response
            </button>
            <button type="button" id="script_button" class="w3-btn w3-padding w3-black w3-margin-bottom">
                <i class="fas fa-scroll"></i> Script
            </button>

            <textarea class="w3-input w3-border w3-margin-bottom" id="prompt_input"></textarea>
            <textarea class="w3-input w3-border w3-margin-bottom" id="response_input"></textarea>
            <textarea class="w3-input w3-border w3-margin-bottom" id="script_input"></textarea>
            
            <button type="button" id="generate_button" class="w3-btn w3-padding w3-black">
                <i class="fas fa-play"></i> Generate Audio
            </button>
            <button type="button" id="reset_button" class="w3-btn w3-padding w3-black">
                <i class="fas fa-undo-alt"></i> Reset
            </button>

            <div class="w3-container w3-margin-top">
                <audio controls id="audio"></audio>
            </div>

        </div>
  
    </div>

  </div>

  <?php brickmmo_footer('light'); ?>

  <script src="radio.js"></script>

</body>
</html>