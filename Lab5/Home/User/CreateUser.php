<?php
    define("CONSTANT", 500);

    $UserID = $_POST["userid"];
    $sqlConnect = new mysqli("mysql.eecs.ku.edu", "jarod.davis37", "iec4Ei9y", "jaroddavis37");

/* check connection */
if ($sqlConnect->connect_errno) {
    printf("Connect failed: %s\n", $sqlConnect->connect_error);
    exit();
}
else
{
    echo "Connection made.\n\n";

    $userExists = "SELECT user_id FROM Users WHERE user_id = $UserID";
    $result = $sqlConnect->query($userExists);

    if($result->num_rows > 0)
    {
        echo "User " . $UserID . " already exists.\n\n";
    }
    else
    {
        $sql = "INSERT INTO Users (user_id)
                VALUES($UserID)";
    
        if($sqlConnect->query($sql) === TRUE)
        {
            echo "New user added.\n\n";
        }
        else
        {
            echo "Error: " . $sql . "<br>" . $sqlConnect->error;
        }
    }       
}

//$query = "SELECT Name, CountryCode FROM City ORDER by ID DESC LIMIT 50,5";
/*
if ($result = $sqlConnect->query($query)) {

     /*fetch associative array 
    while ($row = $result->fetch_assoc()) {
        printf ("%s (%s)\n", $row["Name"], $row["CountryCode"]);
    }

    /* free result set 
    $result->free();
}*/

/* close connection */
$sqlConnect->close();
echo "<br><br><a href='CreateUser.html'>GO BACK</a>"
?>