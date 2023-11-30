<?php
require_once "./../process/searchfile.php";
$DBbook = new DBbookclass();

$searchName="";
$directory="";
$name="";
if(isset($_POST['searchName'])){
	$dblist = $DBbook->DbsearchBook("book", "title", $_POST['searchName'], "*");
	$rows = mysqli_fetch_assoc($dblist);
	$searchName = $rows['title'];
	$directory = $rows['path'];
	$name = $rows['writer'];
	$directory = preg_replace("/\\\\/", "/", $directory);
	
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
			<div class="m-4 row ">
				<div class="col-4">
					<form method="POST" action="bookstoremain.php">
						<input type="text" list="namelist" id="searchname" name="searchName" placeholder="책제목 검색">
						<datalist id="namelist">
                            <option>홍길동전</option>
                            <option>동백꽃</option>
                            <option>별 헤는 밤</option>
                        </datalist>
						<button class="btn btn-primary">불러오기</button>
					</form>
					<div class="border mt-2 contentbox">
						<table class="table table-hover" id="booklist">
							<thead>
							    <tr >
							      <th>번호</th>
							      <th>이름</th>
							    </tr>
							</thead>
							<tbody>
								<?php 
								// 디렉토리가 존재하면(is_dir)
								if (is_dir($directory)) {
									// 저장된 디렉토리를 연다.
									$handle = opendir($directory);
									$count=1;
										while (false !== ($filename = readdir($handle))) {
											//디렉토리 안에 기본적으로 존재하는 "."과 ".." 제거
											if($filename == "." || $filename == ".."){
												continue;
											}  
											if(is_file($directory . "/" . $filename)){  
												?>
												<tr >
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
					<nav class="d-flex justify-content-center fs-4 mt-2">
						<div id="pageclick">0</div>
						<div>/</div>
						<div id="pageall">
						<?php if(isset($count)){
							echo $count-1;
						}else {echo 0;}
						?>
						</div>
					</nav>
				</div>
				<div class="col-8 mt-2">
					<div class="d-flex justify-content-between">	
						<div>책제목: <?php echo $searchName?></div>
						<div>글쓴이: <?php echo $name?></div>
						<div>
							<input type="text" id="searchtext" name="searchtext" placeholder="문자열 검색">
							<button class="btn btn-primary mx-3" id="searchtextbtn">검색</button>
						</div>
					</div>
					<div class="border mt-2 contentbox p-3" id="init">

					</div>
					<nav class="d-flex justify-content-center">
						<button type="button" class="btn btn-light fs-4 pagemove" id="pageleft">◀</button>
						<button type="button" class="btn btn-light fs-4 pagemove" id="pageright">▶</button>
					</nav>
				</div>
			</div>
        </div>
        <script>
        //ajax 함수
        function updatepage(filename) {
	        $("#init").empty();
	        $("img").remove();
	        
            extension = filename.slice(filename.indexOf(".") + 1).toLowerCase().trim();
			//파일 확장자 구분
            if(extension == "txt"){
		        $.ajax({
			        url : 'bookstorepage.php',
			        type : 'POST',
			        dataType : 'JSON',
			        data : {searchName:'<?php echo $searchName; ?>', directory:'<?php echo $directory; ?>', fileName:filename},
			        error : function(e){
			        console.log(e);
			        }, success : function(result){
			        var txt = "";
			            for(i = 0 ; i < result.length; i++){
			            	txt  += result[i] + "<br />";
			            }
			            $("#init").append("<p class='pagetext'>"+txt+"</p>");
			        }
			    });
            }
			else if(extension == "jpg" || extension == "png"){
				var dir = "<?php echo $directory; ?>";
				vimg = $('<img>', { 
                 	'src' : './../file/'+dir.substr(dir.lastIndexOf('/')) +'/'+filename,
                  	 'width' : '100%',
                     'height' : '100%'
              	 });
            	$(vimg).appendTo('#init'); 
			}
        }
        $(document).ready(function () {
        	//page 클릭 시 내용확인
        	$(document).on('click', 'body div.container #booklist>tbody tr', function() {
				var thisRow = $(this).closest('tr');
				fileindex = $(thisRow).find('td:eq(0)').text();
				filename = $(thisRow).find('td:eq(1)').text();

				$("#pageclick").empty();
	            $("#pageclick").append(fileindex);
	            
	            $('td').removeClass('bg-primary-subtle')
	            $(thisRow).find('td:eq(1)').addClass('bg-primary-subtle');
            	updatepage(filename);
            });
            //버튼 클릭시 페이지 이동
            $(document).on('click', '.pagemove',function(){
            	var pastRow = $(".bg-primary-subtle").closest('tr');
            	$('td').removeClass('bg-primary-subtle');
            	pastindex = $(pastRow).find('td:eq(0)').text();
            	
            	if($(this).attr("id") =="pageleft"){
            		Row = $("tbody").find('tr:eq('+(pastindex-2)+')');
            		fileindex =$(Row).find('td:eq(0)').text();
            	}else{
            	    Row = $("tbody").find('tr:eq('+pastindex+')');
	            	fileindex =$(Row).find('td:eq(0)').text();
            	}
	            if (fileindex == ""){
	            	Row = $("tbody").find('tr:eq(0)');
	            	fileindex =$(Row).find('td:eq(0)').text();
	            }
            	fileindex =$(Row).find('td:eq(0)').text();
            	filename = $(Row).find('td:eq(1)').text();
            	$("#pageclick").empty();
	            $("#pageclick").append(fileindex);
	            $(Row).find('td:eq(1)').addClass('bg-primary-subtle');
	            if(!(pastRow.length == 0)){
	            	updatepage(filename);
	            }
            });
            
            //단어 검색
             $(document).on('click', '#searchtextbtn',function(){
             	$("span").removeClass('bg-primary-subtle');
            	var searchtext = $("#searchtext").val();
            	//var textstr = document.getElementBy('pagetext').textContent;
            	//console.log(searchtext);
            	
            	$('.pagetext').each(function(index, item) {
		            $(item).html($(item).html().replace(RegExp(searchtext,'gi'),"<span class='bg-primary-subtle'>"+searchtext+"</span>"));
		            		
            	});
		    });
        });
        </script>
    </body>
</html>