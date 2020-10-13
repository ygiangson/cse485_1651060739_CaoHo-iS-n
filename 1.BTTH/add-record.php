<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- font awesome -->
    <link rel="stylesheet" href="js/all.min.js">
    <link rel="stylesheet" href="css/all.min.css">

</head>

<body>
    <form action="handle-add.php" method="POST" class="container w-50 my-3">
        <h4>CREATE RECORD</h4>
        <div class="form-group">
            <label for="">Name <span style="color: red; font-weight:bold">*</span></label>
            <input type="text" class="form-control" name="name" required id="" aria-describedby="emailHelpId" placeholder="">

        </div>
        <div class="form-group">
            <label for="">Description</label>
            <textarea type="text" class="form-control" name="description" id="" aria-describedby="emailHelpId" required placeholder=""></textarea>

        </div>
        <div class="form-group">
            <label for="">Salary</label>
            <input type="text" class="form-control" name="salary" id="" required aria-describedby="emailHelpId" placeholder="">
        </div>
        <h6 class="w-100">Gender</h6>
        <div class="form-check form-check-inline">

            <label class="form-check-label">
                <input class="form-check-input" type="radio" name="sex" id="" checked value="1"> Male
            </label>

        </div>
        <div class="form-check form-check-inline">
            <label class="form-check-label">
                <input class="form-check-input" type="radio" name="sex" id="" value="0"> Female
            </label>

        </div>
        <div class="form-group my-4">
            <label for="">Birthday</label>
            <input required type="date" class="form-control" name="birthday" id="" aria-describedby="emailHelpId" placeholder="">
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
        <a name="close" href="javascript:history.go(-1)" class="btn btn-light btn-outline-secondary d-inline">Close</a>
    </form>
    <!-- TODO: This is for server side, there is another version for browser defaults -->
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-3.5.1.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>