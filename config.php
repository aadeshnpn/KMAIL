<?php
define('SQL_HOST',"localhost");
define('SQL_UNAME',"test");
define('SQL_PASSWD',"");
define('DB_NAME',"kmail");
define('MAIL_TABLE',"mail");
define('USER_TABLE',"users");
define('NEW',"new_mail");


$con=mysql_connect(SQL_HOST,SQL_UNAME,SQL_PASSWD) or die(mysql_error());
mysql_select_db(DB_NAME,$con) or die(mysql_error());
echo "done";
?>
