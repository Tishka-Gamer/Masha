<?php
session_start();
unset($_SESSION["loginAdmin"]);
unset($_SESSION["dateW"]);
unset($_SESSION["click"]);
unset($_SESSION["admin"]);
unset($_SESSION["idAdmin"]);
unset($_SESSION["privilege"]);

header("location: /");