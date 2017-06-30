<?php
/* @var $this yii\web\View */
?>
<div class = "container">
    <h1 class="minigame">Mini Game</h1>
    <div class="row">

    </div>
    <div class="lock">
         <?php if (empty($model[0])) :?>
        <div id="row ">
            <div id ="a" class="col-xs-4 randomNumber" value="1"></div>
            <div id ="b" class="col-xs-4 randomNumber" value="2"></div>
            <div id ="c" class="col-xs-4 randomNumber" value="3"></div>
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
    </div>

    <div class="row">
        <div class="col-md-4 col-md-offset-4 buttonRandom">
             <button id="disableOrEnable" type="button" class="btn btn-primary btn-lg btn-block" onclick="randomNumber();">Press</button>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <div class="reward">
                All Reward
            </div>
                <table class="table">
                    <tr class="success">
                        <td>User Name</td>
                        <td>Reward</td>
                    </tr>
                    <?php foreach($allReward as $data):?>
                    <tr>
                        <td><?php echo $data['userid']?></td>
                        <td>RM <?php echo $data['price']?></td>
                    </tr>
                    <?php endforeach ;?>
                </table>
        </div>
        <?php if(empty($userReward)):?>
        <?php else :?>
         <div class="col-sm-4 col-sm-offset-2">
             <div class="reward">
                Your Reward
            </div>
            <table class="table">
                <tr class="success">
                    <td>Reward</td>
                </tr>
                <?php foreach($userReward as $data):?>
                <tr>
                    <td>RM <?php echo $data['price']?></td>
                </>
                </tr>
                <?php endforeach ;?>
            </table>
        </div>
        <?php endif ;?>
    </div>
</div>
