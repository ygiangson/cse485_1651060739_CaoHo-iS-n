<?php
require_once("views/layout/header-home.php");

?>

<main class="container main">
    <div class="d-flex justify-content-center my-3">
        <h4>Tạo chủ đề</h4>
    </div>
    <form action="index.php?controller=forum&action=addTopic&idCate=<?php echo $idCate?>" method="post">
        <div class="form-group">
        <label class="font-weight-bold d-block" for="">Nhập tiêu đề</label>
            <input required type="text" class="form-control input-lg" name="txt-title" id="" aria-describedby="helpId" placeholder="Nhập tiêu đề">
        </div>

        <div class="form-group">
            <label class="font-weight-bold d-block" for="">Nội Dung</label>
            <textarea name="txt-content" id="body"></textarea>

        </div>
        <input required name="btn-add-topic" value="Lưu" class="btn btn-primary w-100" type="submit">
    </form>

</main>
<?php
require_once("views/layout/footer-home.php");
?>