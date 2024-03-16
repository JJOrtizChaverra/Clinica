<?php

session_destroy();

echo "<script>window.location = '".Template::path()."dashboard'</script>";