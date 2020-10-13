<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="Description" content="Enter your description here" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <title>Title</title>
</head>

<body>
    <main class="container w-50">
        <?php
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            // b1 : ket noi csdl
            require("config.php");
            //b2: truy van csdl
            $sql = "SELECT * FROM $tableName WHERE id = $id";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
        }
        ?>
        <h4 class="my-3">UPDATE RECODRD</h4>
        <div style="height: 1px; width:100%;  background-color: #dddd" class="divider"></div>
        <p>please edit the input values and submit to update the record</p>
        <form method="POST" action="handle-edit.php?id=<?php echo $id?>">
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" name="name" required id="" value="<?php echo $row['name'] ?>" class="form-control" placeholder="" aria-describedby="helpId">

            </div>
            <div class="form-group">
                <label for="">Description</label>
                <textarea type="text" name="des" required id="" class="form-control" placeholder="" aria-describedby="helpId"><?php echo $row['description'] ?></textarea>
            </div>
            <div class="form-group">
                <label for="">Salary</label>
                <input type="text" name="salary" required id="" value="<?php echo $row['salary'] ?>" class="form-control" placeholder="" aria-describedby="helpId">

            </div>


            <label class="font-weight-bold d-block" for="">Gender</label>
            <div class="form-check form-check-inline">
                <label class="form-check-label">
                    <input class="form-check-input" type="radio" name="sex" id="" <?php echo $row['gender'] == 1 ? 'checked' : '' ?> value="1"> Male
                </label>
            </div>
            <div class="form-check form-check-inline">
                <label class="form-check-label">
                    <input class="form-check-input" type="radio" name="sex" id="" <?php echo $row['gender'] == 0 ? 'checked' : '' ?> value="0"> Female
                </label>
            </div>

            <div class="form-group my-3">
                <label for="">Birthday</label>
                <input type="date" name="birthday" id="" value="<?php echo $row['birthday'] ?>" class="form-control" placeholder="" aria-describedby="helpId">

            </div>

            <input type="submit" class="btn btn-primary" value="Save">
            <a href="javascript:history.go(-1)" class="btn btn-light btn-outline-secondary">Close</a>

        </form>

    </main>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>