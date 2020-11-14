<?php
include("views/layout/sider-bar.php");
require_once 'configs/config.php';
?>

<main class="mx-5">
    <table class="table table-striped">
        <thead class="thead-dark">
            <tr>
                <th scope="col">STT</th>
                <th scope="col">Tiêu đề</th>
                <th scope="col">Trạng thái</th>
                <th scope="col">Người tạo</th>
                <th scope="col">Ngày tạo</th>
                <th scope="col">Danh mục</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($rowTopic = mysqli_fetch_assoc($listTopic)) {
            ?>
                <tr>
                    <td scope="row"><?php echo $rowTopic['id'] ?></td>
                    <td><a href="#"><?php echo $rowTopic['name'] ?></a></td>
                    <td><?php echo $rowTopic['is_checked'] == 0 ? 'chưa hoạt động' : ' hoạt động' ?></td>
                    <td><?php echo $rowTopic['username'] ?></td>
                    <td><?php echo $rowTopic['create_at'] ?></td>
                    <td><?php echo $rowTopic['content'] ?></td>
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