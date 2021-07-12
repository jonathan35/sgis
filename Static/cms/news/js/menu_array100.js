menunum=0;menus=new Array();_d=document;function addmenu(){menunum++;menus[menunum]=menu;}function dumpmenus(){mt="<script language=javascript>";for(a=1;a<menus.length;a++){mt+=" menu"+a+"=menus["+a+"];"}mt+="<\/script>";_d.write(mt)}
if(navigator.appVersion.indexOf("MSIE 6.0")>0){	effect = "Fade(duration=0.2);Alpha(style=0,opacity=88);Shadow(color='#006633', Direction=135, Strength=5)"}else{effect = "Shadow(color='#006633', Direction=135, Strength=5)"}


timegap=500
followspeed=2
followrate=40
suboffset_top=1;
suboffset_left=1;

style1=["000000","#D5F0E6","006633","#E3EBF8","006633",10,"normal","bold","Arial",2,,1,"006633","#E3EBF8","","","","","",]

addmenu(menu=["mainmenu",370,300,,1,,style1,1,"left",effect,,1,,,,,,,,,,,"&nbsp;&nbsp;PAMSC&nbsp;&nbsp;","show-menu=home1",,"",1,"&nbsp;&nbsp;Exterior Walls&nbsp;&nbsp;","show-menu=function",,"",1,"&nbsp;&nbsp;Wood & Metal&nbsp;&nbsp;","show-menu=wood",,"",1,"&nbsp;&nbsp;Roof Tile&nbsp;&nbsp;","show-menu=roof",,"",1,"&nbsp;&nbsp;Others&nbsp;&nbsp;","show-menu=other",,"",1])

addmenu(menu=["function",390,,120,1,,style1,,"left",effect,,,,,,,,,,,,,"&nbsp;&nbsp;Nippon Weatherbond&nbsp;&nbsp;","show-menu=pipe",,,0])

addmenu(menu=["pipe",390,,170,1,,style1,,"left",effect,,,,,,,,,,,,,"&nbsp;&nbsp;Colours&nbsp;&nbsp;","http://www.nipponpaint.com.my/product/weatherbond/weatherbond.swf target=_blank",,,1,"&nbsp;&nbsp;Technical Data & Specification&nbsp;&nbsp;","uco.html",,,0])

addmenu(menu=["home1",390,,130,1,,style1,,"left",effect,,,,,,,,,,,,,"&nbsp;&nbsp;Home&nbsp;&nbsp;","http://www.pamsc.com",,,1,"&nbsp;&nbsp;Company Listing&nbsp;&nbsp;","http://www.pamsc.com/allcomp.php",,,1,"&nbsp;&nbsp;Product & Services&nbsp;&nbsp;","http://www.pamsc.com/allcat.php",,,0 ])

addmenu(menu=["wood",390,,150,1,,style1,,"left",effect,,,,,,,,,,,,,"&nbsp;&nbsp;Nippon Timber Finish&nbsp;&nbsp;","show-menu=timber",,,1,"&nbsp;&nbsp;Nippon 9000 Gloss Finish&nbsp;&nbsp;","show-menu=finish1",,,0 ])
addmenu(menu=["timber",,220,170,1,,style1,,"left",effect,,,,,,,,,,,,,"&nbsp;&nbsp;Colours&nbsp;&nbsp;","http://www.nipponpaint.com.my/product/timber/timber_select.html target=_blank",,,1,"&nbsp;&nbsp;Technical Data & Specification&nbsp;&nbsp;","uco.html",,,0])
addmenu(menu=["finish1",,220,170,1,,style1,,"left",effect,,,,,,,,,,,,,"&nbsp;&nbsp;Colours&nbsp;&nbsp;","http://www.nipponpaint.com.my/product/n9000/9000_select.html target=_blank",,,1,"&nbsp;&nbsp;Technical Data & Specification&nbsp;&nbsp;","uco.html",,,0])

addmenu(menu=["roof",390,,120,1,,style1,,"left",effect,,,,,,,,,,,,,"&nbsp;&nbsp;Nippon Roof Coating&nbsp;&nbsp;","show-menu=coat",,,0 ])
addmenu(menu=["coat",,243,170,1,,style1,,"left",effect,,,,,,,,,,,,,"&nbsp;&nbsp;Colours&nbsp;&nbsp;","http://www.nipponpaint.com.my/product/roof/roof_frame.html target=_blank",,,1,"&nbsp;&nbsp;Technical Data & Specification&nbsp;&nbsp;","uco.html",,,0])

addmenu(menu=["other",390,,210,1,,style1,,"left",effect,,,,,,,,,,,,,"&nbsp;&nbsp;Nippon Super Vinilex 5000 Emulsion&nbsp;&nbsp;","show-menu=other1",,,0 ])

addmenu(menu=["other1",390,,170,1,,style1,,"left",effect,,,,,,,,,,,,,"&nbsp;&nbsp;Technical Data & Specification&nbsp&nbsp;&nbsp;","http://www.nipponpaint.com.my/product/3in1/nippon_3in1.swf target=_blank",,,0])

dumpmenus()

