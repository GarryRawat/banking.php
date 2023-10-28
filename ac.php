<?php
include('head.php');
?>
<form>
<center><h1>account summery page</h1></center><hr>
    <div class="row">
        <div class="col-md-12"></div>

              <div class="col-md-3"></div>
                 <div class="col-md-6"  style="border: 2px solid black; font-weight:bold; border-radius:4%; padding:40px;">
                <br><br>
                <div class="row">
                    <div class="col">
                        Enter  Account Nomber
                        <input type="text" name="ac" class="form-control">
                    </div>
                </div>  
                        Enter pin
                        <input type="text" name="p" class="form-control">
                  
                    <center><input type="submit" name="submit"  value="show" class="btn btn-info"></center>
</form>
 </div>
 <div class="col-md-1"></div>
 <div class="col-md-5">
    <form>

<?php
$con = mysqli_connect('localhost','root','','banking');
if(isset($_REQUEST['submit']))
{
$ac=$_REQUEST['ac'];
$p=$_REQUEST['p'];


$q="select * from  account where acno='$ac' && pin='$p'";
$rs=mysqli_query($con,$q);
$x=mysqli_num_rows($rs);
if($x>0)
{
  $q="select * from mytrans where acno='$ac'";
  $rs=mysqli_query($con,$q);
  echo "<table class='table table-bordered table-striped table hover table-dark'>";
  echo "<tr><td>tid</td><td>acno</td><td>amount</td><td>date</td><td>des</td></tr>";
  while($r=mysqli_fetch_array($rs))
  {
  echo "<tr><td>$r[0]</td><td>$r[1]</td><td>$r[2]</td><td>$r[3]</td><td>$r[4]</td></tr>";
  }
}
else
echo "<h3>Invalid account or pin</h3>";


  }



?>
</div>
</form>
