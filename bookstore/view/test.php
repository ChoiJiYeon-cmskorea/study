<?php
$directory="./../file/hong";
// 저장된 디렉토리를 연다. "@"에러 생격도 출력 안하는데 @는 해결책이 아님
$handle = @opendir($directory);
// 디렉토리가 존재하면(is_dir)
if (is_dir($directory)) {
while(false !== ($file = readdir($handle))) {
/*주의 !
readdir은 모든 디렉토리 안에 기본적으로 존재하는 "."과 ".."또한 반환하는데 
이를 조건을 추가하여 제거 해주면 된다.*/
	if ($file != "." && $file != "..") {
		echo "file : $file";
		}
	}
}
// 열었으면 닫는다.
@closedir($handle);