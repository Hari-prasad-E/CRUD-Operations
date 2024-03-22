<!-- Retriving data of the user stored in the database and displaying it in the table and it have to option for edit and delete operations.
    and two buttons are created one is for add new user and another one for multiple delete option. -->
    <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Retrive</title>
</head>

<body>
    <!-- Confirmatiom for delete operation using alert -->
    <script>
        function confirmDelete() {
            return confirm("Are you sure you want to delete this record?");
        }
    </script>
    <?php
    include("connection.php");

    $query = "SELECT * FROM userdetails";
    $result = $conn->query($query);

    if ($result->num_rows > 0) { ?>
        <div>
            <a href="registrationpage.php" style="width: 20%;"><button>Add a new user</button></a>

            <form method="post" action="multipledelete.php">
                <button style="position:relative; top: -20px; left:-960px;" onclick="confirmDelete()" type="submit" class="delete-the-selected-data-button" value="submit">delete the selected data</button>

                <?php
                echo "<table border='1'><tr><th>select</th><th>s.no</th><th>Name</th><th>Email</th><th>Number</th><th>Address</th><th>Date of birth</th><th>Gender</th><th>Action</th></tr>";

                while ($row = $result->fetch_assoc()) {
                    // table to display the user data
                    echo "<tr><td><input type='checkbox' name='checkbox[]' value='" . $row["sno"] . "'></td><td>" . $row["sno"] . "</td><td>" . $row["Name"] . "</td><td>" . $row["emailid"] . "</td><td>" . $row["number"] . "</td><td>" . $row["address"] . "</td><td>" . $row["dateofbirth"] . "</td><td>" . $row["gender"] . "</td><td><a href='edit.php?id=" . $row["sno"] . "'>edit</a> <a href='delete.php?id=" . $row["sno"] . "' onclick=\"return confirmDelete()\">delete</a></td></tr>";
                }
                echo "</table>"; ?>
            </form>
        </div>
    <?php
    } else {
        echo "No records found";
    }
    $conn->close();
    ?>
</body>

</html>