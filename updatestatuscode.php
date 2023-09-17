<?php
session_start();
if(isset($_POST['update'])){
    @include "config.php";
    if(array_key_exists('update',$_POST))
  {
    $House_Number=$_POST["House_Number"];
    $original_arrear = 0;
    $original_current = 0;
    $Owner_name=null;
    $mobile=null;
    $receipt=$_POST["receipt"];
    $que1="select Owner_name,Mobile_number,Arrears,Current from arrears where REPLACE(REPLACE(House_number,' ',''),'?','')=REPLACE('$House_Number',' ','');";
      $record1=mysqli_query($con,$que1);
      if($record1)
      {
        echo mysqli_num_rows($record1);
        if(mysqli_num_rows($record1)>0) 
        {
          while($row1 = mysqli_fetch_assoc($record1)) { 
            $original_arrear=$row1["Arrears"];
            $original_current = $row1["Current"];
            $Owner_name=$row1["Owner_name"];
            $mobile=$row1["Mobile_number"];
          
             //echo "<script>alert('$val')</script>";
         }
        }
      }
      else{
        $_SESSION["DatabaseLoadstatus"]=1;
      }
      date_default_timezone_set('Asia/Kolkata');
      // $que2="select * from transcation;";
      // $record2=mysqli_query($con,$que2);
      // $receipt_number=strval(mysqli_num_rows($record2)+1);
      // $receipt_number="RD".$receipt_number;
      // $receipt = $receipt_number;
      $current=0;
      $arrear=0;
      $arrear = (int)$_POST["arr"];
      $current = (int)$_POST["curr"];
      
      $total = (int)$_POST["total"];
      //$mobile="987656789";
      $acedemic = date('Y');
      $paydate = date('Y')."-".date('m')."-".date('d');
      

    if(!empty($House_Number) and !empty($receipt) and !empty($paydate) and !empty($total)  and !empty($mobile) and !empty($acedemic)){

      //@include 'config.php';
      
      
      $que = "insert into transcation(House_number,Receipt_number,Owner_name,Mobile_number,Pay_date,Acadamic_year,Arrears,Current,Total) values('$House_Number','$receipt','$Owner_name','$mobile','$paydate','$acedemic','$arrear','$current','$total');";
      
      $record = mysqli_query($con,$que);
      if($record){
        echo "success";
      }else{
        echo "not success";
      }

      $new_arrear = $original_arrear-$arrear;
      $new_current = $original_current-$current;
      $Total = $new_arrear+$new_current;
      $que2 = "update arrears set Arrears='$new_arrear',Current = '$new_current',Total ='$Total' where House_number='$House_Number' ";
      $record2 = mysqli_query($con,$que2);
      if($record2)
      {
        
    // echo '<script type="text/javascript">s_alert();</script>';
    // echo '<script type="text/javascript">e_alert();</script>';
    // echo '<script type="text/javascript">i_alert();</script>';
    // echo '<script type="text/javascript">w_alert();</script>';
    $_SESSION["updatestatus"]=1;
    
      }
      else{
        $_SESSION["UpdateError"]=1;
        echo "fail";
      }
    }
     $arrear = 0;
     $current = 0;
  }


header("Location: updatestatus.php"); /* Redirect browser */
//  $flag=1;
//  include 'sendtax1.php';
 
 exit();

}
header("Location: home.php"); /* Redirect browser */

?>