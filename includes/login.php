<div id="fb-root"></div>
<script>
  // Additional JS functions here
  
  function login() {
    FB.login(function(response) {
        if (response.authResponse) {
            testAPI();// connected
        } else {
            // cancelled
        }
    });
}
  
  function testAPI() {
    console.log('Welcome!  Fetching your information.... ');
    FB.api('/me', function(response) {
        console.log('Good to see you, ' + response.name + '.');
    });
}
  
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '447170235352254', // App ID
      channelUrl : '//WWW.filmidid.COM/channel.html', // Channel File
      status     : true, // check login status
      cookie     : true, // enable cookies to allow the server to access the session
      xfbml      : true  // parse XFBML
    });
	
	FB.getLoginStatus(function(response) {
  if (response.status === 'connected') {
    // connected
  } else if (response.status === 'not_authorized') {
    login();// not_authorized
  } else {
    // not_logged_in
	login();
  }
 });

    // Additional init code here

  };

  // Load the SDK Asynchronously
  (function(d){
     var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement('script'); js.id = id; js.async = true;
     js.src = "//connect.facebook.net/en_US/all.js";
     ref.parentNode.insertBefore(js, ref);
   }(document));
</script>
















<div class="login">
    <table class="nav_sign" width="100%" height="40" cellpadding="0" cellspacing="0">
    <tr>
    <td class="login_nav" style="background-color:#2be">
    LOGIN
    </td>
    <td class="signup_nav" style="background-color:#333;">
    SIGNUP
    </td>
    </tr>
    </table>
    <div class="login_tab">
    <br/><br/>
	<form method="post" action="hidden/login.php">
    
        <table width="400" height="100" style="margin:0 auto;">
        <tr>
        <td colspan="2">
    	<input class="inp_text login_inputs" name="eMail" type="text" placeholder="EMAIL ADDRESS" />
        </td>
        </tr>
        <tr>
        <td width="310">
        <input class="inp_text login_inputs" placeholder="PASSWORD" name="password" style="width:100%; margin-right:0px;" type="password" />
        </td>
        <td align="right">
        <input class="button1" type="submit" value="LOGIN" />
        </td>
        </tr>
        </table>
    </form>
        <table class="social_login_table" width="460" height="100" style="margin:0 auto;" cellspacing="20">
        <tr height="80">
        <td width="150">
        <a onclick="FB.login();">
        <img src="images/fb.jpg" width="50" style="float:left; margin-left:10px" />
        LogIn with <br/> facebook
        </a>
        </td>
        <td width="150">
        <a>
        <img src="images/google.jpg" width="50" style="float:left; margin-left:10px" />
        LogIn with <br/> google
        </a>

        </td>
        </tr>
        </table>
    </div>
    <div class="signup_tab" style="display:none;">
    <br/>
        <table width="400" height="150" style="margin:0 auto;">
    	<form method="get" action="index.php">
        <tr>
        <td colspan="2">
    	<input class="inp_text login_inputs" placeholder="FULL NAME" name="u" type="text" />
        </td>
        </tr>
        <tr>
        <td colspan="2">
    	<input class="inp_text login_inputs" name="u" type="text" placeholder="EMAIL ADDRESS" />
        </td>
        </tr>
        <tr>
        <td width="300">
        <input class="inp_text login_inputs" name="p" style="width:100%; margin-right:0px;" placeholder="PASSWORD" type="password" />
        </td>
        <td align="right">
        <input class="button1" type="submit" value="SIGNUP" />
        </td>
        </tr>
        </form>
        </table>
        <table class="social_login_table" width="460" height="100" style="margin:0 auto;" cellspacing="20">
        <tr height="80">
        <td width="150">
        <a>
        <img src="images/fb.jpg" width="50" style="float:left; margin-left:10px" />
        Signup with <br/> facebook
        </a>
        </td>
        <td width="150">
        <a>
        <img src="images/google.jpg" width="50" style="float:left; margin-left:10px" />
        signup with <br/> google
        </a>

        </td>
        </tr>
        </table>
    </div>
</div>

<div class="lang_box">

</div>  
