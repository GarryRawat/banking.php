<?php
include('head.php');
?>
<form>
    <center>
        <h1>pin change page</h1>
    </center>
    <hr>
    <div class="comtainer">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6" style="border: 2px solid black; font-weight:bold; border-radius:4%; padding:40px;">
                <br><br>
                <div class="row">
                    <div class="col">
                        Enter account nomber
                        <input type="text" name="ac" class="form-control">
                    </div>
                    <div class="col">
                        Enter old pin
                        <input type="text" name="op" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        Enter new pin
                        <input type="text" name="np" class="form-control">
                    </div>


                </div><br>
                <center><input type="submit" name="submit" value="pin change" class="btn btn-info"></center>
            </div>

        </div>
    </div>
    </div>
</form>
<?php
$con=mysqli_connect('localhost','root','','banking');
if(isset($_REQUEST['submit']))
{
$ac=$_REQUEST['ac'];
$op=$_REQUEST['op'];
$np=$_REQUEST['np'];
$q= "select * from account where acno='$ac' && pin='$np'";

$rs=mysqli_query($con,$q);
$x=mysqli_num_rows($rs);

if($x>0)
{
    $q="update account set pin='$np' where acno='$ac'";
    mysqli_query($con,$q);
    echo "<h3>pin changed successfully</h3>";
}
else
echo "<h3>Invalid Account or pin</h3>";
}
?>