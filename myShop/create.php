<?php
// addind client to the database
$connection =  mysqli_connect("localhost", "root", "", "myshop");

//  for submitt
$name = "";
$email = "";
$phone = "";
$address = "";

$errorMessage = "";
$successMessage= "";

if($_SERVER['REQUEST_METHOD'] =='POST'){
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $address = $_POST["address"];

    do{
        if(empty($name) || empty($email) || empty($phone) || empty($address)){
            $errorMessage = "Please all the field are required";
            break;

        }
        // insert a new client into the clients table
        // 
        $sql = "insert into client (name, email, phone, address)".
                "VALUES ('$name', '$email', '$phone', '$address')";
        $result = $connection->query($sql);
        if(!$result){
            $errorMessage = "invalid query: " . $connection->error;
            break;
        }


        $name = "";
        $email = "";
        $phone = "";
        $address = "";
        
        $successMessage = "client added correctly";
        // To redirect the user
        header("location: /myshop/index.php");
        exit;

    }while(false);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--  -->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
       <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>myshop</title>
</head>
<body>
    <div class="container my-5">
        <h2>New client</h2>
        <!--  displaying an error message i f all the field are not enterd -->
        <?php
        if( !empty($errorMessage) ){
            echo "
             <div class='row mb-3'>
                     <div class='offset-sm-3 col-sm-6'>
                         <div class ='alert alert-success alert-dismissible fade show' role='alert'>
                            <strong>$errorMessage</strong>
                            <button type='button' class='btn-close' data-bs-dismiss='alert' arial-label></button>
                         </div>

                    </div>
                </div>
            ";

        }
        ?>
         
        <form method="post">
            <div class="row mb-3">
                <label  class="col-sm-3 col-form-label">Name</label>
                <div class="col-sm-6 my-1">
                    <input type="text" class="form-control" name="name" value="<?php echo $name; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label  class ="col-sm-3 col-form-label" for="">Email</label>
                <div class="col-sm-6 my-1">
                    <input type="email"class=" form-control" name="email" value="<?php echo $email; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label  class ="col-sm-3 col-form-label" for="">Phone</label>
                <div class="col-sm-6 my-1">
                    <input type="number"class="form-control" name="phone" value="<?php echo $phone;?>">

                </div>
            </div>
            <div class="row mb-3">
                <label  class ="col-sm-3 col-form-label" for="">Address</label>
                <div class="col-sm-6 my-1">
                    <input type="text"class="form-control" name="address" value="<?php echo $address; ?>">
                </div>
            </div>    
             
            <!-- successMessage -->
            <?php
            if(!empty($successMessage)){
                echo "
                <div class='row mb-3'>
                     <div class='offset-sm-3 col-sm-6'>
                         <div class ='alert alert-success alert-dismissible fade show' role='alert'>
                            <strong>$successMessage</strong>
                            <button type='button' class='btn-close' data-bs-dismiss='alert' arial-label></button>
                         </div>

                    </div>
                </div>
                ";
            }

            ?>
             <div class="row mb-3">
               <div class="offset-sm-3 col-sm-3 d-grid">
                     <button type="submit" class="btn btn-primary">submit</button>
                 </div>
                 <div class="col-sm-3 d-grid">
                    <a class="btn btn-outline-primary" href="/myshop/index.php" role="button">cancel</a>
                </div>



        </form>
    </div>
</body>
</html>