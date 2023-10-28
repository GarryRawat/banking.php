<?php
include('head.php');
?> 
<form>
<center><h1>Create Account page</h1></center><hr>
        <div class="comtainer">
            <div class="row">
               <div class="col-md-3"></div>
                <div class="col-md-6" style="border: 2px solid black; font-weight:bold; border-radius:4%; padding:40px;">
                 
                <div class="row">
                    <div class="col">
                        <b>Enter pin</b>
                        <input type="text" name="pin" class="form-control">
                    </div>
                </div>
                <div class="row">
                   <div class="col">
                        <b>Enter Name</b>
                        <input type="text" name="name" class="form-control">
                    </div>
                    <div class="col">
                        <b>Enter Fname</b>
                        <input type="text" name="fname" class="form-control">
                    </div>
                </div>
                <br><br>

                <div class="row">
                    <div class="col">
                       <b> Enter Email<b>
                        <input type="text" name="email" class="form-control">
                    </div>
                    <div class="col">
                       <b> Enter phone<b>
                        <input type="text" name="phone" class="form-control">
                    </div>
                </div>
                
                 <br>
                <div class="row">
                    <div class="col">
                       <b> Gender</b>
                        <input type="text" name="gender" class="form-control">
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col">
                        <b>country</b>
                        <input type="text" name="country" class="form-control">
                    </div>
                    <div class="col">
                       <b> State</b>
                        <input type="text" name="state" class="form-control">
                    </div>
                    <div class="col">
                        <b>city</b>
                      <input type="text" name="city" class="form-control" placeholder="select city">
                     </div>

                     <div class="row">
                    <div class="col">
                       <b> Enter Amount</b>
                        <input type="text" name="am" class="form-control">
                    </div>
                </div>
             </div><br>
             
               <center><input type="submit" name="submit"  value="create account" class="btn btn-info"></center>

             </div>

            </div>
        </div>
</form>
<?php
 $con=mysqli_connect('localhost','root','','banking');
if(isset($_REQUEST['submit']))
{
    $p=$_REQUEST['pin'];
    $n=$_REQUEST['name'];
    $f=$_REQUEST['fname'];
    $e=$_REQUEST['email'];
    $ph=$_REQUEST['phone'];
    $g=$_REQUEST['gender'];
    $co=$_REQUEST['country'];
    $s=$_REQUEST['state'];
    $c=$_REQUEST['city'];
    $am=$_REQUEST['am'];
   
    $ac="HDFC";
    $q="select * from account";
    $rs=mysqli_query($con,$q);
   
 mysqli_query($con,$q);
    $x=mysqli_num_rows($rs);
    if($x>0)
    {
        $x=$x+101;
        $ac=$ac.$x;
    }
    else
    $ac="HDFC101";
        $q="insert into account values('$ac','$p','$n','$f','$e','$ph','$g','$co','$s','$c','$am')";
    $res=mysqli_query($con,$q);
     echo "<h3>Auto Genrated Account Number = $ac";
}

?>
<br>
<br><br><br>

