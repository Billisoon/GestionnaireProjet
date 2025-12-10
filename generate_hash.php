<?php
$hash = password_hash("monmotdepasse", PASSWORD_BCRYPT);
echo $hash;