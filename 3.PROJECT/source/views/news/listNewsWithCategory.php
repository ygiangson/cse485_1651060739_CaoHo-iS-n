<?php
require_once("views/layout/header-home.php");
?>

<main style="min-height: 300px;">
    <!-- phần body -->
    <div class="row container main ">

        <div class="col-md-12">
            <h5 class="mb-3">Tin tức > <span><?php echo $cateSelected['name'] ?></span></h5>
            <ul>
                <?php
                while ($rowNews = mysqli_fetch_assoc($getPagination)) {

                ?>
                    <li class="pb-4 mt-3" style="border-bottom: 1px dashed #cccccc;">
                        <div class="row">
                            <div class="col-md-3">
                                <a href="index.php?controller=news&action=detailNews&id=<?php echo $rowNews['id'] ?>">
                                    <img style="width: 100%;" src="assets/img/<?php echo $rowNews['image'] ?>" alt="">
                                </a>
                            </div>
                            <div class="col-md-9">
                                <a href="index.php?controller=news&action=detailNews&id=<?php echo $rowNews['id'] ?>">
                                    <h5><?php echo $rowNews['title'] ?></h5>
                                </a>
                                <p style="font-size: 20px;"><?php echo substr($rowNews['content'], 0, 170) . '...' ?></p>
                                <a style="font-style: italic;font-size: 20px;" class="d-flex justify-content-end w-100 my-4" href="index.php?controller=news&action=detailNews&id=<?php echo $rowNews['id'] ?>"> <i style="font-size: 15px;" class="fas fa-chevron-right pt-2 mr-2"></i> Xem chi tiết</a>
                            </div>
                        </div>
                    </li>

                <?php
                }
                ?>
            </ul>
            <div class="w-100 d-flex justify-content-end my-3">
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <!-- <li class="page-item"><a class="page-link" href="#">Previous</a></li> -->
                        <?php
                        $numberLoop = ceil($totalNews / $pageNumber);
                        if ($numberLoop > 1)
                            for ($i = 1; $i <= $numberLoop; $i++) {
                        ?>
                            <li  class="page-item <?php echo $i==$page ? 'active' :''?>"><a class="page-link" href="index.php?controller=news&action=listNewsWithCategory&idCate=<?php echo $idCate ?>&page=<?php echo $i ?>"><?php echo $i ?></a></li>
                        <?php
                            }
                        ?>

                    </ul>
                </nav>
            </div>

        </div>

    </div>

</main>
<?php
require_once("views/layout/footer-home.php");
?>