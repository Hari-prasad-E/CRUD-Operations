<!-- Landing page for user registration and validation, after that the user data is updated in the database table -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form-validation</title>
    <script src="validation.js"></script>
    <link rel="stylesheet" href="registration.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>
<body>
    <?php
    // Define variables and set to empty values
    $nameErr = $emailErr = $numberErr = $passwordErr = $dateofbirthErr = $genderErr = "";
    $name = $email = $number = $password = $address = $dateofbirth = $gender = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Name validation
        if (empty($_POST["name"])) {
            $nameErr = "Name is required";
        } else {
            $name = test_input($_POST["name"]);
            // Check if name only contains letters and whitespace
            if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
                $nameErr = "Only letters and white space allowed";
            }
        }

        // Email validation
        if (empty($_POST["email"])) {
            $emailErr = "Email is required";
        } else {
            $email = test_input($_POST["email"]);
            // Check if email address is well-formed
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = "Invalid email format";
            }
        }

        // mobilenumber validation
        if (empty($_POST["number"])) {
            $numberErr = "enter your number";
        } else {
            $number = test_input($_POST["number"]);
            // Check if URL address syntax is valid
            if (!preg_match("/^[0-9]{10}$/", $number)) {
                $numberErr = "Invalid number";
            }
        }

        // password validation
        if (empty($_POST["password"])) {
            $passwordErr = "enter your password";
        } else {
            $password = test_input($_POST["password"]);
            // Check if URL address syntax is valid
            if (!preg_match("/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,20}$/", $password)) {
                $passwordErr = "Use strong password";
            }
        }

        // Address validation
        $address = test_input($_POST["address"]);

        //Date of birth validation
        if (empty($_POST["dateofbirth"])) {
            $dateofbirthErr = 'date of birth is Required Field';
        }

        // Gender validation
        if (empty($_POST["gender"])) {
            $genderErr = "Gender is required";
        } else {
            $gender = test_input($_POST["gender"]);
        }
    }
    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    ?>
    <section class="backpage">
        <div style="padding: 3%; background-color: transparent;">
        </div>
        <div class="cen">
            <div class="m-3">
                <h1>Register</h1>
                <div style="width: 40px; margin-left:8px; height: 4px;background-image:linear-gradient(to bottom right,#71B5E4,#9B5AB6);margin-bottom: 35px;"></div>
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <div class="row g-3 mb-4">
                        <div class="col">
                            <label for="First name">Name</label>
                            <span class="note text-danger" id="nameErr">*<?php echo $nameErr; ?></span>
                            <input type="text" class="form-control" name="name" placeholder="First name">
                        </div>
                        <div class="col">
                            <label for="Email id">Email ID</label>
                            <span class="note text-danger" id="emailErr">*<?php echo $emailErr; ?></span>
                            <input type="text" class="form-control" name="email" placeholder="Email Id">
                        </div>
                    </div>
                    <div class="row g-3 mb-4">
                        <div class="col">
                            <label for="mobile number">Mobile Number</label>
                            <span class="note text-danger" id="numberErr">*<?php echo $numberErr; ?></span>
                            <input type="text" class="form-control" name="number" placeholder="mobile number">
                        </div>
                        <div class="col">
                            <label for="password">Password</label>
                            <span class="note" id="passwordErr">*<?php echo $passwordErr; ?></span>
                            <input type="text" class="form-control" name="password" placeholder="password" aria-label="password">
                        </div>
                    </div>
                    <div class="row g-3 mb-4">
                        <div class="col">
                            <label for="address">Address</label>
                            <input type="text" class="form-control" name="address" placeholder="Address">
                        </div>
                        <div class="col">
                            <label for="dateofbirth">Date of birth</label>
                            <span class="note text-danger" id="dateErr">*<?php echo $dateofbirthErr; ?></span>
                            <input type="date" class="form-control" name="dateofbirth" placeholder="joining date">
                        </div>
                    </div>
                    <div class="row g-3 mb-4">
                        <div class="col-12">
                            <label for="gender" class="ms-5">Gender</label>
                            <span class="note text-danger" id="genderErr">*<?php echo $genderErr; ?></span>
                            <input class="ms-5 male" type="radio" id="male" name="gender" value="male">Male</input>
                            <input class="ms-5 female" type="radio" id="female" name="gender" value="female">Female</input>
                            <input class="ms-5 prefernottosay" type="radio" id="prefernottosay" name="gender" value="prefernottosay">Prefer not to say</input>
                        </div>
                    </div>
                    <div class="final">
                        <button type="submit" name="submit" value="Submit" class="primary-button">Register</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- value updation -->
    <?php
    include 'connection.php';
    if (isset($_POST['submit'])) {
        if (!empty($_POST["name"]) && !empty($_POST["email"]) && !empty($_POST["number"]) && !empty($_POST["password"]) && !empty($_POST["dateofbirth"]) && !empty($_POST["gender"])) {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $number = $_POST['number'];
            $password = $_POST['password'];
            $address = $_POST['address'];
            $dateofbirth = $_POST['dateofbirth'];
            $gender = $_POST['gender'];
            $sql = "INSERT userdetails(Name, emailid, number, password, address, dateofbirth, gender) VALUES('$name', '$email', '$number', '$password' , '$address' , '$dateofbirth','$gender')";
            $insert = mysqli_query($conn, $sql);
            if ($insert) { ?>
                <meta http-equiv="refresh" content="1;url=retrive.php" />
    <?php
            } else {
                echo "Error" . mysqli_error($conn);
            }
        }
    }
    mysqli_close($conn);
    ?>
</body>
</html>