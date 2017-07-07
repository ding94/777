<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Welcome</h1>

        <p class="lead">Press below button to start the game</p>

        <p><a class="btn btn-lg btn-success" href="<?php echo yii\helpers\Url::to(['chance/index'])?>">Play!!</a></p>
    </div>


</div>
