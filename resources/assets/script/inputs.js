// inp_border = function(ele){
//     var right = ele.id + 'right' ;
//     right = document.getElementById(right);
//
//     right.classList.toggle('active');
// }
pass_toggle =function (pass,ele) {
    var  x=document.getElementById(pass);
    if(x.getAttribute('type')==='text'){
        x.setAttribute('type','password');
    }else if (x.getAttribute('type')==='password') {
        x.setAttribute('type','text');
    }
}
dis = function(ele){
    ele.classList.toggle('active');
}
sel = function(id,ele){
    var x = ele.innerText;
    document.getElementById(id).innerText=x;
    document.getElementById(id).value=x;
    x = document.querySelectorAll(".select ul li.active");
    var l;
    for(l=0;l<x.length;l++){
        x[l].classList.remove('active');
    }
    ele.classList.add('active');
}

PasswordMeter = function(e) {
    var num=false,sym=false,small=false,caps=false,len=false,l="",lt="",ldt="";
    if( e.value.match((/([0-9])/)))  num=true ;
    if (e.value.match(/([!,@,#,$,%,^,&,*,?,_,~])/)) sym=true;
    if (e.value.match(/([a-z])/))  small=true;
    if (e.value.match(/[A-Z]/)) caps=true;
    if (e.value.length > 9) len =true;
    l=e.parentElement.parentElement;
    lt=e.parentElement;
    if(!num || !sym || !small || !caps || !len){
        l.classList.remove('ok');
        l.classList.add('wrong');
        ldt="Password Must Contains Atleast "
        lt.setAttribute('data-tip',ldt)
        if (!num) ldt=ldt+" one number, ";
        if (!sym) ldt=ldt+" one symbols,";
        if (!small) ldt=ldt+" one small letter, ";
        if (!caps) ldt=ldt+" one capital letter, ";
        if (!len) ldt=ldt+" have 10 charactes.";
        lt.setAttribute('data-tip',ldt)
    }
    else {
        l.classList.add('ok');
        l.classList.remove('wrong');
        lt.removeAttribute('data-tip');
    }
}
additionalinfo = function (e) {
 var lt=e.parentElement;
 if(lt.getAttribute('data-tip') !== lt.getAttribute('data-tip-main')) {
 var ldt = lt.getAttribute('data-tip-main');
 ldt =e.value +ldt;
 lt.setAttribute('data-tip',ldt);
}
 else{
     lt.removeAttribute('data-tip');
 }
}