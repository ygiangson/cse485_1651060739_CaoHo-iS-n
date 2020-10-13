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
            if(isset($_GET['id'])){
                $id = $_GET['id'];
                //b1 : ket noi csdl
                require("config.php");
                // b2 : truy van csdl
                $sql = "SELECT * FROM employees WHERE id = $id";
                $result = mysqli_query($conn,$sql);
                $row = mysqli_fetch_assoc($result);
            }
        ?>
        <h4 class="my-3">View record</h4>
        <div style="height: 1px; width:100%;  background-color: #dddd" class="divider"></div>
        <div class="my-3">
            <label class="font-weight-bold d-block">ID</label>
            <label for=""><?php echo $row['id']?></label>
        </div>

        <div class="my-3">
            <label class="font-weight-bold d-block">Name</label>
            <label for=""><?php echo $row['name']?></label>
        </div>

        <div class="my-3">
            <label class="font-weight-bold d-block">Description</label>
            <label for=""><?php echo $row['description']?></label>
        </div>

        <div class="my-3">
            <label class="font-weight-bold d-block">Salary</label>
            <label for=""><?php echo $row['salary']?></label>
        </div>

        <div class="my-3">
            <label class="font-weight-bold d-block">Gender</label>
            <label for=""><?php echo $row['gender'] == 1 ?'male' : 'female' ?></label>
        </div>

        <div>
            <label class="font-weight-bold d-block">Birthday</label>
            <label for=""><?php echo $row['birthday']?></label>
        </div>

        <div class="my-3"> 
            <label class="font-weight-bold d-block">Create_at</label>
            <label for=""><?php echo $row['created_at']?></label>
        </div>

        <a name="" id="" class="btn btn-primary" href="javascript:history.go(-1)" role="button">Close</a>


    </main>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>