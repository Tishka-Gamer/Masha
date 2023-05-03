<?php
session_start();

require_once $_SERVER["DOCUMENT_ROOT"]."/app/config/db.php";

require_once $_SERVER["DOCUMENT_ROOT"]."/app/helpers/Connection.php";

require_once $_SERVER["DOCUMENT_ROOT"]."/app/models/Service.php";

require_once $_SERVER["DOCUMENT_ROOT"]."/app/models/ServicesType.php";

require_once $_SERVER["DOCUMENT_ROOT"]."/app/models/User.php";

require_once $_SERVER["DOCUMENT_ROOT"]."/app/models/Pet.php";

require_once $_SERVER["DOCUMENT_ROOT"]."/app/models/Specie.php";

require_once $_SERVER["DOCUMENT_ROOT"]."/app/models/Specialist.php";

require_once $_SERVER["DOCUMENT_ROOT"]."/app/models/Order.php";

require_once $_SERVER["DOCUMENT_ROOT"]."/app/models/Admin.php";

require_once $_SERVER["DOCUMENT_ROOT"]."/app/models/Recommendation.php";

