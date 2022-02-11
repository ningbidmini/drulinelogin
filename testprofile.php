<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script src="./jquery-1.11.2.js" charset="utf-8"></script>
<script charset="utf-8" src="https://static.line-scdn.net/liff/edge/2/sdk.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<script>
$(function(){
  var url_default = 'https://e-portfolio.dru.ac.th/api/api_data_members.php';
  var liffid = '1656864959-2x8eeKAz';
  var headercontent = {
    'campus_id':'Support',
    'campus_text_th':'Teacher',
    'campus_count':'Student',
  }
  var setelements = function(elementname,elementclass,elementattribute,elementhtml){
    var tag = document.createElement(elementname);
    $(tag).addClass(elementclass);
    if(Object.values(elementattribute).length>0){
      $.each(elementattribute , function(index , value){
        $(tag).attr(index,value);
        // console.log(index+value);
      });

    }

    $(tag).html(elementhtml);
    return tag;
  }
  const querydata = async function(geturl,getdata){
    try {
      const status = await fetch(geturl,{
        method : 'POST',
        body : getdata,
      });
      return status.json();
    } catch (e) {
      console.log(e);
    }
  }

  function logOut() {
    liff.logout()
    window.location.reload()
  }
  function logIn() {
    liff.login({ redirectUri: window.location.href })
  }
  function runApp() {
     liff.getProfile().then(profile => {
       document.getElementById("pictureUrl").src = profile.pictureUrl;
       document.getElementById("userId").innerHTML = '<b>UserId:</b> ' + profile.userId;
       document.getElementById("displayName").innerHTML = '<b>DisplayName:</b> ' + profile.displayName;
       document.getElementById("statusMessage").innerHTML = '<b>StatusMessage:</b> ' + profile.statusMessage;
       document.getElementById("getDecodedIDToken").innerHTML = '<b>Email:</b> ' + liff.getDecodedIDToken().email;
     }).catch(err => console.error(err));
   }
   liff.init({ liffId: liffid }, () => {
     if (liff.isLoggedIn()) {
       runApp()
     } else {
       liff.login();
     }
   }, err => console.error(err.code, error.message));

  $('#btnLogIn').on('click' , function(evt){
    logIn();
  });

});
</script>
<body>
  <img id="pictureUrl" width="25%">
  <p id="userId"></p>
  <p id="displayName"></p>
  <p id="statusMessage"></p>
  <p id="getDecodedIDToken"></p>
</body>
</html>
