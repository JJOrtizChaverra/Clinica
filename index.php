<?php

require_once "controllers/template.controller.php";

require_once "controllers/helpers.controller.php";

require_once "controllers/consulting-rooms.controller.php";
require_once "models/consulting-rooms.model.php";

require_once "controllers/doctors.controller.php";
require_once "models/doctors.model.php";

require_once "controllers/patients.controller.php";
require_once "models/patients.model.php";

require_once "controllers/secretarys.controller.php";
require_once "models/secretarys.model.php";

require_once "controllers/horarys.controller.php";
require_once "models/horarys.model.php";

require_once "controllers/quotes.controller.php";
require_once "models/quotes.model.php";


$template = new TemplateController();
$template -> callTemplate();