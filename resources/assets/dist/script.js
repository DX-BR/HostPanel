alert_hide=function(e){e.parentElement.parentElement.style.display="none"};
function screen_resize(){for(var t,e=parseInt(window.innerWidth),n=document.querySelectorAll(".table"),i=0;i<n.length;i++)t=n.item(i),0<=e&&e<=599?1===t.classList.length&&t.classList.add("show-thin"):600<=e&&2===t.classList.length&&t.classList.remove("show-thin")}function displayWindowSize(){var t=document.documentElement.clientWidth,e=document.documentElement.clientHeight;document.getElementById("result").innerHTML="Width: "+t+", Height: "+e}function pop(t){var e,n=t.getAttribute("data-target"),i=t.getAttribute("data-action"),d=t.getAttribute("data-value"),s=document.getElementById(n);"show"===i?(d&&(e=t.getAttribute("data-name"),document.getElementById(e).setAttribute("value",d)),s.style.display="block"):"hide"===i&&(s.style.display="none"),window.onclick=function(t){t.target==s&&(s.style.display="none")}}window.addEventListener("resize",screen_resize);
pass_toggle=function(t,e){var a=document.getElementById(t);"text"===a.getAttribute("type")?a.setAttribute("type","password"):"password"===a.getAttribute("type")&&a.setAttribute("type","text")},dis=function(t){t.classList.toggle("active")},sel=function(t,e){var a,i=e.innerText;for(document.getElementById(t).innerText=i,document.getElementById(t).value=i,i=document.querySelectorAll(".select ul li.active"),a=0;a<i.length;a++)i[a].classList.remove("active");e.classList.add("active")},PasswordMeter=function(t){var e=!1,a=!1,i=!1,s=!1,n=!1,r="",l="",o="";t.value.match(/([0-9])/)&&(e=!0),t.value.match(/([!,@,#,$,%,^,&,*,?,_,~])/)&&(a=!0),t.value.match(/([a-z])/)&&(i=!0),t.value.match(/[A-Z]/)&&(s=!0),9<t.value.length&&(n=!0),r=t.parentElement.parentElement,l=t.parentElement,e&&a&&i&&s&&n?(r.classList.add("ok"),r.classList.remove("wrong"),l.removeAttribute("data-tip")):(r.classList.remove("ok"),r.classList.add("wrong"),o="Password Must Contains Atleast ",l.setAttribute("data-tip",o),e||(o+=" one number, "),a||(o+=" one symbols,"),i||(o+=" one small letter, "),s||(o+=" one capital letter, "),n||(o+=" have 10 charactes."),l.setAttribute("data-tip",o))},additionalinfo=function(t){var e,a=t.parentElement;a.getAttribute("data-tip")!==a.getAttribute("data-tip-main")?(e=a.getAttribute("data-tip-main"),e=t.value+e,a.setAttribute("data-tip",e)):a.removeAttribute("data-tip")};