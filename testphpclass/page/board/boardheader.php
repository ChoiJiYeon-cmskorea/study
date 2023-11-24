<body>
    <?php 
    if(!session_id()) {
    	session_start();
    }
	
    if(isset($_SESSION['alert'])){
    	$alertSession = $_SESSION['alert'];
    	//echo $alertSession;
    	switch ($alertSession){
    		case  "write":
    			echo("<script>alert('새 글이 등록되었습니다');</script>");
    			unset($_SESSION['alert']);
    			break;
    		case  "edit":
    			echo("<script>alert('글이 수정되었습니다');</script>");
    			unset($_SESSION['alert']);
    			break;
    	}
    }
    ?>
        <div class="header row bg-secondary">
            <h3 class="col-9  align-self-center fw-bold"><a class="text-white text-decoration-none" href="board.php">CMSKOREA Board</a></h3>
            <span class="col-1 text-center align-self-center text-white"><?php print_r($_SESSION['userName']); ?></span>
            <button class="col-1 border-white rounded-0 btn btn-sm bg-white logoutbutton" id="logout" >로그아웃</button>
        </div>
        <script>
            $(document).ready(function(){
                $(document).on('click', '#logout',function(){
                	
                   location.href = '../login/logout.php'; 
                });
            });
        </script>
    </body>