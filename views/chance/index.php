<?php
/* @var $this yii\web\View */
?>
<div class = "container">
    <div class="row">
        <div class="col-xs-4 randomNumber">1</div>
        <div class="col-xs-4 randomNumber">1</div>
        <div class="col-xs-4 randomNumber">1</div>
    </div>
    <div class="row">
        <button type="button" class="btn btn-default btn-lg btn-block" onclick="randomNumber();">Press</button>
    </div>
    <input type="hidden" class="a" value="<?php echo $a?>">
    <input type="hidden" class="b" value="<?php echo $b?>">
    <input type="hidden" class="c" value="<?php echo $c?>">
</div>


