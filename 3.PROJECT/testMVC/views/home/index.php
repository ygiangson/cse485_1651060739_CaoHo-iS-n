<?php
require_once("views/layout/header-home.php");
?>

<main>
    <!-- phần body -->
    <div class="row container main">
        <div class="col-md-3 body-left">
            <div class="row">
                <div class="col-md-12 search-box">
                    <div class="form-group">
                        <label for="my-input">Text</label>
                        <input id="my-input" class="form-control" type="text" name="" />
                    </div>
                </div>
            </div>

            <div class="row hot-news">
                <div class="col-md-12">hot news</div>
            </div>
        </div>
        <div class="col-md-9 body-main"></div>
    </div>

</main>
<?php
require_once("views/layout/footer-home.php");
?>