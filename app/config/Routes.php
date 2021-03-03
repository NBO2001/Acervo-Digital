<?php
$this->route('/login','ControllerHome@screenLogin');
$this->route('/homescreen','ControllerScreenIni@sreenLogin','POST');
$this->route('/home','ControllerHome@screenIni','GET');