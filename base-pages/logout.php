<?php
session_start();
session_destroy();
header('Location: ../base-pages/index.php');