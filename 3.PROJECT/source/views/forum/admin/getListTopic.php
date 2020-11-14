<?php
include("views/layout/sider-bar.php");
require_once 'configs/config.php';
?>

<main class="mx-5">
    <div class="my-3">
        <a name="" id="" class="btn btn-primary d-inline" href="index.php?controller=news&action=addNews" role="button">Thêm bài viết</a>
    </div>
    <table class="table table-striped">
        <thead class="thead-dark">
            <tr>
                <th scope="col">STT</th>
                <th scope="col">Tiêu đề</th>
                <th scope="col">Trạng thái</th>
                <th scope="col">Ngày tạo</th>
                <th scope="col">Danh mục</th>
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
                    <td scope="row"><?php echo $row['title'] ?></td>
                    <td scope="row"><?php echo $row['published'] == PUBLISHED ? 'công khai' : 'riêng tư' ?></td>
                    <td scope="row"><?php echo $row['create_at'] ?></td>
                    <td scope="row"><?php echo $row['name'] ?></td>
                    <td>
                        <a href="index.php?controller=news&action=editNews&idNews=<?php echo $row['id'] ?>"><i class="fas fa-edit mx-3  "></i></a>

                    </td>
                    <td> <a  href="index.php?controller=news&action=deleteNews&idDelete=<?php echo $row['id'] ?>" ><i class="fas fa-trash-alt"></i></a> </td>


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