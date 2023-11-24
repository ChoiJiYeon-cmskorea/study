<?php
include $_SERVER['DOCUMENT_ROOT']."/testphpclass/header.php";
?>
    <body>
        <div class="container border border-secondary listcontainer">
            <div class="header-include"></div>
            <?php
			include 'boardheader.php';
			?>
            <div style="margin: 15px;">
                <div class=" text-start" style="margin-bottom: 15px;">
                    <span class="fs-5 pagetitle">씨엠에스코리아 게시판</span>
                    <span class="text-primary text-opacity-75 pagedescription">- 수정 -</span>
                </div>
                <div class="border rounded  border-dark-subtle align-self-center descriptionlinebox">
                    <p>게시판 글을 수정합니다.</p>
                </div>
                <?php 
                require_once $_SERVER['DOCUMENT_ROOT']."/testphpclass/dbcontroller.php";
    			$DBclass = new DBconn();
    			$viewPk = getenv("QUERY_STRING");
    			
    			$viewlist = $DBclass->getDbData("board", "pk", $viewPk, "*");
    			?>
                <div class="p-4">
                    <div class="mb-4">
                        <div class="row">
                            <div class="labelbox  text-center col-1 mx-5 my-2">
                                <span class="text-white">제 목</span>
                            </div>
                            <input type="text" class="col-9 inputwritebox align-self-center" id="editTitle" placeholder="제목을 입력해주세요."  value="<?php echo $viewlist["title"];?>">
                        </div>
                        <div class="row">
                            <div class="labelbox  text-center col-1 mx-5 mb-5 my-2">
                                <span class="text-white">내 용</span>
                            </div>
                            <textarea  class="col-9 inputwritebox my-2" style="height: 400px; resize: none;" id="editContent"  placeholder="내용을 입력해주세요." ><?php echo $viewlist["content"];?></textarea>
                        </div>
                        <div class="row">
                            <div class="labelbox  text-center col-1 mx-5 my-2">
                                <span class="text-white">작성자</span>
                            </div>
                            <input type="text" class="col-2 inputwritebox align-self-center" id="writer"  readonly value="<?php echo $viewlist["writer"];?>">
                        </div>
                    </div>
                    <div class="mx-5 row">
                        <button class="btn btn-primary bg-warning border-warning col rounded-0 mx-1" id="postEdit">수정</button>
                        <button class="col mx-1" style="border: solid 1px lightgray;" id="backPost" onclick="location.href='boardview.php?<?php echo $viewPk;?>'">취소</button>
                    </div>
                </div>
                <div class="text-start" id="alertBox"></div>
            </div>
        </div>
    <script>
        $(document).ready(function () {
            //수정 완료하기
            $(document).on('click', '#postEdit',function(){
                var updateTitle = $('#editTitle').val();
                var updateContent = $('#editContent').val();
                var updateWriter = $('#writer').val();
                updateContent = updateContent.replaceAll(/(\n|\r\n)/g, "<br>");
                
                //input 검사
                if(!updateTitle){
	 				$(".alertmainbox").remove();
		            appendAlert('&#9888;제목을 입력해 주세요!', 'danger','alertBox');
                }else if(!updateContent){
                	$(".alertmainbox").remove();
                	appendAlert('&#9888;내용을 입력해 주세요!', 'danger','alertBox');
                }else if(!updateWriter){
                	$(".alertmainbox").remove();
                	appendAlert('&#9888;작성자를 입력해 주세요!', 'danger','alertBox');
                }else{
	                $.ajax({
	                    url : '../../php/board.php',
	                    type : 'POST',
	                    data : {call_name:'update_post', viewPk:viewPk, updateTitle:updateTitle, updateContent:updateContent, updateWriter:updateWriter},
	                    error : function(){
	                    console.log("실패");
	                    }, success : function(result){
	                    console.log(result);
	                    	if(!result){
		                    	location.href = "boardview.php?"+viewPk;
		                    }else{
		                    	$(".alertmainbox").remove();
		                    	appendAlert('&#9888;게시글 수정에 실패했습니다!', 'danger','alertBox');
		                    }
	                    }
	                });
                }
            });
        });
    </script>
    </body>
</html>