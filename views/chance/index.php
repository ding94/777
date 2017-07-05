<?php
/* @var $this yii\web\View */
?>
<div class = "container">
    <h1 class="minigame">PLAY & WIN SGreward!</h1>
    <div class="row">
        <a class="btn btn-warning btn-lg btn-block hideButton" role="button" data-toggle="collapse" href="#collapseRule" aria-expanded="false" aria-controls="collapseRule">Rules <span class="spanRadnom glyphicon glyphicon-triangle-bottom"></span></a>
        <div class="collapse" id="collapseRule">
            <div class="well rule-container">
                Complimentary 5 chances every day to PLAY & WIN SGreward up to RM5,000, click “Play” to win SGreward now!
                </br>
                T&Cs:
                <ol>
                    <li>Prize List:
                        </br>
                        <div class="table-responsive">
                            <table class="table table-bordered rule-table">
                                <thead>
                                    <td>Symbols</td>
                                    <td>Prize(SGreward)</td>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th>
                                            <?php for($i = 0 ;$i<3;$i++):?>
                                            <img class="img-sample" src="<?php echo Yii::$app->params['imagepath'].'/7.png'?>">
                                            <?php endfor;?>
                                        </th>
                                        <th class="rule-table-th">RM 10</th>
                                    </tr>
                                    <tr>
                                        <th>
                                            <?php for($i = 0 ;$i<3;$i++):?>
                                            <img class="img-sample" src="<?php echo Yii::$app->params['imagepath'].'/3.png'?>">
                                            <?php endfor;?>
                                          </br><span class="rule-span">*Any 3 of Same Birds</span>
                                        </th>
                                        <th class="rule-table-th">RM 5</th>
                                    </tr>
                                    <tr>
                                        <th>
                                            <img class="img-sample" src="<?php echo Yii::$app->params['imagepath'].'/4.png'?>">
                                            <img class="img-sample" src="<?php echo Yii::$app->params['imagepath'].'/4.png'?>">
                                            <img class="img-sample" src="<?php echo Yii::$app->params['imagepath'].'/5.png'?>">
                                          </br><span class="rule-span">*Any 2 of Same Animals</span>
                                        </th>
                                        <th class="rule-table-th">RM 2</th>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </li>
                    <li><a href="http://www.sgshop.com.my/member/sgreward">Click SGreward for more details.</a></li>
                </ol>
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
        <div class="col-xs-4 col-xs-offset-4 buttonRandom">
             <button id="disableOrEnable" type="button" class="btn btn-primary btn-lg btn-block" onclick="randomNumber();">Play</button>
        </div>
    </div>
    <?php if(empty($model[0])):?>
    <div class="chanceValue">Chance left: 5</div>
    <?php elseif($model[0]->chance == 5 ) :?>
    <div class="chanceValue" style="color: red;" >Today's Chance has finished!!</div>
    <?php else:?>
    <div class="chanceValue" >Today's chance left : <?php echo 5-$model[0]->chance?></div>
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
                        <td>Reward time</td>
                    </tr>
                    <?php foreach($allReward as $data):?>
                    <tr class="reward-table-tr">
                        <td><?php echo $data['userid']?></td>
                        <td>RM <?php echo $data['price']?></td>
                        <td class="dateEm"><?php echo $data['createtime']?></td>
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
                    <td>Reward Time</td>
                </tr>
                <?php foreach($userReward as $data):?>
                <tr class="reward-table-tr">
                    <td>RM <?php echo $data['price']?></td>
                    <td class="dateEm"><?php echo $data['createtime']?></td>
                </>
                </tr>
                <?php endforeach ;?>
            </table>
        </div>
        <?php endif ;?>
    </div>
</div>
