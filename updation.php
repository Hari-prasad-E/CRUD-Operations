<!-- this page is to update the details of the user which are changed in the edit page this page does 
    not apper for the user but runs in the background. -->
<?php
include 'connection.php';
if (isset($_POST['submit'])) {
    $nameu = $_POST['nameu'];
    $emailu = $_POST['emailu'];
    $numberu = $_POST['numberu'];
    $passwordu = $_POST['passwordu'];
    $addressu = $_POST['addressu'];
    $dateofbirthu = $_POST['dateofbirthu'];
    $idu = $_POST['idu'];
    // querry for the user details for updation's in database table
    $querryins = "UPDATE userdetails SET Name = '$nameu',
                                                 emailid = '$emailu',
                                                 number  = '$numberu',
                                                 password = '$passwordu',
                                                 address = '$addressu',
                                                 dateofbirth = '$dateofbirthu'
                                                 WHERE sno = '$idu' ";
    $insertins = mysqli_query($conn, $querryins);
    if ($insertins) { ?>
        <meta http-equiv="refresh" content="1;url=retrive.php" />
<?php
    } else {
        echo "Error" . mysqli_error($conn);
    }
}
mysqli_close($conn);

?>