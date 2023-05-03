<?php

use App\models\Service;
use App\models\Specialist;

require_once $_SERVER["DOCUMENT_ROOT"] . "/app/admins/views/templates/header.php";
?>

<div class="services">
   
    
        <div class="div-flex">
           <h2>Услуги</h2>
        </div>
        <table class="table" border="3">
            <thead>
                <th>Услуга</th>
                <th>Описание</th>
                <th>Цена</th>
               
               
            </thead>
            <tbody>
                <?php foreach ($services as $us) : ?>
                    <tr>
                        <td><?= $us->name ?></td>
                        <td><?= $us->description ?></td>
                        <td><?= $us->price ?></td>
                        

                    </tr>

                <?php endforeach ?>
            </tbody>
        </table>

</div>
<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/app/admins/views/templates/footer.php";
?>