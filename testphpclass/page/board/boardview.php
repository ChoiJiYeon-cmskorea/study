<?php
include $_SERVER['DOCUMENT_ROOT']."/testphpclass/header.php";
?>
    <body>
        <div class="container border border-secondary listcontainer" >
            <div class="header-include"></div>
            <?php
			include 'boardheader.php';
			?>
            <div style="margin: 15px;">
                <div class=" text-start" style="margin-bottom: 15px;">
                    <span class="fs-5 pagetitle">씨엠에스코리아 게시판</span>
                    <span class="text-primary text-opacity-75 pagedescription">- 조회 -</span>
                </div>
                <div class="border rounded  border-dark-subtle align-self-center descriptionlinebox">
                    <p>게시판 글을 조회합니다.</p>
                </div>
                <?php 
                require_once $_SERVER['DOCUMENT_ROOT']."/testphpclass/dbcontroller.php";
    			$DBclass = new DBconn();
    			$viewPk=getenv("QUERY_STRING");
    			
    			$viewlist = $DBclass->getDbData("board", "pk", $viewPk, "*");
    			?>
                <div class="my-5">
                    <div>
                        <div class="row">
                            <div class="col-8 fs-3" id="boardViewTitle"><?php echo $viewlist["title"];?></div>
                            <span  class="col-1  align-self-center" id="boardViewWriter"><?php echo $viewlist["writer"];?></span>
                            <span  class="col-2  align-self-center" id="boardViewTime"><?php echo $viewlist["updateTime"];?></span>
                        </div>
                        <div class="contentbox p-3">
                        	<p id="boardViewContent"><?php echo $viewlist["content"];?></p>
                        </div>
                    </div>
                    <div class="mx-5 mt-4 row">
                        <button class="btn btn-primary bg-warning border-warning col rounded-0 mx-1" id="postEdit" onclick="location.href='boardedit.php?<?php echo $viewPk;?>'">수 정</button>
                        <button class="col mx-1" style="border: solid 1px lightgray;" id="backList">리스트</button>
                    </div>
                </div>
            </div>
        </div>
    <script>
        $(document).ready(function () {
            
            //취소하기
            $(document).on('click', '#backList',function(){
               location.href = 'board.php'; 
            });
        });
    </script>
    </body>
</html>