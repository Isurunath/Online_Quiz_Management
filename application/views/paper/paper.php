<h1 style="text-align:center";> Sample Paper</h1>
<?php


echo "<b>Choose the most suitable answer for next 1 - ".$single_choice." questions</b>"; ?>
<?php echo"<table style='padding-left:30px;'>" ;
    for($i=0;$i<$single_choice;$i++){
?>
    <tr>
        <td><?php echo ($i+1).") ".$qestiontype_id["question"][$i]; ?></td>
    </tr>
        <tr><td><input type="radio" name=<?php echo $qestiontype_id["id"][$i]; ?> value=<?php echo "1".$getmultiple["id"][$i]; ?>>  <?php echo $qestiontype_id["mcq1"][$i]; ?></td>

        </tr>
        <tr><td><input type="radio" name=<?php echo $qestiontype_id["id"][$i]; ?> value=<?php echo "2".$getmultiple["id"][$i]; ?>>  <?php echo $qestiontype_id["mcq2"][$i]; ?></td>

        </tr>
        <tr><td><input type="radio" name=<?php echo $qestiontype_id["id"][$i]; ?> value=<?php echo "3".$getmultiple["id"][$i]; ?>>  <?php echo $qestiontype_id["mcq3"][$i]; ?></td>

        </tr>
        <tr><td><input type="radio" name=<?php echo $qestiontype_id["id"][$i]; ?> value=<?php echo "4".$getmultiple["id"][$i]; ?>>  <?php echo $qestiontype_id["mcq4"][$i]; ?></td>

        </tr>

        <br><br><br>

<?php } ?>
</table>

<?php
echo "<b>Choose true/false for next ".($i+1)." - ".($i+$true_false)." questions</b>";
echo "<table style='padding-left: 30px';>" ;

        for($i=0;$i<$true_false;$i++){
        ?>
        <tr>
            <td><?php echo ($single_choice+$i+1).") ".$gettruefalse["question"][$i]; ?></td>
        </tr>
        <tr><td><input type="radio" name=<?php echo $gettruefalse["id"][$i]; ?> value="true">  true</td>

        </tr>
        <tr><td><input type="radio" name=<?php echo $gettruefalse["id"][$i]; ?> value="false">  false</td>

        </tr>


        <br><br><br>

<?php }
echo"</table>" ;
echo "<b>Choose suitable answers for next ".($i+$true_false+1)." - ".($i+$true_false+$multiple_choice)." questions</b>";
echo"<table style='padding-left: 30px';>" ;
        for($i=0;$i<$multiple_choice;$i++){
        ?>
        <tr>
            <td><?php echo ($true_false+$single_choice+$i+1).") ".$getmultiple["question"][$i]; ?></td>
        </tr>
        <tr><td><input type="checkbox" name=<?php echo "1".$getmultiple["id"][$i]; ?> value=<?php echo "1".$getmultiple["id"][$i]; ?>>  <?php echo $getmultiple["mcq1"][$i]; ?></td>

        </tr>
        <tr><td><input type="checkbox" name=<?php echo "2".$getmultiple["id"][$i]; ?> value=<?php echo "2".$getmultiple["id"][$i]; ?>>  <?php echo $getmultiple["mcq2"][$i]; ?></td>

        </tr>
        <tr><td><input type="checkbox" name=<?php echo "3".$getmultiple["id"][$i]; ?> value=<?php echo "3".$getmultiple["id"][$i]; ?>>  <?php echo $getmultiple["mcq3"][$i]; ?></td>

        </tr>
        <tr><td><input type="checkbox" name=<?php echo "4".$getmultiple["id"][$i]; ?> value=<?php echo "4".$getmultiple["id"][$i]; ?>>  <?php echo $getmultiple["mcq4"][$i]; ?></td>

        </tr>

        <br><br><br>

<?php } ?>

</table>
    <?php echo "<br>"; ?>


