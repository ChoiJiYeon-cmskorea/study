<?php
function fa () { return 1; }
function fb () { return 1; }
function fc () { return 1; }

$calla = 'fa';
$callb = 'fb';
$callc = 'fc';

$time = microtime( true );
for( $i = 5000; $i--; ) {
	$x = 0;
	$x += $calla();
	$x += $callb();
	$x += $callc();
	if( $x != 3 ) die( 'Bad numbers' );
}
echo( "Variable functions took " . (microtime( true ) - $time) . " seconds.<br />" );

$time = microtime( true );
for( $i = 5000; $i--; ) {
	$x = 0;
	$x += call_user_func('fa', '');
	$x += call_user_func('fb', '');
	$x += call_user_func('fc', '');
	if( $x != 3 ) die( 'Bad numbers' );
}
echo( "call_user_func took " . (microtime( true ) - $time) . " seconds.<br />" );

$time = microtime( true );
for( $i = 5000; $i--; ) {
	$x = 0;
	eval( '$x += ' . $calla . '();' );
	eval( '$x += ' . $callb . '();' );
	eval( '$x += ' . $callc . '();' );
	if( $x != 3 ) die( 'Bad numbers' );
}
echo( "eval took " . (microtime( true ) - $time) . " seconds.<br />" );
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>테스트 페이지</title>
    </head>
    <body>
    <h1>PHP 함수 테스트 페이지 입니다!</h1>
    </body>
</html>