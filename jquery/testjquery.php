<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <style>
            body{
                font-size:12px;
            }
            .selected,.selected_parent {
                background-color: red !important;
                color:white;
                border:2px solid red !important;
            }
            input.btn {
                width:130px;
            }
            ul, .live{
                float:left;
                width:150px;
                padding-left:20px;
                margin:0;
            }
            textarea{
                float:left;
                width: 400px;
                height:150px;
                font-size:11px;
                margin-left:20px;
            }
            .clear{
                clear: both;
            }
            .sample{
                margin-bottom: 20px;
            }
        </style>
        <script src="http://code.jquery.com/jquery-latest.js"></script>
    </head>
    <body>
        <fieldset>
            <legend> 기본 </legend>
            <div class="sample">
                <ul id="tutorials">
                    <li class="tutorial" id="HTML"> HTML </li>
                    <li class="tutorial" id="CSS"> CSS </li>
                    <li class="tutorial" id="javascript"> javascript </li>
                    <li class="tutorial" id="jquery"> jQuery </li>
                    <li class="tutorial" id="PHP"> PHP </li>
                    <li class="tutorial" id="MYSQL"> MYSQL </li>
                </ul>
<textarea>
<ul id="tutorials">
    <li class="tutorial" id="HTML"> HTML </li>
    <li class="tutorial" id="CSS"> CSS </li>
    <li class="tutorial" id="javascript"> javascript </li>
    <li class="tutorial" id="jquery"> jQuery </li>
    <li jclass="tutorial" id="PHP"> PHP </li>
    <li class="tutorial" id="MYSQL"> MYSQL </li>
</ul>
</textarea>
            <div class="clear"></div>
                </div>
            <input class="btn" type="button" id="#jquerybtn" value="#jquery" /> - id 선택자 <br />
            <input class="btn" type="button" id=".tutorial" value=".tutorial" /> - class 선택자 <br />
            <input class="btn" type="button" value="li" /> - 엘리먼트 선택자 <br />
            <input class="btn" type="button" value="#jquery, #MYSQL" /> - 다중 선택자 <br />
        </fieldset>
        
        
        <fieldset>
            <legend> filter </legend>
            <div class="sample">
                <ul id="list">
                    <li> HTML </li>
                    <li> CSS </li>
                    <li> javascript </li>
                    <li> PHP </li>
                    <li> MYSQL </li>
                </ul>
<textarea>
<ul id="list">
    <li> HTML </li>
    <li> CSS </li>
    <li> javascript </li>
    <li> PHP </li>
    <li> MYSQL </li>
</ul>    
</textarea>
                <div class="clear"></div>
            </div>
            <input class="btn" type="button" value="#list li:eq(2)" /> - 인자와 인덱스가 동일한 엘리먼트를 찾아내는 선택자 <br />
            <input class="btn" type="button" value="#list li:gt(1)" /> - 인자 보다 인덱스가 큰 엘리먼트를 찾아내는 선택자 <br />
            <input class="btn" type="button" value="#list li:lt(2)" /> - 인자 보다 인덱스가 작은 엘리먼트를 찾아내는 선택자 <br />
            <input class="btn" type="button" value="#list li:even" /> - 첫번째, 세번째... 홀 수의 인덱스 값을 가진 엘리먼트에 대한 선택자 <br />
            <input class="btn" type="button" value="#list li:odd" /> - 두번째, 네번째.... 짝 수의 인덱스 값을 가진 엘리먼트에 대한 선택자 <br />
            <input class="btn" type="button" value="#list li:first" /> - 첫번재 인덱스 엘리먼트에 대한 선택자 <br />
            <input class="btn" type="button" value="#list li:last" /> - 마지막 인덱스 엘리먼트에 대한 선택자 <br />
        </fieldset>
        
        
        <fieldset>
            <legend> 속성 </legend>
            <div class="sample">
                <ul id="attribute">
                    <li target="ABCD">ABCD</li>
                    <li target="BCDE">BCDE</li>
                    <li target="CDEF">CDEF</li>
                    <li target="DEFG">DEFG</li>
                    <li target="EFGH">EFGH</li>
                    <li id="FGHI" target="FGHI">FGHI</li>
                </ul>
<textarea>
<ul id="attribute">
    <li target="ABCD">ABCD</li>
    <li target="BCDE">BCDE</li>
    <li target="CDEF">CDEF</li>
    <li target="DEFG">DEFG</li>
    <li target="EFGH">EFGH</li>
    <li id="FGHI" target="FGHI">FGHI</li>
</ul>    
</textarea>
                <div class="clear"></div>
            </div>
            <input class="btn" type="button" value="[target*=&quot;BC&quot;]" /> - 속성의 값에 주어진 문자열이 포함되는 엘리먼트를 찾아내는 선택자 <br />
            <input class="btn" type="button" value="[target=&quot;DEFG&quot;]" /> - 속성의 값과 주어진 문자열이 일치하는 엘리먼트를 찾아내는 선택자 <br />
            <input class="btn" type="button" value="[target!=&quot;DEFG&quot;]" /> - 속성의 값과 주어진 문자열이 일치하지 않는 엘리먼트를 찾아내는 선택자 <br />
<input class="btn" type="button" value="[target^=&quot;B&quot;]" /> - 속성의 값으로 주어진 문자열이 처음 등장하는 엘리먼트를 찾아내는 선택자 <br />
<input class="btn" type="button" value="[target$=&quot;H&quot;]" /> - 속성의 값으로 주어진 문자열이 마지막으로 등장하는 엘리먼트를 찾아내는 선택자 <br />
<input class="btn" type="button" value="[target]" /> - 속성이 존재하는 엘리먼트를 찾아내는 선택자 <br />
<input class="btn" type="button" value="[target][id]" /> - 속성들이 존재하는 엘리먼트를 찾아내는 선택자
        </fieldset>
        <fieldset>
            <legend>Form</legend>
                <div class="live">
                    <div>
                        <input type="text" disabled="disabled" value="disabled" />
                        <input type="text" value="enabled"/>
                    </div>
                    <div><input type="checkbox" checked="checked" /></div>
                    <div><input type="checkbox" /></div>
                </div>
<textarea class="sample">
<div>
    <input type="text" disabled="disabled" value="disabled" />
    <input type="text" value="enabled"/>
</div>
<div><input type="checkbox" checked="checked" /></div>
<div><input type="checkbox" /></div>
</textarea>
            <div class="clear"></div>
            <input class="btn" type="button" value="[type=&quot;text&quot;]" /> - 폼 엘리먼트를 선택할 때는 속성 셀렉터를 사용한다. <br />
            <input class="btn" type="button" value="[type=&quot;text&quot;]:disabled" /> - disabled 속성의 값이 disabled인 엘리먼트를 찾아내는 선택자<br />
            <input class="btn" type="button" value="[type=&quot;text&quot;]:enabled" /> - disabled 속성의 값이 enabled인 엘리먼트를 찾아내는 선택자<br />
            <input class="btn" type="button" value="input:checked" /> - 체크박스 중 체크가 된 엘리먼트를 찾아내는 선택자 <br />
        </fieldset>
        <script>
            $('input').live('click', function() {
                $this = $(this);
                $('*').removeClass('selected');
                switch($this.attr('value')) {
                    case '#jquery':
                        $('#jquery').addClass('selected');
                        break;
                    case '.tutorial':
                        $('.tutorial').addClass('selected');
                        break;
                    case 'li':
                        $('li').addClass('selected');
                        break;
                    case '#jquery, #MYSQL':
                        $('#jquery, #MYSQL').addClass('selected');    
                        break;
                    case '#list li:eq(2)':
                        $('#list li:eq(2)').addClass('selected');
                        break;
                    case '#list li:gt(1)':
                        $('#list li:gt(1)').addClass('selected');
                        break;
                    case '#list li:lt(2)':
                        $('#list li:lt(2)').addClass('selected');
                        break;
                    case '#list li:even':
                        $('#list li:even').addClass('selected');
                        break;
                    case '#list li:odd':
                        $('#list li:odd').addClass('selected');
                        break;
                    case '#list li:first':
                        $('#list li:first').addClass('selected');
                        break;
                    case '#list li:last':
                        $('#list li:last').addClass('selected');
                        break;
                    case '[target*="BC"]':
                        $('li[target*="BC"]').addClass('selected');
                        break;
                    case '[target="DEFG"]':
                        $('li[target="DEFG"]').addClass('selected');
                        break;
                    case '[target!="DEFG"]':
                        $('li[target!="DEFG"]').addClass('selected');
                        break;
                    case '[target^="B"]':
                        $('li[target^="B"]').addClass('selected');
                        break;
                    case '[target$="H"]':
                        $('li[target$="H"]').addClass('selected');
                        break;
                    case '[target]':
                        $('li[target]').addClass('selected');
                        break;
                    case '[target][id]':
                        $('li[target][id]').addClass('selected');
                        break;
                    case '[type="text"]':
                        $('[type="text"]').addClass('selected');                    
                        break;
                    case '[type="text"]:disabled':
                        $('[type="text"]:disabled').addClass('selected');
                        break;
                    case '[type="text"]:enabled':
                        $('[type="text"]:enabled').addClass('selected');
                        break;
                    case 'input:checked':
                        $('input:checked').parent().addClass('selected');;
                        break;
                    
                }
            })
        </script>
    </body>
</html> 