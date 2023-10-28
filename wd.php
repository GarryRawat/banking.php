<?php
include('head.php');
?>
    <form>
<center><h1>Withdrawal Account page</h1></center><hr>
            <div class="row">
              <div class="col-md-3"></div>
                 <div class="col-md-6"  style="border: 2px solid black; font-weight:bold; border-radius:4%; padding:40px;">
               
                <div class="row">
                    <div class="col">
                        Enter  Account Nomber
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
                        Amount to Withdrawal
                        <input type="text" name="am" class="form-control">
                    </div>
                </div> <br>
                <center><input type="submit" name="submit"  value="withdrawal" class="btn btn-info"></center>

              </div>
         </div> 
                  
</form>
<br><br>
<?php
$con=mysqli_connect('localhost','root','','banking');
 if(isset($_REQUEST['submit']))
 {
    $ac=$_REQUEST['ac'];
    $pin=$_REQUEST['pin'];
    $am=$_REQUEST['am'];
    $q="select * from account where acno='$ac' && pin='$pin'";


      $rs=mysqli_query($con,$q);
      $x=mysqli_num_rows($rs);
      if($x>0)
      {
        $r=mysqli_fetch_array($rs);   
        $camt=$r[10];
        if($camt>=$am)
        {
            $camt=$camt-$am;
            $q="update account set amount='$camt' where  acno='$ac'";
            mysqli_query($con,$q);//or die("Could not execute ".mysqli_error($con));
            date_default_timezone_set("Asia/calcutta");
            $d=date('D/M/Y');
            $t=date('h:i:s');
            $dt=$d." ".$t;
            $q="Insert into mytrans(acno,amount,dt,ds)values('$ac','$am','$dt','withdraw')";
            mysqli_query($con,$q);
            echo "<h3> After withdrwal $am your current blance is =$camt</h3>";
        }
        else
        echo "<h3>insufficient blance</h3>";
      }
      else 
      echo "<h3>invalid account or pin</h3>";
 }
?>
<br>
<br><br><br>