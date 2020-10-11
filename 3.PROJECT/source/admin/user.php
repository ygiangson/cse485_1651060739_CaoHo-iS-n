<?php
include("sider-bar.php")
?>
<main>
    <table class="table table-striped mx-auto w-75">
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
            // b1 : ket noi csdl
            require("../include/config.php");
            //b2 : truy van csdl
            $sql = "SELECT * FROM users";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
            ?>
                <tr>
                    <th scope="row"><?php echo $row['id']?></th>
                    <td><?php echo $row['username']?></td>
                    <td><?php echo $row['email']?></td>
                    <td><?php echo $row['status'] == 0 ?  'Chưa kích hoạt' :  'Đã kích hoạt' ?></td>
                    <td>
                        <div class="dropdown">
                            <a class="dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?php echo $row['role'] === 'user' ?'Người dùng' :'admin'?>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="#">Người dùng</a>
                                <a class="dropdown-item" href="#">Admin</a>
                            </div>
                        </div>

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
include("footer-admin.php")
?>