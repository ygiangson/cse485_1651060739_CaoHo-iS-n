<?php
require_once 'views/layout/sider-bar.php'
?>
<main class="mx-auto w-50">
    <form action="index.php?controller=category&action=addCategory" method="post">
        <div class="form-group">
            <label for="">Nhập tiêu đề danh mục</label>
            <input required placeholder="Tên danh mục" type="text" class="form-control" name="nameCategory" id="" aria-describedby="helpId" placeholder="">
        </div>
        <input value="Thêm" name="btnAddCategory" id="" type="submit" class="btn btn-primary" >
        <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Đóng</button>
    </form>
</main>

<?php
require_once 'views/layout/footer-admin.php'
?>