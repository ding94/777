<body>
<div class = "container">
	<div>

			<h1 id="top"> <?php if($record->usedTime <=0 ){
					echo "Will you be our lucky user?~~~~~~~";
						}
			else {
					if($record->token == 0){
						echo "Congratulations! You have won our price!";
					}
					elseif($record->token == 1 && $record->usedTime >= 5){
						echo "Game End";
					}
					else{
						echo "Game in progress...........";
					}
				}?> </h1>
	</div>

	<div class="row middle">
		<div id="min" class="col-xs-4" value="<?php echo $record->min_value;?>">
			<?php if($record->usedTime >= 0 && $record->token ==1):?>
			<?php echo $record->min_value;?>	
			<?php endif;?>
		</div>
		<div id="mid" class="col-xs-4">
			<?php if($record->usedTime >= 0 || $record->token == 0):?>
				<?php if($record->playingNow != $record->ans):?>
					to
				<?php else :?>
					<?php echo $record->ans;?>	
				<?php endif;?>
			<?php endif;?>
		</div>
		<div id="max" class="col-xs-4" value="<?php echo $record->max_value;?>">
			<?php if($record->usedTime >= 0 && $record->token == 1):?>
			<?php echo $record->max_value;?>	
			<?php endif;?>
		</div>
	</div>


	<div class="row">
		<div class="col-md-4 col-md-offset-4 gamespan">Please enter a number.</div>
		<div class="col-sm-4 col-sm-offset-4 numberInput">
			<div class="input-group">
				<span class="input-group-addon"><span class="glyphicon glyphicon-pencil "></span></span>
				<input type="text" class="form-control"  maxlength="2" name="value" id="value" placeholder="1 - 99" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"  autofocus />
			</div>
		</div>
		<div class="col-xs-4 col-xs-offset-4 gamebutton">
			<button type="button" class="btn btn-primary btn-lg btn-block" value="submit" id="btnSubmit" onclick="enterValue(document.getElementById('value').value)">Press</button>
		</div>
	</div>

	<input type="hidden" id ="token" value="<?php echo $record->token?>">
	<input type="hidden" id ="usedTime" value="<?php echo $record->usedTime?>">
	<div id="times" class="row chg">
			<?php
			if($record->usedTime >=5 || $record->token == 0){
					echo "Your chances today had finished. Please come again tomorrow.";
			}	
			elseif($record->usedTime <5 ){
			?>
				You have <?php echo 5-$record->usedTime ?> chances left.
			<?php
			}
		?>
	</div>



		<div class="rule">
		
			<div class="" id="collapses">
				 <div id="showrule">
					<span>User can enter a number between 1-99. Every user only have <mark><b>5</b></mark>chances, If you guess the answer correctly, you will get rewarded.</span>
				</div>

				<div id="reward">
					<table class="table">
				  <tr>
					<th class="success game-rule-tr">Tries</th>
					<th class="success game-rule-tr">Reward</th>

				  </tr>
				  <tr class="reward-table-tr">
					<td>First try</td>
					<td>RM10</td>
				  </tr>
				  <tr class="reward-table-tr">
					<td>Second try</td>
					<td>RM5</td>
				  </tr>
				  <tr class="reward-table-tr">
					<td>3rd, 4th or 5th try</td>
					<td>RM2</td>
				  </tr>
				  </table>
				</div>
			</div>
		</div>
		
		
		<div id="reward" class="reward">
			<table id="rewardtable" class="table allReward">
				  <tr class="success">
					<td>Username</td>
					<td>Reward</td>
					<td>Reward Time</td>
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
</div>


</body>

</html>