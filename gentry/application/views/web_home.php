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
    
    if (userId.length > 0) {
      //Ajax	
      $.ajax({
        type: 'post', 
        url: '../Initialize', 
        data: {'userId': userId, 'password': password}, 
        dataType: 'json',

        //リクエストが成功したらこの関数を実行！！
        success: function(data){
          if (data.isSignon) {
            window.location.href="../welcome";
          } else {
            window.location.href="../signon";
          }
        }
      });
    } else {
      // PCからのアクセス、手動ログインが必要
//      window.location.href="../signin";
      alert("入力してください。");
    }
  }
</script>
</head>
<body >  
    <div align="center" style="display: none;">
    ユーザID
    <br>
    <input type="text" id="user_id" name="user_id" size="16" maxlength="8" placeholder="ユーザID" value="" pattern="[0-9]*">
    <br>
    パスワード
    <br>
    <input type="text" id="pass_word" name="pass_word" size="16" maxlength="8" placeholder="ユーザID" value="" pattern="[0-9]*">
    <br>
    <input type="image" onclick="login();" src="../../resource/button/signon.gif" value="ログイン"/>
    </div>
    <div id="login">
      
    <div >
        <span class="fontawesome-user fa-5x"></span>
          <input type="text" id="user" placeholder="Username">
       
        <span class="fontawesome-lock"></span>
          <!--<input type="image" src="../../resource/img/lock.gif" />-->
          <input type="password" id="pass" placeholder="Password">
        
        <!--<input type="submit" value="Login">-->
        <input type="button" onclick="login();" value="ログイン"/>

</div>
        
</body>
</html>