<?php
include("views/layout/sider-bar.php")
?>

<main class="mx-auto w-75">
    <a name="" id="" class="btn btn-primary my-3" href="#" role="button">Thêm người dùng</a>
    <table class="table table-striped">
        <thead class="thead-dark">
            <tr>
                <th scope="col">id</th>
                <th scope="col">Tài khoản</th>
                <th scope="col">email</th>
                <th scope="col">Trạng kích hoạt</th>
                <th scope="col">Vai trò</th>
                <th scope="col">Sửa</th>
                <th scope="col">Xóa</th>
            </tr>
        </thead>
        <tbody>
            <?php

            while ($row = mysqli_fetch_assoc($result)) {
            ?>
                <tr>
                    <th scope="row"><?php echo $row['id'] ?></th>
                    <td><?php echo $row['username'] ?></td>
                    <td><?php echo $row['email'] ?></td>
                    <td><?php echo $row['status'] == 0 ?  'Chưa kích hoạt' :  'Đã kích hoạt' ?></td>
                    <td>
                        <?php echo $row['role'] === 'user' ? 'Người dùng' : 'admin' ?>

                    </td>
                    <td><a href="#"><i class="fas fa-edit"></i></a></td>
                    <td><a href="#"><i class="fas fa-trash-alt"></i></a></td>
                </tr>
            <?php
            }
            ?>



        </tbody>
    </table>


    <div class="modal fade" id="roleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="../logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>
</main>
<?php
include("views/layout/footer-admin.php")
?>