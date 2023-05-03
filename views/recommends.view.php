<?php require_once $_SERVER["DOCUMENT_ROOT"] . "/views/templates/header.php"; ?>
<br>
<div class="div-header-light div-center">
        <h1>Советы по уходу</h1>
    </div>
    <br>
<div class="recommend">
    <?php foreach ($recommends as $r) : ?>
        <div class="recommend-card">
            <div class="recommend-div-img">
                <img class="recommend-img" src="/uploads/care_tipes/<?= $r->image ?>" alt="">
            </div>
            <div class="recommend-div-info">
                <h3><?= $r->name ?></h3>
                <h5><?= $r->text ?></h5>
            </div>
        </div>
    <?php endforeach ?>
</div>



<?php require_once $_SERVER["DOCUMENT_ROOT"] . "/views/templates/footer.php"; ?>