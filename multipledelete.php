<!-- This page run's in the background to delete the multiple data that are stored in the table using checkbox the rows are selected 
and delete the selected data button is clicked the confirmation is asked before the delete 
operation is performed. -->
<?php
include 'connection.php';
$multipleselect = $_POST['checkbox'];
foreach ($multipleselect as $v) {
    $deletequerry = "DELETE FROM userdetails WHERE sno = '$v'";
    $insertdelquerry = mysqli_query($conn, $deletequerry);
    if ($insertdelquerry) { ?>

        <meta http-equiv="refresh" content="1;url=retrive.php" />
<?php
    } else {
        echo "Error" . mysqli_error($conn);
    }
}
mysqli_close($conn);
?>