<!DOCTYPE html>
<html>
    <head>
        <style>        span {
                color:red;
                cursor:pointer;
            }
            div {
                margin:3px;
                width:80px;
                height:80px;
            }
            div {
                background:#f00;
            }
</style>
        <script src="http://code.jquery.com/jquery-latest.js"></script>
    </head>
    <body>
        <input type="button" id="fadeout" value="fade out" />
        <input type="button" id="fadein" value="fade in" />
        <input type="button" id="hide" value="hide" />
        <input type="button" id="show" value="show" />
        <input type="button" id="slidedown" value="slide down" />
        <input type="button" id="slideup" value="slide up" />
        <input type="button" id="mix" value="mix" />
        <div id="target">
            target
        </div>
        <script>$('input[type="button"]').click( function(e) {
                var $this = $(e.target);
                switch($this.attr('id')) {
                    case 'fadeout':
                        $('#target').fadeOut('slow');
                        break;
                    case 'fadein':
                        $('#target').fadeIn('slow');
                        break;
                    case 'hide':
                        $('#target').hide();
                        break;
                    case 'show':
                        $('#target').show();
                        break;
                    case 'slidedown':
                        $('#target').hide().slideDown('slow');
                        break;
                    case 'slideup':
                        $('#target').slideUp('slow');
                        break;
                    case 'mix':
                        $('#target').fadeOut('slow').fadeIn('slow').delay(1000).slideUp().slideDown('slow', function(){alert('end')});
                        break;
                }
            }) 
        </script>
    </body>
</html>