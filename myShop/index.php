<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>my Shop</title>
</head>
<body>
    <div class="container my-5">
        <h2> List of Clients</h2>
        <a class="btn btn-primary" href="/myShop/create.php"> New Client</a> <br>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Created At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <!-- my php -->
                <?php
                
                $connection =  mysqli_connect("localhost", "root", "", "myshop");
                // check connection
                if($connection->connect_error){
                    die("Connection failed;" .$connection->connect_error);
                }
                // read all rows from database table
                $sql = "SELECT * FROM client";
                $result = $connection->query($sql);
                // when an error occurs
                if(!$result){
                    die("Invalid query:". $connection->error);
                }
                // read data of each row
                while($row = $result->fetch_assoc()){
                    echo " 
                    <tr>
                    <td>$row[id]</td>
                    <td>$row[name]</td>
                    <td> $row[email]</td>
                    <td>$row[phone]</td>
                    <td>$row[address]</td>
                    <td>$row[created_at]</td>
                    <td>
                        <a class='btn btn-primary btn-sm' href='/myshop/edit.php?id=$row[id]'>Edit</a>
                        <a  class='btn btn-danger btn-sm' href='/myshop/delete.php?id=$row[id]'>Delete</a>
                    </td>
                </tr>
                ";
                }
                ?>
               
            </tbody>


        </table>
    </div>
</body>
</html>