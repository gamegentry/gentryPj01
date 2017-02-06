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
  /**
   *  ユーザ登録
   */
  function singon() {
    var userId = $("#user").val()
    var password = $("#pass").val();
    var Vpassword = $("#Vpass").val();
    var handleName = $("#handleName").val();
    
    if (userId.length === 0) {
      alert("ユーザIDを入力してください。");
      return;
    }
    
    if (password.length === 0) {
      alert("パスワードを入力してください。");
      return;
    }
    
    if (Vpassword.length === 0) {
      alert("パスワードを再度入力してください。");
      return;
    }
    
    if (handleName.length === 0) {
      alert("ハンドルネームを入力してください。");
      return;
    }
    
//    if (password != Vpassword) {
//      alert("パスワードが一致しません。");
//      return;
//    }
    
    //Ajax	
    $.ajax({
      type: 'post', 
      url: '../signon/doSingon', 
      data: {'userId': userId, 'password': password, 'handleName': handleName}, 
      dataType: 'json',

      //リクエストが成功したらこの関数を実行！！
      success: function(data){
        if (data.isSuccess) {
          window.sessionStorage.setItem('USER_ID', userId);
          window.sessionStorage.setItem('PASSWORD', password);
          window.sessionStorage.setItem('HANDLE_NAME', handleName);
          window.location.href="../welcome/";
        } else {
          alert("ユーザが既に登録されました。")
        }
      }
    });
  }
  
  function back() {
      window.location.href="../login/";
  }
</script>
</head>
<body>  
  <div id="login">
    <div >
      <span class="fontawesome-user"></span>
      <input type="text" id="user" name="user" placeholder="Username">
      
      <span class="fontawesome-user"></span>
      <input type="text" id="handleName" name="handleName" placeholder="Handle Name">

      <span class="fontawesome-lock"></span>
      <input type="password" id="pass" name="pass" placeholder="Password">

      <span class="fontawesome-lock"></span>
      <input type="password" id="Vpass" name="Vpass" placeholder="Verify Password">

      <input type="button" onclick="singon();" value="登録"/>
      <br>
      <br>
      <input type="button" onclick="back();" value="戻る"/>
    </div>
  </div>
</body>
</html>