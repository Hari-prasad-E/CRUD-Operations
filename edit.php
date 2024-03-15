<!-- Edit page for the user details to change -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="registration.css">
    <title>Edit-details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>

<body>
    <?php //PHP code
    $id = $_GET['id'];
    include 'connection.php';
    $result = mysqli_query($conn, "SELECT * FROM userdetails where sno ='$id'");
    $r = mysqli_fetch_row($result);
    mysqli_close($conn);
    ?>
        <!-- HTML code starts here -->
     <section class="backpage">
        <div style="padding: 3%; background-color: transparent;">
        </div>
        <div class="cen">
            <div class="m-3">
                <h1>Edit your Details</h1>
                <div style="width: 40px; margin-left:8px; height: 4px;background-image:linear-gradient(to bottom right,#71B5E4,#9B5AB6);margin-bottom: 35px;"></div>
                <form method="post" action="<?php echo htmlspecialchars("updation.php"); ?>">
                    <div class="row g-3 mb-4">
                        <div class="col">
                            <label for="First name">Name</label>
                            <input type="text" class="form-control" name="nameu"  value="<?php echo $r[1] ?>">
                        </div>
                        <div class="col">
                            <label for="Email id">Email ID</label>
                            <input type="text" class="form-control" name="emailu"  value="<?php echo $r[2] ?>">
                        </div>
                    </div>
                    <div class="row g-3 mb-4">
                        <div class="col">
                            <label for="mobile number">Mobile Number</label>
                            <input type="text" class="form-control" name="numberu" value="<?php echo $r[3] ?>">
                        </div>
                        <div class="col">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="passwordu" value="<?php echo $r[4] ?> disabled"/>
                        </div>
                    </div>
                    <div class="row g-3 mb-4">
                        <div class="col">
                            <label for="address">Address</label>
                            <input type="text" class="form-control" name="addressu" value="<?php echo $r[5] ?>">
                        </div>
                        <div class="col">
                            <label for="dateofbirth">Date of birth</label>
                            <input type="date" class="form-control" name="dateofbirthu" value="<?php echo $r[6] ?>">
                        </div>
                    </div>
                        <input type="hidden" class="form-control" name="idu"  value="<?php echo $id; ?>">
                    <div class="final">
                        <button type="submit" name="submit" value="Submit" class="primary-button">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</body>

</html>