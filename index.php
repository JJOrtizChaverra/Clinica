<?php

require_once "controllers/template.controller.php";

require_once "controllers/users.controller.php";
require_once "models/users.model.php";

require_once "controllers/consulting-rooms.controller.php";
require_once "models/consulting-rooms.model.php";

$template = new Template();
$template -> callTemplate();