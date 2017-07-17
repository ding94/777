<?php
/* @var $this yii\web\View */
?>
<div class = "container">
    <div class="row">
        <a class="btn btn-warning btn-lg btn-block hideButton" role="button" data-toggle="collapse" href="#collapseRule" aria-expanded="false" aria-controls="collapseRule">Click for Rules <span class="spanRadnom glyphicon glyphicon-triangle-bottom"></span></a>
        <div class="collapse" id="collapseRule">
            <div class="well rule-container">
                <span class="rule-span1">Complimentary 5 chances every day to PLAY & WIN SGreward up to RM5,000, click “Play” to win SGreward now!</span>
                </br>
                </br>
                <span class="rule-span1">How to win?</span>
                <ol>
                    <li>
                      <span class="rule-span1">Click "Play";</span>
                    </li>
                    <li>
                      <span class="rule-span1">Animals will be kept changing;</span>
                    </li>
                    <li>
                      <span class="rule-span1">Wait until the changing stop;</span>
                    </li>
                    <li>
                      <span class="rule-span1">You may check out whether you are the lucky one!</span>
                    </li>
                </ol>
                </br>
                <span class="rule-span1">T&Cs:</span>
                <ol>
                    <li><span class="rule-span1">Prize List:</span>
                        </br>
                        <div class="table-responsive">
                            <table class="table table-bordered rule-table">
                                <thead class="rule-table-head">
                                    <td>Symbols</td>
                                    <td>Prize (SGreward)</td>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th>
                                            <?php for($i = 0 ;$i<3;$i++):?>
                                            <img class="img-sample" src="<?php echo Yii::$app->params['imagepath'].'/7.png'?>">
                                            <?php endfor;?>
                                          </br><span class="rule-span">*Must be these 3 of SGshop mascot</span>
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
                                          </br><span class="rule-span">*Any 2 of Same Animals side by side</span>
                                        </th>
                                        <th class="rule-table-th">RM 2</th>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </li>
                    </br>
                    <li><span class="rule-span1">This activity is valid from 6th July to 10th July 2017;</span></li>
                    <li><span class="rule-span1">Every day each SGshop Malaysia member has 5 chances to play & win SGreward;</span></li>
                    <li><span class="rule-span1">SGreward can only be used to offset item price (1st payment);</span></li>
                    <li><span class="rule-span1">SGshop reserves the right of final explanation towards this activity;</span></li>
                    <li><span class="rule-span1">Click <a href="http://www.sgshop.com.my/member/sgreward" target="_blank">SGreward </a>for more details;</span></li>
                    <li><span class="rule-span1">Click <a href="https://www.sgshop.com.my/member" target="_blank">Member Center</a> for your SGreward checking.</span></li>
                </ol>
            </div>
        </div>
    </div>
    <div class="game-area">
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
  </div>
    <div class="row">
        <div class="col-sm-6">
            <div class="reward">
                All Rewards
            </div>
                <table class="table allReward">
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
         <div class="col-sm-4 col-sm-offset-2">
             <div class="reward">
                Your Reward
            </div>
            <table class="table userReward">
                <tr class="success">
                    <td>Reward</td>
                    <td>Reward Time</td>
                </tr>
                <?php if(empty($userReward)):?>
                <tr class="reward-table-tr">
                    <td>0</td>
                    <td class="dateEm">0</td>
                </tr>
                <?php else :?>
                <?php foreach($userReward as $data):?>
                <tr class="reward-table-tr">
                    <td>RM <?php echo $data['price']?></td>
                    <td class="dateEm"><?php echo $data['createtime']?></td>
                </tr>
                <?php endforeach ;?>
                <?php endif ;?>
            </table>
        </div>
       
    </div>
</div>
