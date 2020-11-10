<?php
require_once("views/layout/header-home.php");
?>

<main>
    <!-- phần body -->
    <div class="row container main">
        <h4 style="margin-top: 5px !important;" class="m-3">Diễn đàn CSE</h4>
        <?php
        while ($rowForumCategoty = mysqli_fetch_assoc($listCategoryForum)) {
            $subCategory = $forumSubCategory->getSubCategory($rowForumCategoty['id']);
        ?>
            <div class="col-md-12">
                <div class="big-category pl-3">
                    <h5><?php echo $rowForumCategoty['name'] ?></h5>
                </div>
                <ul>
                    <?php
                    while ($rowSub = mysqli_fetch_assoc($subCategory)) {
                        $topicByCategory = $topic->getTopicByCategory($rowSub['id']);
                        
                        $numberTopic = mysqli_num_rows($topicByCategory);
                        $numberPost = 0;
                        while ($rowTopic = mysqli_fetch_assoc($topicByCategory)) {
                            $postByTopic = $post -> getPostByTopic($rowTopic['id']);
                            $numberPost += mysqli_num_rows($postByTopic);
                        }

                    ?>
                        <li class="p-3 row">
                            <div class="col-md-1">
                                <i style="font-size: 40px; color:#1B6DA8" class="fas fa-comments"></i>
                            </div>
                            <div class="col-md-11">
                                <a class="d-inline font-weight-bold" href="index.php?controller=forum&action=listTopic&idCate=<?php echo $rowSub['id']?>"><?php echo $rowSub['content'] ?></a>
                                <br>
                                <label class="d-inline"><span class="text-secondary">Chủ đề: </span> <?php echo $numberTopic ?></label>
                                <label class="d-inline"><span class="text-secondary">Bài viết: </span> <?php echo $numberPost; ?></label>
                            </div>
                            <div class="col-md-12">
                                <hr>
                            </div>
                        </li>
                    <?php
                    }
                    ?>
                </ul>
            </div>
        <?php
        }
        ?>

    </div>

</main>
<?php
require_once("views/layout/footer-home.php");
?>