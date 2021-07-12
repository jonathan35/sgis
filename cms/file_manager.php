<?php require_once('../Connections/pamconnection.php'); 
	session_start();
	if($_SESSION['validation']=='YES')
	{}	
	else{
	header("Location:../authentication/login.php");
	}
?>

<script src="js/tab/SpryTabbedPanels.js" type="text/javascript"></script>
<link href="js/tab/SpryTabbedPanels.css" rel="stylesheet" type="text/css" />


<body>
<div id="TabbedPanels1" class="TabbedPanels">
  <ul class="TabbedPanelsTabGroup">
    <li class="TabbedPanelsTab" tabindex="0">PHOTO</li>
    <!--<li class="TabbedPanelsTab" tabindex="0">IMAGES</li> -->
    <li class="TabbedPanelsTab" tabindex="0">ATTACHMENT</li>
    <li class="TabbedPanelsTab" tabindex="0">PDF</li>
  </ul>
  <div class="TabbedPanelsContentGroup">
    <div class="TabbedPanelsContent">
		<iframe name="new photo" src="new_file.php?type=photo" frameborder="0" style="background-color:#F2F2F2;" width="100%" height="500"></iframe>
    </div>
    <?php /*<div class="TabbedPanelsContent">
		<iframe name="new photo" src="new_file.php?type=image" frameborder="0" style="background-color:#F2F2F2;" width="100%" height="500"></iframe>
    </div> */?>    
    <div class="TabbedPanelsContent">
        <iframe name="new photo" src="new_file.php?type=attachment" frameborder="0" style="background-color:#F2F2F2;" width="100%" height="500"></iframe>
    </div>
    <div class="TabbedPanelsContent">
		<iframe name="new photo" src="new_file.php?type=pdf" frameborder="0" style="background-color:#F2F2F2;" width="100%" height="500"></iframe>
    </div>    
  </div>
</div>
</body>

<script type="text/javascript">
var TabbedPanels1 = new Spry.Widget.TabbedPanels("TabbedPanels1");
</script>