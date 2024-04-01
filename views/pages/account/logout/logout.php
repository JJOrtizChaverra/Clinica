<?php

session_destroy();

echo "<script>window.location = '".TemplateController::path()."dashboard'</script>";