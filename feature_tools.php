<link href="css.css" rel="stylesheet" type="text/css"><br>
<script type="text/javascript">
<!--
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
//-->
</script>
<script type="text/javascript">
<!--
function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}
//-->
</script>
<body onLoad="MM_preloadImages('images/print02.gif')"><table width="100%" border="0" cellspacing="0" cellpadding="0" style="padding:0px 0px 0px 0px; border:0px #CCC solid;">
  <tr>
    <td align="right">
    <span class="title3">Print</span>
    <?php if($_GET['print']==1){?>
	<a href="javascript:;" onMouseOver="MM_swapImage('Image1','','images/print02.gif',1)" onMouseOut="MM_swapImgRestore()" alt="print" onClick="window.print()" ><img src="images/print.gif" id="Image1" border="0" /></a>
		
	<?php }else{?>
    <a onMouseOver="MM_swapImage('Image1','','images/print02.gif',1)" onMouseOut="MM_swapImgRestore()" onClick="MM_openBrWindow('product_details.php?root=<?php echo $_GET['root'];?>&amp;main=<?php echo $_GET['main'];?>&amp;sub=<?php echo $_GET['sub'];?>&amp;detail=<?php echo $_GET['detail'];?>&amp;print=1','Details','scrollbars=yes,resizable=yes,width=700,height=600')"><img src="images/print.gif" id="Image1" border="0" /></a>
    <?php }?>    </td>
  </tr>
</table>
