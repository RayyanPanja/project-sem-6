<?php
require "../../Classes/All.class.php";
require "../../include/include.php";

if (MiddleWare::TryAccess($_REQUEST['password'])) {
    $URL = new URL;
    justChangePath($URL->getView("Balance", "Balance"));
} else {
    alert("Password Incorrect",$URL->getMiddleWare("Security"));
}
