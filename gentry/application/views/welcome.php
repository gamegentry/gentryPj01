<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE unspecified PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>DRAW & GUESS</title>
<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400,700">
<link rel="stylesheet" href="../../resource/css/login.css" type="text/css" />
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script language="javascript" type="text/javascript">  
 function ready() {
   
       var handleName = window.sessionStorage.getItem('HANDLE_NAME');
       alert(handleName);
       $("#msg").val("歓迎する、" + handleName + "さん");
 }
</script>
</head>
<body onload="ready();">  
  <div id="login">
    <div >
        <input type="text" id='msg' readonly/>
    </div>
  </div>
</body>
</html>