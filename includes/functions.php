<?php

function brickmmo_footer($bg = 'dark')
{

    ?>

<style>

a:link,
a:active,
a:hover,
a:visited {
    color: <?=($bg == 'dark' ? '#fff' : '#000')?>;
    text-decoration: none;
}

#refresh {
    position: fixed;
    bottom: 0;
    left: 0;
    font-size: 30px;
    padding: 15px;
}
#brickmmo {
    position: fixed;
    bottom: 0;
    right: 0;
    font-size: 24px;
    padding: 15px;
    z-index: 10000;
    font-family: Arial, Helvetica, sans-serif;
}
#brickmmo img {
    vertical-align: middle;
}

</style>

<div id="brickmmo">

    <?php if($_SERVER["REQUEST_URI"] != "/"): ?>
        <a href="/"><i class="fas fa-bars"></i></a>
        &nbsp;
    <?php endif; ?>

    <a href="https://github.com/brickmmo/demo"><i class="fab fa-github"></i></a>
    &nbsp;
    <a href="https://brickmmo.com"><img src="/images/brickmmo-<?=($bg == 'dark' ? 'white' : 'black')?>.png" width="30"></a>
</div>

<!--
<div id="refresh">
    <a href="#" onclick="return refresh();"><i class="fas fa-redo"></i></a>
</div>
-->

    <?php

}

function debug_pre($data)
{
    echo '<pre>';
    print_r($data);
    echo '</pre>';
}