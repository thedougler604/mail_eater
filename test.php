<?php

$message = isset($argv[1]) ? $argv[1] : 'test message';
mail('doug@sitesol.ca', 'test', $message);


?>
