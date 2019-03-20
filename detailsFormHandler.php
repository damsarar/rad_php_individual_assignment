<?php

    // Database connection

    $servername="localhost";
    $username="root";
    $password="";
    $dbname = "rad_assignment";

    $conn=new mysqli($servername, $username, $password, $dbname);

    if($conn->connect_error){
        die("Connection failed ".$conn->connect_error);
    }

    $nic=$_POST['nic'];
    $name=$_POST['name'];
    $address=$_POST['address'];
    $phoneNo=$_POST['phoneNo'];

    if (isset($_POST['btnInsert'])) {

        //Insert to data to database

        if($nic!=null && $name!=null && $address!=null && $phoneNo!=null){
            $sql="INSERT INTO people_details(NIC,Name,Address,PhoneNo) VALUES ('$nic','$name','$address','$phoneNo')";

            if (mysqli_query($conn, $sql)) {
                echo "New record created successfully";
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
        }
    } else if (isset($_POST['btnUpdate'])) {

        //Update a record in a database

        if($nic!=null && $name!=null && $address!=null && $phoneNo!=null){
            $sql="UPDATE people_details SET Name='$name',Address='$address',PhoneNo='$phoneNo' WHERE NIC='$nic'";

            if (mysqli_query($conn, $sql)) {
                echo "Record updated successfully";
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
        }
    }else if(isset($_POST['btnDelete'])){

        //Delete a record in a database

        if($nic!=null && $name!=null && $address!=null && $phoneNo!=null){
            $sql = "DELETE FROM people_details WHERE NIC='$nic'";

            if (mysqli_query($conn, $sql)) {
                echo "Record updated successfully";
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
        }

    }

    //Redirect to the main page

    header("Location: http://localhost/radassignment/peopleview.php");

?>