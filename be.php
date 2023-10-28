<?php
include('head.php');
?>
<form>
<center><h1>Blance Enquiry page</h1></center><hr>
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
                        <input type="text" name="pin" class="form-control">
                    </div>
                </div> <br> 
                <center><input type="submit" name="submit"  value="check balance" class="btn btn-info"></center>

</div>  
</div>
</form>
<?php
$con = mysqli_connect('localhost','root','','banking');
if(isset($_REQUEST['submit']))
{
    $ac=$_REQUEST['ac'];
    $pin=$_REQUEST['pin'];


     $q="select * from  account  where acno='$ac' && pin='$pin'";
     $rs=mysqli_query($con,$q);
     $x=mysqli_num_rows($rs);
     if($x>0)
     {
        $r=mysqli_fetch_array($rs);
        echo "<h3>total balance is $r[10]</h3>";
     }
     else
     echo "<h3>Invalid account or pin</h3>";
}

?>
<br><br><br>
</body>
</html>
