<?php

use App\Classes\Messages;
use App\Classes\TwigLoader;
TwigLoader::load("dashboard.twig");
Messages::clearMessages();
die();