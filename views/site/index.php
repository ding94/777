<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Welcome</h1>

        <p class="lead">Press below button to start the game </p>

        <p><a class="btn btn-lg btn-lg btn-block btn-warning" href="<?php echo yii\helpers\Url::to(['chance/index'])?>">777</a></p>
        <p><a class="btn btn-lg btn-lg btn-block btn-danger" href="<?php echo yii\helpers\Url::to(['inbetween/index'])?>">In Between</a></p>
    </div>


</div>
