<?php
session_start();
if(!isset($_SESSION["name"]) or !isset($_SESSION["UserType"]) or $_SESSION["UserType"]!="admin") {
  unset($_SESSION["name"]);
  unset($_SESSION["UserType"]);
  header("Location:index.php");
  }

  $flag=0;
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Property Rampally Dhayara Village</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/main.jpg" rel="icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  <script src = "assets/vendor/ckeditor/ckeditor.js"></script>

  <!-- =======================================================
  * Template Name: NiceAdmin - v2.4.0
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->



  <link rel="stylesheet"
		href=
"https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
		integrity=
"sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2"
		crossorigin="anonymous">
	<!-- fontawesome cdn For Icons -->
	<link rel="stylesheet"
		href=
"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css"
		integrity=
"sha512-PgQMlq+nqFLV4ylk1gwUOgm6CtIIXkKwaIHp/PAIWHzig/lKZSEGKEysh0TCVbHJXCLN7WetD8TFecIky75ZfQ=="
		crossorigin="anonymous" />
	<link rel="stylesheet"
		href=
"https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
		integrity=
"sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p"
		crossorigin="anonymous" />

	<style>
		h1 {
			padding-top: 40px;
			padding-bottom: 40px;
			text-align: center;
			font-family: 'Montserrat', sans-serif;
		}
    h4{
      color:#012970;
    }
		
		section {
			padding: 5%;
			padding-top: 0;
			height: 100vh;
		}
		
		.side {
			margin-left: 0;
		}
		
		button {
			margin: 10px;
			border-color: blue !important;
			color: Black !important;
			margin-bottom: 25px;
		}
		
		button:hover {
			background-color: #fec8d8 !important;
		}
		
		textarea {
			padding: 3%;
			border-color: lightblue;
			border-width: thin;
      resize: none;
		}
		
		.flex-box {
			display: flex;
			justify-content: center;
		}

    .breadcrumb{
      background-color:#F6FCFF;
    }
    .main{
      background-color: #F6FCFF;
    }
	</style>
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

  <i class="bi bi-list toggle-sidebar-btn"></i>   
      &nbsp; 
    <div id="photo" style="text-align: center">
      <img style="vertical-align:middle" src="assets/img/main.jpg" width="40px" alt="">
      <span style="vertical-align:middle; font-size: 20px; font-weight: 700; color: orange; ">Rampally Dayara Village</span>
    </div>
    <style>/*<![CDATA[*/
        #google_translate_element{}
        .goog-te-banner-frame.skiptranslate,.goog-te-gadget-simple img,img.goog-te-gadget-icon,.goog-te-menu-value span{display:none!important}
        .goog-te-menu-frame{box-shadow:none!important}
        .goog-te-gadget-simple{background-color:transparent!important;background:url("data:image/svg+xml,%3Csvg viewBox='0 0 24 24' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M20,5H10.88L10,2H4A2,2 0 0,0 2,4V17A2,2 0 0,0 4,19H11L12,22H20A2,2 0 0,0 22,20V7A2,2 0 0,0 20,5M7.17,14.59A4.09,4.09 0 0,1 3.08,10.5A4.09,4.09 0 0,1 7.17,6.41C8.21,6.41 9.16,6.78 9.91,7.5L10,7.54L8.75,8.72L8.69,8.67C8.4,8.4 7.91,8.08 7.17,8.08C5.86,8.08 4.79,9.17 4.79,10.5C4.79,11.83 5.86,12.92 7.17,12.92C8.54,12.92 9.13,12.05 9.29,11.46H7.08V9.91H11.03L11.04,10C11.08,10.19 11.09,10.38 11.09,10.59C11.09,12.94 9.5,14.59 7.17,14.59M13.2,12.88C13.53,13.5 13.94,14.06 14.39,14.58L13.85,15.11L13.2,12.88M13.97,12.12H13L12.67,11.08H16.66C16.66,11.08 16.32,12.39 15.1,13.82C14.58,13.2 14.21,12.59 13.97,12.12M21,20A1,1 0 0,1 20,21H13L15,19L14.19,16.23L15.11,15.31L17.79,18L18.5,17.27L15.81,14.59C16.71,13.56 17.41,12.34 17.73,11.08H19V10.04H15.36V9H14.32V10.04H12.36L11.18,6H20A1,1 0 0,1 21,7V20Z' fill='%23161617'/%3E%3C/svg%3E") center / 12px no-repeat;-webkit-transition:all .2s ease;transition:all .2s ease;background-size: 20px 20px;display:inline-block;font-weight:400;line-height: 1.8;padding:0 6px;text-align:center;white-space:nowrap;vertical-align: middle;-ms-touch-action: manipulation;touch-action:manipulation;cursor:pointer;-webkit-user-select: none;-moz-user-select:none;-ms-user-select:none;user-select:none;border-left:none!important;border-top:none!important;border-bottom:none!important;border-right:none!important;border-radius: 4px}
        
        #goog-gt-tt, .goog-te-balloon-frame
        {
        display: none !important;
        }
        .goog-text-highlight 
        { 
        background: none !important;
        box-shadow: none !important;
        }
         /*]]>*/</style>
    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

      <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
      <div id="google_translate_element"></div>
      
      </a>
      <!-- <div id="google_translate_element"></div> -->

<script src="http://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
   

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

      <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
      <div id="google_translate_element"></div>
      
      </a>
      <!-- <div id="google_translate_element"></div> -->
 
        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="assets/img/user.svg" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo $_SESSION["name"]; ?></span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6><?php echo $_SESSION["name"]; ?></h6>
              <span></span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

        
            <li>
              <hr class="dropdown-divider">
            </li>
            <li>
              <a class="dropdown-item d-flex align-items-center" href="contact.php">
                <i class="bi bi-question-circle"></i>
                <span>Need Help?</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li>
              <a class="dropdown-item d-flex align-items-center" href="logout.php">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link collapsed" href="home.php">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link " data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-layout-text-window"></i><span>Messages</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
          <li>
            <a href="sendtax1.php">
              <i class="bi bi-circle"></i><span>Send Tax</span>
            </a>
          </li>
          <li>
            <a href="customtax.php" class="active">
              <i class="bi bi-circle"></i><span>Custom Messages</span>
            </a>
          </li>
        </ul>
      </li><!-- End Components Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Manage Users</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="adduser.php" >
              <i class="bi bi-circle"></i><span>Add User</span>
            </a>
          </li>
          <li>
            <a href="deleteuser.php">
              <i class="bi bi-circle"></i><span>Delete User</span>
            </a>
          </li>
          <li>
            <a href="updatestatus.php">
              <i class="bi bi-circle"></i><span>Update Status</span>
            </a>
          </li>
        </ul>
      </li><!-- End Forms Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-bar-chart"></i><span>Analyse Data</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="datafilter.php">
              <i class="bi bi-circle"></i><span>Data Filter</span>
            </a>
          </li>
          <li>
            <a href="filterbyname.php">
              <i class="bi bi-circle"></i><span>Filter By House Number</span>
            </a>
          </li>
          <li>
            <a href="villagersData.php">
              <i class="bi bi-circle"></i><span>Villagers Data</span>
            </a>
          </li>
        </ul>
      </li><!-- End Tables Nav -->  
    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h4>Send Customize Message To Users</h4>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="home.php">Home</a></li>
          <li class="breadcrumb-item">Messages</li>
          <li class="breadcrumb-item active">Custom Message</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

            <!-- <div class="card">
              <div class="card-body">
                <h5 class="card-title">Editor</h5>

                <!-- TinyMCE Editor -->
                <!-- <textarea class="tinymce-editor" rows="3">
                  <p>Edi advance editor</p>
                  <p>premium access em ana aduguthay vadilay <strong>full</strong> editor</p>
                  <p>Kinda progress bar petina dhaniki php lo loading time program code rasay</p>
                </textarea><!-- End TinyMCE Editor -->
                <!-- <br>
                <div class="col text-center">
                  <p>Sending Bills To User (15/68)</p>
                  <div class="progress mt-3">
                    <div class="progress-bar progress-bar-striped bg-success progress-bar-animated" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                  </div>
                  <br>
                  <button type="button" class="btn btn-primary center">Send Message</button>
                </div>
              </div>
            </div> --> 

          </div> 
          <form  action="customtaxcode.php" name = "text_editor" method = "post" >

         <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Editor</h5>

              
                
                <div class="flex-box">
                  <div class="row">
                    <div class="col">
                      <!-- Adding different buttons for
                        different functionality-->
                      <!--onclick attribute is added to give
                        button a work to do when it is clicked-->
                      <!-- <button type="button"
                          onclick="f1()"
                          class=" shadow-sm btn btn-outline-secondary"
                          data-toggle="tooltip"
                          data-placement="top"
                          title="Bold Text">
                  Bold</button>
                      <button type="button"
                          onclick="f2()"
                          class="shadow-sm btn btn-outline-success"
                          data-toggle="tooltip"
                          data-placement="top"
                          title="Italic Text">
                  Italic</button> -->
                      <!-- <button type="button"
                          onclick="f3()"
                          class=" shadow-sm btn btn-outline-primary"
                          data-toggle="tooltip"
                          data-placement="top"
                          title="Left Align">
                  <i class="fas fa-align-left"></i></button>
                      <button type="button"
                          onclick="f4()"
                          class="btn shadow-sm btn-outline-secondary"
                          data-toggle="tooltip"
                          data-placement="top"
                          title="Center Align">
                  <i class="fas fa-align-center"></i></button>
                      <button type="button"
                          onclick="f5()"
                          class="btn shadow-sm btn-outline-primary"
                          data-toggle="tooltip"
                          data-placement="top"
                          title="Right Align">
                  <i class="fas fa-align-right"></i></button> -->
                      <button type="button"
                          onclick="f6()"
                          class="btn shadow-sm btn-outline-secondary"
                          data-toggle="tooltip"
                          data-placement="top"
                          title="Uppercase Text">
                  Upper Case</button>
                      <button type="button"
                          onclick="f7()"
                          class="btn shadow-sm btn-outline-primary"
                          data-toggle="tooltip"
                          data-placement="top"
                          title="Lowercase Text">
                  Lower Case</button>
                      <button type="button"
                          onclick="f8()"
                          class="btn shadow-sm btn-outline-primary"
                          data-toggle="tooltip"
                          data-placement="top"
                          title="Capitalize Text">
                  Capitalize</button>
                      <button type="button"
                          onclick="f9()"
                          class="btn shadow-sm btn-outline-primary side"
                          data-toggle="tooltip"
                          data-placement="top"
                          title="Tooltip on top">
                  Clear Text</button>
                    </div>
                  </div>
                </div>
                <br>
                <div class="row">
                  <div class="col-md-3 col-sm-3">
                  </div>
                  <div class="col-md-12 col-sm-12">
                    <div class="flex-box">
                      <textarea id="textarea1"
                          class="input shadow"
                          name="textareaname"
                          rows="13"
                          cols="100"
                          placeholder="Your text here"></textarea>
                    </div>
                  </div>
                  <div class="col text-center">
                    <br><br>
                    <input type="submit" class="btn btn-primary center" name="button1" value="Send Message"></button>
                  </div>
                </div>
            </div>
          </div>
   
	

        
	


        </form>
        </div>
        <!-- <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Editor</h5>

              <!-- Quill Editor Default -->
              <!--<div class="quill-editor-default">
                <textarea textarea name="editor" id="editor" name = "editor" rows="10" cols="80"></textarea>
              </div>
              <br>
                <div class="col text-center">
                  <p>Sending Bills To User (15/68)</p>
                    <div class="progress mt-3">
                    <div class="progress-bar progress-bar-striped bg-success progress-bar-animated" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                  </div> 
                  <br>
                  <button type="button" class="btn btn-primary center">Send Message</button>
                </div>
              </div>
            </div>
          </div>
      </div> -->
        
      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>Rampally Dhayara Village</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
      Designed by <a href="#">GCET TEAM</a>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script>
    var t;
    CKEDITOR.replace( 'editor1' );
// CKEDITOR.on( 'instanceReady', function( evt )
//   {
//     var editor = evt.editor;
   
//    editor.on('change', function (e) { 
//     var text =  editor.editable().getText();
//     console.log(text);
    
//     t=text;
//     alert(t);
//   });
//  });

    </script>

<script>/*<![CDATA[*/
        (function(){var gtConstEvalStartTime = new Date();
        var c="Translate",g=this||self;function h(a,b){a=a.split(".");var d=g;a[0]in d||"undefined"==typeof d.execScript||d.execScript("var "+a[0]);for(var e;a.length&&(e=a.shift());)a.length||void 0===b?d[e]&&d[e]!==Object.prototype[e]?d=d[e]:d=d[e]={}:d[e]=b}
        function k(a,b){function d(){}d.prototype=b.prototype;a.ka=b.prototype;a.prototype=new d;a.prototype.constructor=a;a.ja=function(e,f,v){for(var w=Array(arguments.length-2),n=2;n<arguments.length;n++)w[n-2]=arguments[n];return b.prototype[f].apply(e,w)}}function l(a){return a};function m(){return"[msg_undefined]"}var p={};
        (function(){if(void 0==window.CLOSURE_DEFINES||window.CLOSURE_DEFINES["te.msg.EMBED_MESSAGES"]){p={Y:function(){return MSG_TRANSLATE},m:function(){return MSG_CANCEL},s:function(){return MSG_CLOSE},K:function(){return MSGFUNC_PAGE_TRANSLATED_TO},Z:function(){return MSGFUNC_TRANSLATED_TO},B:function(){return MSG_GENERAL_ERROR},D:function(){return MSG_LANGUAGE_UNSUPPORTED},F:function(){return MSG_LEARN_MORE},L:function(){return MSGFUNC_POWERED_BY},ba:function(){return MSG_TRANSLATE_PRODUCT_NAME},da:function(){return MSG_TRANSLATION_IN_PROGRESS},
        aa:function(){return MSGFUNC_TRANSLATE_PAGE_TO},ia:function(){return MSGFUNC_VIEW_PAGE_IN},M:function(){return MSG_RESTORE},U:function(){return MSG_SSL_INFO_LOCAL_FILE},V:function(){return MSG_SSL_INFO_SECURE_PAGE},T:function(){return MSG_SSL_INFO_INTRANET_PAGE},N:function(){return MSG_SELECT_LANGUAGE},fa:function(){return MSGFUNC_TURN_OFF_TRANSLATION},ea:function(){return MSGFUNC_TURN_OFF_FOR},l:function(){return MSG_ALWAYS_HIDE_AUTO_POPUP_BANNER},I:function(){return MSG_ORIGINAL_TEXT},J:function(){return MSG_ORIGINAL_TEXT_NO_COLON},
        A:function(){return MSG_FILL_SUGGESTION},W:function(){return MSG_SUBMIT_SUGGESTION},S:function(){return MSG_SHOW_TRANSLATE_ALL},R:function(){return MSG_SHOW_RESTORE_ALL},O:function(){return MSG_SHOW_CANCEL_ALL},ca:function(){return MSG_TRANSLATE_TO_MY_LANGUAGE},$:function(){return MSGFUNC_TRANSLATE_EVERYTHING_TO},P:function(){return MSG_SHOW_ORIGINAL_LANGUAGES},H:function(){return MSG_OPTIONS},ga:function(){return MSG_TURN_OFF_TRANSLATION_FOR_THIS_SITE},G:function(){return MSG_MANAGE_TRANSLATION_FOR_THIS_SITE},
        j:function(){return MSG_ALT_SUGGESTION},h:function(){return MSG_ALT_ACTIVITY_HELPER_TEXT},i:function(){return MSG_ALT_AND_CONTRIBUTE_ACTIVITY_HELPER_TEXT},ha:function(){return MSG_USE_ALTERNATIVES},v:function(){return MSG_DRAG_TIP},o:function(){return MSG_CLICK_FOR_ALT},u:function(){return MSG_DRAG_INSTUCTIONS},X:function(){return MSG_SUGGESTION_SUBMITTED},C:function(){return MSG_LANGUAGE_TRANSLATE_WIDGET}};for(var a in p)if(p[a]!==Object.prototype[p[a]])try{p[a]=p[a].call(null)}catch(b){p[a]=m}}else a=
        function(b){return function(){return b}},p={Y:a(0),m:a(1),s:a(2),K:a(3),Z:a(4),B:a(5),D:a(45),F:a(6),L:a(7),ba:a(8),da:a(9),aa:a(10),ia:a(11),M:a(12),U:a(13),V:a(14),T:a(15),N:a(16),fa:a(17),ea:a(18),l:a(19),I:a(20),A:a(21),W:a(22),S:a(23),R:a(24),O:a(25),ca:a(26),$:a(27),P:a(28),H:a(29),ga:a(30),j:a(32),h:a(33),ha:a(34),v:a(35),o:a(36),u:a(37),X:a(38),G:a(39),i:a(40),J:a(41),C:a(46)}})();var q={},MSG_TRANSLATE=c;q[0]=MSG_TRANSLATE;var MSG_CANCEL="Cancel";q[1]=MSG_CANCEL;var MSG_CLOSE="Close";q[2]=MSG_CLOSE;function MSGFUNC_PAGE_TRANSLATED_TO(a){return"Google has automatically translated this page to: "+a}q[3]=MSGFUNC_PAGE_TRANSLATED_TO;function MSGFUNC_TRANSLATED_TO(a){return"Translated to: "+a}q[4]=MSGFUNC_TRANSLATED_TO;var MSG_GENERAL_ERROR="Error: The server could not complete your request. Try again later.";q[5]=MSG_GENERAL_ERROR;var MSG_LEARN_MORE="Learn more";q[6]=MSG_LEARN_MORE;
        function MSGFUNC_POWERED_BY(a){return"Powered by "+a}q[7]=MSGFUNC_POWERED_BY;var MSG_TRANSLATE_PRODUCT_NAME=c;q[8]=MSG_TRANSLATE_PRODUCT_NAME;var MSG_TRANSLATION_IN_PROGRESS="Translation in progress";q[9]=MSG_TRANSLATION_IN_PROGRESS;function MSGFUNC_TRANSLATE_PAGE_TO(a){return"Translate this page to: "+(a+" using Google Translate?")}q[10]=MSGFUNC_TRANSLATE_PAGE_TO;function MSGFUNC_VIEW_PAGE_IN(a){return"View this page in: "+a}q[11]=MSGFUNC_VIEW_PAGE_IN;var MSG_RESTORE="Show original";q[12]=MSG_RESTORE;
        var MSG_SSL_INFO_LOCAL_FILE="The content of this local file will be sent to Google for translation using a secure connection.";q[13]=MSG_SSL_INFO_LOCAL_FILE;var MSG_SSL_INFO_SECURE_PAGE="The content of this secure page will be sent to Google for translation using a secure connection.";q[14]=MSG_SSL_INFO_SECURE_PAGE;var MSG_SSL_INFO_INTRANET_PAGE="The content of this intranet page will be sent to Google for translation using a secure connection.";q[15]=MSG_SSL_INFO_INTRANET_PAGE;
        var MSG_SELECT_LANGUAGE="Select Language";q[16]=MSG_SELECT_LANGUAGE;function MSGFUNC_TURN_OFF_TRANSLATION(a){return"Turn off "+(a+" translation")}q[17]=MSGFUNC_TURN_OFF_TRANSLATION;function MSGFUNC_TURN_OFF_FOR(a){return"Turn off for: "+a}q[18]=MSGFUNC_TURN_OFF_FOR;var MSG_ALWAYS_HIDE_AUTO_POPUP_BANNER="Always hide";q[19]=MSG_ALWAYS_HIDE_AUTO_POPUP_BANNER;var MSG_ORIGINAL_TEXT="Original text:";q[20]=MSG_ORIGINAL_TEXT;var MSG_FILL_SUGGESTION="Contribute a better translation";q[21]=MSG_FILL_SUGGESTION;
        var MSG_SUBMIT_SUGGESTION="Contribute";q[22]=MSG_SUBMIT_SUGGESTION;var MSG_SHOW_TRANSLATE_ALL="Translate all";q[23]=MSG_SHOW_TRANSLATE_ALL;var MSG_SHOW_RESTORE_ALL="Restore all";q[24]=MSG_SHOW_RESTORE_ALL;var MSG_SHOW_CANCEL_ALL="Cancel all";q[25]=MSG_SHOW_CANCEL_ALL;var MSG_TRANSLATE_TO_MY_LANGUAGE="Translate sections to my language";q[26]=MSG_TRANSLATE_TO_MY_LANGUAGE;function MSGFUNC_TRANSLATE_EVERYTHING_TO(a){return"Translate everything to "+a}q[27]=MSGFUNC_TRANSLATE_EVERYTHING_TO;
        var MSG_SHOW_ORIGINAL_LANGUAGES="Show original languages";q[28]=MSG_SHOW_ORIGINAL_LANGUAGES;var MSG_OPTIONS="Options";q[29]=MSG_OPTIONS;var MSG_TURN_OFF_TRANSLATION_FOR_THIS_SITE="Turn off translation for this site";q[30]=MSG_TURN_OFF_TRANSLATION_FOR_THIS_SITE;q[31]=null;var MSG_ALT_SUGGESTION="Show alternative translations";q[32]=MSG_ALT_SUGGESTION;var MSG_ALT_ACTIVITY_HELPER_TEXT="Click on words above to get alternative translations";q[33]=MSG_ALT_ACTIVITY_HELPER_TEXT;var MSG_USE_ALTERNATIVES="Use";
        q[34]=MSG_USE_ALTERNATIVES;var MSG_DRAG_TIP="Drag with shift key to reorder";q[35]=MSG_DRAG_TIP;var MSG_CLICK_FOR_ALT="Click for alternative translations";q[36]=MSG_CLICK_FOR_ALT;var MSG_DRAG_INSTUCTIONS="Hold down the shift key, click, and drag the words above to reorder.";q[37]=MSG_DRAG_INSTUCTIONS;var MSG_SUGGESTION_SUBMITTED="Thank you for contributing your translation suggestion to Google Translate.";q[38]=MSG_SUGGESTION_SUBMITTED;var MSG_MANAGE_TRANSLATION_FOR_THIS_SITE="Manage translation for this site";
        q[39]=MSG_MANAGE_TRANSLATION_FOR_THIS_SITE;var MSG_ALT_AND_CONTRIBUTE_ACTIVITY_HELPER_TEXT="Click a word for alternative translations, or double-click to edit directly";q[40]=MSG_ALT_AND_CONTRIBUTE_ACTIVITY_HELPER_TEXT;var MSG_ORIGINAL_TEXT_NO_COLON="Original text";q[41]=MSG_ORIGINAL_TEXT_NO_COLON;q[42]=c;q[43]=c;q[44]="Your correction has been submitted.";var MSG_LANGUAGE_UNSUPPORTED="Error: The language of the webpage is not supported.";q[45]=MSG_LANGUAGE_UNSUPPORTED;
        var MSG_LANGUAGE_TRANSLATE_WIDGET="Language Translate Widget";q[46]=MSG_LANGUAGE_TRANSLATE_WIDGET;function r(a){if(Error.captureStackTrace)Error.captureStackTrace(this,r);else{var b=Error().stack;b&&(this.stack=b)}a&&(this.message=String(a))}k(r,Error);r.prototype.name="CustomError";function t(a,b){a=a.split("%s");for(var d="",e=a.length-1,f=0;f<e;f++)d+=a[f]+(f<b.length?b[f]:"%s");r.call(this,d+a[e])}k(t,r);t.prototype.name="AssertionError";function u(a,b){throw new t("Failure"+(a?": "+a:""),Array.prototype.slice.call(arguments,1));};var x;function y(a,b){this.g=b===z?a:""}y.prototype.toString=function(){return this.g+""};var z={};function _exportMessages(){h("google.translate.m",q)}function A(a){var b=document.getElementsByTagName("head")[0];b||(b=document.body.parentNode.appendChild(document.createElement("head")));b.appendChild(a)}
        function _loadJs(a){var b=document;var d="SCRIPT";"application/xhtml+xml"===b.contentType&&(d=d.toLowerCase());d=b.createElement(d);d.type="text/javascript";d.charset="UTF-8";if(void 0===x){b=null;var e=g.trustedTypes;if(e&&e.createPolicy){try{b=e.createPolicy("goog#html",{createHTML:l,createScript:l,createScriptURL:l})}catch(v){g.console&&g.console.error(v.message)}x=b}else x=b}a=(b=x)?b.createScriptURL(a):a;a=new y(a,z);a instanceof y&&a.constructor===y?a=a.g:(b=typeof a,u("expected object of type TrustedResourceUrl, got '"+
        a+"' of type "+("object"!=b?b:a?Array.isArray(a)?"array":b:"null")),a="type_error:TrustedResourceUrl");d.src=a;var f;a=(d.ownerDocument&&d.ownerDocument.defaultView||window).document;(f=(a=null===(f=a.querySelector)||void 0===f?void 0:f.call(a,"script[nonce]"))?a.nonce||a.getAttribute("nonce")||"":"")&&d.setAttribute("nonce",f);A(d)}function _loadCss(a){var b=document.createElement("link");b.type="text/css";b.rel="stylesheet";b.charset="UTF-8";b.href=a;A(b)}
        function _isNS(a){a=a.split(".");for(var b=window,d=0;d<a.length;++d)if(!(b=b[a[d]]))return!1;return!0}function _setupNS(a){a=a.split(".");for(var b=window,d=0;d<a.length;++d)b.hasOwnProperty?b.hasOwnProperty(a[d])?b=b[a[d]]:b=b[a[d]]={}:b=b[a[d]]||(b[a[d]]={});return b}h("_exportMessages",_exportMessages);h("_loadJs",_loadJs);h("_loadCss",_loadCss);h("_isNS",_isNS);h("_setupNS",_setupNS);
        window.addEventListener&&"undefined"==typeof document.readyState&&window.addEventListener("DOMContentLoaded",function(){document.readyState="complete"},!1);
        if (_isNS('google.translate.Element')){return}(function(){var c=_setupNS('google.translate._const');c._cest = gtConstEvalStartTime;gtConstEvalStartTime = undefined;c._cl='en-GB';c._cuc='googleTranslateElementInit';c._cac='';c._cam='';c._ctkk='450465.1037093230';var h='translate.googleapis.com';var s=(true?'https':window.location.protocol=='https:'?'https':'http')+'://';var b=s+h;c._pah=h;c._pas=s;c._pbi=b+'/translate_static/img/te_bk.gif';c._pci=b+'/translate_static/img/te_ctrl3.gif';c._pli=b+'/translate_static/img/loading.gif';c._plla=h+'/translate_a/l';c._pmi=b+'/translate_static/img/mini_google.png';c._ps=b+'/translate_static/css/translateelement.css';c._puh='translate.google.com';_loadCss(c._ps);_loadJs(b+'/translate_static/js/element/main_en-GB.js');})();})();
        function googleTranslateElementInit(){new google.translate.TranslateElement({pageLanguage:'vi',includedLanguages:'en,te,hi,',layout:google.translate.TranslateElement.InlineLayout.SIMPLE},'google_translate_element')}$(".hover").mouseleave(function (){$(this).removeClass("hover")});
        /*]]>*/
        </script> 

  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.min.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  
  <script src="assets/js/main.js"></script>
<!--External JavaScript file-->
<script src="assets/js/resource.js"></script>
<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
<script>
        toastr.options = {
                "closeButton": true,
                "debug": false,
                "newestOnTop": false,
                "progressBar": true,
                "positionClass": "toast-bottom-left",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }
        function s_alert()
        {
            toastr.success("Message Sent Successfully")
        }
        function e_alert()
        { 
            toastr.error("Have Fun vvvv")
        }
        function i_alert()
        {
            toastr.info("Have Fun vvvv")
        }
        function w_alert()
        {
            toastr.warning("Have Fun vvvv")
        }
    </script>

    
</body>

</html>

 <?php
 if(isset($_SESSION["customtaxstatus"])){
  echo '<script type="text/javascript">s_alert();</script>';
  // echo '<script type="text/javascript">e_alert();</script>';
  // echo '<script type="text/javascript">i_alert();</script>';
  // echo '<script type="text/javascript">w_alert();</script>';
  unset($_SESSION["customtaxstatus"]);
 }


?>