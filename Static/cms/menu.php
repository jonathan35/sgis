<?php if(($arr[count($arr)-1]=='postNews.php')||
($arr[count($arr)-1]=='editNews.php?'.$_SERVER['QUERY_STRING'])|| 
($arr[count($arr)-1]=='manageNews.php')|| 
($arr[count($arr)-1]=='manageNews.php?'.$_SERVER['QUERY_STRING']))
{ $newsstat='current'; $newsstyle='block'; }
else
{$newsstat=''; $newsstyle='none';}?>
<div align="center">
  <div id="localnav">
	<div id="menu">
	  <div align="left">
	  <ul>
<li> <a href="#" class="<?php echo $newsstat;?>" onClick="return kadabra('newsmenu',this);" ><img src="../images/menu_open.gif" width="10" height="10" /><span class="main_title"> News &amp; Events</span></a>
                            <ul id="newsmenu" style="display:<?php echo $newsstyle;?>">
                              <li><a class="<?php 
				if(($arr[count($arr)-1]=='postNews.php')||
				($arr[count($arr)-1]=='postNews.php?'.$_SERVER['QUERY_STRING'])) { ?>current<?php }?>" href="../news/postNews.php"><span class="content">Add News </span></a> </li>
                              <li><a class="<?php 
				if(($arr[count($arr)-1]=='manageNews.php')||
				($arr[count($arr)-1]=='manageNews.php?'.$_SERVER['QUERY_STRING'])||($arr[count($arr)-1]=='editNews.php?'.$_SERVER['QUERY_STRING'])) { ?>current<?php }?>" href="../news/manageNews.php"><span class="content">Manage News </span></a></li>
			 </ul>
		  </li>
		</ul>
	  </div>
	</div>
  </div>
</div>