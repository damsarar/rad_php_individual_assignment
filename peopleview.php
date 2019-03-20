<!DOCTYPE html>
<html lang="en">
  <head>
    <title>People Details</title>
    <meta charset="utf-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

  </head>
</html>

<body>

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


    //Select data from the table

    $sql="SELECT * FROM people_details";
    $result=$conn->query($sql);

    $res = $result->fetch_all();

?>

<br>
<h3 align="center">People Details</h3>
<br>
<div class="container">

    <div class="row">
        <div class="col">
            <form action="detailsFormHandler.php" method="post">
                <div class="form-label">
                    <label for="nic">NIC</label>
                    <input type="text" class="form-control" name="nic"  id="nic" placeholder="Enter NIC">
                </div>
                <br>
                <div class="form-label">
                    <label for="nic">Name</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name">
                </div>
                <br>
                <div class="form-label">
                    <label for="nic">Address</label>
                    <input type="text" class="form-control" name="address" id="address" placeholder="Enter Address">
                </div>
                <br>
                <div class="form-label">
                    <label for="nic">Phone No</label>
                    <input type="text" class="form-control" name="phoneNo"  id="phoneNo" placeholder="Enter Phone No">
                </div>
                <br>
                <button type="submit" class="btn btn-info" name="btnInsert" >Insert</button>
                <button type="submit" class="btn btn-dark" name="btnUpdate">Update</button>
                <button type="submit" class="btn btn-danger" name="btnDelete" onClick="return confirm('Are you sure you want to delete?')">Delete</button>

            </form>
        </div>

        <div class="col">
            <table class="table table-data2" id="table1">
                <thead>
                <tr>
                    <th>NIC</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Phone No</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <tr class="tr-shadow">

                    <?php foreach ($res as $row){ ?>
                <tr>
                    <td><?php echo $row[0];?></td>
                    <td><?php echo $row[1];?></td>
                    <td><?php echo $row[2];?></td>
                    <td><?php echo $row[3];?></td>
                </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


<script>

    // Script to fill the form with a table row

    var table = document.getElementById('table1');

    for(var i = 1; i < table.rows.length; i++)
    {
        table.rows[i].onclick = function()
        {
            document.getElementById("nic").value = this.cells[0].innerHTML;
            document.getElementById("name").value = this.cells[1].innerHTML;
            document.getElementById("address").value = this.cells[2].innerHTML;
            document.getElementById("phoneNo").value = this.cells[2].innerHTML;
        };
    }

</script>

</body>

</html>