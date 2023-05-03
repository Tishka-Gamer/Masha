<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/views/templates/header.php";
?>
<div class="div-header-light div-center">
    <h1>Наши специалисты</h1>
</div>
<div class="container">
    <div class="specialists">
        <?php foreach ($specs as $s) : ?>
            <div class="spec-card div-header-light-spec ">
                <div class="spec-card-img div-center">
                    <img class="spec-image" src="/uploads/specialists/<?= $s->image ?>" alt="">
                </div>

                <div class="spec-card-info ">
                    <h3><?= $s->fio ?></h3>
                    
                </div>
                <div class="div-center btn-spec">
                <form class="form1" action="/app/tables/specialists/specialist.php" method="post">
                        <button class="btn" name="btn-spec-show" value="<?= $s->id ?>">Подробнее</button>
                </form>
            </div>
            <br>
            </div> 

        <?php endforeach ?>
    </div>
</div>
<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/views/templates/footer.php";
?>