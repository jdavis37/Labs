<?php
    $UserID = $_POST["userid"];
    $message = $_POST["message"];
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
        echo "Welcome, user: " . $UserID . "\n\n";
    
        $sql = "INSERT INTO Posts (content, author_id)
                VALUES('$message', $UserID)";

        if($sqlConnect->query($sql) === TRUE)
        {
            echo "Post Saved.\n\n";
        }
        else
        {
            echo "Error: " . $sql . "<br>" . $sqlConnect->error;
        }
    }
    else
    {
        echo "The user: " . $UserID . " doesn't exist. Please use a valid user ID...\n\n";
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
echo "<br><br><a href='CreatePosts.html'>GO BACK</a>"
?>