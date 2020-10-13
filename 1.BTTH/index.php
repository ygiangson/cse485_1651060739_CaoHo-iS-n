<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">

    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>
    <main class="container w-75">
        <div class="row my-3">
            <div class="col-sm-9">
                <h3>Employee List</h3>
            </div>
            <div class="col-sm-3 d-flex align-center h-100">
                <a name="" id="" class="btn btn-success align-middle" href="add-record.php" role="button">
                    <i class="fa fa-plus"></i> Add new employee
                </a>
            </div>
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Salary</th>
                    <th>Gender</th>
                    <th>Birthday</th>
                    <th>Create_at</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // b1 : ket noi csdl
                require("config.php");
                // b2 :truy van csdl
                $sql = "SELECT * FROM employees";
                $result = mysqli_query($conn, $sql);
                $id = -1;
                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                    <tr>
                        <td><?php echo $row['id'] ?></td>
                        <td><?php echo $row['name'] ?></td>
                        <td><?php echo $row['description'] ?></td>
                        <td><?php echo $row['salary'] ?></td>
                        <td><?php echo $row['gender'] == 1 ? 'male' : 'female' ?></td>
                        <td><?php echo $row['birthday'] ?></td>
                        <td><?php echo $row['created_at'] ?></td>
                        <td class="action">
                            <a href="detail-record.php?id=<?php echo $row['id'] ?>"><i class="fa fa-eye"></i></a>
                            <a href="edit-record.php?id=<?php echo $row['id'] ?>"><i class="fa fa-edit"></i></a>
                            <a data-toggle="modal" data-target="#modelId" href="#?>"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                    <!-- Modal -->
                    <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Warning!</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="container-fluid">
                                        Are sure delete??
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <a href="handle-delete.php?id=<?php echo $row['id']?>" class="btn btn-primary text-light">OK</a>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php
                }
                ?>


            </tbody>
        </table>



        <script>
            $('#exampleModal').on('show.bs.modal', event => {
                var button = $(event.relatedTarget);
                var modal = $(this);
                // Use above variables to manipulate the DOM

            });
        </script>




    </main>
    <!-- TODO: This is for server side, there is another version for browser defaults -->
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-3.5.1.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>