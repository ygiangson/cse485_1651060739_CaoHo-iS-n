<?php
require_once("views/layout/header-home.php");
?>

<main>
    <!-- phần body -->
    <div class="row container main">
        <?php require_once 'views/layout/home-left.php' ?>
        <div class="col-md-9 body-main">
            <div class="common-news">
                <div class="d-flex justify-content mt-2 header-search">
                    <label class="font-weight-bold px-3" for="my-input">Thông báo chung</label>
                </div>
                <ul class="mx-2 py-2 pl-3">
                    <?php
                    while ($rowRand = mysqli_fetch_assoc($listNewsRand)) {
                        $id = $rowRand['id'];
                        $title = $rowRand['title'];
                        echo "<li><a href='index.php?controller=news&action=detailNews&id=" . $id . "'><i class='fas fa-angle-right text-secondary my-2'></i> $title </a></li>";
                    }
                    ?>

                </ul>
            </div>
            <div class="new-news mt-2">
                <div class="d-flex justify-content mt-2 header-search">
                    <label class="font-weight-bold px-3" for="my-input">Thông báo mới nhất</label>
                </div>
                <ul class="mx-2 py-2 pl-3">
                    <?php
                    while ($rowRand = mysqli_fetch_assoc($listLatestNews)) {
                        $id = $rowRand['id'];
                        $title = $rowRand['title'];
                        echo "<li><a href='index.php?controller=news&action=detailNews&id=" . $id . "'><i class='fas fa-angle-right text-secondary my-2'></i> $title </a></li>";
                    }
                    ?>


                </ul>
            </div>
        </div>
    </div>

</main>
<?php
require_once("views/layout/footer-home.php");
?>