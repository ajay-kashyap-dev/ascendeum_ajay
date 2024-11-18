<?php
$itr = isset($_GET['itr']) ? $_GET['itr'] : 0;
if(!isset($_GET['bal'])){
    $acc_balance = 100;
} else {
    $acc_balance = $_GET['bal'];
}
$selected_op = isset($_GET['lucky_op']) ? $_GET['lucky_op'] : "";
if($selected_op != ""){
    if($acc_balance > 0){
        $acc_balance = $acc_balance - 10;
        $dice_1 = rand(1,5);
        $dice_2 = rand(1,5);
        $dice_sum = $dice_1 + $dice_2;
        
        if(($dice_sum > 7 && $selected_op == "above_7") || ($dice_sum < 7 && $selected_op == "below_7")){
            $acc_balance = $acc_balance + 20;
            $result_str = "Congratulation you won, Your balance is now (Rs.$acc_balance)";
        } else if($dice_sum == 7 && $selected_op == "lucky_7"){
            $acc_balance = $acc_balance + 30;
            $result_str = "Congratulation you won, Your balance is now (Rs.$acc_balance)";
        } else {
            $result_str = "Sorry you loose!, Your Current Balance is (Rs.$acc_balance)";
        }
    } else {
        $result_str = "Sorry you loose!, Your Current Balance is (Rs.0), Can't continue playing...";
    }
    
}
?>
<html>
    <head>
        <title>Lucky 7</title>
    </head>
    <body>
	<?php if($selected_op == "") {?>
        <h2>Welcome to Lucky 7 Game</h2>
        <h3>Place your Bet (Rs.10)</h3>
        <form>
			<input type="hidden" name="itr" value="<?php echo $itr + 1;?>">
<input type="hidden" name="bal" value="<?php echo $acc_balance;?>">
          <input type="radio" name="lucky_op" value='below_7' checked> Below 7
          <input type="radio" name="lucky_op" value='lucky_7'> Lucky 7
          <input type="radio" name="lucky_op" value='above_7'> Above 7 <br>
          <button type="submit">Play</button>
        </form>
	<?php } else {?>
	<br><br>
	<h3> Game Results</h3>
    <?php if($acc_balance > 0 ){?>
        <p>Dice 1: <?php echo $dice_1;?></p>
        <p>Dice 2: <?php echo $dice_2;?></p>
        <p>Dice Sum: <?php echo $dice_sum;?></p><br><br>
    <?php }?>
    <p><?php echo $result_str;?></p>

    <a href="/interview/ascendeum_ajay/index.php">Reset and Play Again</a>
    <?php if($acc_balance > 0 ){?>
        <a href="/interview/ascendeum_ajay/index.php?itr=<?php echo $itr;?>&bal=<?php echo $acc_balance;?>">Continue Playing...</a>
    <?php  } }?>
    </body>
</html>