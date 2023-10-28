<?php
include('head.php');
?>
    <form>
<center><h1>Deposit Account page</h1></center><hr>

<div class="comtainer">
            <div class="row">
              <div class="col-md-3"></div>
                 <div class="col-md-6"  style="border: 2px solid black; font-weight:bold; border-radius:4%; padding:40px;">
                <br><br>
                <div class="row">
                    <div class="col">
                        Enter  Account Nomber
                        <input type="text" name="ac" class="form-control">
                    </div>
                </div>  
                <div class="row">
                    <div class="col">
                        Enter pin
                        <input type="text" name="p" class="form-control">
                    </div>
                </div>    
                <div class="row">
                    <div class="col">
                        Amount to Deposit
                        <input type="text" name="depo" class="form-control">
                    </div>
                </div> <br>
                <center><input type="submit" name="submit"  value="deposit" class="btn btn-info"></center>

              </div>
         </div>
      </div>  

   
</form>
<?php
$con=mysqli_connect('localhost','root','','banking');
if(isset($_REQUEST['submit']))
{
    $ac=$_REQUEST['ac'];
    $p=$_REQUEST['p'];
    $depo=$_REQUEST['depo'];

    $q="select * from account where acno='$ac' && pin='$p'";
    $rs=mysqli_query($con,$q);
    date_default_timezone_set("Asia/calcutta");
  $d=date('D/M/Y');
  $t=date('h:i:s');
  $dt=$d." ".$t;
  $q="Insert into mytrans(acno,amount,dt,ds)values('$ac','$depo','$dt','deposit')";
  mysqli_query($con,$q);
    $x=mysqli_num_rows($rs);
    if($x>0)
    {
        $r=mysqli_fetch_array($rs);
        $camt=$r[10];
           $camt=$depo+$camt;
           $q="update account set amount='$camt' where acno ='$ac'";
           mysqli_query($con,$q);
           echo "<h3>After deposit $depo your current balance is =$camt</h3>";
    }
    else
    echo "invalid acno or pin";
}
?>
<br><br><br>
