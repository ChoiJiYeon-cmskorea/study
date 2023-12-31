<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script type="text/javascript" src="../jQuery/jquery-3.6.3.min.js"></script>
        <link href="../bootstrap-5.3.1-dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="../bootstrap-5.3.1-dist/js/bootstrap.min.js"></script>
        <style type="text/css">
            .centerbox{
                width: 570px;
                height: 230px;
                margin:auto;
                padding: 30px;
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
            }
        </style>
        <title>로그아웃 페이지</title>
    </head>
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
                    <h4 style="color: #595959; font-weight:bold">CMSKOREA Board</h4>
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
                //$("#loginForm").submit(function(){
                //   location.href = 'board/boardlist.php'; 
                //});
                $(document).on('click', '#home',function(){
                   location.href = 'login.php'; 
                });
            });
        </script>
    </body>
</html>