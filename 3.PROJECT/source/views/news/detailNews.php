<?php
require_once("views/layout/header-home.php");
?>

<main>
    <!-- phần body -->
    <div class="row container main">
        <?php require_once 'views/layout/home-left.php'?>
        <div class="col-md-9 body-main p-3">
            <h4><?php echo $detailNews['title'] ?></h4>
            <div class="row mx-3 my-4">
                <div class="col-md-10"><?php echo $detailNews['create_at'] ?></div>
                <div class="col-md-2"><i class="fas fa-eye"></i> <?php echo $view ?></div>
            </div>
            <div class="row">
                <div class="col-md-12 content mx-3">
                    <?php echo $detailNews['content'] ?>
                </div>
            </div>

            <div style="border-top: 1px solid #cccccc;" class="suggest-news pt-3">
                <h4>Các tin khác</h4>
                <ul style="list-style-type: square;" class="pl-5">
                    <?php
                    while ($rowSuggest = mysqli_fetch_assoc($listSuggestNews)) {
                        $title = $rowSuggest['title'];
                        $id = $rowSuggest['id'];
                        echo " <li><a href='index.php?controller=news&action=detailNews&id=$id'>$title</a></li>";
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