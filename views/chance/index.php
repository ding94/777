<?php
/* @var $this yii\web\View */
?>
<div class = "container">
    <h1>Mini Game</h1>
    <?php if(empty($model)):?>
    <div class="row">
        <div class="">Today Chance have finish</div>
    </div>
    <?php else :?>
    <div class="row ">
        <div id ="a" class="col-xs-4 randomNumber">1</div>
        <div id ="b" class="col-xs-4 randomNumber">1</div>
        <div id ="c" class="col-xs-4 randomNumber">1</div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-4 col-md-offset-4 buttonRandom">
             <button type="button" class="btn btn-primary btn-lg btn-block" onclick="randomNumber();">Press</button>
        </div>
       
    </div>
    <input type="hidden" class="a" value="<?php echo $model['fnum']?>">
    <input type="hidden" class="b" value="<?php echo $model['snum']?>">
    <input type="hidden" class="c" value="<?php echo $model['tnum']?>">
    <?php endif ;?>
</div>


