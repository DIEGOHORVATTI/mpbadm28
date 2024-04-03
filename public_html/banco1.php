<?php

# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"

$hostname_banco1 = "localhost";
$database_banco1 = "mpbadm28_mpbadmjudicial";
$username_banco1 = "mpbadm28_mpb";
$password_banco1 = "mpb@#admjudicial";

// Criando a conexão com o banco de dados usando mysqli
$banco1 = new mysqli($hostname_banco1, $username_banco1, $password_banco1, $database_banco1);

// Verificando a conexão
if ($banco1->connect_error) {
    die("Falha na conexão: " . $banco1->connect_error);
}

// Definindo o conjunto de caracteres para utf8 para evitar problemas de acentuação
$banco1->set_charset("utf8");