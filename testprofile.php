<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script
  src="https://code.jquery.com/jquery-3.6.0.js"
  integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
  crossorigin="anonymous"></script>
<script src="https://e-portfolio.dru.ac.th/modules/models/bootstrap/bootstrap-3.3.1-dist/dist/js/bootstrap.js" charset="utf-8"></script>
<link rel="stylesheet" href="https://e-portfolio.dru.ac.th/modules/models/bootstrap/bootstrap-3.3.1-dist/dist/css/bootstrap.css">
<script charset="utf-8" src="https://static.line-scdn.net/liff/edge/2/sdk.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Computer Center Service Registers</title>
</head>
<script>
$(function(){
  var url_default = 'https://e-portfolio.dru.ac.th/api/api_data_members.php';
  var liffid = '1656810948-G1WeDRR6';
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
//        document.getElementById("pictureUrl").src = profile.pictureUrl;
//        document.getElementById("userId").innerHTML = '<b>UserId:</b> ' + profile.userId;
//        document.getElementById("displayName").innerHTML = '<b>DisplayName:</b> ' + profile.displayName;
//        document.getElementById("statusMessage").innerHTML = '<b>StatusMessage:</b> ' + profile.statusMessage;
//        document.getElementById("getDecodedIDToken").innerHTML = '<b>Email:</b> ' + liff.getDecodedIDToken().email;
       var set_userid = profile.userId;
       var set_displayname = profile.displayName;
       var set_statusmessage = profile.statusMessage
       var set_email = liff.getDecodedIDToken().email;
       var set_os = liff.getOS();
       
       $('#txt_userid').val(set_userid);
       $('#txt_displayname').val(set_displayname);
       $('#txt_viewdisplayname').val(set_displayname);
       $('#txt_statusmessage').val(set_statusmessage);
       $('#txt_lineemail').val(set_email);
       $('#txt_os').val(set_os);
       
       
        // Try a LIFF function
        switch (liff.getOS()) {
          case "android": $(document).css({'background-color' : "#d1f5d3"}); break;
          case "ios": $(document).css({'background-color' : "#eeeeee" }); break;
          case "web" : $(document).css({'background-color' : '#333333'}); break;
        }       
       
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
  
  
  
  function closeWindow() {
 if(window.confirm('Are you sure?')) {
  window.alert('Closing window')
  window.open('', '_self')
  window.close()
 }
 else {
  alert('Cancelled!')
 }
}
  $('form').on('submit',function(){
    return false;
  });
  $('#myform_registers #btn_save').on('click',function(){
    var myformdata = {
     'data_userid':$('#txt_userid').val(), 
     'data_displayname':$('#txt_displayname').val(), 
     'data_statusmessage':$('#txt_statusmessage').val(),
     'data_lineemail':$('#txt_lineemail').val(),
     'data_drumail':$('#txt_email').val(), 
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
          closeWindow();
            //close();
            //closeWindows();
            // window.close();
            // liff.closeWindow();
        } else {
            window.alert('Registers Success!!');
            liff.closeWindow();
        }
      }
    });
  });
  
});
</script>
<body>
  <div class="container-fluid" >
    <div class="row" >
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" align="center" >
        <img src="https://obs.line-scdn.net/0h3fjYUxY4bElXIHvS0qETHgB9ZytkQnJCdRR4LjpfRx44byh8LzhKUDFcVD8mQmAfKxRWTy51R3kxa3R7YzpGSzpzbQogQ3daLDpFci1cQBI7cU1j/f256x256" class="img img-responsive" />        
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" align="center" >
        <form class="form-horizontal" id="myform_registers">
          <div class="form-group">
            <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              </div>
            </div>
          </div>
          <div class="form-group>
            <label for="forid" class="col-lg-3 col-md-3 col-sm-3 col-xs-12 control-label col-form-label">
              DisplayName : 
            </label>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
              <input type="text" class="form-control" id="txt_viewdisplayname" name="txt_viewdisplayname" readonly="true" />
            </div>
          </div>
          <div class="form-group>
            <label for="forid" class="col-lg-3 col-md-3 col-sm-3 col-xs-12 control-label col-form-label">
              dru email : 
            </label>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12" align="center">
              <input type="text" class="form-control" id="txt_email" name="txt_email" placeholder="emailname@dru.ac.th" />
            </div>
          </div>
          <div class="form-group">
            <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              </div>
            </div>
          </div>                                                                                                            
          <div class="form-group>
            
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
              <button class="btn btn-primary btn-sm btn_save" id="btn_save" >Registers</button>
            </div>
          </div>
          <input type="hidden" id="txt_os" />                                                                           
          <input type="hidden" id="txt_userid" >
          <input type="hidden" id="txt_displayname" >
          <input type="hidden" id="txt_statusmessage" >
          <input type="hidden" id="txt_lineemail">
          
        </form>
                                                                                                                       
      </div>
    </div>
  </div>

</body>
</html>
