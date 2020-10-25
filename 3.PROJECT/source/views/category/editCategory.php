<?php
require_once 'views/layout/sider-bar.php'
?>
<main class="mx-auto w-50">
    <form action="index.php?controller=category&action=editCategory&id=<?php echo $id?>" method="post">
        <div class="form-group">
            <label for="">Nhập tiêu đề danh mục</label>
            <input required placeholder="Tên danh mục" value="<?php echo $row['name']?>" type="text" class="form-control" name="nameCategory" id="" aria-describedby="helpId" placeholder="">
        </div>
        <input value="Lưu" name="btnEditCategory" id="" type="submit" class="btn btn-primary" >
        <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Đóng</button>
    </form>
</main>

<?php
require_once 'views/layout/footer-admin.php'
?>