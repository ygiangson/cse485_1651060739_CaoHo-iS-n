<?php
require_once("views/layout/header-home.php");
?>

<main>
    <!-- phần body -->
    <div class="row container main">
        <div class="col-md-3 body-left ">
            <div class="row">
                <div class="col-md-12 search-box">
                    <div class="form-group w-100">
                        <div class="d-flex justify-content mt-2 header-search">
                            <label class="mx-auto font-weight-bold" for="my-input">Tìm kiếm</label>
                        </div>
                        <form class="form-inline active-purple-3 active-purple-4 my-2 body-search">

                            <input class="form-control form-control-sm ml-3 w-75" type="text" placeholder="Search" aria-label="Search">
                            <a class="mx-2" href="#"><i class="fas fa-search text-secondary" aria-hidden="true"></i></a>
                        </form>

                    </div>
                </div>
            </div>

            <div class="row hot-news mt-3 ">
                <div class="col-md-12 p-0">
                    <div class="d-flex justify-content mt-2 header-search">
                        <label class="mx-auto font-weight-bold" for="my-input">Tin nổi bật</label>
                    </div>
                    <ul class="mx-2 py-2">
                        <?php
                        while ($rowRand = mysqli_fetch_assoc($listHotNews)) {
                            $id = $rowRand['id'];
                            $title = $rowRand['title'];
                            echo "<li><a href='index.php?controller=news&action=detailNews&id=" . $id . "'><i class='fas fa-angle-right text-secondary my-2'></i> $title </a></li>";
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
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