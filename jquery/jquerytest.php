<html>
    <head>
        <script src="/jquery/js/jquery-3.7.1.min.js"></script>
        <script type="text/javascript">
            $('#navigation li').live('click', function() {
                $('#navigation li').removeClass('selected');
                $(this).addClass('selected');
            })
        </script>
        <style type="text/css">
            #navigation li {
                list-style:none;
                float:left;
                padding:5px;
            }
            #navigation {
                cursor:pointer;
            }
            #navigation .selected {
                background-color:red;
                color:white;
            }
        </style>
    </head>
    <body>
        <ul id="navigation">
            <li>HTML</li>
            <li>CSS</li>
            <li>javascript</li>
            <li class="selected">jQuery</li>
            <li>PHP</li>
            <li>mysql</li>
        </ul>
    </body>
</html>