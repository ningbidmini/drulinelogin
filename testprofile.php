<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script
  src="https://code.jquery.com/jquery-3.6.0.js"
  integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
  crossorigin="anonymous"></script>
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

  function runApp() {
     liff.getProfile().then(profile => {
       document.getElementById("pictureUrl").src = profile.pictureUrl;
       document.getElementById("userId").innerHTML = '<b>UserId:</b> ' + profile.userId;
       document.getElementById("displayName").innerHTML = '<b>DisplayName:</b> ' + profile.displayName;
       document.getElementById("statusMessage").innerHTML = '<b>StatusMessage:</b> ' + profile.statusMessage;
       document.getElementById("getDecodedIDToken").innerHTML = '<b>Email:</b> ' + liff.getDecodedIDToken().email;
       
       document.getElementById("txt_userid").value=profile.userId;
       document.getElementById("txt_displayname").value=profile.displayName;
       document.getElementById("txt_statusmessage").value=profile.statusMessage;
       
     }).catch(err => console.error(err));
   }
   liff.init({ liffId: liffid }, () => {
     if (liff.isLoggedIn()) {
       runApp()
     } else {
       liff.login();
     }
   }, err => console.error(err.code, error.message));
  $('#btn_logout').on('click',function(){
    liff.init({ liffId: liffid }, () => {
     
       liff.logout();
       location='./testprofile.php';
   }, err => console.error(err.code, error.message));
  });
  
  $('#btn_registers').on('click',function(){
    var myformdata = {
     'data_userid':$('#myform_registers #txt_userid').val(), 
     'data_displayname':$('#myform_registers #txt_displayname').val(), 
     'data_statusmessage':$('#myform_registers #txt_statusmessage').val(),      
     'data_drumail':$('#myform_registers #txt_drumail').val(), 
    }
    console.log(myformdata);
    var setdata = new FormData();
    setdata.append('query_category','users_line_registers');
    setdata.append('query_keydata',JSON.stringify(myformdata));
    const querystatus = querydata(url_default,setdata);
    querystatus.then((result)=>{
      console.log(result);
      if(result.status==true){
        // closeWindow call
        if (!liff.isInClient()) {
            // window.alert('This button is unavailable as LIFF is currently being opened in an external browser.');
            if(result.method=='update'){
              window.alert('Members Lastupdate');  
            }else{
              window.alert('Members Registers Success');
            }
            // location='./testprofile.php';
            window.close();
            // liff.closeWindow();
        } else {
            liff.closeWindow();
        }
      }
    });
  });
  
});
</script>
<body>
  <img id="pictureUrl" width="25%">
  <p id="userId"></p>
  <p id="displayName"></p>
  <p id="statusMessage"></p>
  <p id="getDecodedIDToken"></p>
  <form id="myform_registers">
    <input type="hidden" id="txt_userid" >
    <input type="hidden" id="txt_displayname" >
    <input type="hidden" id="txt_statusmessage" >    
    <input type="text" id="txt_drumail" >
  </form>
  <button id="btn_registers">Registers</button>
  <button id="btn_logout">Logout</button>
</body>
</html>
