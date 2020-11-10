<?php
require_once("views/layout/header-home.php");

?>

<main class="container main">
    <?php
    if (isset($_SESSION['user'])) {
    ?>
        <div class="d-flex justify-content-end my-3">
            <a name="" id="" class="btn btn-primary" href="index.php?controller=forum&action=addTopic&idCate=<?php echo $idCate?>" role="button">Tạo chủ đề</a>
        </div>
    <?php
    }
    ?>
    <!-- phần body -->
    <?php
    if (mysqli_num_rows($listTopic) > 0) {
    ?>
        <table class="table">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Tên tiêu đề</th>
                    <th>Ngày tạo</th>
                    <th>Lượt xem</th>
                    <th>Bài viết</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($rowTopic = mysqli_fetch_assoc($listTopic)) {
                    $numberPost = mysqli_num_rows($post->getPostByTopic($rowTopic['id']));
                ?>
                    <tr>
                        <td scope="row"><?php echo $rowTopic['id'] ?></td>
                        <td><a href="#"><?php echo $rowTopic['name'] ?></a></td>
                        <td><?php echo $rowTopic['create_at'] ?></td>
                        <td><?php echo $rowTopic['view'] ?></td>
                        <td><?php echo $numberPost ?></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    <?php
    } else {
        echo " <p style='font-size:20px;' class='text-secondary font-italic'>Chưa có chủ đề</p>";
    }
    ?>

</main>
<?php
require_once("views/layout/footer-home.php");
?>