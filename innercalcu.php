<?php
include "dbaseConn.php";
$_SESSION["operation"]="loadcalcu";
?>
<center>
<!--income-->
<form method="POST" action="innercalcucomp.php" class="manual menu">
<label>Date: </label><input type="date" name="date"/>
<div style="overflow:auto;width:100%;color:#003C00;">
<?php
//read income data
$read_income="select * from cash_in";
$result_income = $conn->query($read_income);
$total = array();
if ($result_income->num_rows > 0){
    while ($row = $result_income -> fetch_assoc()){
       $single_income = $row ["cash_in_amt"];
       array_push($total, $single_income);
       echo $single_income.", ";
    }
}else{
   echo "0 results";
}
?>
</div>
<hr>
<input type="number" name="calcuValue1" id="calcuValue1"/>
<Button type="submit" onclick="operations('income')"class="btn btn-outline-secondary">Add Order</button>
<Button type="submit" onclick="operations('undo')"class="btn btn-outline-secondary">Undo</button>
<Button type="submit" onclick="operations('delete_income')"class="btn btn-outline-secondary">Clear Values</button>
<input type="hidden" id="checker" name="checker"/>
 <br>
<label>Total Income:</label>
<div id="Iresult"><?php echo number_format(array_sum($total))?></div>

<hr class="expenses">
<!--expense-->
<div style="overflow:auto;width:300px;color:maroon;">
<?php
//read expense data
$read_expense="select * from cash_out";
$result_expense = $conn->query($read_expense);
$totalExpense = array ();
if ($result_expense->num_rows > 0){
    while ($row = $result_expense -> fetch_assoc()){
        $single_expense = $row ["cash_out_amt"];
        array_push($totalExpense, $single_expense);
       echo $single_expense.", ";
    }
}else{
   echo "0 results";
}
?>
</div>
<hr>
<input type="number" name="calcuValue2" id="calcuValue2"/>
<Button type="submit" onclick="operations('expense')"class="btn btn-outline-secondary">Add Expense</button>
<Button type="submit" onclick="operations('undo_expense')"class="btn btn-outline-secondary">Undo</button>
<Button type="submit" onclick="operations('delete_expense')"class="btn btn-outline-secondary">Clear Values</button>
 <br>
 <label>Total Expense:</label>
 <div id="Eresult"><?php echo number_format(array_sum($totalExpense));?></div>
<hr>
<!--change data-->
<?php
//read current change data
$read_change="select * from cash_current where Id=2";
$result_change = $conn->query($read_change);
if ($result_change->num_rows > 0){
    while ($row = $result_change -> fetch_assoc()){
        $current_change = $row ["current_cash"];
    }
}else{
        $current_change="0";
}
?>
<input type="number" name="currentc" id="currentc" value="<?php echo $current_change;?>"/>
<Button id="changebutton" type="submit" onclick="operations('currentc')"class="btn btn-outline-secondary">Coins</button>
<input type="number" name="cash_in" id="cash_in" placeholder="Cash In"/>
<br>
<label style="font-size:20px;">Collection: <?php echo number_format(array_sum($total)-array_sum($totalExpense));?></label>
<br>
<hr class="expenses">
<label>Current Cash</label>
<?php
//read current cash data
$read_current="select * from cash_current where Id=1";
$result_current = $conn->query($read_current);
if ($result_current->num_rows > 0){
    while ($row = $result_current -> fetch_assoc()){
        $current_cash = $row ["current_cash"];
    }
}else{
        $current_cash="0";
}
?>
<input type="number" name="current" id="current" value="<?php echo $current_cash;?>"/>
<input 

style="
<?php
$totalIncomefinal=array_sum($total);
$totalExpensefinal=array_sum($totalExpense);
$replicated_result= $totalIncomefinal-$totalExpensefinal;

    $balanced_result=$current_cash-$replicated_result;
    $balanced_resultfinal=$balanced_result+$current_change;
if ($balanced_resultfinal<0){
?>
color:#CA002A;
<?php
$textfinal=" Short";
}else{
?>    
color: green;
<?php 
$textfinal=" Excess";
}
?>
"

placeholder="BALANCED?" value="<?php
    echo $balanced_resultfinal.$textfinal;
?>" type="text" id="result" disabled=""/>
<input type="hidden" value="<?php echo $totalIncomefinal;?>" name="totalincome" />
<input type="hidden" value="<?php echo $totalExpensefinal; ?>" name="totalexpense" />
<Button type="submit" onclick="operations('current')"class="btn btn-outline-secondary">Calculate</button>
<div class="Back_button"><Button type="button" onclick="operations('back')"class="btn btn-outline-secondary">Back</button>
<Button type="submit" onclick="operations('save')"class="btn btn-outline-secondary">Save</button>
<Button type="submit" onclick="operations('reset')"class="btn btn-outline-secondary">Reset</button>
<Button type="button" id="sumbutton" onclick="loadSum()"class="btn btn-outline-secondary">Summary</button>

</div>
</form>
<script>
    window.onload=function(){
      document.getElementById("calcuValue1").click();
    }
</script>