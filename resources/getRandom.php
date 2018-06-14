<?php

require_once "../resources/init.php";

$quote = new Quote();
echo json_encode($quote->fetch());
