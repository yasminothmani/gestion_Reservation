<?php
if (!isset($_POST["target"])) die("Invalid target ! ");
include "./connect.php";
$conn = connect();
$target = $_POST["target"];
$sql = "SELECT * from reser where id='$target'";
$result = mysqli_query($conn, $sql);


$row = mysqli_fetch_assoc($result);
$day = $row["date"][5] . $row["date"][6] . "-" . $row["date"][8] . $row["date"][9] . "-" . $row["date"][0] . $row["date"][1] . $row["date"][2] . $row["date"][3];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <!-- bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


    <!-- fontawesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>php reservation CRUD</title>
</head>

<body>
    <nav class="navbar navbar-light justify-content-center fs-3 mb-5 " style="background-color:#D2B48C;">
        Update Datas !
    </nav>

    <div class="container">
        <div class="text-center mb-4">
            <h3>Update the datas ! </h3>
            <p class="text-muted"> Complete the form bellow to add a reservation</p>
        </div>
        <div class="container d-flex justify-content -center">
            <form action="./uppa.php" method="post" style="width:50vw;min-width:300px;" onsubmit="return checkInputs()">
                <div class="row mb-3">
                    <div class="col">
                        <label class="form-label"> First name:</label>
                        <input type="text" value="<?php echo $row["name"]; ?>" class="form-cpntrol" id="first_name" name="first_name" placeholder="your first name please!">
                    </div>
                    <div class="col">
                        <label class="form-label"> Last name:</label>
                        <input type="text" value="<?php echo $row["lname"]; ?>" class="form-cpntrol" id="last_name" name="last_name" placeholder="your last name please!">
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="form-label"> Email:</label>
                    <input type="email" id="email" value="<?php echo $row["email"]; ?>" class="form-cpntrol" name="email" placeholder="name@example.com">
                </div>

                <div class="col">
                    <label class="form-label"> table:</label>

                    <select name="table">

                        <option value="">Select a table </option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>

                    </select>
                </div>

                <div class="row mb-3">
                    <!--date-->
                    <label for="start">Start date:</label>
                    <input type="date" value="<?php echo $day ?>" id="start" name="date" min="2022-11-16" max="2050-12-31">

                </div>
                <div>
                    <button type="submit" class="btn btn-success" name="submit">Update</button>
                    <a class="btn btn-danger" href="./datas.php">Return Back</a>
                </div>

                <input type="hidden" name="target" value="<?php $row["id"] ?>">
            </form>
        </div>
    </div>
    <!-- bootstrap-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!--Importing my check fields javascript file ! -->
    <script src="./app.js"></script>

</body>

</html>