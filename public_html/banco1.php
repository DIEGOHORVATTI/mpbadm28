<?php

# FileName="Connection_php_mysql.htm"

# Type="MYSQL"

# HTTP="true"

$hostname_banco1 = "localhost";

$database_banco1 = "mpbadm28_mpbadmjudicial";

$username_banco1 = "mpbadm28_mpb";

$password_banco1 = "mpb@#admjudicial";

$banco1 = new mysqli($hostname_banco1, $username_banco1, $password_banco1) or trigger_error(mysql_error(),E_USER_ERROR); 

?>