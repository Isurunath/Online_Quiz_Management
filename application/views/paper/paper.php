<h1> Paper Layout</h1>
<?php


echo "Paper Layout"; ?>
<?php echo"<table>" ;
    for($i=0;$i<$single_choice;$i++){
?>
    <tr>

        <td><?php echo $qestiontype_id["answer"][$i]; ?></td>
        <td><input type="radio" name="aaa" value=<?php echo $qestiontype_id["answer"][$i]; ?>></td>
        <td><?php echo $qestiontype_id["question"][$i]; ?></td>

    </tr>

<?php } ?>
</table>



 <?php echo $single_choice ?>

    <?php echo "<br>"; ?>


