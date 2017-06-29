<?php
/* @var $this yii\web\View */
?>
<div class = "container">
    <h1 class="minigame">Mini Game</h1>
    <?php if (empty($model[0])) :?>
    <div class="row ">
        <div id ="a" class="col-md-4 randomNumber" value="1"></div>
        <div id ="b" class="col-md-4 randomNumber" value="2"></div>
        <div id ="c" class="col-md-4 randomNumber" value="3"></div>
    </div>
  <?php elseif($model[0]->chance == 5):?>
    <div class="row ">
        <div id ="a" class="col-xs-4 randomNumber" value="<?php echo $model[0]['fnum']?>"></div>
        <div id ="b" class="col-xs-4 randomNumber" value="<?php echo $model[0]['snum']?>"></div>
        <div id ="c" class="col-xs-4 randomNumber" value="<?php echo $model[0]['tnum']?>"></div>
    </div>
    <div class="row">
        <div class="finishWarning">You have used finish all chances for today!</div>
    </div>
    <input type="hidden" id="g" value="<?php echo $model[1]['chance']?>">
    
    <?php else :?>
    <div class="row ">
        <div id ="a" class="col-xs-4 randomNumber" value="<?php echo $model[0]['fnum']?>"></div>
        <div id ="b" class="col-xs-4 randomNumber" value="<?php echo $model[0]['snum']?>"></div>
        <div id ="c" class="col-xs-4 randomNumber" value="<?php echo $model[0]['tnum']?>"></div>
    </div>
    <input type="hidden" id="d" value="<?php echo $model[1]['fnum']?>">
    <input type="hidden" id="e" value="<?php echo $model[1]['snum']?>">
    <input type="hidden" id="f" value="<?php echo $model[1]['tnum']?>">
    <input type="hidden" id="g" value="<?php echo $model[1]['chance']?>">

    <?php endif ;?>
     <div class="row">
        <div class="col-md-4 col-md-offset-4 buttonRandom">
             <button id="disableOrEnable" type="button" class="btn btn-primary btn-lg btn-block" onclick="randomNumber();">Press</button>
        </div>
    </div>
</div>
