<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE unspecified PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Top画面</title>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script language="javascript" type="text/javascript">  
  function ready () {
//    window.device.
    alert(navigator.userAgent);
//    var deviceType = "pc";
    if (navigator.userAgent.indexOf('iPhone') > 0 
      || navigator.userAgent.indexOf('iPad') > 0 
      || navigator.userAgent.indexOf('iPod') > 0 
      || navigator.userAgent.indexOf('Android') > 0) {
      // SPからのアクセス、デバイスにより自動ログイン
//      alert(window.device.uuid);
      //Ajax	
      $.ajax({
          type: 'post', // HTTPメソッド（CodeIgniterだとgetは捨てられる）
          url: '../Initialize', //リクエストの送り先URL（適宜変える）
          data: {'number': window.device.uuid}, //サーバに送るデータ。JSのオブジェクトで書ける
          dataType: 'json', //サーバからくるデータの形式を指定

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
      window.location.href="../signin";
    }
  }
</script>
</head>
<body onload="ready();">  
      Top画面  
</body>
</html>