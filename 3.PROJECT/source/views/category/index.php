<?php
include("views/layout/sider-bar.php");
require_once 'configs/config.php';
?>

<main class="mx-auto w-75 ">
    <div class="my-3">
        <a name="" id="" class="btn btn-primary d-inline" href="index.php?controller=category&action=addCategory" role="button">Thêm danh mục</a>
    </div>
    <table class="table table-striped">
        <thead class="thead-dark">
            <tr>
                <th scope="col">STT</th>
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
                    <td><?php echo $row['name'] ?></td>
                    <td><a href="index.php?controller=category&action=editCategory&id=<?php echo $row['id']?>"><i class="fas fa-edit"></i></a></td>
                    <td><a href="#"><i class="fas fa-trash-alt"></i></a></td>
                </tr>
            <?php
            }
            ?>



        </tbody>
    </table>
</main>
<?php
include("views/layout/footer-admin.php")
?>