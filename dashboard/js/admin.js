
function homeadmin (argument) {
    

var data="action=adminhome";

     
     
     var xhr = new XMLHttpRequest();
     xhr.open('POST', 'php/master.php', true);
     xhr.setRequestHeader('content-type','application/x-www-form-urlencoded');
     xhr.onload = function () {
   document.getElementById('main').innerHTML=xhr.responseText;

     }
    
  xhr.send(data);


    }
    function users (argument) {
    

var data="action=adminuser";

     
     
     var xhr = new XMLHttpRequest();
     xhr.open('POST', 'php/master.php', true);
     xhr.setRequestHeader('content-type','application/x-www-form-urlencoded');
     xhr.onload = function () {
   document.getElementById('main').innerHTML=xhr.responseText;

     }
    
  xhr.send(data);


    }
      function withd (argument) {
    

var data="action=adminwith";

     
     
     var xhr = new XMLHttpRequest();
     xhr.open('POST', 'php/master.php', true);
     xhr.setRequestHeader('content-type','application/x-www-form-urlencoded');
     xhr.onload = function () {
   document.getElementById('main').innerHTML=xhr.responseText;

     }
    
  xhr.send(data);


    }

       function que (argument) {
    

var data="action=adminque";

     
     
     var xhr = new XMLHttpRequest();
     xhr.open('POST', 'php/master.php', true);
     xhr.setRequestHeader('content-type','application/x-www-form-urlencoded');
     xhr.onload = function () {
   document.getElementById('main').innerHTML=xhr.responseText;
   document.getElementById('kank').addEventListener("submit",function(){


    addque(document.getElementById('que').value,document.getElementById('opt1').value,document.getElementById('opt2').value,document.getElementById('opt3').value,document.getElementById('opt4').value,document.getElementById('ans').value)
   },false);


     }
    
  xhr.send(data);


    }
    function epin (argument) {
    

var data="action=adminepin";

     
     
     var xhr = new XMLHttpRequest();
     xhr.open('POST', 'php/master.php', true);
     xhr.setRequestHeader('content-type','application/x-www-form-urlencoded');
     xhr.onload = function () {
   document.getElementById('main').innerHTML=xhr.responseText;

     }
    
  xhr.send(data);


    }
       function profile (argument) {
    

var data="action=adminprofile";

     
     
     var xhr = new XMLHttpRequest();
     xhr.open('POST', 'php/master.php', true);
     xhr.setRequestHeader('content-type','application/x-www-form-urlencoded');
     xhr.onload = function () {
   document.getElementById('main').innerHTML=xhr.responseText;

     }
    
  xhr.send(data);


    }
function uu (){
 var data="action=namem";

     
     
     var xhr = new XMLHttpRequest();
     xhr.open('POST', 'php/master.php', true);
     xhr.setRequestHeader('content-type','application/x-www-form-urlencoded');
     xhr.onload = function () {
document.getElementById('ud').innerHTML='Administrator';
document.getElementById('udd').innerHTML='TripplePayAdmin';

     }
    
  xhr.send(data);
}
uu();
 function logc (argument) {
    

var data="action=adminlogchk";

     
     
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
     function cmpwith (argument) {
    

var data="action=admincmpwith&id="+arguments[0]+"&email="+arguments[1];

     
     
     var xhr = new XMLHttpRequest();
     xhr.open('POST', 'php/master.php', true);
     xhr.setRequestHeader('content-type','application/x-www-form-urlencoded');
     xhr.onload = function () {
  if (xhr.responseText=='done') {
window.location=window.location;
  }

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
    function getpin(ll,lll) {
 var data="action=getpin&eplan="+ll;

     
     
     var xhr = new XMLHttpRequest();
     xhr.open('POST', 'php/master.php', true);
     xhr.setRequestHeader('content-type','application/x-www-form-urlencoded');
     xhr.onload = function () {
lll.disabled=false;
document.getElementById('ddf2').value=xhr.responseText;
console.log(xhr.responseText);
     }
    
  xhr.send(data);
}

   function genpin(ll,lll,llll) {
 var data="action=genpin&eplan="+ll+"&num="+llll;

    
     
     var xhr = new XMLHttpRequest();
     xhr.open('POST', 'php/master.php', true);
     xhr.setRequestHeader('content-type','application/x-www-form-urlencoded');
     xhr.onload = function () {

if (xhr.responseText=='done' ){
window.location=window.location;
}
console.log(xhr.responseText);
lll.disabled=false;
     }
    
  xhr.send(data);
}

function updque(a1,a2,a3) {
  var data="action=updque&id="+a1+"&val="+a2+"&f="+a3;

    
     
     var xhr = new XMLHttpRequest();
     xhr.open('POST', 'php/master.php', true);
     xhr.setRequestHeader('content-type','application/x-www-form-urlencoded');
     xhr.onload = function () {

}
  xhr.send(data);
}

function delque(a1,a2,a3) {
  var data="action=delque&id="+a1;

    
     
     var xhr = new XMLHttpRequest();
     xhr.open('POST', 'php/master.php', true);
     xhr.setRequestHeader('content-type','application/x-www-form-urlencoded');
     xhr.onload = function () {

}
  xhr.send(data);
}
function addque(a1,a2,a3,a4,a5,a6) {
  var data="action=addque&que="+a1+"&opt1="+a2+"&opt2="+a3+"&opt3="+a4+"&opt4="+a5+"&ans="+a6;


     
     var xhr = new XMLHttpRequest();
     xhr.open('POST', 'php/master.php', true);
     xhr.setRequestHeader('content-type','application/x-www-form-urlencoded');
     xhr.onload = function () {
if (xhr.responseText=='done') {
    window.location=window.location;

}
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
 var data="action=updddd&fname="+document.getElementById('pass1').value;

     
     
     var xhr = new XMLHttpRequest();
     xhr.open('POST', 'php/master.php', true);
     xhr.setRequestHeader('content-type','application/x-www-form-urlencoded');
     xhr.onload = function () {


     }
    
  xhr.send(data);
}
function updven(ll,lll,llll) {
  var data="action=updven&val="+ll+"&type="+llll+"&id="+lll;

     
     
     var xhr = new XMLHttpRequest();
     xhr.open('POST', 'php/master.php', true);
     xhr.setRequestHeader('content-type','application/x-www-form-urlencoded');
     xhr.onload = function () {


     }
    
  xhr.send(data);
}
function addven(kk) {
 var name=document.getElementById('namev').value;
  var link=document.getElementById('linkv').value;
   var email=document.getElementById('emailv').value;



 var data="action=addven&val="+name+"&type="+link+"&id="+email;

     
     
     var xhr = new XMLHttpRequest();
     xhr.open('POST', 'php/master.php', true);
     xhr.setRequestHeader('content-type','application/x-www-form-urlencoded');
     xhr.onload = function () {
kk.disabled=false;
if (xhr.responseText=='done') {
    window.location=window.location;
}

     }
    
  xhr.send(data);

}