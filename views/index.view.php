<?php

session_start();

require_once $_SERVER["DOCUMENT_ROOT"] . "/views/templates/header.php";
// var_dump($_SESSION);
?>
<div class="main">
   
    <div class="parallax">
        <div class="">
            <div class="main-header color-light">
                <h1>Ветеринарная клиника КЕА</h1>
                <h3>Мы в ответе за тех, кого приручили</h3>
                <div class="div-center">
                <form action="/app/tables/orders/order.php" method="post">
                    <button name="btn-order" class="btn_order">
                        <img src="/uploads/decorate/лапа.png" class="lapa" alt="запись">
                        Запись
                    </button>
                </form>
                </div>
            </div>
        </div>
    </div>
    <div class="advantages">
        <div class="advant-item">
            <img class="advant-item-img" src="/uploads/decorate/врач с котом.jpg" alt="">
            <div class="advant-item-text">
                <h5> Мы всегда лечим ваших животных как своих</h5>

            </div>
        </div>
        <div class="advant-item">
            <img class="advant-item-img" src="/uploads/decorate/лабаратория.jpg" alt="">
            <div class="advant-item-text">
                <h5> Наша лабаратория работает круглосуточно</h5>
            </div>
        </div>
        <div class="advant-item">
            <img class="advant-item-img" src="/uploads/decorate/оборудование.jpg" alt="">
            <div class="advant-item-text">
                <h5> У нас только лучшее оборудование!</h5>
            </div>
        </div>

    </div>
    <div class="div-header-light div-center">
        <h1>Наши популярные услуги</h1>
    </div>
    <br>
    <div class="div-center">

        <div class="main-top-services">
            <div class="main-top-services-item main-top-services-img">
                <img class="main-top-service-img" src="/uploads/decorate/кот_и_врач.jpg" alt="">
            </div>
            <div class="main-top-services-item main-top-services-info">

                <?php foreach ($services5 as $s) : ?>
                    <?php $a = "/app/tables/services/service.php?id=" . $s->service_id ?>
                    <a style="text-decoration: none; color:#132e13" href=<?= $a ?>>
                        <h5 class="main-top-services-info-item">
                            <?= $s->name ?>
                        </h5>
                    </a>
                <?php endforeach ?>
            </div>
        </div>

    </div>
    <br>
<?php if(isset($_SESSION["auth"])): ?>
    <div class="div-header-light div-center">
        <h1> Записаться</h1>
    </div>
    <br>
    <div class=" div-center">

    <div class="order width100">
        <form action="/app/tables/orders/insert.php" method="post">
           
            <div class="div-center div-order">
                <div class="calendar-wrapper">
                    <button class="btn-calendar" id="btnPrev" type="button">Предыдущий</button>
                    <button class="btn-calendar" id="btnNext" type="button">Следующий</button>
                    <div id="divCal"></div>
                </div>
                <div class="div-order-info">
                    <div class="div-center">
                        <div></div>
                        <div class="order-pet ">
                            <div class="pet-order-div-img">

                            </div>
                        </div>
                    </div>
                    <div class="order-info">

                        <div class="form-group-order">
                            <label for="pet" class="form-label-order">Питомец</label>
                            <select class="form-control form-control-order" name="pet" id="pet">
                                <?php foreach ($pets as $s) : ?>
                                    <option value="<?= $s->pet_id ?>"><?= $s->pet_name ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="form-group-order">
                            <label for="service" class="form-label-order">Услуга</label>
                            <select class="form-control  form-control-order" name="service" id="service">
                                <?php foreach ($services as $s) : ?>
                                    <option value="<?= $s->service_id ?>"><?= $s->name ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>

                        <div class="form-group-order">
                            <label for="spec" class="form-label-order">Сециалист</label>
                            <select class="form-control  form-control-order" name="spec" id="spec">
                                <?php foreach ($specs as $s) : ?>
                                    <option value="<?= $s->id ?>"><?= $s->fio ?></option>
                                <?php endforeach ?>
                            </select>

                        </div>
                        <div class="form-group-order">
                            <label for="service" class="form-label-order">Время</label>
                            <select class="form-control  form-control-order" name="time" id="time">

                            </select>
                        </div>
                    </div>



                </div>
            </div>
            <br>
            <div class="div-center"><button class="btn_order" name="addOrder">Записаться</button></div>
        </form>

    </div>
</div>

<?php endif ?>
    <br>
    <div class="div-header-light div-center">
        <h1> Где мы находимся</h1>
    </div>
    <br>

    <div class="map">
        <div class="div-center">
            <iframe class="map-yandex" src="https://yandex.ru/map-widget/v1/?um=constructor%3Ab4ba274e7744e14988de1557a127d1fae893c00a8b6b682e5d89bea8be323f6e&amp;source=constructor" frameborder="0"></iframe>
        </div>

    </div>
    <br>
</div>
<script src="/assets/js/fetch.js"></script>

<script src="/assets/js/loadOrder.Service.js"></script>

<script src="/assets/js/calendar.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="/path/to/parallax.js"></script>
<?php require_once $_SERVER["DOCUMENT_ROOT"] . "/views/templates/footer.php"; ?>