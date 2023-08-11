


function home (argument) {
    

var data="action=home";

     
     
     var xhr = new XMLHttpRequest();
     xhr.open('POST', 'php/master.php', true);
     xhr.setRequestHeader('content-type','application/x-www-form-urlencoded');
     xhr.onload = function () {
   document.getElementById('main').innerHTML=xhr.responseText;

     }
    
  xhr.send(data);


    }
    function reff (argument) {
    

var data="action=reff";

     
     
     var xhr = new XMLHttpRequest();
     xhr.open('POST', 'php/master.php', true);
     xhr.setRequestHeader('content-type','application/x-www-form-urlencoded');
     xhr.onload = function () {
   document.getElementById('main').innerHTML=xhr.responseText;

     }
    
  xhr.send(data);


    }

    function logc (argument) {
    

var data="action=logchk";

     
     
     var xhr = new XMLHttpRequest();
     xhr.open('POST', 'php/master.php', true);
     xhr.setRequestHeader('content-type','application/x-www-form-urlencoded');
     xhr.onload = function () {
  if (xhr.responseText=='criminal') {
window.location='../signin.html';
  }

     }
    
  xhr.send(data);


    }
    logc();

    function act (argument) {
    

var data="action=act";

     
     
     var xhr = new XMLHttpRequest();
     xhr.open('POST', 'php/master.php', true);
     xhr.setRequestHeader('content-type','application/x-www-form-urlencoded');
     xhr.onload = function () {
   document.getElementById('main').innerHTML=xhr.responseText;

     }
    
  xhr.send(data);


    }
      function tran (argument) {
    

var data="action=tran";

     
     
     var xhr = new XMLHttpRequest();
     xhr.open('POST', 'php/master.php', true);
     xhr.setRequestHeader('content-type','application/x-www-form-urlencoded');
     xhr.onload = function () {
   document.getElementById('main').innerHTML=xhr.responseText;

     }
    
  xhr.send(data);


    }
         function profile (argument) {
    

var data="action=profile";

     
     
     var xhr = new XMLHttpRequest();
     xhr.open('POST', 'php/master.php', true);
     xhr.setRequestHeader('content-type','application/x-www-form-urlencoded');
     xhr.onload = function () {
   document.getElementById('main').innerHTML=xhr.responseText;

     }
    
  xhr.send(data);


    }
       function withdraw (argument) {
    

var data="action=withdraw";

     
     
     var xhr = new XMLHttpRequest();
     xhr.open('POST', 'php/master.php', true);
     xhr.setRequestHeader('content-type','application/x-www-form-urlencoded');
     xhr.onload = function () {
   document.getElementById('main').innerHTML=xhr.responseText;

     }
    
  xhr.send(data);


    }

    function acctv() {
    
var data="action=verifyacct&bank="+document.getElementById('bank').value+"&acct="+document.getElementById('number').value;

     
     
     var xhr = new XMLHttpRequest();
     xhr.open('POST', 'php/master.php', true);
     xhr.setRequestHeader('content-type','application/x-www-form-urlencoded');
     xhr.onload = function () {
      if (xhr.responseText !='kk') {

          document.getElementById('aname').value=xhr.responseText;
          document.getElementById('with2').style.display='block';
               document.getElementById('widt').innerHTML='Verify';
      }
      else{

          document.getElementById('aname').value='Account Doesnt Match Name';
           document.getElementById('with2').style.display='none';
           document.getElementById('widt').innerHTML='Verify';
           document.getElementById('widt').disabled=false;
      }
console.log(xhr.responseText);
     }
    
  xhr.send(data);
 
 }


function bc(gg) {
 

if ( gg <= Number( document.getElementById('cvg').innerHTML) ) {
  document.getElementById('kjh').disabled=false;
  console.log(gg);
}
else{
   document.getElementById('kjh').disabled=true;
}

}
function sendw(g,g1) {
  var bank=document.getElementById('bank').value;
  var number=document.getElementById('number').value;

var data="action=sendw&bank="+bank+"&num="+number+"&amt="+g1;

     
     
     var xhr = new XMLHttpRequest();
     xhr.open('POST', 'php/master.php', true);
     xhr.setRequestHeader('content-type','application/x-www-form-urlencoded');
     xhr.onload = function () {

     document.getElementById('kjh').innerHTML='Request Sent';
     document.getElementById('kjh').disabled=true;
     console.log(xhr.responseText);

     }
    
  xhr.send(data);
}


function updd() {
  var bank=document.getElementById('fn').value;
  var number=document.getElementById('ph').value;

var data="action=updd&fname="+bank+"&phone="+number;

     
     
     var xhr = new XMLHttpRequest();
     xhr.open('POST', 'php/master.php', true);
     xhr.setRequestHeader('content-type','application/x-www-form-urlencoded');
     xhr.onload = function () {

     document.getElementById('widt').innerHTML='Updated';
          console.log(xhr.responseText);

     }
    
  xhr.send(data);
}
function pass() {
 if(document.getElementById('pass5').value == document.getElementById('pass').value){
  document.getElementById('pass').style.borderColor='green';
  if (document.getElementById('pass1').value != "") {
if(document.getElementById('pass1').value == document.getElementById('pass2').value){
document.getElementById('widthh').disabled=false;
document.getElementById('pass1').style.borderColor='green';
document.getElementById('pass2').style.borderColor='green';



}
else{
  document.getElementById('widthh').disabled=true;
  document.getElementById('pass1').style.borderColor='red';
document.getElementById('pass2').style.borderColor='red';
 }
  }


}
else{
  document.getElementById('pass').style.borderColor='red';
}

}
function pass1() {
 var data="action=upddd&fname="+document.getElementById('pass1').value;

     
     
     var xhr = new XMLHttpRequest();
     xhr.open('POST', 'php/master.php', true);
     xhr.setRequestHeader('content-type','application/x-www-form-urlencoded');
     xhr.onload = function () {


     }
    
  xhr.send(data);
}
function logout(argument) {
 var data="action=logout";

     
     
     var xhr = new XMLHttpRequest();
     xhr.open('POST', 'php/master.php', true);
     xhr.setRequestHeader('content-type','application/x-www-form-urlencoded');
     xhr.onload = function () {
window.location='../signin.html';

     }
    
  xhr.send(data);
}
function uu (){
 var data="action=namem";

     
     
     var xhr = new XMLHttpRequest();
     xhr.open('POST', 'php/master.php', true);
     xhr.setRequestHeader('content-type','application/x-www-form-urlencoded');
     xhr.onload = function () {
document.getElementById('ud').innerHTML='User';
document.getElementById('udd').innerHTML=xhr.responseText;

     }
    
  xhr.send(data);
}
uu();
function repin(a,b,c) {


   var data="action=repin&epin="+a+"&email="+b;

     
     
     var xhr = new XMLHttpRequest();
     xhr.open('POST', 'php/master.php', true);
     xhr.setRequestHeader('content-type','application/x-www-form-urlencoded');
     xhr.onload = function () {
if (xhr.responseText=='done') {
window.location='index.html';
}

     }
    
  xhr.send(data);

}