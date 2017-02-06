<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE unspecified PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>DRAW & GUESS</title>
<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400,700">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<link rel="stylesheet" href="../../resource/css/login.css" type="text/css" />
<script language="javascript" type="text/javascript">  
//  function ready () {
//    
//    alert(navigator.userAgent);
//    
//    if (navigator.userAgent.indexOf('iPhone') > 0 
//      || navigator.userAgent.indexOf('iPad') > 0 
//      || navigator.userAgent.indexOf('iPod') > 0 
//      || navigator.userAgent.indexOf('Android') > 0) {
//      // SPからのアクセス、デバイスにより自動ログイン
//      alert(navigator.oscpu);
//      
//      //Ajax	
//      $.ajax({
//        type: 'post', 
//        url: '../Initialize', 
//        data: {'number': 0}, 
//        dataType: 'json',
//
//        //リクエストが成功したらこの関数を実行！！
//        success: function(data){
//          if (data.isSignon) {
//            window.location.href="../welcome";
//          } else {
//            window.location.href="../signon";
//          }
//        }
//      });
//    } else {
//      // PCからのアクセス、手動ログインが必要
//      window.location.href="../signin";
//    }
//  }
  
  function login () {
    
    var userId = $("#user").val();
    var password = $("#pass").val();
    window.sessionStorage.setItem('USER_ID', userId);
    window.sessionStorage.setItem('PASSWORD', password);
    
    if (userId.length > 0 && password.length > 0) {
      //Ajax	
      $.ajax({
        type: 'post', 
        url: '../initialize/', 
        data: {'userId': userId, 'password': password}, 
        dataType: 'json',
        //リクエストが成功したらこの関数を実行！！
        success: function(data){
          if (data.isSignon) {
//            alert(data.userInfo[0].HANDLE_NAME);
            window.sessionStorage.setItem('HANDLE_NAME', data.userInfo[0].HANDLE_NAME);
            window.location.href="../welcome/";
          } else {
            alert("ユーザ名またはパスワードが正しくありません");
//            window.location.href="../signon/";
          }
        }
      });
    } else {
      // PCからのアクセス、手動ログインが必要
      alert("ユーザ名とパスワードを入力してください。");
    }
  }
  function singon () {
      window.location.href="../signon/";
  }
</script>
</head>
<body>  
  <div id="login">
    <div >
      <span class="fontawesome-user fa-5x"></span>
      <input type="text" id="user" name="user" placeholder="Username">

      <span class="fontawesome-lock"></span>
      <input type="password" id="pass" name="pass" placeholder="Password">

      <input type="button" onclick="login();" value="ログイン"/>
      <br>
      <br>
      <input type="button" onclick="singon();" value="新規登録"/>
    </div>
  </div>
</body>
</html>