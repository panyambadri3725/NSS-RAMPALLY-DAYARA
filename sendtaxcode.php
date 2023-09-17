
<?php
session_start();
if(isset($_POST['sendtax'])) {
@include "config.php";

$_SESSION["sendtaxstatus"]=1;
//echo $_SESSION["sendtaxstatus"];

$text="";



$que="select * from numbers1 ;";
$res=mysqli_query($con,$que);
$total_number = mysqli_num_rows($res);
$phnos="";
$count=0;
while($row = mysqli_fetch_assoc($res)) {
    if($row["Number"]!="")
    {
    
        $phno=$row["Number"];
        $taxvalue=$row["Tax"];
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
          $count++;
          
        }

    
    }
   //echo "Owner name: " . $val."<b>";
 }


 $response= "The message has sent ".$count." villagers out of ".$total_number." villagers successfully";
 echo $response;
 header("Location: sendtax1.php"); /* Redirect browser */
//  $flag=1;
//  include 'sendtax1.php';
 
 exit();

}
header("Location: home.php"); /* Redirect browser */


?>



