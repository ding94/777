<body>
<div class = "container">
	<div id="top">

			<h1> <?php if($record->usedTime <=0 ){
					echo "您是否是我们要找的那个有缘人呢~~~";
						}
			else {
					if($record->token == 0){
						echo "恭喜你，您就是我们要找的幸运儿！";
					}
					else{
						echo "游戏正在进行中..";
					}
				}?> </h1>
	</div>


	<div id="middle">
		<div id="left" >
			<h2 id="min" >
				<?php
				if($record->usedTime >0){
					if($record->playingNow != $record->ans){
						echo $record->min_value;
					}
				}?>
			</h2>
		</div>

		<div id="mid">
			<h2 id="to" >
				<?php
				if($record->usedTime >0){
					if($record->playingNow != $record->ans){
						echo "到";
					}
					elseif($record->playingNow == $record->ans){
						echo $record->ans;
					}
				}?>
			</h2>
		</div>

		<div id="right" >
			<h2 id="max" >
				<?php
				if($record->usedTime >0){
					if($record->playingNow != $record->ans){
						echo $record->max_value;
					}
				}?>
			</h2>
		</div>
	</div>


<div id="bottom">
	<div class="row" id="game">
		<span class="col-xs-4 col-xs-offset-4 gamespan">请输入您的号码。</span>
		<div>
		<input class="col-xs-4 col-xs-offset-4 numberInput" type="text" maxlength="2" name="value" id="value" placeholder="1 - 99" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"  autofocus />
		</div>
		<div class="col-xs-4 col-xs-offset-4 gamebutton">
		<button type="button" class="btn btn-primary btn-lg btn-block" value="提交" id="btnSubmit" onclick="verifyorder(document.getElementById('value').value)">Press</button>
		</div>
	</div>

	<div class="row chg">


			<?php
			if($record->usedTime >=5 || $record->token == 0){
							echo "您今天的次数已达成。请明天再来。";
						}	
			elseif($record->usedTime <5 ){
				?>
				您还有 <?php echo 5-$record->usedTime ?> 次机会哟。
				<?php
				}
			?>


			</div>



		<div class="rule">

			<button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapses" aria-expanded="false" aria-controls="collapses">游戏规则 </button>
			<div class="collapse" id="collapses">
				 <div id="showrule">
					<span>用户只需在1 - 99 之间猜个数字。每位用户只能有<mark><b>5</b></mark>次机会，您只需要猜中系统给予的号码，就能领取我们派送的奖励。</span>
				</div>

				<div id="reward">
					<table class="table allReward">
				  <tr class="success game-rule-tr">
					<th>次数</th>
					<th>金额</th>

				  </tr>
				  <tr class="reward-table-tr">
					<td>1次</td>
					<td>RM10</td>
				  </tr>
				  <tr class="reward-table-tr">
					<td>2次</td>
					<td>RM5</td>
				  </tr>
				  <tr class="reward-table-tr">
					<td>3,4,5次</td>
					<td>RM2</td>
				  </tr>
				  </table>
				</div>

			</div>
		</div>
		
		
		<div id="reward" class="reward">
			<table id="rewardtable" class="table allReward">
				  <tr class="success">
					<td>中奖者</td>
					<td>奖励</td>
					<td>时间</td>
				  </tr>
				  
				  
					
					
				
					<?php foreach($reward as $data):?>
                    <tr class="reward-table-tr">
                        <td><?php echo $data['userid'] ?></td>
                        <td>RM <?php echo $data['price']?></td>
                        <td><?php echo $data['createtime']?></td>
                    </tr>
						 <?php endforeach ;?>		
								
				
								
								
					
				 
				  </table>
			
		
		
		</div>
			<h5 id="copyright"></h5>
</div>
</div>

</body>

</html>