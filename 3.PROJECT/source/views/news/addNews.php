<?php
include("views/layout/sider-bar.php");

?>

<main class="mx-auto w-75">
    <div class="d-flex justify-content">
        <h4 class="font-weight-bold mx-auto text-dark">Thêm bài viết</h4>
    </div>
    <form action="index.php?controller=News&action=addNews" enctype="multipart/form-data" method="post">
        <div class="form-group">
            <label class="font-weight-bold" for="">Tiêu đề</label>
            <input type="text" class="form-control" name="txt-title" id="txt-title" aria-describedby="helpId" placeholder="">
        </div>

        <div class="form-group">
            <label class="font-weight-bold d-block" for="">Nội Dung</label>
            <textarea name="txt-content" id="body"></textarea>

        </div>
        <div class="form-group">
            <label class="font-weight-bold d-block" for="">Hình ảnh</label>
            <input accept="image/x-png,image/gif,image/jpeg" type="file" name="txt-img" id="" value="Chọn ảnh" class="text-input">

        </div>
        <div class="form-group">
            <label class="font-weight-bold d-block">Danh mục</label>
            <select class="form-control" name="s-category" id="">
                <?php
                    while($row = mysqli_fetch_assoc($listCategory)){
                ?>
                        <option value="<?php echo $row['id']?>"><?php echo $row['name']?></option>
                <?php
                    }
                ?>
            </select>
        </div>

        

        <div class="my-4">
            <label class="font-weight-bold d-block">Nổi bật</label>
            <div class="form-check form-check-inline">
                <label class="form-check-label">
                    <input class="form-check-input" type="radio" name="ck-hot" id="" value="1"> Có
                </label>
            </div>

            <div class="form-check form-check-inline">
                <label class="form-check-label">
                    <input class="form-check-input" type="radio" name="ck-hot" id="" checked value="0"> Không
                </label>
            </div>
        </div>

        <div class="my-4">
            <label class="font-weight-bold d-block">Chế độ</label>
            <div class="form-check form-check-inline">
                <label class="form-check-label">
                    <input class="form-check-input" type="radio" name="ck-public" id="" value="1"> Công khai
                </label>
            </div>

            <div class="form-check form-check-inline">
                <label class="form-check-label">
                    <input class="form-check-input" type="radio" name="ck-public" id="" checked value="0"> Riêng tư
                </label>
            </div>
        </div>
        <input type="submit" name="save-add" value="Luu" class="btn btn-primary">
        <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Đóng</button>
    </form>
</main>

<?php
include("views/layout/footer-admin.php")
?>