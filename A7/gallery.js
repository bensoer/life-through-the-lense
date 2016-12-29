function view9(page)
{
var xmlhttp;
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("gallery_thumbs").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","gallery/gallery9-"+page+".txt",true);

xmlhttp.send();
}

function view18(page)
{
var xmlhttp;
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("gallery_thumbs").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","gallery/gallery18-"+page+".txt",true);

xmlhttp.send();
}

function view36(page)
{
var xmlhttp;
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("gallery_thumbs").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","gallery/gallery36-"+page+".txt",true);

xmlhttp.send();
}