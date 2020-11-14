<?php
include("views/layout/sider-bar.php")
?>

<main class="mx-auto w-75">
    <h4>Sửa người dùng</h4>

    <form action="index.php?controller=user&action=editUser&idUser=<?php echo $idUser?>" method="post">
        <div class="form-group">
            <label for="">Tên tài khoản</label>
            <input required type="text" value="<?php echo $rowUser['username'] ?>" class="form-control" name="txt-username" id="" aria-describedby="helpId" placeholder="">

        </div>

        <div class="form-group">
            <label for="">Email</label>
            <input required type="text" class="form-control" value="<?php echo $rowUser['email'] ?>" name="txt-email" id="" aria-describedby="helpId" placeholder="">

        </div>

        <div class="form-group">
            <label for="">Phân quyền</label>
            <select class="form-control" name="slt-role" id="">
                <option <?php echo $rowUser['role'] == 'user' ? 'selected' : '' ?> value="user">người dùng</option>
                <option <?php echo $rowUser['role'] == 'admin' ? 'selected' : '' ?> value="admin">quản trị viên</option>
            </select>
        </div>

        <div class="form-group">
            <label for="">Trạng thái</label>
            <select class="form-control" name="slt-status" id="">
                <option <?php echo $rowUser['status'] == '1' ? 'selected' : '' ?> value="1">Kích hoạt</option>
                <option <?php echo $rowUser['status'] == '0' ? 'selected' : '' ?> value="0">Chưa kích hoạt</option>
            </select>
        </div>

        <input class="btn btn-primary" type="submit" value="Lưu" name="btn-save-user" id="">
        <a name="" id="" class="btn btn-secondary" href="#" role="button">Đóng</a>
    </form>
</main>
<?php
include("views/layout/footer-admin.php")
?>