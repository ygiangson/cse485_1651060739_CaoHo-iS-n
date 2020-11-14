<?php
include("views/layout/sider-bar.php")
?>

<main class="mx-auto w-75">
    <h4 class="text-dark d-flex justify-content-center">Danh sách Quản Trị Viên</h4>
    <a name="" id="" class="btn btn-primary my-3" href="index.php?controller=user&action=addAdmin" role="button">Thêm quản trị viên</a>
    <table class="table table-striped">
        <thead class="thead-dark">
            <tr>
                <th scope="col">id</th>
                <th scope="col">Tài khoản</th>
                <th scope="col">email</th>
                <th scope="col">Trạng kích hoạt</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (mysqli_num_rows($result) == 0) {
                echo "<td> Khong dieu</td>";
            } else
                while ($row = mysqli_fetch_assoc($result)) {
            ?>
                <tr>
                    <th scope="row"><?php echo $row['id'] ?></th>
                    <td><?php echo $row['username'] ?></td>
                    <td><?php echo $row['email'] ?></td>
                    <td><?php echo $row['status'] == 0 ?  'Chưa kích hoạt' :  'Đã kích hoạt' ?></td>
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