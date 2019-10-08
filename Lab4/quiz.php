<?php
    //access the global array called $_POST to get the values from the text fields
    /*$name = $_POST["name"];
    $email = $_POST["email"];

    echo "Name: " . $name . "<br>";
    echo "Email: " . $email . "<br>";*/

    $Q1 = "Question 1: You keep getting asked: \"What do the numbers mean?\" What is your name?";
    $Q2 = "Quesition 2: You just found out \"the cake is a lie.\" What game is this?";
    $Q3 = "Question 3: How many timelines are in the Legend of Zelda series?";
    $Q4 = "Question 4: Who is Sonic's archenemy?";
    $Q5 = "Question 5: Which game's only mission is to \"Rip and Tear\"?";

    $Answer1 = "Alex Mason";
    $Answer2 = "Portal";
    $Answer3 = "2";
    $Answer4 = "Eggman";
    $Answer5 = "DOOM";

    $QuizSize = 5;
    $Score = 0;
    $Grade = 0;
    $Answer = array($Answer1, $Answer2, $Answer3, $Answer4, $Answer5);
    $UserAnswer = array($_POST["question1"], $_POST["question2"], $_POST["question3"], $_POST["question4"], $_POST["question5"]);
    $Questions = array($Q1, $Q2, $Q3, $Q4, $Q5);

    for($i = 0; $i < $QuizSize; $i++)
    {
        if($UserAnswer[$i] == $Answer[$i])
        {
            $Score++;
        }

        echo $Questions[$i] . "<br>";
        echo "You answered: " . $UserAnswer[$i] . "<br>";
        echo "The correct answer is: " . $Answer[$i] . "<br><br>";

    }

    echo "You answered " . $Score . " out of " . $QuizSize . " questions correctly.<br><br>";

    $Grade = ($Score / $QuizSize) * 100;

    echo "Grade: " . $Grade . "% --- ";
    if($Grade > 80)
    {
        echo "Perfect Score!<br><br>";
    }
    else if($Grade > 60)
    {
        echo "Not Bad!<br><br>";
    }
    else if($Grade > 40)
    {
        echo "meh.";
    }
    else if($Grade > 20)
    {
        echo "scrub.";
    }
    else
    {
        echo "Git Gud.";
    }
?>