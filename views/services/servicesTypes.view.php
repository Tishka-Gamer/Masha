<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/views/templates/header.php";

use App\models\Service;
?>
<div class="div-center div-header-light">
    <h1>Наши услуги</h1>
    <br>
</div>

<div class="services_types div-center">
    <div class="accordion" id="accordionPanelsStayOpenExample">
        <?php foreach ($services_types as $serv) : ?>
            <?php $services = Service::getServicesByType($serv->id); ?>

            <br>
            <div class="accordion-item">
                <div class="services_type">
                    <div class="services_type-img">
                        <img class="type-img" src="/uploads/bd/<?= $serv->image ?>" alt="">
                    </div>
                    <div class="services_type-info">
                        <h2><?= $serv->name ?></h2>
                        <h4><?= $serv->description ?></h4>
                    </div>
                </div>

                <h2 class="accordion-header" id="panelsStayOpen-heading<?= $serv->id ?>">

                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapse<?= $serv->id ?>" aria-expanded="false" aria-controls="panelsStayOpen-collapse<?= $serv->id ?>" value="<?= $serv->id ?>">

                    </button>

                </h2>

                <div id="panelsStayOpen-collapse<?= $serv->id ?>" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-heading<?= $serv->id ?>">

                    <div class="accordion-body">
                        <?php foreach ($services as $service) : ?>
                            <div class="service-card ">
                                <h3>
                                    <?= $service->name ?>
                                </h3>

                                <form action="/app/tables/services/service.php" method="post">
                                    <button class="btn" name="btn-service-show" value="<?= $service->service_id ?>">
                                        Подробнее
                                    </button>
                                </form>
                              

                            </div>
                        <?php endforeach ?>
                    </div>

                </div>

            </div>



        <?php endforeach ?>
    </div>
</div>
<script src="/assets/js/fetch.js"></script>
<script src="/assets/js/loadServices.js"></script>
<?php

require_once $_SERVER["DOCUMENT_ROOT"] . "/views/templates/footer.php";
?>