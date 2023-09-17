<?php
session_start();

if(isset($_POST['sendsms'])) {
  
@include "config.php";

$text="";

$phno=$_POST['phonenumber'];
$taxvalue=$_POST['taxvalue'];
//echo "<script>alert('".$phno."')</script>";
      if(strlen($phno)==10){
    
        //$phno=$row["Mobile_number"];
        //$phno = 9032983092;
        //$taxvalue=$row["Tax"];
        //$taxvalue="1234";
        $text = "Tax value of Rs.".$taxvalue." should be pay before this month.Ignore if paid.";
        // echo"$phno";
        // echo "$text";
        $fields = array(
          "sender_id" => "TXTIND",
          "message" => $text,
          "route" => "v3",
          "numbers" => $phno,
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
        
        contine;
      } else {
        echo "<script>alert('sent successfully')</script>";
        $_SESSION["individualmessagestatus"]=1;
        
      }
    }else{
      $_SESSION["individualmessagestatus"]=2;
    }

header("Location: filterbyname.php"); /* Redirect browser */
 exit();

}
header("Location: home.php"); /* Redirect browser */

?>