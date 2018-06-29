<?php

require_once '../resources/init.php';

Session::isLoggedIn();
Session::destroy(['start', 'end', 'id']);
Redirect::to('You are now logged out :)', 'home');
