<?php
/* @var $this yii\web\View */
?>
<div class = "container">
    <h1 class="minigame">Mini Game</h1>
    <div class="row">
        <a class="btn btn-warning btn-lg btn-block hideButton" role="button" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">Rules</a>
        <div class="collapse" id="collapseExample">
            <div class="well">
                Bacon ipsum dolor amet biltong turducken pork chop leberkas flank, filet mignon shank. Shankle tenderloin filet mignon, swine prosciutto shoulder bacon jowl sirloin cupim frankfurter corned beef. Ribeye pork strip steak beef picanha boudin ball tip biltong short loin rump. Ground round short ribs sausage corned beef andouille. Cow jowl alcatra tri-tip kevin pork, picanha short ribs drumstick boudin t-bone turducken capicola brisket.

                Boudin tri-tip salami ground round frankfurter shank. Kielbasa beef ribs tongue beef corned beef, kevin capicola burgdoggen tail ham hock ribeye tri-tip pork pancetta prosciutto. Chuck ribeye porchetta capicola pork chop leberkas corned beef swine tail fatback flank. Leberkas short ribs turducken tenderloin shankle ball tip, ground round turkey andouille. Cupim ribeye fatback tri-tip shoulder beef porchetta burgdoggen jowl cow pork chop chuck turkey shankle.
            </div>
        </div>
    </div>
    <div class="lock">
        <?php if (empty($model[0])) :?>
        <div id="row ">
            <div id ="a" class="col-xs-4 randomNumber" value="1"></div>
            <div id ="b" class="col-xs-4 randomNumber" value="2"></div>
            <div id ="c" class="col-xs-4 randomNumber" value="3"></div>
        </div>
        <?php else :?>
        <div class="row ">
            <div id ="a" class="col-xs-4 randomNumber" value="<?php echo $model[0]['fnum']?>"></div>
            <div id ="b" class="col-xs-4 randomNumber" value="<?php echo $model[0]['snum']?>"></div>
            <div id ="c" class="col-xs-4 randomNumber" value="<?php echo $model[0]['tnum']?>"></div>
        </div>
        <input type="hidden" id="chanceHidden" value="<?php echo $model[1]->chance?>">
        <?php endif ;?>
    </div>

    <div class="row">
        <div class="col-md-4 col-md-offset-4 buttonRandom">
             <button id="disableOrEnable" type="button" class="btn btn-primary btn-lg btn-block" onclick="randomNumber();">Press</button>
        </div>
    </div>
    <?php if(empty($model[0])):?>
    <div class="chanceValue">Chance left: 5</div>
    <?php elseif($model[0]->chance == 5) :?>
    <div class="chanceValue">Today Chance have finish!!</div>
    <?php else:?>
    <div class="chanceValue">Today chance left : <?php echo 5-$model[0]->chance?></div>
    <?php endif ;?>
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
