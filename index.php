<?php

require_once "controllers/template.controller.php";

require_once "controllers/controller.php";
require_once "controllers/model.php";
require_once "controllers/router.php";

$plantilla = new TemplateController();
$plantilla -> callTemplate();