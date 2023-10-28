<?php
include('head.php');
?>
    <form>   
<center><h1>Fund TRansfer page</h1></center><hr>
<div class="comtainer">
            <div class="row">
              <div class="col-md-3"></div>
                 <div class="col-md-6"  style="border: 2px solid black; font-weight:bold; border-radius:4%; padding:40px;">
                <br><br>
                <div class="row">
                    <div class="col">
                        Enter account nomber
                        <input type="text" name="ac" class="form-control">
                    </div>
                </div>  
                <div class="row">
                    <div class="col">
                        Enter pin
                        
                        <input type="text" name="pin" class="form-control">
                    </div>
                </div>    
                <div class="row">
                    <div class="col">
                       Enter amount to transfer
                        <input type="text" name="am" class="form-control">
                    </div>
                </div> 
                <div class="row">
                    <div class="col">
                        enter account number to transfer
                        <input type="text" name="tsf" class="form-control">
                    </div>
                </div>  
                  
                <center><input type="submit" name="submit"  value="Transfer" class="btn btn-info"></center>

              </div>
         </div>
      </div> 

<?php
$con=mysqli_connect('localhost','root','','banking');
if(isset($_REQUEST['submit']))
{
  $ac=$_REQUEST['ac'];
  $pin=$_REQUEST['pin'];
  $am=$_REQUEST['am'];
  $tsf=$_REQUEST['tsf'];


  $q="select * from account where acno='$ac' && pin='$pin'";
  $rs=mysqli_query($con,$q);
  date_default_timezone_set("Asia/calcutta");
  $d=date('D/M/Y');
  $t=date('h:i:s');
  $dt=$d." ".$t;
  $q="Insert into mytrans(acno,amount,dt,ds)values('$ac','$am','$dt','fund transfer')";
  mysqli_query($con,$q);
  $x=mysqli_num_rows($rs);
  if($x>0)
  {
    $r=mysqli_fetch_array($rs);
    $camt=$r[10];
    if($camt>=$am)
    {
        $q="select * from account where acno='$tsf'";
        $rs=mysqli_query($con,$q);
        date_default_timezone_set("Asia/calcutta");
        $d=date('D/M/Y');
        $t=date('h:i:s');
        $dt=$d." ".$t;
        $q="Insert into mytrans(acno,amount,dt,ds)values('$ac','$am','$dt','fund transfer')";
        mysqli_query($con,$q);
        $x=mysqli_num_rows($rs);
        if($x>0)
        {
            $r=mysqli_fetch_array($rs);
            $tamt=$r[10];
            $camt=$camt - $am;
            $tamt=$camt + $am;
            $q="update account set amount ='$camt' where acno='$ac'";
            mysqli_query($con,$q);
            $q="update account set amount ='$tamt' where acno='$tsf'";
            mysqli_query($con,$q);
            echo "<h3>after transfer $am your current balance is = $camt</h3>";
        }
        else
        echo "<h3> Invalid benificary account</h3>";
    }
    else
    echo "<h3>insufficient balance</h3>";
  }
  else
  echo "<h3>Invalid Account or pin</h3>";

}
?>
</form>
<br><br>
  