<?php
include $_SERVER['DOCUMENT_ROOT']."/testphpclass/header.php";
?>
<style type="text/css">
    .centerbox{
        width: 570px;
        height: 230px;
    }
</style>
<body>
    <?php 
	    if(!session_id()) {
	    	session_start();
	    }
	    session_destroy();
    ?>
        <div class="container">
            <div  class="text-center centerbox bg-secondary-subtle">
                <div>
                    <h4 class="pagetitle">CMSKOREA Board</h4>
                    <hr>
                    <p class="fs-4 text-black-50">로그아웃 되었습니다.</p>
                </div>
                <div class="d-grid gap-2">
                    <button class="btn btn-primary btn-lg rounded-0" id="home">홈으로</button>
                </div>
            </div>
        </div>
        <script>
            $(document).ready(function(){
                $(document).on('click', '#home',function(){
                   location.href = 'login.php'; 
                });
            });
        </script>
    </body>
</html>