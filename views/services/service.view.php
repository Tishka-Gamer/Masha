<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/views/templates/header.php";

?>

<div class="div-center">
    <div class="service_type">

        <div class="services_type-info">
            <div class="services_type-info-name-price"> 
                <h2><?= $service->name ?></h2>
                <h4><?= $service->price ?>₽</h4>
            </div>
           <br>
            <h4><?= $service->description ?></h4>
            <!-- <h4><?= $service->price ?>₽</h4> -->
        </div>
    </div>
</div>
<br>
<div class="div-header-light div-center">
        <h1>Специалисты, предоставляющие услугу</h1>
    </div>
<br>
<div class="div-center spec-by-service">
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
        <!-- <div class="spec-card">
            <div class="spec">
                <img class="img-spec" src="/uploads/specialists/<?= $s->image ?>" alt="">
            </div>
            <div class="spec-info">
                <h5><?= $s->fio ?></h5>
            </div>
            <p>
            <form action="/app/tables/specialists/specialist.php" method="post">
                <button class="btn" name="btn-spec-show" value="<?= $s->id ?>">Подробнее</button>
            </form>
            </p>
        </div> -->
    <?php endforeach ?>
</div>

<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/views/templates/footer.php";
?>