<?php
//The Client
error_reporting(E_ALL);

$address = "127.0.0.1";
$port = 4444;
$helo="HELO";
$from="MAIL FROM:aadesh@ku.edu.np";
$to="RCPT TO:rajesh@ku.edu.np";
$subject="Subject:from php";
//$sub="from php";
$msg="if this works then php rocks";
$data="DATA "+$subject+$msg;
$dot=".";
$quit="QUIT";

/* Create a TCP/IP socket. */
$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
if ($socket === false) {
    echo "socket_create() failed: reason: " . socket_strerror(socket_last_error()) . "\n";
} else {
    echo "socket successfully created.\n";
}

echo "Attempting to connect to '$address' on port '$port'...";
$result = socket_connect($socket, $address, $port);
if ($result === false) {
    echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
} else {
    echo "successfully connected to $address.\n";

    echo "Sending $helo to server.\n";
    socket_write($socket, $helo, strlen($helo));
    
    $input1 = socket_read($socket, 2048);
    echo "Response from server is: $input1\n";
    //sleep(2);

	echo "Sending $from to server.\n";
    socket_write($socket, $from, strlen($from));
   
    $input2 = socket_read($socket, 2048);
    echo "Response from server is: $input2\n";
    //sleep(2);
	 if($input==250)
	{
	echo "Sending $to to server.\n";
    socket_write($socket, $to, strlen($to));
    
    $input3 = socket_read($socket, 2048);
    echo "Response from server is: $input3\n";
    //sleep(2);
	}
	if($input3==250){
	echo "Sending $data to server.\n";
    socket_write($socket, $data, strlen($data));
    
	$input4 = socket_read($socket, 2048);
    echo "Response from server is: $input4\n";
    //sleep(2);
	}
	echo "Sending message to server.\n";
	socket_write($socket, $subject,strlen($subject));
	socket_write($socket, $msg,strlen($subject));
	
    $input5=socket_read($socket,2048);
	echo "Response from server is: $input5\n";
    //sleep(2);
	
	echo "Closing Connection to server to server.\n";
	socket_write($socket, $dot,strlen($dot));
	socket_write($socket, $quit,strlen($quit));

	$input6=socket_read($socket,2048);
	echo "Response from server is: $input6\n";
    //sleep(2);
	}


echo "Closing socket...";
socket_close($socket);
?>
