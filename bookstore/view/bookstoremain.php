<?php
$searchName="";
$directory="";
$fileName="";
$folder = array(
		"최"=>"./../file/choi",
		"홍"=>"./../file/hong",
		"김"=>"./../file/kim",
);
if(isset($_POST['searchName'])){
	$searchName = $_POST['searchName'];
	$directory = ($folder[$_POST['searchName']]);
}
if(isset($_POST['fileName'])){
	$fileName= $_POST['fileName'];
}
?>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script type="text/javascript" src="../jQuery/jquery-3.6.3.min.js"></script>
        <link href="../bootstrap-5.3.1-dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="../bootstrap-5.3.1-dist/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="../css/main.css" type="text/css">
        <title>서점</title>
    </head>
    <body>
        <div class="container border border-secondary listcontainer">
	        <div class="header row bg-secondary">
				<h3 class="align-self-center fw-bold"><a class="text-white text-decoration-none" href="bookstoremain.php">CMSKOREA bookstore</a></h3>
			</div>
			<div class="m-4 row">
				<div class="col-4">
					<form method="POST" action="bookstoremain.php">
						<input type="text" list="namelist" id="searchname" name="searchName" placeholder="도서이름 검색">
						<datalist id="namelist">
							<option>최</option>
                            <option>홍</option>
                            <option>김</option>
                        </datalist>
						<button class="btn btn-primary">불러오기</button>
					</form>
					<div class="border mt-2">
						<table class="table table-hover" id="booklist">
							<thead>
							    <tr>
							      <th>번호</th>
							      <th>이름</th>
							    </tr>
							</thead>
							<tbody>
								<?php 
								// 저장된 디렉토리를 연다.
								// 디렉토리가 존재하면(is_dir)
								if (is_dir($directory)) {
									$handle = opendir($directory);
									$files = array();
									$count=1;
									/*주의 !
									 readdir은 모든 디렉토리 안에 기본적으로 존재하는 "."과 ".."또한 반환하는데 
									 이를 조건을 추가하여 제거 해주면 된다.*/
										while (false !== ($filename = readdir($handle))) {
											if($filename == "." || $filename == ".."){
												continue;
											}  
											if(is_file($directory . "/" . $filename)){  
												?>
												<tr>
												<td><?php echo $count?></td>
												<td><?php echo $filename?> </td>
												</tr>
												<?php 
												$count++;
											}
										}
										// 열었으면 닫는다.
										closedir($handle);
									}
								
								?>
								</tbody>
						</table>
					</div>
				</div>
				<div class="col-8">
					<div class="d-flex justify-content-end">
						<button class="btn btn-primary">검색</button>
					</div>
					<div class="border mt-2" id="init">

					</div>
				</div>
			</div>
        </div>
        <script>
        $(document).ready(function () {
        	$(document).on('click', 'body div.container #booklist>tbody tr', function() {
				var thisRow = $(this).closest('tr');
				filename = (thisRow).find('td:eq(1)').text();
				$.ajax({
	            url : 'bookstorepage.php',
	            type : 'POST',
	            dataType : 'text',
	            data : {searchName:'<?php echo $searchName; ?>', fileName:filename},
	            error : function(e){
	            console.log(e);
	            	}, success : function(result){
	            		console.log(result);
						for (var i = 0; i <result.length; i++) {
							$("#init").append("<div>"+result[i]+"</div>");
						};
	                }
	            });
	            console.log(filename);
            });
        });
        </script>
    </body>
</html>