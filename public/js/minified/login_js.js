function val(){var e=1,a=document.getElementById("password").value;""===a?(document.getElementById("password").className="invalid",e*=0):(e*=1,document.getElementById("password").className="");var t=/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/,n=t.test(document.getElementById("username").value);""===n?(document.getElementById("username").value=null,document.getElementById("username").className="invalid",e*=0):(e*=1,document.getElementById("username").className=""),e&&send(e)}function send(){var e=arguments[0];e&&(document.getElementById("signin").disabled=!0,$.ajax({type:"post",url:"http://localhost/ci/index.php/complaint/check_user",data:{email:$("#username").val(),captcha:$("#captcha").val(),password:$("#password").val()},success:function(e){window.location.assign(0!=e?"http://localhost/ci/index.php/"+e:"http://localhost/ci/index.php/complaint/sign_in")}}))}