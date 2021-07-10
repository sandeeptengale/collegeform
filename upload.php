<?php
    $dbhost = 'localhost';
    $dbuser = 'root';
    $dbpass = '';
    $dbname = "college";
    $dbport = '3036';

    print($dbhost);
    $conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname, $dbport);
    // Check connection
    if ($conn->connect_error) {
       die("Connection failed: " . $conn->connect_error);
    }

    $postdata = file_get_contents("php://input");
    $request = json_decode($postdata);

    @$firstName = $request->firstName;
    @$lastName = $request->lastName;
    @$dob = $request->dob;
    @$gender = $request->gender;
    @$trainingType = $request->trainingType;
    @$maths = $request->maths;
    @$physics = $request->physics;
    @$chemistry = $request->chemistry;

    $sql = "INSERT INTO student (first_name, last_name, dob, gender, training_type, maths, physics, chemistry) VALUES ('$firstName', '$lastName', '$dob', '$gender', '$trainingType', '$maths', '$physics', '$chemistry')";
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
      
    $conn->close();