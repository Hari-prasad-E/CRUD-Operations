 <!-- this page is used to delete the particular data when the delete link is clicked
     which is in the right end of the row, once the delete key is pressen the conformation is asked.
     this page dosen't apper for the user it run's only in the background. -->
 <?php
    include 'connection.php';
    $id = $_GET['id'];
    $querrydel = "DELETE FROM userdetails WHERE sno = '$id'";
    $insertdel = mysqli_query($conn, $querrydel);
    if ($insertdel) { ?>

     <meta http-equiv="refresh" content="1;url=retrive.php" />
 <?php
    } else {
        echo "Error" . mysqli_error($conn);
    }
    mysqli_close($conn);
    ?>