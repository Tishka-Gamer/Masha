<?php
session_start();
if (!isset($_SESSION["auth"]) || !$_SESSION["auth"]) {
    header("location: /");
    die();
}

require_once $_SERVER["DOCUMENT_ROOT"] . "/views/templates/header.php";

// var_dump($_SESSION);
function ageWord($ageUs)
{
    $age = "лет";
    if (!($ageUs >= 5 && $ageUs <= 20)) {
        if ($ageUs == 1) {
            $age = "год";
        }
        if ($ageUs > 1 && $ageUs < 5) {
            $age = "года";
        }
        if ($ageUs % 10 == 1) {
            $age = "год";
        }
        if ($ageUs % 10 > 1 && $ageUs % 10 < 5) {
            $age = "года";
        }
    }

    return $age;
}

?>
<!-- <div class="container "> -->
<div class="profile div-green-light">
    <div class="item-profile avatar">
        <img class="avatar-img" src="/uploads/users/<?= $user->image ?>" alt="">
    </div>
    <div class="item-profile profile-info">
        <div class="div-user-name-redacte">
            <h1 class="item-info-profile text-light"><?= $user->fio ?> </h1>

            <form action="/app/tables/users/redacte.php" method="post">
                <button name="redacte-user" value="<?= $user->id ?>" class="btn-icon">
                    <svg class="item-info-profile text-light" xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                    </svg>
                </button>
            </form>

        </div>

        <h3 class="item-info-profile text-light"><?= $user->age ?> <?= ageWord($user->age) ?></h3>
        <h3 class="item-info-profile text-dark">Login: <?= $user->login ?></h3>
        <h3 class="item-info-profile text-dark">Почта: <?= $user->email ?></h3>
    </div>
</div>
<!-- </div> -->


<div class="div-center div-header-light">
    <h1>Питомцы</h1><br>

</div>
<div class="div-center"><a href="/app/tables/pets/create.php" class="btn-add-pet">Добавить питомца</a></div>

<div class="container">
    <div class="pets">
        <?php foreach ($pets as $pet) : ?>
            <div class="card-pet div-green-light">
                <div class="pet item-pet">
                    <img class="pet-image" src="/uploads/users/<?= $pet->pet_image ?>" alt="">
                </div>
                <div class="item-pet pets-info">
                    <div class="div-flex-between">
                        <h2 class="item-info-pet shift-bottom"><?= $pet->pet_name ?></h2>
                        <h2>
                            <form action="/app/tables/pets/redacte.php" method="post">
                                <button name="redacte-pet" value="<?= $pet->pet_id ?>" class="btn-icon">
                                    <svg class="item-info-profile " xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                    </svg>
                                </button>
                            </form>
                        </h2>
                    </div>

                    <h5 class="item-info-pet"><?= $pet->pet_age ?> <?= ageWord($pet->pet_age) ?></h5>
                    <h5 class="item-info-pet"><?= $pet->breed ?></h5>


                </div>
            </div>
        <?php endforeach ?>

    </div>
</div>
<!-- <div class="div-center">
    <div class="users-orders">
        <div class="">
           <div class="header-orders"> <h2 >Запланировано</h2></div>
            <div class="last-orders">
                <?php foreach ($futureOrders as $f) : ?>
                    <div class="order-user">
                    <p><strong><?= $f->service ?></strong></p>
                    <p><?= $f->date ?> <?= $f->time ?></p>
                    <p>Для <?= $f->pet ?></p>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
        <div class="">
        <div class="header-orders"><h2 class="header-orders">Пройдено</h2></div>
            <div class="future-orders">
                <?php foreach ($lastOrders as $f) : ?>
                    <p><strong><?= $f->service ?></strong></p>
                    <p><?= $f->date ?> <?= $f->time ?></p>
                    <p>Для <?= $f->pet ?></p>
                <?php endforeach ?>

            </div>
        </div>
    </div>
</div> -->
<div class="div-center">
    <div class="users-orders">
        <div class="div-table-orders future-orders">
            <table class="table-orders " border="3">
                <thead>
                    <tr>
                        <th>
                            <h5>Запланировано</h5< /th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($futureOrders as $f) : ?>
                        <tr>
                            <td>
                                <p><strong><?= $f->service ?></strong></p>
                                <p><?= $f->date ?> <?= $f->time ?></p>
                                <p>Для <?= $f->pet ?></p>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
        <div class="div-table-orders last-orders">
            <table class="table-orders" border="3">
                <thead>
                    <tr>
                        <th>
                            <h5>Пройдено</h5>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($lastOrders as $f) : ?>
                        <tr>
                            <td>
                                <p><strong><?= $f->service ?></strong></p>
                                <p><?= $f->date ?> <?= $f->time ?></p>
                                <p>Для <?= $f->pet ?></p>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php require_once $_SERVER["DOCUMENT_ROOT"] . "/views/templates/footer.php";
unset($_SESSION["message"]);

?>