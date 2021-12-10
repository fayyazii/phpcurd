<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </head>
    <body>
        <?php require_once 'process.php'; ?>
        <div class="container">
        <?php
            $mysqli = new mysqli('localhost','root', '','crud') or die (mysqli_error($mysqli));
            $result = $mysqli->query('Select * from cruddata ') or die($mysqli->error);

        ?>
        <div class="row justify_content_center"> 
            <table>
                <thead>
                    <tr>
                        <th>name</th>
                        <th>location</th>
                        <th colspan="2" >Action</th>
                    </tr>
                </thead>
                <?php
                    while($row = $result->fetch_assoc()): ?>
                    <tr class="p-2" style="padding:10px">
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['location']; ?></td>
                        <td>
                            <a href="index.php?edit=<?php echo $row['id'];?>"
                                class="btn btn-infn" > Edit </a>
                            <a href="process.php?delete=<?php echo $row['id']; ?>"
                                class="btn btn-danger">Delete </a>
                        </td>
                    </tr>
                    <?php endwhile; ?>
            </table>

        </div>


        <?php
            function pre_r  ( $array )
            {
                echo  '<pre>';
                pre_r($array);
                echo '<pre>';
            }
        ?>
        <div class="row justify-content-center ">

            <div class="col-md-3"></div>
            <div class="col-md-6">

                <form action="process.php" method="POST">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" style="width: 70%;" value=" Enter your name ">
                    </div>
                    <div class="form-group">
                        <label>Location</label>
                        <input type="text" name="location" class="form-control" style="width: 70%;" value=" Enter your location ">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary" name="save">Save</button>
                    </div>
                    
                </form>
            </div>
            <div class="col-md-3"></div>
        </div>
        </div>
    
    </body>
</html>