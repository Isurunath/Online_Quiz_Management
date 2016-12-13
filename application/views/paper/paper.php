<h1 style="text-align:center";> Question Paper</h1>
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
$lno = $i+$true_false;
echo "<table style='padding-left: 30px';>" ;
        $j = 0;
        for($i=0;$i<$true_false;$i++){
            $j++;
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

echo "<b>Choose suitable answers for next ".($lno+1)." - ".($lno+$multiple_choice)." questions</b>";
$lno = $lno+$multiple_choice;
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
<?php
echo "<b>Write short answers for next ".($lno+1)." - ".($lno+$short_answer)." questions</b>";
echo"<table style='padding-left: 30px';>" ;
    for($i=0;$i<$short_answer;$i++){
    ?>
    <tr>
        <td><?php echo ($true_false+$single_choice+$multiple_choice+$i+1).") ".$getshortanswer["question"][$i]; ?></td>
    </tr>
    <tr>
<td><input style="width: 300px;" type="text" name=<?php echo "1".$getshortanswer["id"][$i]; ?> ></td>
<!--       <td> --><?php //echo $getshortanswer["id"][$i]; ?><!--</td>-->
    </tr>

    <br><br><br>

    <?php } ?>

</table>

    <?php echo "<br>"; ?>


