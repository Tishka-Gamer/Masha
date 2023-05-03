<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/views/templates/header.php";

?>

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
<script src="/assets/js/fetch.js"></script>

<script src="/assets/js/loadOrder.Service.js"></script>

<script src="/assets/js/calendar.js"></script>

<?php

require_once $_SERVER["DOCUMENT_ROOT"] . "/views/templates/footer.php";

?>