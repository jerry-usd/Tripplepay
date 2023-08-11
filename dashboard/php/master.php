<?php
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

 $link=mysqli_connect('localhost','root','','tripplepay');

 if (isset($_POST['action'])) {
	$type=$_POST['action'];


if ($type=="logchk") {
if (!isset($_SESSION['loggeduser'])) {
	echo "criminal";
}

}

if ($type=="adminlogchk") {
if (!isset($_SESSION['loggedadmin'])) {
    echo "criminal";
}

}
if ($type=="red") {
if (isset($_SESSION['loggeduser'])) {
    echo "user";
}
if (isset($_SESSION['loggedadmin'])) {
    echo "admin";
}

}
if ($type=='authsignup') {
    $ref=$_POST['ref'];
   $email=$_POST['email'];
   $name=$_POST['name'];
   $epin=$_POST['epin'];
   $password=$_POST['password'];
    $query=mysqli_query($link,"SELECT * FROM login where email ='$email'");
    $query1=mysqli_query($link,"SELECT * FROM epin where epin ='$epin'  and status='sold'");
      $count1=mysqli_num_rows($query1);
    $count2=mysqli_num_rows($query);
    if ($count1 > 0) {
      if ($count2 =='0') {

        while ($res=mysqli_fetch_array($query1)) {
           $plan=$res['plan'];
          $query123=mysqli_query($link,"SELECT * FROM plans where plan ='$plan'");
        }
         while ($res23=mysqli_fetch_array($query123)) {
           $capital=$res23['capital'];
          
        }

        $date=date("Y-m-d");
         mysqli_query($link,"INSERT INTO login values('','$email','$password','user')");
          mysqli_query($link,"INSERT INTO users values('','$email',' ','$name','$plan','$epin','$date','active')");
          mysqli_query($link,"INSERT INTO balance values('','$email','$capital')");
           mysqli_query($link,"INSERT INTO investments values('','$email','$plan','$date','active')");
           mysqli_query($link,"UPDATE epin set status='used',email='$email',used='$date'");
          $_SESSION['loggeduser']=$email;
          if ($ref !== '') {
             $querym=mysqli_query($link,"SELECT * FROM users where id ='$ref'");
             while ($resm=mysqli_fetch_array($querym)) {
           $m=$resm['email'];
          
        }
             if ($plan=='starter') {
                $amm=500;
             }
              if ($plan=='hut8') {
                $amm=1500;
             }
              if ($plan=='exonum') {
                $amm=3000;
             }
              if ($plan=='veteran') {
                $amm=5000;
             }
              if ($plan=='master') {
                $amm=6000;
             }
              if ($plan=='ultimate') {
                $amm=10000;
             }
          }
          mysqli_query($link,"INSERT INTO referrals values('','$m','$name','$plan','$date')");
           mysqli_query($link,"UPDATE balance set balance= balance + ".$amm." where email='$m'");

      }
      else{
        echo 'Email Already Registered';
      }
    }
    else{
        echo 'E-pin has been used or is invalid';
    }
}
if ($type=='auth1') {

     $email=$_POST['email'];
      $password=$_POST['pass'];
    $query1=mysqli_query($link,"SELECT * from users where email='$email' ");
       $query10=mysqli_query($link,"SELECT * from investments where email='$email' and status='active'  ");
    $query2=mysqli_query($link,"SELECT * from login  where email='$email' and password='$password' ");
  
    $res1=mysqli_num_rows($query1);
     $res10=mysqli_num_rows($query10);
    $res2=mysqli_num_rows($query2);
    
  if ($res2==1) {
if ($email=='admin@gmail.com') {
         $_SESSION['loggedadmin']=$email;
   
    }
    else{
       if($res10 > 0){
 
   
        $_SESSION['loggeduser']=$email;
  
    
        }
        else{
            echo "Your Investment has been completed. Please register a new account";
        }  
    }
       

   
  
 
   

  }
else{
    echo "Invalid Email or Password";
}


}
if($type=="home") {
    $email=$_SESSION['loggeduser'];
    $query=mysqli_query($link,"SELECT * FROM balance where email ='$email'");
    $query1=mysqli_query($link,"SELECT * FROM activity where email ='$email' and verdict='correct' ");
      $query4=mysqli_query($link,"SELECT * FROM activity where email ='$email' ");
         $query40=mysqli_query($link,"SELECT * FROM activity where email ='$email' order by id desc limit 10");
    $query2=mysqli_query($link,"SELECT * FROM investments where email ='$email'");

    $count1=mysqli_num_rows($query1);
    $count2=mysqli_num_rows($query4);

    while($res=mysqli_fetch_array($query2)){
        $plan=$res['plan'];
  $query3=mysqli_query($link,"SELECT * FROM plans where plan ='$plan'");
  while($res1=mysqli_fetch_array($query3)){
        $pay=$res1['pay'];
        $amount=$res1['capital'];
        $totalpay=$res1['totalpay'];  
        $roi= number_format($res1['pay'] / $res1['capital'],2)  ;

  }
    }
while($res2=mysqli_fetch_array($query)){
$balance=$res2['balance'];
}
?>

 <div class="container-fluid">
                        <div class="nk-content-inner">
                            <div class="nk-content-body">
                                <div class="nk-block-head nk-block-head-sm">
                                    <div class="nk-block-between">
                                        <div class="nk-block-head-content">
                                            <h3 class="nk-block-title page-title">Dashboard</h3>
                                            <div class="nk-block-des text-soft">
                                                <p>Welcome to Your TripplePay Dashboard</p>
                                            </div>
                                        </div><!-- .nk-block-head-content -->
                                        <div class="nk-block-head-content">
                                            <!-- .toggle-wrap -->
                                        </div><!-- .nk-block-head-content -->
                                    </div><!-- .nk-block-between -->
                                </div><!-- .nk-block-head -->
                                <div class="nk-block">
                                    <div class="row g-gs">
                                        <div class="col-md-4">
                                            <div class="card card-bordered card-full">
                                                <div class="card-inner">
                                                    <div class="card-title-group align-start mb-0">
                                                        <div class="card-title">
                                                            <h6 class="subtitle">Balance</h6>
                                                        </div>
                                                        <div class="card-tools">
                                                            <em class="card-hint icon ni ni-help-fill" data-toggle="tooltip" data-placement="left" title="Available Balance"></em>
                                                        </div>
                                                    </div>
                                                    <div class="card-amount">
                                                        <span class="amount"> <?php echo number_format($balance,0);  ?><span class="currency currency-usd"> NGN</span>
                                                        </span>
                                                        <span class="change up text-danger"><em class="icon ni ni-arrow-long-up"></em><?php echo $roi;  ?>%</span>
                                                    </div>
                                                   
                                                </div>
                                            </div><!-- .card -->
                                        </div><!-- .col -->
                                        <div class="col-md-4">
                                            <div class="card card-bordered card-full">
                                                <div class="card-inner">
                                                    <div class="card-title-group align-start mb-0">
                                                        <div class="card-title">
                                                            <h6 class="subtitle">Total Profits</h6>
                                                        </div>
                                                        <div class="card-tools">
                                                            <em class="card-hint icon ni ni-help-fill" data-toggle="tooltip" data-placement="left" title="Total Withdraw"></em>
                                                        </div>
                                                    </div>
                                                    <div class="card-amount">
                                                        <span class="amount"> <?php  if($count1=='0'){
                                                            echo '0.00';
                                                        } else{
                                                            echo $count1 * $pay;
                                                        } ?> <span class="currency currency-usd">NGN</span>
                                                        </span>
                                                      <span class="change up text-danger"><em class="icon ni ni-arrow-long-up"></em><?php echo $roi;  ?>%</span>
                                                    </div>
                                                   
                                                </div>
                                            </div><!-- .card -->
                                        </div><!-- .col -->
                                        <div class="col-md-4">
                                            <div class="card card-bordered  card-full">
                                                <div class="card-inner">
                                                    <div class="card-title-group align-start mb-0">
                                                        <div class="card-title">
                                                            <h6 class="subtitle">Questions Answered</h6>
                                                        </div>
                                                        <div class="card-tools">
                                                            <em class="card-hint icon ni ni-help-fill" data-toggle="tooltip" data-placement="left" title="Avalable Balance"></em>
                                                        </div>
                                                    </div>
                                                    <div class="card-amount">
                                                        <span class="amount"><?php  echo $count2 ?>
                                                        </span>
                                                    </div>
                                                    
                                                </div>
                                            </div><!-- .card -->
                                        </div><!-- .col -->
                                        <div class="col-md-12 col-xxl-4">
                                            <div class="card card-bordered card-full">
                                                <div class="card-inner">
                                                    <div class="card-title-group mb-1">
                                                        <div class="card-title">
                                                            <h6 class="title">Subscription Overview</h6>
                                                            <p>The Subscription overview of your platform. </p>
                                                        </div>
                                                    </div>
                                                    <ul class="nav nav-tabs nav-tabs-card nav-tabs-xs">
                                                        <li class="nav-item">
                                                            <a class="nav-link active" data-toggle="tab" href="#overview">Overview</a>
                                                        </li>
                                                       
                                                    </ul>
                                                    <div class="tab-content mt-0">
                                                        <div class="tab-pane active" id="overview">
                                                            <div class="invest-ov gy-2">
                                                                <div class="subtitle">Currently Active Subscription</div>
                                                                 <div class="invest-ov-details">
                                                                    <div class="invest-ov-info">
                                                                        <div class="amount" style="text-transform: uppercase;"><?php echo $plan ?> <span class="currency currency-usd"></span></div>
                                                                        <div class="title">Plan</div>
                                                                    </div>
                                                                </div>
                                                                <div class="invest-ov-details">

                                                                    <div class="invest-ov-info">
                                                                        <div class="amount"> <?php echo number_format($amount,0);  ?> <span class="currency currency-usd">NGN</span></div>
                                                                        <div class="title">Amount</div>
                                                                    </div>
                                                                    <div class="invest-ov-stats">
                                                                        <div><span class="amount"><?php echo $count1 ?> / <?php echo $count2 ?></span></div>
                                                                        <div class="title">Questions Score</div>
                                                                    </div>
                                                                </div>
                                                                <div class="invest-ov-details">
                                                                    <div class="invest-ov-info">
                                                                        <div class="amount">  <?php  if($count1=='0'){
                                                            echo '0.00';
                                                        } else{
                                                            echo $count1 * $pay;
                                                        } ?> <span class="currency currency-usd">NGN</span></div>
                                                                        <div class="title">Paid Profit</div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="invest-ov gy-2">
                                                                <div class="subtitle">Expected Returns</div>
                                                                <div class="invest-ov-details">
                                                                    <div class="invest-ov-info">
                                                                        <div class="amount"> <?php echo number_format($totalpay,2);  ?><span class="currency currency-usd">NGN</span></div>
                                                                        <div class="title">Amount</div>
                                                                    </div>
                                                                    <div class="invest-ov-stats">
                                                                        <div><span class="amount"> <?php 
                                                                        if ($plan=='starter' || $plan=='hut8' ) {
                                                                           echo '6';
                                                                        }
                                                                        else{
                                                                            echo '12';
                                                                        }
                                                                         ?></span><span class="change down text-danger"></span></div>
                                                                        
                                                                        <div class="title">Questions</div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                      
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- .col -->
                                        <!--<div class="col-md-6 col-xxl-4">
                                            <div class="card card-bordered card-full">
                                                <div class="card-inner d-flex flex-column h-100">
                                                    <div class="card-title-group mb-3">
                                                        <div class="card-title">
                                                            <h6 class="title">Top Invested Plan</h6>
                                                            <p>In last 30 days top invested schemes.</p>
                                                        </div>
                                                        <div class="card-tools mt-n4 mr-n1">
                                                            <div class="drodown">
                                                                <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                                <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                                                    <ul class="link-list-opt no-bdr">
                                                                        <li><a href="#"><span>15 Days</span></a></li>
                                                                        <li><a href="#" class="active"><span>30 Days</span></a></li>
                                                                        <li><a href="#"><span>3 Months</span></a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="progress-list gy-3">
                                                        <div class="progress-wrap">
                                                            <div class="progress-text">
                                                                <div class="progress-label">Strater Plan</div>
                                                                <div class="progress-amount">58%</div>
                                                            </div>
                                                            <div class="progress progress-md">
                                                                <div class="progress-bar" data-progress="58"></div>
                                                            </div>
                                                        </div>
                                                        <div class="progress-wrap">
                                                            <div class="progress-text">
                                                                <div class="progress-label">Silver Plan</div>
                                                                <div class="progress-amount">18.49%</div>
                                                            </div>
                                                            <div class="progress progress-md">
                                                                <div class="progress-bar bg-orange" data-progress="18.49"></div>
                                                            </div>
                                                        </div>
                                                        <div class="progress-wrap">
                                                            <div class="progress-text">
                                                                <div class="progress-label">Dimond Plan</div>
                                                                <div class="progress-amount">16%</div>
                                                            </div>
                                                            <div class="progress progress-md">
                                                                <div class="progress-bar bg-teal" data-progress="16"></div>
                                                            </div>
                                                        </div>
                                                        <div class="progress-wrap">
                                                            <div class="progress-text">
                                                                <div class="progress-label">Platinam Plan</div>
                                                                <div class="progress-amount">29%</div>
                                                            </div>
                                                            <div class="progress progress-md">
                                                                <div class="progress-bar bg-pink" data-progress="29"></div>
                                                            </div>
                                                        </div>
                                                        <div class="progress-wrap">
                                                            <div class="progress-text">
                                                                <div class="progress-label">Vibranium Plan</div>
                                                                <div class="progress-amount">33%</div>
                                                            </div>
                                                            <div class="progress progress-md">
                                                                <div class="progress-bar bg-azure" data-progress="33"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="invest-top-ck mt-auto">
                                                        <canvas class="iv-plan-purchase" id="planPurchase"></canvas>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>-->
                                      
                                        <div class="col-xl-12 col-xxl-8">
                                            <div class="card card-bordered card-full">
                                                <div class="card-inner border-bottom">
                                                    <div class="card-title-group">
                                                        <div class="card-title">
                                                            <h6 class="title">Recent Activities</h6>
                                                        </div>
                                                        <div class="card-tools">
                                                            <a href="#" class="link">View All</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="nk-tb-list">
                                                    <div class="nk-tb-item nk-tb-head">
                                                        <div class="nk-tb-col"><span>#ID</span></div>
                                                        <div class="nk-tb-col tb-col-sm"><span>Type</span></div>
                                                        <div class="nk-tb-col tb-col-lg"><span>Date</span></div>
                                                        <div class="nk-tb-col"><span>Amount</span></div>
                                                        <div class="nk-tb-col tb-col-sm">Status</div>
                                                     
                                                    </div>

                                                    <?php
                                                    while($res10=mysqli_fetch_array($query40)){
                                                        ?>

                                                         <div class="nk-tb-item">
                                                        <div class="nk-tb-col">
                                                           <?php  echo $res10['id']?>
                                                        </div>
                                                        <div class="nk-tb-col tb-col-sm">
                                                           Activity
                                                        </div>
                                                        <div class="nk-tb-col tb-col-lg">
                                                             <?php  echo $res10['cdate']?>
                                                        </div>
                                                        <div class="nk-tb-col">
                                                            <span class="tb-sub tb-amount"> <?php  echo $pay?><span> NGN</span></span>
                                                        </div>
                                                        <div class="nk-tb-col tb-col-sm" >
                                                            <?php  echo $res10['status']?>
                                                        </div>
                                                          <div class="nk-tb-col tb-col-sm"  style="color: <?php if ($res10['verdict']=='correct'){echo 'green';} else{echo 'crimson';}?>">
                                                            <?php  echo $res10['verdict']?>
                                                        </div>
                                                      
                                                    </div>

                                                        <?php
                                                    }
                                                    ?>

                                                   
                                                
                                                </div>
                                            </div><!-- .card -->
                                        </div><!-- .col -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
<?php
}

if ($type=='act') {
  $email=$_SESSION['loggeduser'];
$query=mysqli_query($link,"SELECT * from questions  where id='1'");
$query1=mysqli_query($link,"SELECT * from investments  where email='$email' and status='active'");
$row=mysqli_num_rows($query1);



$query100=mysqli_query($link,"SELECT * from activity  where email='$email' ");
$row10=mysqli_num_rows($query100);

$query100=mysqli_query($link,"SELECT * from users  where email='$email' ");
while ($resd=mysqli_fetch_array($query100)) {
   $plan=$resd['plan'];
}
 $jam=false;
if($plan=='starter' || $plan=='hut8'  ){
        if ($row10 == 6) {
            $jam=true;
        }
}else{


if ($row10 == 9) {
             $jam=true;
        }

}

?>

 <div class="container-fluid">
                        <div class="nk-content-inner">
                            <div class="nk-content-body">
                                <div class="nk-block-head nk-block-head-sm">
                                    <div class="nk-block-between">
                                        <div class="nk-block-head-content">
                                            <h3 class="nk-block-title page-title">Activities</h3>
                                            <div class="nk-block-des text-soft">
                                                <p>Welcome to Your TripplePay Dashboard</p>
                                            </div>
                                        </div><!-- .nk-block-head-content -->
                                        <div class="nk-block-head-content">
                                            <!-- .toggle-wrap -->
                                        </div><!-- .nk-block-head-content -->
                                    </div><!-- .nk-block-between -->
                                </div><!-- .nk-block-head -->
                                <div class="nk-block mt-5 pt-5">
                                    <div class="row g-gs">
                                        <div class="col-xl-12 col-xxl-12 mt-5 pt-5">
                                            <?php  
                                           
                                            if ($jam == false) {
                                                 if (date('l')=='Monday' || date('l')=='Wednesday' || date('l')=='Sunday'  ) {
                                                if (!isset($_COOKIE['check'])) {

                                                    while ($res=mysqli_fetch_array($query)) {
                                               
                                                ?>
                                              <center>
                                                <input id="ans1" type="hidden" name="" value="<?php  echo $res['answer']; ?>">
                                        <div  class="card-bordered card-full p-5" style="background:white">
                                       <h4 class="mb-5"> Available Question</h4> 
                                       <h5 class="text-soft mb-4"><?php  echo $res['question'] ?></h5>
                                      <span class="p-2 mr-2 opt" id="opt1" onclick="opt(1)"> <?php  echo $res['option1'] ?></span> <span class="p-2 mr-2 opt" id="opt2" onclick="opt(2)"> <?php  echo $res['option2'] ?></span>   <span class="p-2 mr-2 opt" id="opt3" onclick="opt(3)"> <?php  echo $res['option3'] ?></span>   <span class="p-2 mr-2 opt" id="opt4" onclick="opt(4)"> <?php  echo $res['option4'] ?></span> <input type="hidden" name="" id="ans">
                        <br><br><span class="btn btn-primary js-tilt" href="#" role="button" data-tilt-perspective="300" data-tilt-speed="700" data-tilt-max="24" onclick="suba(document.getElementById('ans').value,'<?php  echo $res['id'] ?>'); this.style.display='none'"><span>Submit</span></span> <p id="res"></p>
                                     </div>
                                    </center>


                                             <?php
                                            }
                                                }
                                                else{
                                                     ?>

                                                <h6 class="mb-5" style="text-align:center;">You Have Already Answered the Available Question</h6>
                                                <?php
                                                }
                                           
                                            
                                            }
                                            else{
                                                ?>

                                                <h6 class="mb-5" style="text-align:center;">No Available Question For Today</h6>
                                                <?php
                                            }
                                            }
                                            else{
                                                 ?>

                                                <h6 class="mb-5" style="text-align:center;">Your Plan has been Exhausted</h6>
                                                <div class="col-sm-6">
                                                    <div class="card p-5">
                                                        <h5>Renew / Upgrade Plan</h5>
                                                        <div class="form-group mb-2">
                                                            <label class="mb-2">New E-pin</label>
                                                            <input type="number" name="" class="form-control" id="repin">

                                                        </div>
                                                        <button class="btn btn-primary" onclick="repin(document.getElementById('repin').value,'<?php echo $email ?>',this); this.disabled=true; ">Proceed</button>
                                                    </div>
                                                </div>
                                                <?php
                                            }
                                           
                                            ?>
                                           
                                        </div>
                                   
                                     
                                      
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
<?php
  }
  if ($type=='repin') {
      $pin=$_POST['epin'];
      $email=$_POST['email'];
       $query=mysqli_query($link,"SELECT * FROM epin WHERE epin='$pin'");
      while ($res=mysqli_fetch_array($query)) {
          $plan=$res['plan'];
         $queryl=mysqli_query($link,"SELECT * FROM plans WHERE plan='$plan'");
          while ($resl=mysqli_fetch_array($queryl)) {
          $capital=$resl['capital'];
       
      }
      }
      $date=date("Y-m-d");
             mysqli_query($link,"UPDATE users set plan='$plan',epin='$pin',status='active' where email='$email'");
          
          mysqli_query($link,"UPDATE balance set balance='$capital' where email='$email'");
           mysqli_query($link,"UPDATE investments set status='active', started='$date' where email='$email'");
           mysqli_query($link,"UPDATE epin set status='used',email='$email',used='$date' where epin='$pin'");
             mysqli_query($link,"DELETE FROM activity where email='$email'");
             echo "done";
  }
  if ($type=='subque') {
      $ress=$_POST['res'];
      $que=$_POST['que'];
      $email=$_SESSION['loggeduser'];
      $query=mysqli_query($link,"SELECT * FROM investments WHERE email='$email'");
      while ($res=mysqli_fetch_array($query)) {
          $plan=$res['plan'];
         
      }

       $query1=mysqli_query($link,"SELECT * FROM plans WHERE plan='$plan'");

      while ($resq=mysqli_fetch_array($query1)) {
          $pay=$resq['pay'];
           $cap=$resq['capital'];
      }
      $date=date("Y-m-d");
      mysqli_query($link,"INSERT INTO activity values('','$email','$plan','$que','$date','answered','$ress')");
       $query2=mysqli_query($link,"SELECT * FROM activity WHERE status='answered' and email='$email' and verdict='correct'");
       setcookie("check", " ", time() + (86400 * 30), "/");
       $row=mysqli_num_rows($query2);
      if ($ress=='correct') {
        $nb=$pay * $row;
        mysqli_query($link,"UPDATE balance set balance=".$cap." + ".$nb." where email='$email' ");
      }
   
  }
  if ($type=='tran') {
    $email=$_SESSION['loggeduser'];
    $query4=  mysqli_query($link,"SELECT * FROM activity where email='$email'");
        $query2=mysqli_query($link,"SELECT * FROM investments where email ='$email'");
    while($res=mysqli_fetch_array($query2)){
        $plan=$res['plan'];
  $query3=mysqli_query($link,"SELECT * FROM plans where plan ='$plan'");
  while($res1=mysqli_fetch_array($query3)){
        $pay=$res1['pay'];
        $amount=$res1['capital'];
        $totalpay=$res1['totalpay'];  
        $roi= number_format($res1['pay'] / $res1['capital'],2)  ;

  }
    }

    ?>


 <div class="container-fluid">
                        <div class="nk-content-inner">
                            <div class="nk-content-body">
                                <div class="nk-block-head nk-block-head-sm">
                                    <div class="nk-block-between">
                                        <div class="nk-block-head-content">
                                            <h3 class="nk-block-title page-title">Transactions</h3>
                                            <div class="nk-block-des text-soft">
                                                <p>Welcome to Your TripplePay Dashboard</p>
                                            </div>
                                        </div><!-- .nk-block-head-content -->
                                        <div class="nk-block-head-content">
                                            <!-- .toggle-wrap -->
                                        </div><!-- .nk-block-head-content -->
                                    </div><!-- .nk-block-between -->
                                </div><!-- .nk-block-head -->
                                <div class="nk-block">
                                    <div class="row g-gs">
                                      
                                      
                                        <div class="col-xl-12 col-xxl-8">
                                            <div class="card card-bordered card-full">
                                                <div class="card-inner border-bottom">
                                                    <div class="card-title-group">
                                                        <div class="card-title">
                                                            <h6 class="title">Recent Activities</h6>
                                                        </div>
                                                        <div class="card-tools">
                                                      
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="nk-tb-list">
                                                    <div class="nk-tb-item nk-tb-head">
                                                        <div class="nk-tb-col"><span>#ID</span></div>
                                                        <div class="nk-tb-col tb-col-sm"><span>Type</span></div>
                                                        <div class="nk-tb-col tb-col-lg"><span>Date</span></div>
                                                        <div class="nk-tb-col"><span>Amount</span></div>
                                                        <div class="nk-tb-col tb-col-sm">Status</div>
                                                     
                                                    </div>

                                                    <?php
                                                    while($res10=mysqli_fetch_array($query4)){
                                                        ?>

                                                         <div class="nk-tb-item">
                                                        <div class="nk-tb-col">
                                                           <?php  echo $res10['id']?>
                                                        </div>
                                                        <div class="nk-tb-col tb-col-sm">
                                                           Activity
                                                        </div>
                                                        <div class="nk-tb-col tb-col-lg">
                                                             <?php  echo $res10['cdate']?>
                                                        </div>
                                                        <div class="nk-tb-col">
                                                            <span class="tb-sub tb-amount"> <?php  echo $pay?><span> NGN</span></span>
                                                        </div>
                                                        <div class="nk-tb-col tb-col-sm" >
                                                            <?php  echo $res10['status']?>
                                                        </div>
                                                          <div class="nk-tb-col tb-col-sm"  style="color: <?php if ($res10['verdict']=='correct'){echo 'green';} else{echo 'crimson';}?>">
                                                            <?php  echo $res10['verdict']?>
                                                        </div>
                                                      
                                                    </div>

                                                        <?php
                                                    }
                                                    ?>

                                                   
                                                
                                                </div>
                                            </div><!-- .card -->
                                        </div><!-- .col -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
    <?php
  }
  if ($type=='withdraw') {
      $email=$_SESSION['loggeduser'];
    $query4=  mysqli_query($link,"SELECT * FROM activity where email='$email'");
        $query2=mysqli_query($link,"SELECT * FROM investments where email ='$email'");
    while($res=mysqli_fetch_array($query2)){
        $plan=$res['plan'];
  $query3=mysqli_query($link,"SELECT * FROM plans where plan ='$plan'");
  while($res1=mysqli_fetch_array($query3)){
        $pay=$res1['pay'];
        $amount=$res1['capital'];
        $totalpay=$res1['totalpay'];  
        $roi= number_format($res1['pay'] / $res1['capital'],2)  ;

  }
   $query30=mysqli_query($link,"SELECT * FROM balance where email='$email'");
  while($res10=mysqli_fetch_array($query30)){
        $bal=$res10['balance'];
       

  }
    }
    $count1=mysqli_num_rows($query4);
   
      $queryy=mysqli_query($link,"SELECT * FROM withdrawal where email='$email' and status='processing'");
    $numm=mysqli_num_rows($queryy);
   
   ?>
<div class="container-fluid">
                        <div class="nk-content-inner">
                            <div class="nk-content-body">
                                <div class="nk-block-head nk-block-head-sm">
                                    <div class="nk-block-between">
                                        <div class="nk-block-head-content">
                                            <h3 class="nk-block-title page-title">Withdraw</h3>
                                            <div class="nk-block-des text-soft">
                                                <p>You Can Withdraw Your Funds</p>
                                            </div>
                                        </div><!-- .nk-block-head-content -->
                                        <div class="nk-block-head-content">
                                            <!-- .toggle-wrap -->
                                        </div><!-- .nk-block-head-content -->
                                    </div><!-- .nk-block-between -->
                                </div><!-- .nk-block-head -->
                                <div class="nk-block">
                                    <div class="row g-gs">
                                      <?php  


                                         if ($plan=='starter' || $plan=='hut8') {
                                            if ($count1 == 6) {
                                                         if ($numm == 0) {
      ?>
         <div class="col-xl-12 col-xxl-8">
                                            <div class="card card-bordered card-full">
                                                <div class="card-inner border-bottom">
                                                    <div class="card-title-group">
                                                        <div class="card-title">
                                                            <h6 class="title">Withdraw Funds</h6>
                                                        </div>
                                                        <div class="card-tools">
                                                      
                                                        </div>
                                                    </div>
                                                </div>
                                               <form class="p-5">
                                                <div class="row">
                                                    <div class="col-sm-6 mb-3">
                                                        <div class="form-group">
                                                       <label class="mb-3">Bank</label>
                                                          <select class="form-control" id="bank">
                                                                
                                                        <option value="801">Abbey Mortgage Bank</option>

                                                        <option value="044">Access Bank</option>

                                                        <option value="063">Access Bank (Diamond)</option>

                                                        <option value="035A">ALAT by WEMA</option>

                                                        <option value="50926">Amju Unique MFB</option>

                                                        <option value="401">ASO Savings and Loans</option>

                                                        <option value="51229">Bainescredit MFB</option>

                                                        <option value="50931">Bowen Microfinance Bank</option>

                                                        <option value="565">Carbon</option>

                                                        <option value="50823">CEMCS Microfinance Bank</option>

                                                        <option value="023">Citibank Nigeria</option>

                                                        <option value="559">Coronation Merchant Bank</option>

                                                        <option value="050">Ecobank Nigeria</option>

                                                        <option value="562">Ekondo Microfinance Bank</option>

                                                        <option value="50126">Eyowo</option>

                                                        <option value="070">Fidelity Bank</option>

                                                        <option value="51314">Firmus MFB</option>

                                                        <option value="011">First Bank of Nigeria</option>

                                                        <option value="214">First City Monument Bank</option>

                                                        <option value="501">FSDH Merchant Bank Limited</option>

                                                        <option value="00103">Globus Bank</option>

                                                        <option value="232">GoMoney</option>

                                                        <option value="058">Guaranty Trust Bank</option>

                                                        <option value="51251">Hackman Microfinance Bank</option>

                                                        <option value="50383">Hasal Microfinance Bank</option>

                                                        <option value="030">Heritage Bank</option>

                                                        <option value="51244">Ibile Microfinance Bank</option>

                                                        <option value="50457">Infinity MFB</option>

                                                        <option value="301">Jaiz Bank</option>

                                                        <option value="082">Keystone Bank</option>

                                                        <option value="50211">Kuda Bank</option>

                                                        <option value="90052">Lagos Building Investment Company Plc.</option>

                                                        <option value="50549">Links MFB</option>

                                                        <option value="50563">Mayfair MFB</option>

                                                        <option value="50304">Mint MFB</option>

                                                        <option value="999991">PalmPay</option>

                                                        <option value="526">Parallex Bank</option>

                                                        <option value="311">Parkway - ReadyCash</option>

                                                        <option value="999992">Paycom</option>

                                                        <option value="50746">Petra Mircofinance Bank Plc</option>

                                                        <option value="076">Polaris Bank</option>

                                                        <option value="101">Providus Bank</option>

                                                        <option value="502">Rand Merchant Bank</option>

                                                        <option value="125">Rubies MFB</option>

                                                        <option value="51310">Sparkle Microfinance Bank</option>

                                                        <option value="221">Stanbic IBTC Bank</option>

                                                        <option value="068">Standard Chartered Bank</option>

                                                        <option value="232">Sterling Bank</option>

                                                        <option value="100">Suntrust Bank</option>

                                                        <option value="302">TAJ Bank</option>

                                                        <option value="51211">TCF MFB</option>

                                                        <option value="102">Titan Bank</option>

                                                        <option value="032">Union Bank of Nigeria</option>

                                                        <option value="033">United Bank For Africa</option>

                                                        <option value="215">Unity Bank</option>

                                                        <option value="566">VFD Microfinance Bank Limited</option>

                                                        <option value="035">Wema Bank</option>

                                                        <option value="057">Zenith Bank</option>
                                                                
                                                            </select>
            <span style="font-size:.8em"> <span class="iconify mr-2" data-icon="gg:danger" style="color: crimson;"></span> You can only add a bank Account with your name</span>
                                                               
                                                   </div>
                                                    </div>
                                                    <div class="col-sm-3 mb-3">
                                                        <label class="mb-3">Account Number</label>
                                                        <input type="text" name="" class="form-control" id="number">
                                                    </div>

                                                     <div class="col-sm-3 mb-3 pt-4">
                                                       <button class="btn btn-primary mt-3" type="button" onclick="
                                                       acctv(); this.innerHTML='Verifying'; this.innerHTML='Veriying...'; this.disabled=true;
                                                      " id="widt">Verify</button>
                                                    </div>
                                                     <div class="col-sm-8">
                                                     <div class="form-group mt-3">
                                                    <label class="mb-3">Account name</label>
                                                    <input type="text" name="" disabled class="form-control" id="aname">
                                                </div>
                                                </div>


                                                </div>
                                               
                                               <div style="display:none; width: 70%;" id="with2">
                                                   

                                                <div class="form-group mt-3">
                                                    <label class="mb-2">Amount</label>
                                                    <div class="input-group mb-1">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">NGN </span>
                                                    </div>
                                                    <input type="text" class="form-control" placeholder="0.00" required oninput="bc(this.value)" id="bvc" >
                                                </div>
                                                <small class="mt-3">Balance: NGN <span> <b id="cvg"><?php echo $bal ?></b> </span></small>
                                                </div>
                                                <center>  <button class="btn btn-primary mt-3 btn-lg" style="width: 200px; display: block; text-align:center;" disabled="" id="kjh" onclick="sendw(this,document.getElementById('bvc').value); this.innerHTML='Sending Withdrawal..';" type="button"> <center>Send Withdrawal</center> </button></center>

                                               </div>
                                                   
                                               </form>
                                            </div><!-- .card -->
                                        </div>


      <?php
    }

    else{
?>
<center><h5>Your Withdrawal is still being processed</h5></center>
<?php
    }
                                            }
                                            else{
?>
<center><h5>You still have an active plan</h5></center>
<?php
    }

                             
    
       

    }
   

                                         else  {
                                            if ($count1 == 12) {
                                                         if ($numm == 0) {
      ?>
         <div class="col-xl-12 col-xxl-8">
                                            <div class="card card-bordered card-full">
                                                <div class="card-inner border-bottom">
                                                    <div class="card-title-group">
                                                        <div class="card-title">
                                                            <h6 class="title">Withdraw Funds</h6>
                                                        </div>
                                                        <div class="card-tools">
                                                      
                                                        </div>
                                                    </div>
                                                </div>
                                               <form class="p-5">
                                                <div class="row">
                                                    <div class="col-sm-6 mb-3">
                                                        <div class="form-group">
                                                       <label class="mb-3">Bank</label>
                                                          <select class="form-control" id="bank">
                                                                
                                                        <option value="801">Abbey Mortgage Bank</option>

                                                        <option value="044">Access Bank</option>

                                                        <option value="063">Access Bank (Diamond)</option>

                                                        <option value="035A">ALAT by WEMA</option>

                                                        <option value="50926">Amju Unique MFB</option>

                                                        <option value="401">ASO Savings and Loans</option>

                                                        <option value="51229">Bainescredit MFB</option>

                                                        <option value="50931">Bowen Microfinance Bank</option>

                                                        <option value="565">Carbon</option>

                                                        <option value="50823">CEMCS Microfinance Bank</option>

                                                        <option value="023">Citibank Nigeria</option>

                                                        <option value="559">Coronation Merchant Bank</option>

                                                        <option value="050">Ecobank Nigeria</option>

                                                        <option value="562">Ekondo Microfinance Bank</option>

                                                        <option value="50126">Eyowo</option>

                                                        <option value="070">Fidelity Bank</option>

                                                        <option value="51314">Firmus MFB</option>

                                                        <option value="011">First Bank of Nigeria</option>

                                                        <option value="214">First City Monument Bank</option>

                                                        <option value="501">FSDH Merchant Bank Limited</option>

                                                        <option value="00103">Globus Bank</option>

                                                        <option value="232">GoMoney</option>

                                                        <option value="058">Guaranty Trust Bank</option>

                                                        <option value="51251">Hackman Microfinance Bank</option>

                                                        <option value="50383">Hasal Microfinance Bank</option>

                                                        <option value="030">Heritage Bank</option>

                                                        <option value="51244">Ibile Microfinance Bank</option>

                                                        <option value="50457">Infinity MFB</option>

                                                        <option value="301">Jaiz Bank</option>

                                                        <option value="082">Keystone Bank</option>

                                                        <option value="50211">Kuda Bank</option>

                                                        <option value="90052">Lagos Building Investment Company Plc.</option>

                                                        <option value="50549">Links MFB</option>

                                                        <option value="50563">Mayfair MFB</option>

                                                        <option value="50304">Mint MFB</option>

                                                        <option value="999991">PalmPay</option>

                                                        <option value="526">Parallex Bank</option>

                                                        <option value="311">Parkway - ReadyCash</option>

                                                        <option value="999992">Paycom</option>

                                                        <option value="50746">Petra Mircofinance Bank Plc</option>

                                                        <option value="076">Polaris Bank</option>

                                                        <option value="101">Providus Bank</option>

                                                        <option value="502">Rand Merchant Bank</option>

                                                        <option value="125">Rubies MFB</option>

                                                        <option value="51310">Sparkle Microfinance Bank</option>

                                                        <option value="221">Stanbic IBTC Bank</option>

                                                        <option value="068">Standard Chartered Bank</option>

                                                        <option value="232">Sterling Bank</option>

                                                        <option value="100">Suntrust Bank</option>

                                                        <option value="302">TAJ Bank</option>

                                                        <option value="51211">TCF MFB</option>

                                                        <option value="102">Titan Bank</option>

                                                        <option value="032">Union Bank of Nigeria</option>

                                                        <option value="033">United Bank For Africa</option>

                                                        <option value="215">Unity Bank</option>

                                                        <option value="566">VFD Microfinance Bank Limited</option>

                                                        <option value="035">Wema Bank</option>

                                                        <option value="057">Zenith Bank</option>
                                                                
                                                            </select>
            <span style="font-size:.8em"> <span class="iconify mr-2" data-icon="gg:danger" style="color: crimson;"></span> You can only add a bank Account with your name</span>
                                                               
                                                   </div>
                                                    </div>
                                                    <div class="col-sm-3 mb-3">
                                                        <label class="mb-3">Account Number</label>
                                                        <input type="text" name="" class="form-control" id="number">
                                                    </div>

                                                     <div class="col-sm-3 mb-3 pt-4">
                                                       <button class="btn btn-primary mt-3" type="button" onclick="
                                                       acctv(); this.innerHTML='Verifying'; this.innerHTML='Veriying...'; this.disabled=true;
                                                      " id="widt">Verify</button>
                                                    </div>
                                                     <div class="col-sm-8">
                                                     <div class="form-group mt-3">
                                                    <label class="mb-3">Account name</label>
                                                    <input type="text" name="" disabled class="form-control" id="aname">
                                                </div>
                                                </div>


                                                </div>
                                               
                                               <div style="display:none; width: 70%;" id="with2">
                                                   

                                                <div class="form-group mt-3">
                                                    <label class="mb-2">Amount</label>
                                                    <div class="input-group mb-1">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">NGN </span>
                                                    </div>
                                                    <input type="text" class="form-control" placeholder="0.00" required oninput="bc(this.value)" id="bvc" >
                                                </div>
                                                <small class="mt-3">Balance: NGN <span> <b id="cvg"><?php echo $bal ?></b> </span></small>
                                                </div>
                                                <center>  <button class="btn btn-primary mt-3 btn-lg" style="width: 200px; display: block; text-align:center;" disabled="" id="kjh" onclick="sendw(this,document.getElementById('bvc').value); this.innerHTML='Sending Withdrawal..';" type="button"> <center>Send Withdrawal</center> </button></center>

                                               </div>
                                                   
                                               </form>
                                            </div><!-- .card -->
                                        </div>


      <?php
    }

    else{
?>
<center><h5>Your Withdrawal is still being processed</h5></center>
<?php
    }
                                            }
                                            else{
?>
<center><h5>You still have an active plan</h5></center>
<?php
    }

                             
    
       

    }
                                      ?>
                                      
                                     <!-- .col -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
   <?php
  }
  if ($type=='verifyacct') {
     
    $bank=$_POST['bank'];
    $acct=$_POST['acct'];


        $email=$_SESSION['loggeduser'];
        $query=mysqli_query($link,"SELECT * FROM users where email='$email'");
        while ($res=mysqli_fetch_array($query)) {
            $lo=explode(" ", $res['full_name']);
        $firstname= strtoupper($lo[0]);
        $lastname= strtoupper($lo[1]);
        }
       
          $curl = curl_init();
  
  curl_setopt_array($curl, array(
    CURLOPT_URL => "https://api.paystack.co/bank/resolve?account_number=".$acct."&bank_code=".$bank,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => array(
      "Authorization: Bearer sk_live_7181693d7332734def1004dc5f53e3cbf485771c",
      "Cache-Control: no-cache",
    ),
  ));
  
  $response = curl_exec($curl);
  $err = curl_error($curl);
  
  curl_close($curl);
  
  if ($err) {
   
  } else {
    
  }
  $balanceJ=json_decode($response,true);
  $statusw=$balanceJ['status'];
 if (!$statusw) {
   echo 'kk';
 }
 else{
    $hh=$balanceJ['data']['account_name'];
    $tt=(explode(" ",$hh));

    if ($firstname==$tt[0] || $lastname==$tt[2] || $firstname==$tt[1] || $firstname==$tt[2]) {
        echo $hh;
    }

else{
    echo 'kk';
}
 }


  }
  if ($type=='sendw') {

   $email=$_SESSION['loggeduser'];
     $bank=$_POST['bank'];
     $num=$_POST['num'];
    $amt=$_POST['amt'];
  

mysqli_query($link,"INSERT into  withdrawal values('','$email','$amt','$bank','$num','processing') ");


  }
  if ($type=='profile') {
      $email=$_SESSION['loggeduser'];
         $query=mysqli_query($link,"SELECT * FROM users where email='$email'");
        while ($res=mysqli_fetch_array($query)) {
          
        $firstname= $res['full_name'];
        $phone=$res['phone'];
        $plan=$res['plan'];
        
        }

         $query1=mysqli_query($link,"SELECT * FROM login where email='$email'");
        while ($res1=mysqli_fetch_array($query1)) {
      $passs=$res1['password'];
        
        }




      ?>
<input type="hidden" name="" value="<?php echo $passs ?>" id="pass5">
<div class="container-fluid">
                        <div class="nk-content-inner">
                            <div class="nk-content-body">
                                <div class="nk-block-head nk-block-head-sm">
                                    <div class="nk-block-between">
                                        <div class="nk-block-head-content">
                                            <h3 class="nk-block-title page-title">Profile</h3>
                                            <div class="nk-block-des text-soft">
                                                <p>You Can Update Your Profile Details</p>
                                            </div>
                                        </div><!-- .nk-block-head-content -->
                                        <div class="nk-block-head-content">
                                            <!-- .toggle-wrap -->
                                        </div><!-- .nk-block-head-content -->
                                    </div><!-- .nk-block-between -->
                                </div><!-- .nk-block-head -->
                                <div class="nk-block">
                                    <div class="row g-gs">
                                     <div class="col-sm-8">
                                         <form class="card p-5">
                                             <div class="form-group mb-3">
                                                 <label class="mb-3">
                                                     Full_Name
                                                 </label>
                                                 <input type="text" name="" class="form-control" value="<?php echo $firstname ?>" id="fn">
                                             </div>
                                              <div class="form-group mb-3">
                                                 <label class="mb-3">
                                                     Phone
                                                 </label>
                                                 <input type="text" name="" class="form-control" value="<?php echo $phone ?>" id="ph">
                                             </div>
                                              <div class="form-group mb-3">
                                                 <label class="mb-3">
                                                    Email
                                                 </label>
                                                 <input type="text" name="" class="form-control" value="<?php echo $email ?>" readonly>
                                             </div>
                                              <div class="form-group mb-3">
                                                 <label class="mb-3">
                                                     Plan
                                                 </label>
                                                 <input type="text" name="" class="form-control" readonly="" value="<?php echo $plan ?>">
                                             </div>
                                              <button class="btn btn-primary mt-3" type="button" id="widt" style="width:100px" onclick="updd(document.getElementById('fn').value,document.getElementById('ph').value); this.innerHTML='updating..';">Update</button>
                                         </form>
                                     </div>
                                     <div class="col-sm-4 ">
                                        <div class="card p-5">
                                            <div class="form-group mb-4">
                                                 <label class="mb-2">
                                                    Old  Password
                                                 </label>
                                                 <input type="password" name="" class="form-control" oninput ="pass()" id="pass" >
                                             </div>
                                              <div class="form-group mb-4">
                                                 <label class="mb-2">
                                                     New Password
                                                 </label>
                                                 <input type="password" name="" class="form-control"  oninput ="pass()" id="pass1" >
                                             </div>
                                              <div class="form-group mb-4">
                                                 <label class="mb-2">
                                                    Retype Password
                                                 </label>
                                                 <input type="password" name="" class="form-control"  oninput ="pass()" id="pass2"  >
                                             </div>
                                             <button class="btn btn-primary mt-3" type="button" id="widthh" style="width:200px" disabled="" onclick="pass1(); this.innerHTML='Password Changed'">Change Password</button>
                                        </div>
                                          
                                     </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
      <?php
  }
  if ($type=='updd') {
     $fname=$_POST['fname'];
    $phone=$_POST['phone'];
    $email=$_SESSION['loggeduser'];
    mysqli_query($link,"UPDATE users set full_name ='$fname',phone='$phone' where email='$email'");

  }
  if ($type=='upddd') {
        $email=$_SESSION['loggeduser'];

     $fname=$_POST['fname'];
   
    mysqli_query($link,"UPDATE login set password ='$fname' where email='$email'");

  }
    if ($type=='updddd') {
        $email=$_SESSION['loggedadmin'];

     $fname=$_POST['fname'];
   
    mysqli_query($link,"UPDATE login set password ='$fname' where email='$email'");

  }
  if ($type=='logout') {

        session_destroy();

  }
  if ($type=='namem') {
    $email=$_SESSION['loggeduser'];
         $query=mysqli_query($link,"SELECT * FROM users where email='$email'");
        while ($res=mysqli_fetch_array($query)) {
          
       echo $res['full_name'];
               }

  }
if ($type=='adminhome') {

 
 $query=mysqli_query($link,"SELECT * FROM users  ");
  $quer=mysqli_query($link,"SELECT * FROM vendors  ");

 $query40=mysqli_query($link,"SELECT * FROM users order by id desc limit 20  ");
 $count=mysqli_num_rows($query);
 $query1 = mysqli_query($link,'SELECT sum(balance) FROM balance');
$row = mysqli_fetch_row($query1);
$sum = $row[0];
$query2=mysqli_query($link,"SELECT * FROM withdrawal ");
 $count2=mysqli_num_rows($query2);
 $query3=mysqli_query($link,"SELECT * FROM questions ");
 $count3=mysqli_num_rows($query3);

 ?>

<div class="container-fluid">
                        <div class="nk-content-inner">
                            <div class="nk-content-body">
                                <div class="nk-block-head nk-block-head-sm">
                                    <div class="nk-block-between">
                                        <div class="nk-block-head-content">
                                            <h3 class="nk-block-title page-title">Admin Dashboard</h3>
                                            <div class="nk-block-des text-soft">
                                                <p>Welcome to Your TripplePay Admin Dashboard</p>
                                            </div>
                                        </div><!-- .nk-block-head-content -->
                                        <div class="nk-block-head-content">
                                            <!-- .toggle-wrap -->
                                        </div><!-- .nk-block-head-content -->
                                    </div><!-- .nk-block-between -->
                                </div><!-- .nk-block-head -->
                                <div class="nk-block">
                                    <div class="row g-gs">
                                        <div class="col-md-3">
                                            <div class="card card-bordered card-full">
                                                <div class="card-inner">
                                                    <div class="card-title-group align-start mb-0">
                                                        <div class="card-title">
                                                            <h6 class="subtitle">Total User Balance</h6>
                                                        </div>
                                                        <div class="card-tools">
                                                            <em class="card-hint icon ni ni-help-fill" data-toggle="tooltip" data-placement="left" title="Available Balance"></em>
                                                        </div>
                                                    </div>
                                                    <div class="card-amount">
                                                        <span class="amount"> <?php echo number_format($sum,0);  ?><span class="currency currency-usd"> NGN</span>
                                                        </span>
                                                     
                                                    </div>
                                                   
                                                </div>
                                            </div><!-- .card -->
                                        </div><!-- .col -->
                                        <div class="col-md-3">
                                            <div class="card card-bordered card-full">
                                                <div class="card-inner">
                                                    <div class="card-title-group align-start mb-0">
                                                        <div class="card-title">
                                                            <h6 class="subtitle">Total Users</h6>
                                                        </div>
                                                        <div class="card-tools">
                                                            <em class="card-hint icon ni ni-help-fill" data-toggle="tooltip" data-placement="left" title="Total Withdraw"></em>
                                                        </div>
                                                    </div>
                                                    <div class="card-amount">
                                                        <span class="amount"> <?php  echo $count;?> 
                                                   
                                                    </div>
                                                   
                                                </div>
                                            </div><!-- .card -->
                                        </div><!-- .col -->
                                        <div class="col-md-3">
                                            <div class="card card-bordered  card-full">
                                                <div class="card-inner">
                                                    <div class="card-title-group align-start mb-0">
                                                        <div class="card-title">
                                                            <h6 class="subtitle">Total Questions</h6>
                                                        </div>
                                                        <div class="card-tools">
                                                            <em class="card-hint icon ni ni-help-fill" data-toggle="tooltip" data-placement="left" title="Avalable Balance"></em>
                                                        </div>
                                                    </div>
                                                    <div class="card-amount">
                                                        <span class="amount"><?php  echo $count2 ?>
                                                        </span>
                                                    </div>
                                                    
                                                </div>
                                            </div><!-- .card -->
                                        </div><!-- .col -->
                                        <div class="col-md-3">
                                            <div class="card card-bordered  card-full">
                                                <div class="card-inner">
                                                    <div class="card-title-group align-start mb-0">
                                                        <div class="card-title">
                                                            <h6 class="subtitle">Withdrawals</h6>
                                                        </div>
                                                        <div class="card-tools">
                                                            <em class="card-hint icon ni ni-help-fill" data-toggle="tooltip" data-placement="left" title="Avalable Balance"></em>
                                                        </div>
                                                    </div>
                                                    <div class="card-amount">
                                                        <span class="amount"><?php  echo $count3 ?>
                                                        </span>
                                                    </div>
                                                    
                                                </div>
                                            </div><!-- .card -->
                                        </div>
                                  
                                      <div class="col-md-6 mb-5">
                                          <div class="card p-5" style="max-height: 500px; overflow-y:scroll; display: block;">
                                              <h5>Vendors</h5>
                                              <?php  

                                              while ($ff=mysqli_fetch_array($quer)) {
                                                  ?>

  <div class="row mb-2">
                                                 <div class="col-sm-4">
                                                     <div class="form-group mb-3">
                                                         <label class="mb-3">Name</label>
                                                         <input type="text" name="" class="form-control" value="<?php  echo $ff['name']; ?>" oninput="updven(this.value,'<?php echo $ff['id']; ?>','name')">
                                                     </div>
                                                 </div>
                                                 <div class="col-sm-4">
                                                    <div class="form-group mb-3">
                                                         <label class="mb-3">Link</label>
                                                         <input type="text" name="" class="form-control" value="<?php  echo $ff['phone']; ?>" oninput="updven(this.value,'<?php echo $ff['id']; ?>','phone')">
                                                     </div> 
                                                 </div>
                                                   <div class="col-sm-4">
                                                        <div class="form-group mb-3">
                                                         <label class="mb-3">Email</label>
                                                         <input type="text" name="" class="form-control" value="<?php  echo $ff['email']; ?>" oninput="updven(this.value,'<?php echo $ff['id']; ?>','email')">
                                                     </div>
                                                   </div>
                                                 </div>
                                                  <?php
                                              }

                                               ?>
                                           

                                                  
                                                 </div>

                                             </div>
                                              <div class="col-md-6 mb-5">
                                             <div class="card p-5">
                                                 <h5>Add Vendors</h5>
                                                <div class="row">

                                                 <div class="col-sm-4">
                                                     <div class="form-group mb-3">
                                                         <label class="mb-3">Name</label>
                                                         <input type="text" name="" class="form-control" id="namev">
                                                     </div>
                                                 </div>
                                                 <div class="col-sm-4">
                                                    <div class="form-group mb-3">
                                                         <label class="mb-3">Whatsapp Link</label>
                                                         <input type="text" name="" class="form-control" id="linkv">
                                                     </div> 
                                                 </div>
                                                   <div class="col-sm-4">
                                                        <div class="form-group mb-3">
                                                         <label class="mb-3">Email</label>
                                                         <input type="text" name="" class="form-control" id="emailv">
                                                     </div>
                                                   </div>
                                                  <button class="btn btn-primary ml-2" onclick="addven(this); this.disabled=true">Add Vendor</button>
                                                 </div>
                                          </div>
                                      </div>
                                          </div>
                                      </div>
                                     
                                        <div class="col-xl-12 col-xxl-8">
                                            <div class="card card-bordered card-full">
                                                <div class="card-inner border-bottom">
                                                    <div class="card-title-group">
                                                        <div class="card-title">
                                                            <h6 class="title">Recent Activities</h6>
                                                        </div>
                                                        <div class="card-tools">
                                                            <a href="#" class="link">View All</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="nk-tb-list">
                                                    <div class="nk-tb-item nk-tb-head">
                                                        <div class="nk-tb-col"><span>#ID</span></div>
                                                        <div class="nk-tb-col tb-col-sm"><span>Email</span></div>
                                                        <div class="nk-tb-col tb-col-lg"><span>Joined Date</span></div>
                                                        <div class="nk-tb-col"><span>Full-name</span></div>
                                                        <div class="nk-tb-col tb-col-sm">Plan</div>
                                                        <div class="nk-tb-col tb-col-sm">Phone</div>
                                                     
                                                    </div>

                                                    <?php
                                                    while($res10=mysqli_fetch_array($query40)){
                                                        ?>

                                                         <div class="nk-tb-item">
                                                        <div class="nk-tb-col">
                                                           <?php  echo $res10['id']?>
                                                        </div>
                                                       
                                                        <div class="nk-tb-col tb-col-lg">
                                                             <?php  echo $res10['email']?>
                                                        </div>
                                                        <div class="nk-tb-col">
                                                            <span class="tb-sub tb-amount"> <?php  echo $res10['date']?><span> </span></span>
                                                        </div>
                                                        <div class="nk-tb-col tb-col-sm" >
                                                            <?php  echo $res10['full_name']?>
                                                        </div>
                                                          <div class="nk-tb-col tb-col-sm"  >
                                                            <?php  echo $res10['plan']?>
                                                        </div>
                                                        <div class="nk-tb-col tb-col-sm"  >
                                                            <?php  echo $res10['phone']?>
                                                        </div>
                                                      
                                                    </div>

                                                        <?php
                                                    }
                                                    ?>

                                                   
                                                
                                                </div>
                                            </div><!-- .card -->
                                        </div><!-- .col -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
 <?php
}
if ($type=='updven') {
   $val=$_POST['val'];
      $type=$_POST['type'];
      $id=$_POST['id'];
      mysqli_query($link,"UPDATE vendors set ".$type." ='$val' where id='$id' ");
}
if ($type=='addven') {
   $val=$_POST['val'];
      $type=$_POST['type'];
      $id=$_POST['id'];
      mysqli_query($link,"INSERT INTO vendors values('','$val','$type','$id') ");
      echo 'done';
}
if ($type=='adminepin') {
    $query40=mysqli_query($link,"SELECT * FROM epin  order by id desc ");
?>


<div class="container-fluid">
                        <div class="nk-content-inner">
                            <div class="nk-content-body">
                                <div class="nk-block-head nk-block-head-sm">
                                    <div class="nk-block-between">
                                        <div class="nk-block-head-content">
                                            <h3 class="nk-block-title page-title">Admin Epin</h3>
                                            <div class="nk-block-des text-soft">
                                                <p>Welcome to Your TripplePay Admin Dashboard</p>
                                            </div>
                                        </div><!-- .nk-block-head-content -->
                                        <div class="nk-block-head-content">
                                            <!-- .toggle-wrap -->
                                        </div><!-- .nk-block-head-content -->
                                    </div><!-- .nk-block-between -->
                                </div><!-- .nk-block-head -->
                                <div class="nk-block">
                                    <div class="row g-gs">
                                        <div class="col-md-6">
                                            <div class="card p-5">
                                                <p style="text-align: center; display: block; font-weight:bold;">Get Epin</p>
                                                <div class="form-group mb-3">
                                                    <label class="mb-3"> Plan</label>
                                                    <select class="form-control" id="epinv">
                                                        <option value="starter">starter</option>
                                                         <option value="hut8">hut8</option>
                                                          <option value="veteran">veteran</option>
                                                           <option value="exonum">exonum</option>
                                                            <option value="master">master</option>
                                                            <option value="ultimate">ultimate</option>
                                                    </select>
                                                </div>
                                                <div class="form-group mb-3" style="display:none;" id="ddf">
                                                    <label class="mb-3"> Epin</label>
                                                   <input type="text" name="" readonly="" value="" class="form-control" id="ddf2">
                                                </div>
                                                <button class="btn btn-primary" onclick="getpin(document.getElementById('epinv').value,this); document.getElementById('ddf').style.display='block'; this.disabled"><span>Get EPIN</span></button>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                         
                                                 <div class="card p-5">
                                                <p style="text-align: center; display: block; font-weight:bold;">Generate Epin</p>
                                                <div class="form-group mb-3">
                                                    <label class="mb-3"> Plan</label>
                                                    <select class="form-control" id="epinv1">
                                                        <option value="starter">starter</option>
                                                         <option value="hut8">hut8</option>
                                                          <option value="veteran">veteran</option>
                                                           <option value="exonum">exonum</option>
                                                            <option value="master">master</option>
                                                            <option value="ultimate">ultimate</option>
                                                    </select>
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label class="mb-3">Quantity</label>
                                                    <input type="number" name="" class="form-control" value="50" id="ddf22" >
                                                </div>
                                                <div class="form-group mb-3" style="display:none;" >
                                                    <label class="mb-3"> Epin</label>
                                                 
                                                </div>
                                                <button class="btn btn-primary" onclick="genpin(document.getElementById('epinv1').value,this,document.getElementById('ddf22').value); this.disabled=true;"><span>Generate EPIN</span></button>
                                            </div>
                                        
                                        </div>
                                  
                                      
                                        <div class="col-xl-12 col-xxl-8">
                                            <div class="card card-bordered card-full">
                                                <div class="card-inner border-bottom">
                                                    <div class="card-title-group">
                                                        <div class="card-title">
                                                            <h6 class="title">E-pins</h6>
                                                        </div>
                                                        <div class="card-tools">
                                                           
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="nk-tb-list">
                                                    <div class="nk-tb-item nk-tb-head">
                                                        <div class="nk-tb-col"><span>#ID</span></div>
                                                        <div class="nk-tb-col tb-col-sm"><span>Epin</span></div>
                                                        <div class="nk-tb-col tb-col-lg"><span>Plan</span></div>
                                                        <div class="nk-tb-col"><span>Created</span></div>
                                                        <div class="nk-tb-col tb-col-sm">Used</div>
                                                        <div class="nk-tb-col tb-col-sm">Status</div>
                                                        <div class="nk-tb-col tb-col-sm">Email</div>
                                                     
                                                    </div>

                                                    <?php
                                                    while($res10=mysqli_fetch_array($query40)){
                                                        ?>

                                                         <div class="nk-tb-item">
                                                        <div class="nk-tb-col">
                                                           <?php  echo $res10['id']?>
                                                        </div>
                                                       
                                                        <div class="nk-tb-col tb-col-lg">
                                                             <?php  echo $res10['epin']?>
                                                        </div>
                                                        <div class="nk-tb-col">
                                                            <span class="tb-sub tb-amount"> <?php  echo $res10['plan']?><span> </span></span>
                                                        </div>
                                                        <div class="nk-tb-col tb-col-sm" >
                                                            <?php  echo $res10['created']?>
                                                        </div>
                                                          <div class="nk-tb-col tb-col-sm"  >
                                                            <?php  echo $res10['used']?>
                                                        </div>
                                                        <div class="nk-tb-col tb-col-sm"  >
                                                            <?php  echo $res10['status']?>
                                                        </div>
                                                        <div class="nk-tb-col tb-col-sm"  >
                                                            <?php  echo $res10['email']?>
                                                        </div>
                                                      
                                                    </div>

                                                        <?php
                                                    }
                                                    ?>

                                                   
                                                
                                                </div>
                                            </div><!-- .card -->
                                        </div><!-- .col -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

<?php


}
if ($type=='getpin') {
 $plan=$_POST['eplan'];
 $query=mysqli_query($link,"SELECT * FROM epin where plan='$plan' and status='active' order by id asc limit 1");
 $count=mysqli_num_rows($query);
   if ($count==0) {
             echo "No Result, Generate New pin";
          }
        while ($res=mysqli_fetch_array($query)) {
        
       $pin=$res['epin'];
       echo $pin;
               }

}
if ($type=='genpin') {
$plan=$_POST['eplan'];
$num=$_POST['num'];
$date=date("Y-m-d");
for ($x = 0; $x <= $num; $x++) {
    $rand=rand(100000000,999999999);
    $query=mysqli_query($link,"SELECT * FROM epin where epin='$rand'");
       $count1=mysqli_num_rows($query);
       if ($count1==0) {
           mysqli_query($link,"INSERT INTO epin values('','$rand','$plan','$date','','active','')");
       }

}
echo 'done';
}
if ($type=='adminque') {
   $query40=mysqli_query($link,"SELECT * FROM questions  order by id desc");
   ?>


<div class="container-fluid">
                        <div class="nk-content-inner">
                            <div class="nk-content-body">
                                <div class="nk-block-head nk-block-head-sm">
                                    <div class="nk-block-between">
                                        <div class="nk-block-head-content">
                                            <h3 class="nk-block-title page-title">Admin Add Questions</h3>
                                            <div class="nk-block-des text-soft">
                                                <p>Welcome to Your TripplePay Admin Dashboard</p>
                                            </div>
                                        </div><!-- .nk-block-head-content -->
                                        <div class="nk-block-head-content">
                                            <!-- .toggle-wrap -->
                                        </div><!-- .nk-block-head-content -->
                                    </div><!-- .nk-block-between -->
                                </div><!-- .nk-block-head -->
                                <div class="nk-block">
                                    <div class="row g-gs">
                                        <div class="col-md-6">
                                            <div class="card p-5">
                                                <p style="text-align: center; display: block; font-weight:bold;">Add Question</p>
                                                <form id="kank">
                                                     <div class="form-group mb-3">
                                                               <label class="mb-2">
                                                                   Question
                                                               </label>
                                                               <input type="text" name="" class="form-control"  required="" id="que">
                                                           </div>
                                                           <div class="form-group mb-3">
                                                               <label class="mb-2">
                                                                   Option1
                                                               </label>
                                                               <input type="text" name="" class="form-control"  required="" id="opt1">
                                                           </div>
                                                           <div class="form-group mb-3">
                                                               <label class="mb-2">
                                                                   Option2
                                                               </label>
                                                               <input type="text" name="" class="form-control"  required="" id="opt2">
                                                           </div>
                                                           <div class="form-group mb-3">
                                                               <label class="mb-2">
                                                                   Option3
                                                               </label>
                                                               <input type="text" name="" class="form-control"  required="" id="opt3">
                                                           </div>
                                                           <div class="form-group mb-3">
                                                               <label class="mb-2">
                                                                   Option4
                                                               </label>
                                                               <input type="text" name="" class="form-control"  required="" id="opt4">
                                                           </div>
                                                           <div class="form-group mb-3">
                                                               <label class="mb-2">
                                                                   Answer
                                                               </label>
                                                               <input type="number" name="" class="form-control"  required="" id="ans">
                                                           </div>
                                                           <button class="btn btn-primary" type="submit" >Add Question</button>
                                                </form>
                                                  
                                               
                                            </div>
                                        </div>
                                                                       
                                      
                                        <div class="col-xl-12 col-xxl-8">
                                            <div class="card card-bordered card-full">
                                                <div class="card-inner border-bottom">
                                                    <div class="card-title-group">
                                                        <h6>Questions</h6>
                                                        
                                                    </div>
                                                </div>
                                                <div class="nk-tb-list">
                                                    <div class="nk-tb-item nk-tb-head">
                                                        <div class="nk-tb-col"><span>#ID</span></div>
                                                        <div class="nk-tb-col tb-col-sm"><span>Question</span></div>
                                                        <div class="nk-tb-col tb-col-lg"><span>option1</span></div>
                                                        <div class="nk-tb-col"><span>Option2</span></div>
                                                        <div class="nk-tb-col tb-col-sm">Option3</div>
                                                        <div class="nk-tb-col tb-col-sm">Option4</div>
                                                        <div class="nk-tb-col tb-col-sm">Answer</div>
                                                     
                                                    </div>

                                                    <?php
                                                    while($res10=mysqli_fetch_array($query40)){
                                                        ?>

                                                         <div class="nk-tb-item">
                                                        <div class="nk-tb-col">
                                                           <?php  echo $res10['id']?>
                                                        </div>
                                                       
                                                        <div class="nk-tb-col tb-col-lg">
                                                            <input type="text" name="" class="form-control" oninput="updque('<?php echo $res10['id'] ?>',this.value,'question')" value=" <?php  echo $res10['question']?>">
                                                            
                                                        </div>
                                                        <div class="nk-tb-col">
                                                             <input type="text" name="" class="form-control" oninput="updque('<?php echo $res10['id'] ?>',this.value,'option1')" value="<?php  echo $res10['option1']?>">
                                                            <span class="tb-sub tb-amount">

                                                             <span> </span></span>
                                                        </div>
                                                        <div class="nk-tb-col tb-col-sm" >
                                                            <input type="text" name="" class="form-control" oninput="updque('<?php echo $res10['id'] ?>',this.value,'option2')" value=" <?php  echo $res10['option2']?>">
                                                           
                                                        </div>
                                                          <div class="nk-tb-col tb-col-sm"  >
                                                            <input type="text" name="" class="form-control" oninput="updque('<?php echo $res10['id'] ?>',this.value,'option3')" value="<?php  echo $res10['option3']?>">
                                                            
                                                        </div>
                                                        <div class="nk-tb-col tb-col-sm"  >
                                                            <input type="text" name="" class="form-control" oninput="updque('<?php echo $res10['id'] ?>',this.value,'option4')" value=" <?php  echo $res10['option4']?>">
                                                           
                                                        </div>
                                                        <div class="nk-tb-col tb-col-sm"  >
                                                            <input type="text" name="" class="form-control" oninput="updque('<?php echo $res10['id'] ?>',this.value,'answer')" value=" <?php  echo $res10['answer']?>">
                                                           
                                                        </div>
                                                          <div class="nk-tb-col tb-col-sm"  >
                                                           <button class="btn btn-danger" onclick="delque('<?php echo $res10['id'] ?>'); window.location=window.location;">Delete</button>
                                                           
                                                        </div>
                                                      
                                                    </div>

                                                        <?php
                                                    }
                                                    ?>

                                                   
                                                
                                                </div>
                                            </div><!-- .card -->
                                        </div><!-- .col -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


   <?php
}
if ($type=='updque') {
    $a1=$_POST['id'];
     $a2=$_POST['val'];
      $a3=$_POST['f'];
      mysqli_query($link,"UPDATE questions set ".$a3." ='$a2' where id='$a1' ");

}
if ($type=='addque') {
    $a1=$_POST['que'];
     $a2=$_POST['opt1'];
      $a3=$_POST['opt2'];
        $a4=$_POST['opt3'];
     $a5=$_POST['opt4'];
      $a6=$_POST['ans'];
      mysqli_query($link,"INSERT into questions values('','$a1','$a2','$a3','$a4','$a5','$a6','active') ");
      echo 'done';

}
if ($type=='delque') {
    $a1=$_POST['id'];
   
      mysqli_query($link,"DELETE FROM questions  where id='$a1' ");

}
if ($type=='adminuser') {
     $query40=mysqli_query($link,"SELECT * FROM users ");
   ?>
<div class="container-fluid">
                        <div class="nk-content-inner">
                            <div class="nk-content-body">
                                <div class="nk-block-head nk-block-head-sm">
                                    <div class="nk-block-between">
                                        <div class="nk-block-head-content">
                                            <h3 class="nk-block-title page-title">Admin Users</h3>
                                            <div class="nk-block-des text-soft">
                                                <p>Welcome to Your TripplePay Admin Dashboard</p>
                                            </div>
                                        </div><!-- .nk-block-head-content -->
                                        <div class="nk-block-head-content">
                                            <!-- .toggle-wrap -->
                                        </div><!-- .nk-block-head-content -->
                                    </div><!-- .nk-block-between -->
                                </div><!-- .nk-block-head -->
                                <div class="nk-block">
                                    <div class="row g-gs">
                                                                         
                                      
                                        <div class="col-xl-12 col-xxl-8">
                                            <div class="card card-bordered card-full">
                                                <div class="card-inner border-bottom">
                                                    <div class="card-title-group">
                                                        <div class="card-title">
                                                            <h6 class="title">E-pins</h6>
                                                        </div>
                                                        <div class="card-tools">
                                                           
                                                        </div>
                                                    </div>
                                                </div>
                                                  <div class="nk-tb-list">
                                                    <div class="nk-tb-item nk-tb-head">
                                                        <div class="nk-tb-col"><span>#ID</span></div>
                                                        <div class="nk-tb-col tb-col-sm"><span>Email</span></div>
                                                        <div class="nk-tb-col tb-col-lg"><span>Joined Date</span></div>
                                                        <div class="nk-tb-col"><span>Full-name</span></div>
                                                        <div class="nk-tb-col tb-col-sm">Plan</div>
                                                        <div class="nk-tb-col tb-col-sm">Phone</div>
                                                     
                                                    </div>

                                                    <?php
                                                    while($res10=mysqli_fetch_array($query40)){
                                                        ?>

                                                         <div class="nk-tb-item">
                                                        <div class="nk-tb-col">
                                                           <?php  echo $res10['id']?>
                                                        </div>
                                                       
                                                        <div class="nk-tb-col tb-col-lg">
                                                             <?php  echo $res10['email']?>
                                                        </div>
                                                        <div class="nk-tb-col">
                                                            <span class="tb-sub tb-amount"> <?php  echo $res10['date']?><span> </span></span>
                                                        </div>
                                                        <div class="nk-tb-col tb-col-sm" >
                                                            <?php  echo $res10['full_name']?>
                                                        </div>
                                                          <div class="nk-tb-col tb-col-sm"  >
                                                            <?php  echo $res10['plan']?>
                                                        </div>
                                                        <div class="nk-tb-col tb-col-sm"  >
                                                            <?php  echo $res10['phone']?>
                                                        </div>
                                                      
                                                    </div>

                                                        <?php
                                                    }
                                                    ?>

                                                   
                                                
                                                </div>
                                            </div><!-- .card -->
                                        </div><!-- .col -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

   <?php
}

if ($type=='adminwith') {
     $query40=mysqli_query($link,"SELECT * FROM withdrawal order by id desc ");
   ?>
<div class="container-fluid">
                        <div class="nk-content-inner">
                            <div class="nk-content-body">
                                <div class="nk-block-head nk-block-head-sm">
                                    <div class="nk-block-between">
                                        <div class="nk-block-head-content">
                                            <h3 class="nk-block-title page-title">Admin Withdrawals</h3>
                                            <div class="nk-block-des text-soft">
                                                <p>Welcome to Your TripplePay Admin Dashboard</p>
                                            </div>
                                        </div><!-- .nk-block-head-content -->
                                        <div class="nk-block-head-content">
                                            <!-- .toggle-wrap -->
                                        </div><!-- .nk-block-head-content -->
                                    </div><!-- .nk-block-between -->
                                </div><!-- .nk-block-head -->
                                <div class="nk-block">
                                    <div class="row g-gs">
                                                                         
                                      
                                        <div class="col-xl-12 col-xxl-8">
                                            <div class="card card-bordered card-full">
                                                <div class="card-inner border-bottom">
                                                    <div class="card-title-group">
                                                        <div class="card-title">
                                                            <h6 class="title">E-pins</h6>
                                                        </div>
                                                        <div class="card-tools">
                                                           
                                                        </div>
                                                    </div>
                                                </div>
                                                  <div class="nk-tb-list">
                                                    <div class="nk-tb-item nk-tb-head">
                                                        <div class="nk-tb-col"><span>#ID</span></div>
                                                        <div class="nk-tb-col tb-col-sm"><span>Email</span></div>
                                                        <div class="nk-tb-col tb-col-lg"><span>Amount</span></div>
                                                        <div class="nk-tb-col"><span>Bank</span></div>
                                                        <div class="nk-tb-col tb-col-sm">Number</div>
                                                        <div class="nk-tb-col tb-col-sm">Status</div>
                                                     
                                                    </div>

                                                    <?php
                                                    while($res10=mysqli_fetch_array($query40)){
                                                        ?>

                                                         <div class="nk-tb-item">
                                                        <div class="nk-tb-col">
                                                           <?php  echo $res10['id']?>
                                                        </div>
                                                       
                                                        <div class="nk-tb-col tb-col-lg">
                                                             <?php  echo $res10['email']?>
                                                        </div>
                                                        <div class="nk-tb-col">
                                                            <span class="tb-sub tb-amount"> <?php  echo $res10['amount']?><span> </span></span>
                                                        </div>
                                                        <div class="nk-tb-col tb-col-sm" >
                                                            <?php  echo $res10['bank']?>
                                                        </div>
                                                          <div class="nk-tb-col tb-col-sm"  >
                                                            <?php  echo $res10['number']?>
                                                        </div>
                                                        <div class="nk-tb-col tb-col-sm"  >
                                                            <?php  echo $res10['status']?>
                                                        </div>
                                                         <div class="nk-tb-col tb-col-sm"  >
                                                           <button class="btn btn-primary" onclick="cmpwith('<?php echo $res10['id'] ?>','<?php echo $res10['email'] ?>')">Complete</button>
                                                        </div>
                                                      
                                                    </div>

                                                        <?php
                                                    }
                                                    ?>

                                                   
                                                
                                                </div>
                                            </div><!-- .card -->
                                        </div><!-- .col -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

   <?php
}
if ($type=='admincmpwith') {
   $id=$_POST['id'];
   $email=$_POST['email'];
   mysqli_query($link,"UPDATE withdrawal set status ='completed' where id ='$id'");
   echo 'done';
     $query=mysqli_query($link,"SELECT * FROM investments WHERE email='$email'");
      while ($res=mysqli_fetch_array($query)) {
          $plan=$res['plan'];
         
      }
       if ($plan=='starter' || $plan=='hut8' ) {
          $query5=mysqli_query($link,"SELECT * FROM activity WHERE email='$email'");
          $e=mysqli_num_rows($query5);
          if ($e=='6') {
             mysqli_query($link,"UPDATE investments set status='completed' where email='$email'");
          }

      }
      else{
if ($e=='12') {
             mysqli_query($link,"UPDATE investments set status='completed' where email='$email'");
          }
      }
}
 if ($type=='adminprofile') {
      $email=$_SESSION['loggedadmin'];
    
         $query1=mysqli_query($link,"SELECT * FROM login where email='$email'");
        while ($res1=mysqli_fetch_array($query1)) {
      $passs=$res1['password'];
        
        }




      ?>
<input type="hidden" name="" value="<?php echo $passs ?>" id="pass5">
<div class="container-fluid">
                        <div class="nk-content-inner">
                            <div class="nk-content-body">
                                <div class="nk-block-head nk-block-head-sm">
                                    <div class="nk-block-between">
                                        <div class="nk-block-head-content">
                                            <h3 class="nk-block-title page-title">Profile</h3>
                                            <div class="nk-block-des text-soft">
                                                <p>You Can Update Your Profile Details</p>
                                            </div>
                                        </div><!-- .nk-block-head-content -->
                                        <div class="nk-block-head-content">
                                            <!-- .toggle-wrap -->
                                        </div><!-- .nk-block-head-content -->
                                    </div><!-- .nk-block-between -->
                                </div><!-- .nk-block-head -->
                                <div class="nk-block">
                                    <div class="row g-gs">
                                
                                     <div class="col-sm-4 ">
                                        <div class="card p-5">
                                            <div class="form-group mb-4">
                                                 <label class="mb-2">
                                                    Old  Password
                                                 </label>
                                                 <input type="password" name="" class="form-control" oninput ="pass()" id="pass" >
                                             </div>
                                              <div class="form-group mb-4">
                                                 <label class="mb-2">
                                                     New Password
                                                 </label>
                                                 <input type="password" name="" class="form-control"  oninput ="pass()" id="pass1" >
                                             </div>
                                              <div class="form-group mb-4">
                                                 <label class="mb-2">
                                                    Retype Password
                                                 </label>
                                                 <input type="password" name="" class="form-control"  oninput ="pass()" id="pass2"  >
                                             </div>
                                             <button class="btn btn-primary mt-3" type="button" id="widthh" style="width:200px" disabled="" onclick="pass1(); this.innerHTML='Password Changed'">Change Password</button>
                                        </div>
                                          
                                     </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
      <?php
  }
  if ($type=='reff') {
$email=$_SESSION['loggeduser'];
    
         $query1=mysqli_query($link,"SELECT * FROM users where email='$email'");
         $query40=mysqli_query($link,"SELECT * FROM referrals where main='$email'");
        while ($res1=mysqli_fetch_array($query1)) {
      $id=$res1['id']."__".$res1['date'].$res1['epin'];
        
        }

    ?>
<div class="container-fluid">
                        <div class="nk-content-inner">
                            <div class="nk-content-body">
                                <div class="nk-block-head nk-block-head-sm">
                                    <div class="nk-block-between">
                                        <div class="nk-block-head-content">
                                            <h3 class="nk-block-title page-title">Referrals</h3>
                                            <div class="nk-block-des text-soft">
                                                <p>You Can share your link and earn </p>
                                            </div>
                                        </div><!-- .nk-block-head-content -->
                                        <div class="nk-block-head-content">
                                            <!-- .toggle-wrap -->
                                        </div><!-- .nk-block-head-content -->
                                    </div><!-- .nk-block-between -->
                                </div><!-- .nk-block-head -->
                                <div class="nk-block">
                                    <div class="row g-gs">
                                     <div class="col-sm-12">
                                        <div class="card p-5">
                                             <h5 class="mb-2">Your Referal Link</h5>
                                               <div class="input-group">
     
                                         <input type="text" name=""  id='myInput' readonly=""class="form-control" value="https://triplepay.com.ng/signup.html?ref=<?php  echo $id ?>">        <div class="input-group-append">
            <button class="btn btn-outline-primary btn-dim" onclick='

 
  var copyText = document.getElementById("myInput");


  copyText.select();
  copyText.setSelectionRange(0, 99999); /* For mobile devices */


  document.execCommand("copy");

document.getElementById("bv").innerHTML="Copied!";
  


            '><span class="iconify mr-2" data-icon="bx:bxs-copy"></span> <span id="bv">Copy</span></button>
        </div>
    </div>
                                        </div>
                                        
                                     </div>
                                     <div class="col-sm-10 ">
                                       <div class="card card-bordered card-full">
                                                <div class="card-inner border-bottom">
                                                    <div class="card-title-group">
                                                        <div class="card-title">
                                                            <h6 class="title">Recent Downlines</h6>
                                                        </div>
                                                        <div class="card-tools">
                                                    
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="nk-tb-list">
                                                    <div class="nk-tb-item nk-tb-head">
                                                        <div class="nk-tb-col"><span>#ID</span></div>
                                                        <div class="nk-tb-col tb-col-sm"><span>name</span></div>
                                                        <div class="nk-tb-col tb-col-lg"><span>Plan</span></div>
                                                        <div class="nk-tb-col"><span>date</span></div>
                                                       
                                                     
                                                    </div>

                                                    <?php
                                                    while($res10=mysqli_fetch_array($query40)){
                                                        ?>

                                                         <div class="nk-tb-item">
                                                        <div class="nk-tb-col">
                                                           <?php  echo $res10['id']?>
                                                        </div>
                                                        <div class="nk-tb-col tb-col-sm">
                                                           Activity
                                                        </div>
                                                        <div class="nk-tb-col tb-col-lg">
                                                             <?php  echo $res10['full-name']?>
                                                        </div>
                                                      
                                                     
                                                        <div class="nk-tb-col tb-col-sm" >
                                                            <?php  echo $res10['plan']?>
                                                        </div>
                                                          <div class="nk-tb-col tb-col-sm" >
                                                            <?php  echo $res10['date']?>
                                                        </div>
                                                       
                                                      
                                                    </div>

                                                        <?php
                                                    }
                                                    ?>

                                                   
                                                
                                                </div>
                                            </div>
                                          
                                     </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


    <?php
      }
}

?>