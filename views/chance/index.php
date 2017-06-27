<?php
/* @var $this yii\web\View */
?>
<div class = "container">
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
    
    <div class="row">
        <button type="button" class="btn btn-default btn-lg btn-block" onclick="randomNumber();">Press</button>
    </div>
    <input type="hidden" class="a" value="<?php echo $model['fnum']?>">
    <input type="hidden" class="b" value="<?php echo $model['snum']?>">
    <input type="hidden" class="c" value="<?php echo $model['tnum']?>">
    <?php endif ;?>
</div>


