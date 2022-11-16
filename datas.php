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
        reservations List
    </nav>
    <div class="container">

        <?php

        if (isset($_GET['msg'])) {
            $msg = $_GET['msg'];
            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
' . $msg . '
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
        }

        ?>


        <a href="./Register.html" class="btn btn-dark mb-3">
            Add new reservation</a>

        <table class="table table-hover text-center">
            <thead class="table-dark">
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">First name</th>
                    <th scope="col">Last name</th>
                    <th scope="col">email</th>
                    <th scope="col">gender</th>
                    <th scope="col">table</th>
                    <th scope="col">date_wanted</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>

                <?php

                include "./connect.php";

                $conn = connect();
                if (connect()) {
                    $sql = "SELECT * from reser ";
                    $result = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_assoc($result)) {
                ?>
                        <th><?php echo $row['id'] ?></th>
                        <th><?php echo $row['name'] ?></th>
                        <th><?php echo $row['lname'] ?></th>
                        <th><?php echo $row['email'] ?></th>
                        <th><?php echo $row['gender'] ?></th>
                        <th><?php echo $row['tawla'] ?></th>
                        <th><?php echo $row['date'] ?></th>
                        <td style="display:flex">
                            <form action="./update.php" method="POST">
                                <button style="display:inherit ;background:none;width:auto;height:auto;border:none" type="submit" class="link-dark"><i class="fa-solid fa-pen-to-square fs -5 me-3"></i></button>
                                <input type="hidden" name="target" value="<?php echo $row['id'] ?>">
                            </form>
                            <form action="./delete.php" method="POST">
                                <button style="display:inherit ;background:none;width:auto;height:auto;border:none" type="submit" class="link-dark"><i class="fa-solid fa-trash fs-5"></i></button>
                                <input type="hidden" name="target" value="<?php echo $row['id'] ?>">
                            </form>
                        </td>

                        </tr>
                <?php


                    }
                }

                ?>

            </tbody>
        </table>


    </div>
    <!-- bootstrap-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


</body>

</html>