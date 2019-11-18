<?php
        
    $sqlConnect = new mysqli("mysql.eecs.ku.edu", "jarod.davis37", "iec4Ei9y", "jaroddavis37");
    if(!empty($_POST['checkbox']))
    {
        if ($sqlConnect->connect_errno) {
            printf("Connect failed: %s\n", $sqlConnect->connect_error);
            exit();
        }
        else
        {
            echo "Connection made <br><br>";

            
            echo "<style type= 'text/css'> 
            .userTable
            {
                background: #ffffff;
                color: #000000;
                font-family: consolas;
                font-size: 14;
            }
            </style>";

            echo "<table class='userTable' cellpadding = '3' border = \"2\" style = border-collapse: 'collapse'>";
            echo "<th>Deleted Post ID</th>";

            foreach($_POST['checkbox'] as $checked)
            {
                $deleteQuery = "DELETE FROM Posts WHERE post_id = $checked";
                if($result = $sqlConnect->query($deleteQuery))
                {
                    echo "<tr>
                    <td>$checked</td>
                    </tr>";                  
                }

            }
                echo "</table>";

        }
                echo "<br><br><a href='DeletePost.html'>GO BACK</a>";
    }     
?>