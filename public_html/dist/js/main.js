"use strict";var txt_body=document.getElementsByClassName("div_text")[0],pbody=document.getElementById("pbody"),ptitle=document.getElementById("ptitle"),shareBody=pbody.innerText,shareTitle=ptitle.innerText,next=document.getElementsByClassName("next")[0],shareFB=document.getElementsByClassName("sharefb")[0],shareTW=document.getElementsByClassName("sharetw")[0],delay=100,baseURL=window.location.href.indexOf("?")?window.location.href.substr(0,window.location.href.indexOf("?")):window.location.href,shareURL=window.location.href;next.addEventListener("click",function(){(txt_body.style.left="-565px")===txt_body.style.left&&setTimeout(function(){txt_body.style.display="none",setTimeout(function(){txt_body.style.left="565px",txt_body.style.display="block";var t=new XMLHttpRequest;t.open("GET","../resources/getRandom.php",!0),t.onprogress=function(){},t.onload=function(){if(200===t.status){txt_body.style.left="0px";var e=JSON.parse(t.responseText);pbody.innerText=e.body,ptitle.innerText=e.title,shareBody=e.body,shareTitle=e.title,window.history.replaceState("","",baseURL+"?id="+e.id)}},t.send()},delay)},delay)}),shareFB.addEventListener("click",function(){shareURL=window.location.href,window.open("https://www.facebook.com/sharer/sharer.php?u="+shareURL,"_blank")}),shareTW.addEventListener("click",function(){shareURL=window.location.href;var e=encodeURIComponent(shareBody+" -"+shareTitle+" ("+shareURL+")");window.open("https://twitter.com/intent/tweet?text="+e,"_blank")});