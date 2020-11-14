<?php
include("views/layout/sider-bar.php")
?>

<main class="mx-auto w-75">
    <h4>Thêm quản trị viên</h4>
    <form action="index.php?controller=user&action=addAdmin" method="post">
        <div class="form-group">
            <label for="">Tên tài khoản</label>
            <input required type="text" class="form-control" name="txt-username" id="" aria-describedby="helpId" placeholder="">

        </div>

        <div class="form-group">
            <label for="">Mật khẩu</label>
            <input required type="password" class="form-control" name="txt-password" id="" aria-describedby="helpId" placeholder="">

        </div>

        <div class="form-group">
            <label for="">Nhập lại mật khẩu</label>
            <input required type="password" class="form-control" name="txt-confirm" id="" aria-describedby="helpId" placeholder="">

        </div>

        <div class="form-group">
            <label for="">Email</label>
            <input required type="text" class="form-control" name="txt-email" id="" aria-describedby="helpId" placeholder="">

        </div>


        <input class="btn btn-primary" type="submit" value="Thêm người dùng" name="btn-add-user" id="">
        <a name="" id="" class="btn btn-secondary" href="#" role="button">Đóng</a>
    </form>
</main>
<?php
include("views/layout/footer-admin.php")
?>