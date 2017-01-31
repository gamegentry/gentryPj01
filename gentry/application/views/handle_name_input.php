<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE unspecified PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Top画面</title>
    
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400,700">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<link rel="stylesheet" href="../../resource/css/login.css" type="text/css" />
<script language="javascript" type="text/javascript">  
//  function ready () {
//  }
  
  function logon () {
    
    var userId = $("#user").val();
    var password = $("#pass").val();
    var handleName = $("#handleName").val();
    
    if (handleName.length > 0) {
      //Ajax	
      $.ajax({
        type: 'post', 
        url: '../Signon/', 
        data: {'userId': userId, 'password': password, 'handleName': handleName}, 
        dataType: 'json',

        //リクエストが成功したらこの関数を実行！！
//        success: function(data){
        success: function(){
//          if (data.isSignon) {
            window.location.href="../welcome";
//          } else {
//            window.location.href="../signon";
//          }
        }
      });
    } else {
      // PCからのアクセス、手動ログインが必要
      alert("ハンドルネームを入力してください。");
    }
  }
</script>
</head>
<body>  
  <input type="hidden" id="user" name="user" value=""/>
  <input type="hidden" id="pass" name="pass" value=""/>
  <div id="login">
    <div >
      <span class="fontawesome-user"></span>
      <input type="text" id="handleName" name="handleName" placeholder="Handle Name">

      <input type="button" onclick="logon();" value="登録"/>
    </div>
  </div>
</body>
</html>