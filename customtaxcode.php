<?php
session_start();
if(!isset($_SESSION["name"]) or !isset($_SESSION["UserType"]) or $_SESSION["UserType"]!="admin") {
  unset($_SESSION["name"]);
  unset($_SESSION["UserType"]);
  header("Location:index.php");
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>....</title>
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
            toastr.success("Messeage sent Successfully")
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
</head>
<body>
  
</body>
</html>
<?php
session_start();
if(isset($_POST['button1'])) {
  
$_SESSION["customtaxstatus"]=1;

@include "config.php";

$text="";
if(isset($_POST['textareaname']))
{
  $text=strip_tags($_POST['textareaname']);
  
}

$que="select * from numbers1 ;";
$res=mysqli_query($con,$que);
$phnos="";
while($row = mysqli_fetch_assoc($res)) {
    if($row["Number"]!="")
    {
    if ($phnos=="")
    {
        $phnos=$row["Number"].",";
    }
    $phnos=$phnos.$row["Number"].",";
    }
   //echo "Owner name: " . $val."<b>";
 }

 $ph=substr($phnos,0,strlen($phnos)-1);

echo"$ph";
echo "$text";

$fields = array(
    "sender_id" => "TXTIND",
    "message" => $text,
    "route" => "v3",
    "numbers" => $ph,
);

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://www.fast2sms.com/dev/bulkV2",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_SSL_VERIFYHOST => 0,
  CURLOPT_SSL_VERIFYPEER => 0,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => json_encode($fields),
  CURLOPT_HTTPHEADER => array(
    "authorization: oJ5R3VXu8rGdqYHlEOmiKAF7yTb0gWZCtwPcIUhpa1DkesLx9zr9f1K5zcqMsu3xXWBoVmLlYS6P7HGD",
    "accept: */*",
    "cache-control: no-cache",
    "content-type: application/json"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);
  
curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  
  echo "<script>alert('Messeage sent Successfully')</script>";
  //echo $response;
  //  echo "<div class='modal fade' id='modalDialogScrollable' tabindex='-1'>
  //               <div class='modal-dialog modal-dialog-scrollable modal-lg'>
  //                 <div class='modal-content'>
  //                   <div class='modal-header'>
  //                     <h5 class='modal-title'>Transcation History</h5>
  //                     <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
  //                   </div>
  //                   <div class='modal-body' >
  //                     <div id='formprint'>
                        
  //                     </div>
  //                   </div>
  //                   <div class='modal-footer'>
  //                     <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Close</button>
  //                     <button type='button' class='btn btn-success' onclick='printDiv();'><i class='bi bi-printer-fill'></i> Print</button>
  //                   </div>
  //                 </div>
  //               </div>

  //             </div><!-- End Modal Dialog Scrollable-->";
}

//include 'customtax.php';
header("Location: customtax.php"); /* Redirect browser */
exit();

}
header("Location: home.php"); /* Redirect browser */
?>