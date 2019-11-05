<?php

    $UserID = $_POST["UserID"];
    $sqlConnect = new mysqli("mysql.eecs.ku.edu", "jarod.davis37", "iec4Ei9y", "jaroddavis37");

    /* check connection */
    if ($sqlConnect->connect_errno) {
        printf("Connect failed: %s\n", $sqlConnect->connect_error);
        exit();
    }
    else
    {
        echo "Connection made <br> User Selected: " . $UserID . "<br><br>";

        $userQuery = "SELECT * FROM Posts WHERE author_id = $UserID";
        echo "<style type= 'text/css'> 
         .userTable
         {
            background: #ffffff;
            color: #000000;
            font-family: consolas;
            font-size: 14;
         }
      </style>";
        if ($result = $sqlConnect->query($userQuery)) 
        {
            echo "<table class='userTable' cellpadding = '3' border = \"2\" style = border-collapse: 'collapse'>";

            /*fetch associative array*/ 
            while ($row = $result->fetch_assoc()) 
            {
                
                echo "<tr>
                        <td>Post# '" . $row["post_id"] . '": </td>
                        <td>' . $row["content"] . "<br></td>
                </tr>";
            }
            echo "</table>";

            /* free result set */
            $result->free();
        }

    }


    /* close connection */
    $sqlConnect->close();
    echo "<br><br><a href='ViewUserPosts.html'>GO BACK</a>";




?>