<h1> Paper Layout</h1>
<?php


echo "Paper Layout"; ?>
<?php echo"<table>" ;
    for($i=0;$i<$single_choice;$i++){
?>
    <tr>
        <td><?php echo ($i+1).") ".$qestiontype_id["question"][$i]; ?></td>
    </tr>
        <tr><td><input type="radio" name=<?php echo $qestiontype_id["id"][$i]; ?> value=<?php echo $qestiontype_id["mcq1"][$i]; ?>><?php echo $qestiontype_id["mcq1"][$i]; ?></td>

        </tr>
        <tr><td><input type="radio" name=<?php echo $qestiontype_id["id"][$i]; ?> value=<?php echo $qestiontype_id["mcq1"][$i]; ?>><?php echo $qestiontype_id["mcq2"][$i]; ?></td>

        </tr>
        <tr><td><input type="radio" name=<?php echo $qestiontype_id["id"][$i]; ?> value=<?php echo $qestiontype_id["mcq1"][$i]; ?>><?php echo $qestiontype_id["mcq3"][$i]; ?></td>

        </tr>
        <tr><td><input type="radio" name=<?php echo $qestiontype_id["id"][$i]; ?> value=<?php echo $qestiontype_id["mcq1"][$i]; ?>><?php echo $qestiontype_id["mcq4"][$i]; ?></td>

        </tr>

        <br><br><br>

<?php } ?>
</table>



 <?php echo $single_choice ?>

    <?php echo "<br>"; ?>


