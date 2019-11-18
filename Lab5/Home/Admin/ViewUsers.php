<?php
    $UserID;
    $sqlConnect = new mysqli("mysql.eecs.ku.edu", "jarod.davis37", "iec4Ei9y", "jaroddavis37");

    /* check connection */
    if ($sqlConnect->connect_errno) {
        printf("Connect failed: %s\n", $sqlConnect->connect_error);
        exit();
    }
    else
    {
        echo "Connection made <br>";

        $userQuery = "SELECT * FROM Users";

        echo "<style type= 'text/css'> 
         .multTable 
         {
            background: #112255;
            color: #ffffff;
            font-family: consolas;
            font-size: 22;
            font-weight: bolder;
            border-color: #dddddd;
         }
      </style>";

        if ($result = $sqlConnect->query($userQuery)) 
        {
            echo "<table class='userTable' cellpadding = '3' border = \"2\" style = border-collapse: 'collapse'>";
            /*fetch associative array*/ 
            echo "<tr><td>User IDs</td></tr>";
            while ($row = $result->fetch_assoc()) 
            {
                echo '<tr>
                        <td>' . $row["user_id"] . '<br></td>
                </tr>';
            }
            echo "</table>";
            /* free result set */
            $result->free();
        }

    }


    /* close connection */
    $sqlConnect->close();
    echo "<br><br><a href='admin.html'>GO BACK</a>"
?>