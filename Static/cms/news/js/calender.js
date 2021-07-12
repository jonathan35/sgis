function __doPostBack(eventTarget, eventArgument) {
	var theform;
	if (window.navigator.appName.toLowerCase().indexOf("microsoft") > -1) {
		theform = document.Form1;
	}
	else {
		theform = document.forms["Form1"];
	}
	theform.__EVENTTARGET.value = eventTarget.split("$").join(":");
	theform.__EVENTARGUMENT.value = eventArgument;
	theform.submit();
}

var popup;
var buttonClicked="";
var allowScroll=false;
var divsDisplayed="";

 function showPopup(helpId,contentId,cssSheetUrl,helpTitle,winFeatures,autoHeight,offsetX,offsetY,controlEvent,padding)
 {
     var content=document.getElementById(contentId);     
       if (content != null)
       { 
          var helpIcon=document.getElementById(helpId);
          position=getElementPosition(helpIcon);
          var left=position.x + offsetX;
          var top=position.y + offsetY; 
          var offWidth=0;
          if(helpIcon.offsetWidth)
              offWidth = helpIcon.offsetWidth;
          //handle Width and Height properties
          var width=content.getAttribute('Width');
          var height=content.getAttribute('Height');
          var winLeft=left + offWidth + 5;
          //Opera doesn't support custom/expando attributes
          if (width=='')
          {
              try
              {
                 width=eval(helpId + 'displayWidth');
              }
              catch(exception){width = 200;}
          }     
          if (height=='')
          {
              try
              {
                 height=eval(helpId + 'displayHeight');
              }    
              catch(exception){height = 200;} 
          }
          var type=content.getAttribute('type').toLowerCase();
          //Opera doesn't support custom/expando attributes
          if (type=='') 
          {
              type=eval(helpId + 'displayType').toLowerCase();
          }
      
          if(type=='window')
          {
             //if (controlEvent!="show")
                 //return;
             if (popup!=null && !popup.closed && popup.name && popup.name==helpId)
             {
                popup.close();
                popup=null;
             }
             else
             {
               //need to show the div and then hide in order to get the display
               //height if it's style height attribute is set to auto
               if (autoHeight==true)
               {
                 content.style.position='absolute';
                 content.style.width=width;
                 content.style.display='block';
                 height=content.offsetHeight + 30;
                 content.style.display='none'; 
               }  
               var extra=0;
               //need this so the window displays in the correct position
               if (window.outerHeight)
                  extra=window.outerHeight - document.body.clientHeight; 
               topX=0; topY=0;
               var winTop=0;
               if (window.screenLeft!=null && navigator.userAgent.toLowerCase().indexOf('opera')==-1)
               {
                  topX=window.screenLeft;
                  topY=window.screenTop
                  winTop=top + topY;
               }
               else if (window.screenX!=null && navigator.userAgent.toLowerCase().indexOf('opera')==-1)
               {  
                  topX=window.screenX;
                  topY=window.screenY
                  winTop=top + topY + extra;
               }
               else
                  winTop=top + extra;
               winLeft += topX;
               var features=winFeatures + ',height=' + height + ',width=' + width + ',left=' + winLeft + ',top=' + winTop;
               popup=window.open('',helpId, features);
               popup.document.write(content.innerHTML);
               var winTitle='';   
               if (document.getElementById(helpId + "_Header")!=null)
                    winTitle=document.getElementById(helpId + "_Header").childNodes[0].nodeValue; 
               else
                  winTitle=helpTitle;
               if (winTitle!='')
                   popup.document.write('<title>' + winTitle + '</title>');
               s=content.style.cssText;
               if(s!="")
               {
                  //writing the style element like that below causes an error in IE 5.0 due to display: none
                  if (navigator.userAgent.toLowerCase().indexOf('msie 5.01')==-1)
                  {
                     popup.document.write("<style>body{" + s + "}</style>");
                  }
                  else
                  {
                     s = s.replace("none", "block");
                     popup.document.body.style.cssText=s; 
                  }
               }
               if (content.className!="")
                   popup.document.body.className=content.className;
               popup.document.close();
               popup.focus();
                //use the specified external style sheet
               if (cssSheetUrl!="")
               {   
                   if (popup.document.createStyleSheet)
                   {
                      try
                      {
                         popup.document.createStyleSheet(cssSheetUrl);
                      }
                      catch(e){}
                   }
                   else
                   {     
                      newSS = popup.document.createElement('link'); 
                      newSS.rel='stylesheet';  
                      newSS.type='text/css';
                      newSS.href=cssSheetUrl; 
                      popup.document.documentElement.childNodes[0].appendChild(newSS); 
                   }      
               }
               var bod=popup.document.body; 
               bod.style.marginLeft = padding;
               bod.style.marginRight = padding;
               bod.style.marginTop = padding;
               bod.style.marginBottom = padding;    
               popup.document.body.style.display='block';      
               if (autoHeight)
               {
                 try
                 {
                   incY=popup.document.body.scrollHeight - popup.document.body.clientHeight;
                   incX=popup.document.body.scrollWidth - popup.document.body.clientWidth;
                   if (incY > 0 || incX > 0)
                       popup.resizeBy(incX,incY); 
                 }
                 catch(exception){}
               }
             }
          }
          else if(type=='popup')
          {
             if (controlEvent=="blur")
             {
                if(popup!=null && popup.isOpen)
                {
                   popup.hide();
                   popup=null;
                }   
                return;
             }     
             if (buttonClicked!=helpId)
             {
               if (autoHeight==true && content.scroll=='no')
                   height=20;  //start with 20 as we display and then work out the appropriate
               popup=window.createPopup();
               var bod=popup.document.body;
               //clear the cssText first as there will be cssText default settings by the browser for a popup object
               bod.style.cssText="";
               s=content.style.cssText; 
               if(s!="")
                   bod.style.cssText=s;
               if (content.className!="")
                   bod.className=content.className;
               //use the specified external style sheet
               if (cssSheetUrl!="")  
                  popup.document.createStyleSheet(cssSheetUrl);
               if(parseInt(bod.currentStyle.marginLeft)!=padding)
                  bod.style.marginLeft = padding;
               if(parseInt(bod.currentStyle.marginRight)!=padding)
                  bod.style.marginRight = padding;
               if(parseInt(bod.currentStyle.marginTop)!=padding)
                  bod.style.marginTop = padding;
               if(parseInt(bod.currentStyle.marginBottom)!=padding)
                  bod.style.marginBottom = padding;                          
               bod.style.display='block';
               bod.innerHTML=content.innerHTML;
               var scrollContent='';
               if (autoHeight==false)
                  bod.scroll=(content.scroll!=null && content.scroll.toLowerCase()=='yes') ? content.scroll : 'no'; 
               else 
                  scrollContent=(content.scroll!= null && content.scroll.toLowerCase()=='yes') ? content.scroll : 'no';
            
               if (scrollContent=='yes' || bod.scroll=='yes')
               {
                  var close=popup.document.getElementById(helpId + "_Close");
                  if(close!=null)
                  {   
                      var displayTop=(close.style.top ? parseInt(close.style.top) : 0); 
                      //need following line to prevent auto scrolling on display of the popup
                      //without this the popup auto scrolls so the the first link element is visible
                      //bod.scrollTop is set to 0 in the onscroll event until allowScroll = true
                      setTimeout("parent.scrollOK()",5);
                      bod.onscroll=function(){if(!parent.allowScroll) bod.scrollTop=0; else {close.style.top = displayTop + bod.scrollTop + "px";close.style.right = -(bod.scrollLeft /(9*(bod.scrollWidth/bod.clientWidth))) + "px";}};
                  }
                  else
                  {
                      setTimeout("parent.scrollOK()",5);
                      bod.onscroll=function(){if(!parent.allowScroll) bod.scrollTop=0;};
                  }
               }
               //the following event is wired so that if the show button is clicked to close the popup then it's
               //not immediately displayed again. As the popup auto closes we don't actually know the element that
               //closed it, but using setTimeout with a variable (buttonClicked) that's set means that we know
               //it's the show tip button 
               bod.onunload=function(){parent.buttonClicked=helpId;setTimeout("parent.alertClosed()",100);};  
               popup.show(winLeft,top,width,height,document.body);
               //the following code will run if autoHeight=true and scroll='no'. The popup has displayedwith scolling 
               //so we grab the scoll height which we use to show the popup with the correct height.
               //Just setting scroll='no' for the existing popup and calling show again with the correct
               //height still renders a greyed out vertical scroll bar which we don't want.
               if(scrollContent=='no')
               {   
                   st=popup.document.body.scrollHeight;
                   popup.hide();
                   popup=null;
                   popup=window.createPopup();
                   bod=popup.document.body;
                   bod.style.cssText=""; 
                   if(content.style.cssText!="")
                      bod.style.cssText=content.style.cssText;
                   if(content.className!= "")
                      bod.className=content.className;  
                   //use the specified external style sheet
                   if (cssSheetUrl!="")
                      popup.document.createStyleSheet(cssSheetUrl);
                   if(parseInt(bod.currentStyle.marginLeft)!=padding)
                      bod.style.marginLeft = padding;
                   if(parseInt(bod.currentStyle.marginRight)!=padding)
                      bod.style.marginRight = padding;
                   if(parseInt(bod.currentStyle.marginTop)!=padding)
                      bod.style.marginTop = padding;
                   if(parseInt(bod.currentStyle.marginBottom)!=padding)
                      bod.style.marginBottom = padding;       
                   bod.style.display='block';   
                   bod.innerHTML=content.innerHTML;      
                   cHeight=document.body.clientHeight;
                   if (cHeight < st)
                   {
                      st=cHeight;
                      var close=popup.document.getElementById(helpId + "_Close");
                      if(close!=null)
                      {   
                         var displayTop=(close.style.top ? parseInt(close.style.top) : 0); 
                         setTimeout("parent.scrollOK()",5);
                         bod.onscroll=function(){if(!parent.allowScroll) bod.scrollTop=0; else{close.style.top = displayTop + bod.scrollTop + "px";close.style.right = -(bod.scrollLeft /(9*(bod.scrollWidth/bod.clientWidth))) + "px";}};
                      }
                      else
                      {
                         setTimeout("parent.scrollOK()",5);
                         bod.onscroll=function(){if(!parent.allowScroll) bod.scrollTop=0;};
                      }
                   }
                   else
                      bod.scroll='no';
                   bod.onunload=function(){parent.buttonClicked=helpId;setTimeout("parent.alertClosed()",100);}; 
                   popup.show(winLeft,top,width,st,document.body);
               }
             }
             else
             {
                buttonClicked="";
             }
          } 
          else if(type=='div')
          {
             if (controlEvent=="blur")
             {
               //if the div is scollable then need to be able to scroll it without the div closing
               if(content.style.overflow!='auto')
               {
                   content.style.display='none';
               }    
             }   
             else if(content.style.display!='block')
             {    
               content.style.position='absolute';
               content.style.left=winLeft;  
               content.style.top=top;
               content.style.width=width;    
               if (!autoHeight)              
                   content.style.height=height;
               if (content.style.overflow=='auto' && !autoHeight)
               {
                  var close=document.getElementById(helpId + "_Close");
                  if (close!=null)
                  {  //the close button is covered by the scroll bar if running opera 
                     var userBrowser = navigator.userAgent.toLowerCase();
                     if(userBrowser.indexOf('opera')!=-1 || userBrowser.indexOf('Konqueror')!=-1 || userBrowser.indexOf('Safari')!=-1)
                     {
                         if(close.style.right==0)
                             close.style.right=16;
                         //opera doesn't support div onscroll event
                     }
                     else
                     {
                        var displayTop=(close.style.top ? parseInt(close.style.top) : 0); 
                        if(navigator.userAgent.toLowerCase().indexOf('msie')==-1)
                        {
                           close.style.top=0;
                           content.onscroll=function(){close.style.top = content.scrollTop + "px";close.style.right = -(content.scrollLeft) + "px";};
                        }
                        else
                        {
                           content.scrollTop=0;
                           content.scrollLeft=0;
                           content.onscroll=function(){close.style.top = displayTop + content.scrollTop + "px";close.style.right = -(content.scrollLeft /(9*(content.scrollWidth/content.clientWidth))) + "px";};
                           content.onpropertychange=function(){close.style.top = displayTop + "px"; content.scrollTop=0;};
                        }   
                     }
                  }
               }
               //add default padding for Div to be consistent with Popup default margins
               try
               {
                 if(content.currentStyle)
                 {
                    if(divsDisplayed.indexOf(helpId)==-1) //don't keep incrementing padding for subsequent displays of the Div
                    {
                       content.style.paddingLeft=parseInt(content.currentStyle.paddingLeft)+padding; 
                       content.style.paddingRight=parseInt(content.currentStyle.paddingRight)+padding;
                       content.style.paddingTop=parseInt(content.currentStyle.paddingTop)+padding;
                       content.style.paddingBottom=parseInt(content.currentStyle.paddingBottom)+padding;
                       divsDisplayed+=helpId;
                    }
                 }
                 else
                 {  
                    if(autoHeight){content.style.overflow="visible";}  
                    if(divsDisplayed.indexOf(helpId)==-1)
                    {
                       var vw=document.defaultView;
                       var currStyle=vw.getComputedStyle(content,"");
                       content.style.paddingLeft=parseInt(currStyle.getPropertyValue("padding-left"))+padding;
                       content.style.paddingRight=parseInt(currStyle.getPropertyValue("padding-right"))+padding;
                       content.style.paddingTop=parseInt(currStyle.getPropertyValue("padding-top"))+padding;
                       content.style.paddingBottom=parseInt(currStyle.getPropertyValue("padding-bottom"))+padding;
                       divsDisplayed+=helpId;
                    } 
                 }
               }
               catch(ex){}        
               content.style.display='block'; 
               var currentHeight=content.offsetHeight; 
               var clHeight=document.body.clientHeight;
               //if div display is off the end of the screen then move it up and allow scrolling
               if (clHeight < top + currentHeight && autoHeight)
               {
                  var newTop=clHeight-currentHeight>0 ? clHeight-currentHeight : 0;
                  content.style.top=newTop
                  if(newTop==0)
                  {
                     content.style.height=clHeight;
                     content.style.width=width;    
                     content.style.overflow='auto';
                     var close=document.getElementById(helpId + "_Close");
                     if (close!=null)
                     {  //the close button is covered by the scroll bar if running opera 
                        var userBrowser = navigator.userAgent.toLowerCase();
                        if(userBrowser.indexOf('opera')!=-1 || userBrowser.indexOf('Konqueror')!=-1 || userBrowser.indexOf('Safari')!=-1)
                        {
                           if(close.style.right==0)
                              close.style.right=16;
                        }
                        else
                        {
                           if(navigator.userAgent.toLowerCase().indexOf('msie')==-1)
                           {
                              close.style.top=0;
                              content.scrollTop=0;
                           }
                           var displayTop=(close.style.top ? parseInt(close.style.top) : 0); 
                           content.onscroll=function(){close.style.top = displayTop + content.scrollTop + "px";};
                           content.onpropertychange=function(){close.style.top = displayTop + "px"; content.scrollTop=0;};
                        }
                     }
                     //horizonal scrollbar was showing in some cases when not required - the following code prevents this
                     content.scrollTop=1;
                     content.scrollTop=0;
                  }
               }
               else if(content.style.overflow=='auto' && !autoHeight)
               {
                  content.scrollTop=1;
                  content.scrollTop=0;
               }
             }
             else
             {
               content.style.display='none';
             }
          } 
       }
     return false;
 }
 
  function getElementPosition(element)
  {
    var x=0,y=0;
    if (navigator.userAgent.toLowerCase().indexOf('mac')!=-1)
    {
       while (element!=null)
       {
         try 
         {
            x+=element.offsetLeft;
            y+=element.offsetTop;
            element=element.offsetParent;
         }
         catch(exception)
         {
            return {x:0,y:0};
         }
       }
    }
    else
    {
       while (element!=null)
       {
         try 
         {
            x+=element.offsetLeft-element.scrollLeft;
            y+=element.offsetTop-element.scrollTop;
            element=element.offsetParent;
         }
         catch (exception)
         {
            return {x:0,y:0};
         }
       }
    }
   return {x:x,y:y};
 }

 function postFeedback(response, richHelpId)
 {
    if (document.getElementById(richHelpId + '_Data')!=null)
        document.getElementById(richHelpId + '_Data').value=response;
    document.forms[0].submit();
 }
 
 function scrollOK()
 {
   allowScroll=true;
 }

 function alertClosed()
 {
   buttonClicked="";
   allowScroll=false;
 }
 
<!--
<!-- RichDatePicker ver. 1.6.0.0 -->
var CalendarPopup_curCalendar = '';
var CalendarPopup_curCalendarID = '';
var CalendarPopup_curMonthYear = '';
var CalendarPopup_selMonth = '';
var CalendarPopup_selYear = '';
var MONTH_ARRAY = new Array(31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31);
var MONTH_NAMES = new Array('Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec');

var CalendarPopup_CurrentCalendar=window;
var CalendarPopup_CurrentMonthYear;
var CalendarPopup_CurrentCalendarRelatedControl;

//if (navigator.appName == 'Netscape') { document.captureEvents(Event.CLICK); }

function CalendarPopup_Up_LostFocus(e) { CalendarPopup_Up_HideNonCurrentCalendar('', ''); }

function CalendarPopup_Up_Holiday(month, day, year, span,desc,style) {
	this.Month = month;
	this.Day = day;
	this.Year = year;
	this.Span = span;
	this.Desc = desc;
	this.Style = style;
}

function CalendarPopup_Up_IsHoliday(month, day, year, dateArray) {
	var returnVal = false;
	
	if(dateArray == null) {
		returnVal = false;
	} else {
		for(var i=0; i<dateArray.length; i++) {
			if(dateArray[i].Month == (month + 1) && dateArray[i].Day == day && (dateArray[i].Year == year || dateArray[i].Span)) {
				returnVal = true;
				i = dateArray.length;
			} else {
				returnVal = false;
			}
		}
	}
	return returnVal;
}

function CalendarPopup_Up_GetDescHoliday(month, day, year, dateArray) {
	var returnVal;
	if(dateArray == null) {
		returnVal = "";
	} else {
		for(var i=0; i<dateArray.length; i++) {
			if(dateArray[i].Month == (month + 1) && dateArray[i].Day == day && (dateArray[i].Year == year || dateArray[i].Span)) {
				returnVal = "title=\""+dateArray[i].Desc+"\"";
				i = dateArray.length;
			} else {
				returnVal = "";
			}
		}
	}
	return returnVal;
}

function CalendarPopup_Up_GetStyleHoliday(month, day, year, dateArray, defaultStyle) {
	var returnVal;
	
	if(dateArray == null) {
		returnVal = "";
	} else {
		for(var i=0; i<dateArray.length; i++) {
			if((dateArray[i].Month == (month + 1) && dateArray[i].Day == day && (dateArray[i].Year == year || dateArray[i].Span))&&(dateArray[i].Style!="")) {
				returnVal = " class="+dateArray[i].Style+" ";
				i = dateArray.length;
			} else {
				returnVal = defaultStyle;
			}
		}
	}
	return returnVal;
}

function CalendarPopup_Up_findPosX(obj)
{
	var curleft = 0;
	if (obj.offsetParent)
	{
		while (obj.offsetParent)
		{
			curleft += obj.offsetLeft;
			obj = obj.offsetParent;
		}
	}
	else if (obj.x) {
		curleft += obj.x;
	}
	return curleft;
}

function CalendarPopup_Up_findPosY(obj)
{
	var curtop = 0;
	if (obj.offsetParent)
	{
		while (obj.offsetParent)
		{
			curtop += obj.offsetTop;
			obj = obj.offsetParent;
		}
	}
	else if (obj.y)
		curtop += obj.y;
	return curtop;
}

function CalendarPopup_Up_DisplayCalendar(calIdFlag, tbName, lblName, lblTemp, divName, myName, funcName, myFuncName, wdStyle, weStyle, omStyle, sdStyle, mhStyle, dhStyle, cdStyle, tdStyle, gttStyle, holStyle, formatNum, monthnames, daynames, fdweek, sunNum, satNum, enableHide, includeYears, lBound, uBound, btnName, locQuad, pad, postbackFunc, offsetX, offsetY, showClear, clearText, showGoToToday, goToTodayText, arrowUrl, customFunc, calWidth, visibleKey, nullText, dateArray, nextMonthImgUrl, prevMonthImgUrl, nextYearImgUrl, prevYearImgUrl, cellspacing, cellpadding) {
	
	eval(tbName+"_offsetX="+offsetX+";");
	eval(tbName+"_offsetY="+offsetY+";");
	var div, tb;
	var  mainObject = document.getElementById(tbName + "_outer");
	var datePeriod = mainObject.getAttribute("datePeriod");
	var controlDisplay = mainObject.getAttribute("controlDisplay");
	if (controlDisplay.indexOf("InPage")!=-1) controlDisplay="InPage";
	CalendarPopup_curCalendarID = calIdFlag;
	div = document.getElementById(divName);
	if(div.style.visibility != 'hidden' && controlDisplay!="InPage") {
		div.style.visibility = 'hidden';
	} else {
			var todayDate = CalendarPopup_Up_GetDate(tbName, formatNum,monthnames);
			eval('var stringDate = ' + visibleKey + ';');
		if (controlDisplay!="InPage") {
			CalendarPopup_Up_HideNonCurrentCalendar(divName, myName);
			CalendarPopup_CurrentCalendarRelatedControl = CalendarPopup_GetOffsetControl(tbName, lblName);
			switch(locQuad) {
				case 1:
					eval(tbName+"_offsetY +=" +(CalendarPopup_CurrentCalendarRelatedControl.offsetHeight + 1)+";");
					eval(tbName+"_offsetX -=" +(CalendarPopup_CurrentCalendarRelatedControl.offsetWidth - 2)+";");
					break;
				case 2:
					eval(tbName+"_offsetX -=" +(CalendarPopup_CurrentCalendarRelatedControl.offsetWidth - 2)+";");
					break;			
				case 4:
					eval(tbName+"_offsetX -=" +(CalendarPopup_CurrentCalendarRelatedControl.offsetWidth - 2)+";");
					break;
			} 
			offsetX=eval(tbName+"_offsetX");
			offsetY=eval(tbName+"_offsetY");
		}else {
			//CalendarPopup_CurrentCalendarRelatedControl=div;
			eval(tbName+"_RelatedControl=div");
			eval(tbName+"_offsetY=0;");
			eval(tbName+"_offsetX=0;");
			offsetX=0;
			offsetY=0;
		}		
		switch(datePeriod) {
			case "MonthAndYear":
			case "QuarterYears":
			case "HalfYears":
				if (controlDisplay!="InPage") {
					try {
						if (CalendarPopup_CurrentCalendar != window)
							CalendarPopup_CurrentCalendar.hide();
					} catch(e) {}
					CalendarPopup_CurrentCalendar = window.createPopup();
					CalendarPopup_CurrentCalendar.document.write( "<head>"+getCSS()+"</"+"head>");
					var calendarDiv = CalendarPopupDisplay(tbName,datePeriod,monthnames,customFunc,sdStyle);
					CalendarPopup_CurrentCalendar.document.write("<body style='OVERFLOW: hidden;BORDER-TOP: 0px; BORDER-RIGHT: 0px; BORDER-LEFT: 0px; BORDER-BOTTOM: 0px;PADDING-RIGHT: 0px; PADDING-LEFT: 0px; PADDING-BOTTOM: 0px; MARGIN: 0px; PADDING-TOP: 0px'>"+calendarDiv.innerHTML+"</"+"body>");
					switch(locQuad) {
						case 2:
							CalendarPopup_CurrentCalendar.show(
								CalendarPopup_CurrentCalendarRelatedControl.offsetWidth+offsetX-calendarDiv.offsetWidth,
								offsetY, 
								calendarDiv.offsetWidth - 4, 
								calendarDiv.offsetHeight - 4,
								CalendarPopup_CurrentCalendarRelatedControl);
								break;
						case 4:
							CalendarPopup_CurrentCalendar.show(
								CalendarPopup_CurrentCalendarRelatedControl.offsetWidth+offsetX,
								offsetY-calendarDiv.offsetHeight, 
								calendarDiv.offsetWidth - 4, 
								calendarDiv.offsetHeight - 4,
								CalendarPopup_CurrentCalendarRelatedControl);
								break;
						default:
							CalendarPopup_CurrentCalendar.show(
								CalendarPopup_CurrentCalendarRelatedControl.offsetWidth+offsetX,
								offsetY, 
								calendarDiv.offsetWidth - 4, 
								calendarDiv.offsetHeight - 4,
								CalendarPopup_CurrentCalendarRelatedControl);
								break;
					}
				} else {
					CalendarPopup_CurrentCalendar=window;
					CalendarPopupDisplay(tbName,datePeriod,monthnames,customFunc,sdStyle);
				}
				break;
			case "StartOfWeek":
				CalendarPopup_Up_DisplayCalendarByWeek(tbName, lblName, divName, myName, funcName, myFuncName, stringDate, wdStyle, weStyle, omStyle, sdStyle, mhStyle, dhStyle, cdStyle, tdStyle, gttStyle, holStyle, formatNum, monthnames, daynames, fdweek, sunNum, satNum, enableHide, includeYears, lBound, uBound, pad, postbackFunc, showClear, clearText, showGoToToday, goToTodayText, arrowUrl, customFunc, calWidth, visibleKey, nullText, dateArray, nextMonthImgUrl, prevMonthImgUrl, nextYearImgUrl, prevYearImgUrl, cellspacing, cellpadding,locQuad);
				break;
			default:
				CalendarPopup_Up_DisplayCalendarByDate(tbName, lblName, divName, myName, funcName, myFuncName, stringDate, wdStyle, weStyle, omStyle, sdStyle, mhStyle, dhStyle, cdStyle, tdStyle, gttStyle, holStyle, formatNum, monthnames, daynames, fdweek, sunNum, satNum, enableHide, includeYears, lBound, uBound, pad, postbackFunc, showClear, clearText, showGoToToday, goToTodayText, arrowUrl, customFunc, calWidth, visibleKey, nullText, dateArray, nextMonthImgUrl, prevMonthImgUrl, nextYearImgUrl, prevYearImgUrl, cellspacing, cellpadding,locQuad);
				break;
		}
	}
}

function CalendarPopup_Up_ChangeMonth(selMonth, lbDate, ubDate) {
	if(CalendarPopup_CurrentMonthYear.document.getElementById('CalendarPopup_monthname' + selMonth).style.color == 'black') {
		for(var i=0; i<12; i++) {
			if(i != selMonth)
				CalendarPopup_CurrentMonthYear.document.getElementById('CalendarPopup_monthname' + i).style.background='white';
			else
				CalendarPopup_CurrentMonthYear.document.getElementById('CalendarPopup_monthname' + i).style.background='lightgrey';
		}
		CalendarPopup_selMonth = selMonth++;
	}
}

function CalendarPopup_Up_ChangeYear(selYear, yearNum, lbDate, ubDate,offsetX,offsetY) {
	var lowerDate = new Date(lbDate);
	var upperDate = new Date(ubDate);
	lowerDate = new Date((lowerDate.getMonth() + 1) + '/1/' + lowerDate.getFullYear());
	for(var i=0; i<10; i++) {
		if(i != selYear)
			CalendarPopup_CurrentMonthYear.document.getElementById('CalendarPopup_yearname' + i).style.background='white';
		else
			CalendarPopup_CurrentMonthYear.document.getElementById('CalendarPopup_yearname' + i).style.background='lightgrey';
	}
	for(var i=0; i<12; i++) {
		var curDate = new Date((i + 1) + '/1/' + yearNum);
		if(curDate < lowerDate || curDate > upperDate)
			CalendarPopup_CurrentMonthYear.document.getElementById('CalendarPopup_monthname' + i).style.color = 'gray';
		else
			CalendarPopup_CurrentMonthYear.document.getElementById('CalendarPopup_monthname' + i).style.color = 'black';
		CalendarPopup_CurrentMonthYear.document.getElementById('CalendarPopup_monthname' + i).style.background = 'white';
	}
	var curDate = new Date((CalendarPopup_selMonth + 1) + '/1/' + yearNum);
	if(curDate <= lowerDate)
		CalendarPopup_selMonth = lowerDate.getMonth();
	else if(curDate >= upperDate)
		CalendarPopup_selMonth = upperDate.getMonth();
	CalendarPopup_CurrentMonthYear.document.getElementById('CalendarPopup_monthname' + CalendarPopup_selMonth).style.background = 'lightgrey';
	CalendarPopup_selYear = yearNum;
}

function CalendarPopup_Up_ChangeMonthYear(divName, funcName, isCancel,offsetX,offsetY,locQuad,win) {
	var spanName = divName.replace("_monthYear","_outer");
	var controlDisplay = document.getElementById(spanName).getAttribute("controlDisplay");
	if (controlDisplay.indexOf("InPage")!=-1) controlDisplay="InPage";
	CalendarPopup_CurrentMonthYear.hide();
	CalendarPopup_CurrentMonthYear = null;
	if (controlDisplay!="InPage") {
		if(!isCancel) {
			eval(funcName + "('" + (CalendarPopup_selMonth + 1) + "/1/" + CalendarPopup_selYear + "',"+offsetX+","+offsetY+","+locQuad+");");
		} else {
			CalendarPopup_CurrentCalendar.show(
				CalendarPopup_CurrentCalendarRelatedControl.offsetWidth + offsetX,
				offsetY , 
				document.getElementById(CalendarPopup_curCalendar).offsetWidth - 4, 
				document.getElementById(CalendarPopup_curCalendar).offsetHeight - 4,
				CalendarPopup_CurrentCalendarRelatedControl);		
		}
		document.onmousedown = CalendarPopup_Up_LostFocus;
	} else {
		if(!isCancel) {
			eval(funcName + "('" + (CalendarPopup_selMonth + 1) + "/1/" + CalendarPopup_selYear + "',"+offsetX+","+offsetY+","+locQuad+");");
		}
	}
}

function CalendarPopupDisplay(currentCalendarControl,type,monthnames,customFunc,sdStyle) {
	//currentCalendarControl
	var mainObject = document.getElementById(currentCalendarControl + "_outer");
	var formatNumber = parseInt(mainObject.getAttribute("formatNumber"));
	var controlDisplay = mainObject.getAttribute("controlDisplay");
	var inPageDisplay = (controlDisplay.indexOf("InPage")!=-1);
	var isMultiple = (controlDisplay.indexOf("Multiple")!=-1);
	var currentDate = CalendarPopup_Up_GetDate(currentCalendarControl,formatNumber,monthnames);
	
	var rez;
	switch (type) {
		case "QuarterYears":
			rez = CreateQuarterYearBody(currentCalendarControl,currentDate,customFunc,sdStyle,inPageDisplay,isMultiple);
			break;
		case "HalfYears":	
			rez = CreateHalfYearBody(currentCalendarControl,currentDate,customFunc,sdStyle,inPageDisplay,isMultiple);
			break;
		case "MonthAndYear":
			rez = CreateMonthYearBody(currentCalendarControl,currentDate,monthnames,customFunc,sdStyle,inPageDisplay,isMultiple);
			break;
	}
	var calendarDiv = document.getElementById(currentCalendarControl + "_div");
	calendarDiv.innerHTML  = rez;
	return calendarDiv;
}


function CreateLink(id, text, click, selected) {
	var commonStyle = "font-family:verdana; font-size:xx-small; color: black; cursor:hand;";
	var selectedStyle = "font-family:verdana; font-size:xx-small; color: black; cursor:hand;background:lightgrey;";
	
	var output = "<a ";
	output += "id='" + id + "' ";
	output += "href='#' ";
	output += "onclick=\"" + click + ";return false;\" ";
	output += "style='";
	if (selected) {
		output += selectedStyle;
	} else {
		output += commonStyle;
	}
	output += "'>" + text + "</a>";
	return output;
}

function CalendarPopupGetQuarter(date) {
	switch (date.getMonth()) {
		case 0:
		case 1:
		case 2:
			return 1;
		case 3:
		case 4:
		case 5:
			return 2;
		case 6:
		case 7:
		case 8:
			return 3;
		default:
			return 4;
	}
}

function CalendarPopupCreateYearsSelector(currentDate,func,currentCalendar,sdStyle,monthnames) {
	currentDate=new Date(currentDate);
	if (monthnames!=null) {
		if (monthnames.length!=12) {
			monthnames=monthnames.split(",");
		}
	}	else monthnames="no";
	var output = "<!-- year -->";
	var currentYear = currentDate.getFullYear();
	var year = currentYear - 5;
	var text;
	var m=1+currentDate.getMonth();
	var elem = currentCalendar +"_left";
	output += "<table>";
	for (var y = 1; y <= 10; y += 2) {		
		output += "<tr><td align='center'>";
		text=func+"('"+m+"/1/"+(year + y-1)+"','"+currentCalendar+"',\""+sdStyle+"\",'"+monthnames+"');";
		text=text.replace(/"/g,"&quot;");
		text=text.replace(/'/g,"~");
		
		output += CreateLink(currentCalendar+"_year" + y, year + y-1, "parent.CalendarPopupSelectYear(this,'"+elem+"','"+text+"','"+currentCalendar+"')" , currentYear == (year + y - 1) );
		
		output += "</td><td align='center'>";
		text=func+"('"+m+"/1/"+(year + y)+"','"+currentCalendar+"',\""+sdStyle+"\",'"+monthnames+"');";
		text=text.replace(/"/g,"&quot;");
		text=text.replace(/'/g,"~");
		output += CreateLink(currentCalendar+"_year" + (y+1), year + y, "parent.CalendarPopupSelectYear(this,'"+elem+"','"+text+"','"+currentCalendar+"')", currentYear == (year + y));
		output += "</td></tr>";
	}
		
	text=func+"('"+m+"/1/"+(currentYear-10)+"','"+currentCalendar+"',\""+sdStyle+"\",'"+monthnames+"');"
	text=text.replace(/"/g,"&quot;");
	text=text.replace(/'/g,"~");
	var text2="parent.CalendarPopupCreateYearsSelector('"+m+"/1/"+(currentYear -10)+"','"+func+"','"+currentCalendar+"',\""+sdStyle+"\",'"+monthnames+"');"
	text2=text2.replace(/"/g,"&quot;");
	text2=text2.replace(/'/g,"~");
	output += "<tr><td align='center'>";
	output += CreateLink("prev", "&lt;&lt;&lt;", "parent.CalendarPopupMoveYears('"+text2+"','"+currentCalendar+"','"+text+"',"+(currentYear-10)+");", false);

	text=func+"('"+m+"/1/"+(currentYear+10)+"','"+currentCalendar+"',\""+sdStyle+"\",'"+monthnames+"');"
	text=text.replace(/"/g,"&quot;");
	text=text.replace(/'/g,"~");	
	output += "</td><td align='center'>";
	text2="parent.CalendarPopupCreateYearsSelector('"+m+"/1/"+(currentYear +10)+"','"+func+"','"+currentCalendar+"',\""+sdStyle+"\",'"+monthnames+"');"
	text2=text2.replace(/"/g,"&quot;");
	text2=text2.replace(/'/g,"~");
	output += CreateLink("next", "&gt;&gt;&gt;", "parent.CalendarPopupMoveYears('"+text2+"','"+currentCalendar+"','"+text+"',"+(currentYear+10)+");", false);
	output += "</td></tr>";	
	output += "</table>";
	return output;
}


function FillMonthY(currentDate,currentCalendar,sdStyle,monthnames) {
	currentDate= new Date(currentDate);
	for(var i = 0; i < 12; i++) {
		var Obj = CalendarPopup_CurrentCalendar.document.getElementById(currentCalendar+"_mn" + i);
		if (Obj!=null)	{
			if (Obj.style.background == "lightgrey") {
				currentDate.setMonth(i);
				break;
			}
		}
	}
	if (monthnames.length!=12)
	{
		monthnames = monthnames.split(",");
	}
	var currM = currentDate.getMonth();
	var output="<table>";
	var i = 0;
	while (i<12)
	{
		if (chekMulti(1,i,currentDate.getFullYear(),currentCalendar))
			output += "<tr><td align='center' "+sdStyle+">";
		else
			output += "<tr><td align='center'>";
		output += CreateLink(currentCalendar+"_mn" + i, monthnames[i].substring(0,3), "parent.CalendarPopupSelectMonth(this,'"+currentCalendar+"');",currM == i);
		i++;

		if (chekMulti(1,i,currentDate.getFullYear(),currentCalendar))
			output += "</td><td align='center' "+sdStyle+">";
		else
			output += "</td><td align='center'>";
		output += CreateLink(currentCalendar+"_mn" + i, monthnames[i].substring(0,3), "parent.CalendarPopupSelectMonth(this,'"+currentCalendar+"');",currM == i);
		output += "</td></tr>";
		i++;
	}
	output+="</table>";
	return output;	
}

function CreateMonthYearBody(currentCalendar,currentDate,monthnames,customFunc,sdStyle,inPageDisplay,isMultiple) {
	var formatNum = document.getElementById(currentCalendar + "_outer").getAttribute("formatNumber");
	var output = "<table style='border: black 1px solid;background: white;' border=0 cellspacing=0 cellpadding=0>";
	output += "<tr>";
	output += "<td width='50%' align='center'>";
	output += "<!-- MonthYear -->";
	output += "<p id='"+currentCalendar+"_left'>"
	output += FillMonthY(currentDate,currentCalendar,sdStyle,monthnames);
	output += "</p>"
	output += "</td>";
	output += "<td width='50%' align='center'>";
	output += "<p id='"+currentCalendar+"_right'>";
	output += CalendarPopupCreateYearsSelector(currentDate,'parent.FillMonthY',currentCalendar,sdStyle,monthnames);
	output += "</p>";
	output += "</td>";
	output += "</tr>";
	output += "<tr>";
	output += "<td colspan='2' align='center'>";
	var onclick="";
	if (isMultiple&&inPageDisplay)
		onclick="onclick='parent.CalendarPopupMonthYear(\"" + currentCalendar + "\",\""+monthnames+"\",\""+customFunc+"\");"+currentCalendar+"_Up_CallClick();'";
	else
		onclick="onclick='parent.CalendarPopupMonthYear(\"" + currentCalendar + "\",\""+monthnames+"\",\""+customFunc+"\");'";
	output += "<input type='button' style='font-family:verdana; font-size:xx-small;' value='"+eval(currentCalendar+"_outer_apply")+"' "+onclick+" />";
	if (!inPageDisplay) {
		output += "&nbsp;";
		output += "<input type='button' style='font-family:verdana; font-size:xx-small;' value='"+eval(currentCalendar+"_outer_cancel")+"' onclick='parent.CalendarPopup_CurrentCalendar.hide();parent.CalendarPopup_CurrentCalendar=null;'/>";
	}
	output += "</td></tr></table>";
	
	return output;
}

function FillHalfYear(currentDate,currentCalendar,sdStyle,monthnames) {
	currentDate= new Date(currentDate);
	for(var i = 1; i <= 2; i++) {
		var Obj = CalendarPopup_CurrentCalendar.document.getElementById(currentCalendar+"_h" + i);
		if (Obj!=null)	{
			if (Obj.style.background == "lightgrey") {
				currentDate.setMonth(i*6-5);
				break;
			}
		}
	}
	var output="<table>";
	var currentHalf = 1;
	if (currentDate.getMonth() > 5) {
		currentHalf = 2;
	}

	for (var h = 1; h <= 2; h++) {
		if (chekMulti(1,h*6-6,currentDate.getFullYear(),currentCalendar))
			output += "<tr><td align='center' "+sdStyle+">";
		else
			output += "<tr><td align='center'>";
		output += CreateLink(currentCalendar+"_h" + h, "H" + h, "parent.CalendarPopupSelectHalfYear(this,'"+currentCalendar+"');",currentHalf == h);
		output += "</td></tr>";
	}
	output+="</table>";
	return output;	
}
function CreateHalfYearBody(currentCalendar,currentDate,customFunc,sdStyle,inPageDisplay,isMultiple) {
	var output = "<table style='border: black 1px solid;background: white;' border=0 cellspacing=0 cellpadding=0>";
	output += "<tr>";
	output += "<td width='50%' align='center'>";
	
	output += "<!-- halfs -->";
	output += "<p id='"+currentCalendar+"_left'>"
	output += FillHalfYear(currentDate,currentCalendar,sdStyle);
	output += "</p>"
	output += "</td>";
	output += "<td width='50%' align='center'>";
	output += "<p id='"+currentCalendar+"_right'>";
	output += CalendarPopupCreateYearsSelector(currentDate,'parent.FillHalfYear',currentCalendar,sdStyle,null);
	output += "</p>";
	output += "</td>";
	output += "</tr>";
	output += "<tr>";
	output += "<td colspan='2' align='center'>";
	var onclick="";
	if (isMultiple&&inPageDisplay)
		onclick="onclick='parent.CalendarPopupSetHalfYear(\"" + currentCalendar + "\",\""+customFunc+"\");"+currentCalendar+"_Up_CallClick();'";
	else
		onclick="onclick='parent.CalendarPopupSetHalfYear(\"" + currentCalendar + "\",\""+customFunc+"\");'";
	output += "<input type='button' style='font-family:verdana; font-size:xx-small;' value='"+eval(currentCalendar+"_outer_apply")+"' "+onclick+"/>";
	if (!inPageDisplay) {
		output += "&nbsp;";
		output += "<input type='button' style='font-family:verdana; font-size:xx-small;' value='"+eval(currentCalendar+"_outer_cancel")+"' onclick='parent.CalendarPopup_CurrentCalendar.hide();parent.CalendarPopup_CurrentCalendar=null;'/>";
	}
	output += "</td></tr></table>";
	return output;
}

function FillQYear(currentDate,currentCalendar,sdStyle,monthnames) {
	currentDate= new Date(currentDate);
	for(var i = 1; i <= 4; i++) {
		var qObj = CalendarPopup_CurrentCalendar.document.getElementById(currentCalendar+"_q" + i);
		if (qObj!=null)	{
			if (qObj.style.background == "lightgrey") {
				currentDate.setMonth(i*3-2);
				break;
			}
		}
	}
	
	var currentQuarter = CalendarPopupGetQuarter(currentDate);
	var output= "<table>";
		for (var q = 1; q <= 4; q++) {
		if (chekMulti(1,q*3-3,currentDate.getFullYear(),currentCalendar))
			output += "<tr><td align='center' "+sdStyle+">";
		else
			output += "<tr><td align='center'>";
		output += CreateLink(currentCalendar+"_q" + q, "Q" + q, "parent.CalendarPopupSelectQuarter(this,'"+currentCalendar+"');",currentQuarter == q);
		output += "</td></tr>";
	}
	output += "</table>";
	return output;	
}

function CreateQuarterYearBody(currentCalendar,currentDate,customFunc,sdStyle,inPageDisplay,isMultiple) {
	var output = "<table style='border: black 1px solid;background: white;' border=0 cellspacing=0 cellpadding=0>";
	var currentQuarter = CalendarPopupGetQuarter(currentDate);
	
	output += "<tr>";
	output += "<td width='50%' align='center'>";
	output += "<!-- quarters -->";
	
	output += "<p id='"+currentCalendar+"_left'>"
	output += FillQYear(currentDate,currentCalendar,sdStyle);		
	output += "</p>";
	
	output += "</td>";
	output += "<td width='50%' align='center'>";
	output += "<p id='"+currentCalendar+"_right'>";
	output += CalendarPopupCreateYearsSelector(currentDate,'parent.FillQYear',currentCalendar,sdStyle,null);
	output += "</p>";
	output += "</td>";
	output += "</tr>";
	output += "<tr>";
	output += "<td colspan='2' align='center'>";
	var onclick="";
	if (isMultiple&&inPageDisplay)
		onclick="onclick='parent.CalendarPopupSetQuarter(\"" + currentCalendar + "\",\""+customFunc+"\");"+currentCalendar+"_Up_CallClick();'";
	else
		onclick="onclick='parent.CalendarPopupSetQuarter(\"" + currentCalendar + "\",\""+customFunc+"\");'";
	output += "<input type='button' style='font-family:verdana; font-size:xx-small;' value='"+eval(currentCalendar+"_outer_apply")+"' "+onclick+"/>";
	if (!inPageDisplay) {
		output += "&nbsp;";
		output += "<input type='button' style='font-family:verdana; font-size:xx-small;' value='"+eval(currentCalendar+"_outer_cancel")+"' onclick='parent.CalendarPopup_CurrentCalendar.hide();parent.CalendarPopup_CurrentCalendar=null;'/>";
	}
	output += "</td></tr></table>";
	
	return output;
}

function CalendarPopupSelectHalfYear(obj,currentCalendar) {
	for(var i = 1; i <= 2; i++) {
		var hObj = CalendarPopup_CurrentCalendar.document.getElementById(currentCalendar+"_h" + i);
		if (hObj.id == obj.id) {
			hObj.style.background = "lightgrey";
		} else {
			hObj.style.background = "";
		}
	}

}

function CalendarPopupSelectQuarter(obj,currentCalendar) {
	for(var i = 1; i <= 4; i++) {
		var qObj = CalendarPopup_CurrentCalendar.document.getElementById(currentCalendar+"_q" + i);
		if (qObj.id == obj.id) {
			qObj.style.background = "lightgrey";
		} else {
			qObj.style.background = "";
		}
	}
}

function CalendarPopupMoveYears(text2,currentCalendar,text,year) {
	var i;	
	for(i = 1; i <= 10; i++) {
		var yearObj = CalendarPopup_CurrentCalendar.document.getElementById(currentCalendar+"_year" + i);
		if (yearObj.style.backgroundColor == "lightgrey")
			break;
	}
	var elem=CalendarPopup_CurrentCalendar.document.getElementById(currentCalendar+"_right");
	text2=text2.replace(/~/g,"'");
	elem.innerHTML=eval(text2);
	SetSelection(yearObj,currentCalendar+"_year",1,10);
	text=text.replace("/"+year,"/"+(year+i-6));
	elem=CalendarPopup_CurrentCalendar.document.getElementById(currentCalendar+"_left");
	text=text.replace(/~/g,"'");
	elem.innerHTML=eval(text);
}

function SetSelection(obj,prefix,from,to) {
	for(var i = from; i <= to; i++) {
		var Obj = CalendarPopup_CurrentCalendar.document.getElementById(prefix + i);
		if (Obj.id == obj.id) {
			Obj.style.background = "lightgrey";
		} else {
			Obj.style.background = "";
		}
	}
}

function CalendarPopupSelectYear(obj,elem,text,currentCal) {
	text=text.replace(/~/g,"'");
	SetSelection(obj,currentCal+"_year",1,10);
	CalendarPopup_CurrentCalendar.document.getElementById(elem).innerHTML=eval(text);	
}

function CalendarPopupSelectMonth(obj,currentCalendar) {
	for(var i = 0; i <12; i++) {
		var mounthObj = CalendarPopup_CurrentCalendar.document.getElementById(currentCalendar+"_mn" + i);
		if (mounthObj.id == obj.id) {
			mounthObj.style.background = "lightgrey";
		} else {
			mounthObj.style.background = "";
		}
	}
}

function CalendarPopupMonthYear(currentCalendar,monthnames,customFunc) {
	var month = 1;
	var year = 1900;
	for(var i = 0; i < 12; i++) {
		var hObj = CalendarPopup_CurrentCalendar.document.getElementById(currentCalendar+"_mn" + i);
		if (hObj.style.background == "lightgrey") {
			month = i + 1; 
		}
	}
	for(var j = 1; j <= 10; j++) {
		var yearObj = CalendarPopup_CurrentCalendar.document.getElementById(currentCalendar+"_year" + j);
		if (yearObj.style.background == "lightgrey") {
			year = parseFloat(yearObj.innerText);;
		}
	}
	
	CalendarPopupSelectDate(currentCalendar, month + "/1/" + year,customFunc,monthnames);
	var controlDisplay = document.getElementById(currentCalendar + "_outer").getAttribute("controlDisplay");
	if (controlDisplay.indexOf("InPage")==-1) {
		if (CalendarPopup_CurrentCalendar!=window)
			CalendarPopup_CurrentCalendar.hide();
		CalendarPopup_CurrentCalendar=window;
	}
	eval(currentCalendar + "_Up_PostBack();");
}

function CalendarPopupSetHalfYear(currentCalendar,customFunc) {
	var month = 1;
	var year = 1900;
	for(var i = 1; i <= 2; i++) {
		var hObj = CalendarPopup_CurrentCalendar.document.getElementById(currentCalendar+"_h" + i);
		if (hObj.style.background == "lightgrey") {
			month = ((i - 1) *6) + 1 ; 
		}
	}
	for(var i = 1; i <= 10; i++) {
		var yearObj = CalendarPopup_CurrentCalendar.document.getElementById(currentCalendar+"_year" + i);
		if (yearObj.style.background == "lightgrey") {
			year = parseFloat(yearObj.innerText);;
		}
	}
	CalendarPopupSelectDate(currentCalendar, month + "/1/" + year,customFunc);
	var controlDisplay = document.getElementById(currentCalendar + "_outer").getAttribute("controlDisplay");
	if (controlDisplay.indexOf("InPage")==-1) {	
		if (CalendarPopup_CurrentCalendar!=window)
			CalendarPopup_CurrentCalendar.hide();
		CalendarPopup_CurrentCalendar=window;
	}	
	eval(currentCalendar + "_Up_PostBack();");
}

function CalendarPopupSetQuarter(currentCalendar,customFunc) {
	var month = 1;
	var year = 1900;
	for(var i = 1; i <= 4; i++) {
		var qObj = CalendarPopup_CurrentCalendar.document.getElementById(currentCalendar+"_q" + i);
		if (qObj.style.background == "lightgrey") {
			month = ((i - 1) *3) + 1 ; 
		}
	}
	for(var i = 1; i <= 10; i++) {
		var yearObj = CalendarPopup_CurrentCalendar.document.getElementById(currentCalendar+"_year" + i);
		if (yearObj.style.background == "lightgrey") {
			year = parseFloat(yearObj.innerText);
		}
	}	
	CalendarPopupSelectDate(currentCalendar, month + "/1/" + year,customFunc);
	var controlDisplay = document.getElementById(currentCalendar + "_outer").getAttribute("controlDisplay");
	if (controlDisplay.indexOf("InPage")==-1) {
		if (CalendarPopup_CurrentCalendar!=window)
			CalendarPopup_CurrentCalendar.hide();
		CalendarPopup_CurrentCalendar=window;
	}
	eval(currentCalendar + "_Up_PostBack();");
}

function CalendarPopupSelectDate(currentCalendar, date, customFunc, monthnames) {
	var formatNum = parseFloat(document.getElementById(currentCalendar + "_outer").getAttribute("formatNumber"));
	var datePeriod = document.getElementById(currentCalendar + "_outer").getAttribute("datePeriod");
	var multi = document.getElementById(currentCalendar + "_outer").getAttribute("displayType");
	var val = CalendarPopup_Up_DetermineDateString(date, formatNum, false, datePeriod,monthnames);	
	var tb = document.getElementById(currentCalendar+"_tb");
	var label = document.getElementById(currentCalendar + "_label");
	
	document.getElementById(currentCalendar).value = val;
	
	if(tb != null) {
		tb.value = val;
	}		
	if(label != null) {
		label.innerHTML = val;
	}		
	
	if (multi.substring(0,8)=="Multiple") {
		AddToList(currentCalendar,val,date);
	} 
	
	if(customFunc != "")
		eval(customFunc + "('" + date + "', '" + currentCalendar + "');");
	
	eval(currentCalendar + "_Up_PostBack();");
}


function CalendarPopup_Up_DisplayMonthYear(calDivName, myDivName, funcName, myFuncName, monthnames, theDate, applyText, cancelText, lbDate, ubDate,offsetX,offsetY,locQuad,win) {
	var spanName = calDivName.substring(0,calDivName.length-4) + "_outer";
	var datePeriod = document.getElementById(spanName).getAttribute("datePeriod");
	var controlDisplay = document.getElementById(spanName).getAttribute("controlDisplay");
	if (controlDisplay.indexOf("InPage")!=-1) controlDisplay="InPage";
	var calDIV = document.getElementById(calDivName);
	var myDIV = document.getElementById(myDivName);
	var curDate = new Date(theDate);
	var lowerDate = new Date(lbDate);
	var upperDate = new Date(ubDate);
	lowerDate = new Date((lowerDate.getMonth() + 1) + '/1/' + lowerDate.getFullYear());
	if (controlDisplay!="InPage") {
		if (win!=null)
		{
			switch(locQuad)
			{
			case 2:
				offsetX-=win.document.body.offsetWidth;
				break;
			case 4:
				offsetY-=win.document.body.offsetHeight;
				break;
			}
		}
	}
	CalendarPopup_selMonth = curDate.getMonth();
	if(curDate < lowerDate)
		CalendarPopup_selMonth = lowerDate.getMonth();
	else if(curDate > upperDate)
		CalendarPopup_selMonth = upperDate.getMonth();
	CalendarPopup_selYear = curDate.getFullYear();
	var colspan = 1;
	outputString = '<table style=\"border: black 1px solid;background: white;\" border=0 cellspacing=0 cellpadding=0>';
	outputString = outputString + '<tr><td valign=top align=center><table border=0 cellspacing=0 cellpadding=2 width=50%>';
	for(var i=0; i<12; i++) {
		if(i % 2 == 0)
			outputString = outputString + '<tr>';
		var tempDate = new Date((i + 1) + '/1/' + CalendarPopup_selYear);
		if(tempDate >= lowerDate  && tempDate <= upperDate) {
			if (datePeriod != "DayAndMonth") {
				if(i == CalendarPopup_selMonth)
					outputString = outputString + "<td id=\"CalendarPopup_monthname" + i + "\" onclick=\"parent.CalendarPopup_Up_ChangeMonth(" + i + ", '" + lbDate + "', '" + ubDate + "')\" align=left nowrap style=\"font-family:verdana; font-size:xx-small; color: black;background:lightgrey; cursor:hand;\">" + monthnames[i] + "</td>";
				else
					outputString = outputString + "<td id=\"CalendarPopup_monthname" + i + "\" onclick=\"parent.CalendarPopup_Up_ChangeMonth(" + i + ", '" + lbDate + "', '" + ubDate + "')\" align=left nowrap style=\"font-family:verdana; font-size:xx-small; color: black; cursor:hand;\">" + monthnames[i] + "</td>";
			} else {
				if(i == CalendarPopup_selMonth)
					outputString = outputString + "<td id=\"CalendarPopup_monthname" + i + "\" onclick=\"parent.CalendarPopup_selMonth="+i+";parent.CalendarPopup_Up_ChangeMonthYear('" + myDivName + "', '" + funcName + "', false);\" align=left nowrap style=\"font-family:verdana; font-size:xx-small; color: black;background:lightgrey; CURSOR:hand;\">" + monthnames[i] + "</td>";
				else
					outputString = outputString + "<td id=\"CalendarPopup_monthname" + i + "\" onclick=\"parent.CalendarPopup_selMonth="+i+";parent.CalendarPopup_Up_ChangeMonthYear('" + myDivName + "', '" + funcName + "', false,"+offsetX+","+offsetY+","+locQuad+");\" align=left nowrap style=\"font-family:verdana; font-size:xx-small; color: black; cursor:hand;\">" + monthnames[i] + "</td>";
			}
		} else {
			outputString = outputString + "<td id=\"CalendarPopup_monthname" + i + "\" onclick=\"parent.CalendarPopup_Up_ChangeMonth(" + i + ", '" + i + lbDate + "', '" + ubDate + "')\" align=left nowrap style=\"font-family:verdana; font-size:xx-small; color: gray; cursor:hand;\">" + monthnames[i] + "</td>";
		}
		if(i % 2 != 0)
			outputString = outputString + '</tr>';
	}
	outputString = outputString + '</table></td>';
	if (datePeriod != "DayAndMonth") {
		colspan += 1;
		outputString += '<td valign=top><table border=0 cellspacing=0 cellpadding=2 width=100%>';
		var j = 0;
		for(var i=(curDate.getFullYear() - 5); i<(curDate.getFullYear() + 5); i++) {
			if(j % 2 == 0)
				outputString = outputString + '<tr>';
			if(i >= lowerDate.getFullYear() && i <= upperDate.getFullYear()) {
				if(i == curDate.getFullYear())
					outputString = outputString + "<td id=\"CalendarPopup_yearname" + j + "\" onclick=\"parent.CalendarPopup_Up_ChangeYear(" + j + ", " + i + ", '" + lbDate + "', '" + ubDate + "',"+offsetX+","+offsetY+","+locQuad+")\" align=left nowrap style=\"font-family:verdana; font-size:xx-small;color: black;background: lightgrey; cursor:hand;\">" + i + "</td>";
				else
					outputString = outputString + "<td id=\"CalendarPopup_yearname" + j + "\" onclick=\"parent.CalendarPopup_Up_ChangeYear(" + j + ", " + i + ", '" + lbDate + "', '" + ubDate + "',"+offsetX+","+offsetY+","+locQuad+")\" align=left nowrap style=\"font-family:verdana; font-size:xx-small;color: black; cursor:hand;\">" + i + "</td>";
			} else {
				outputString = outputString + "<td id=\"CalendarPopup_yearname" + j + "\" align=left nowrap style=\"font-family:verdana; font-size:xx-small;color: gray; cursor:hand;\">" + i + "</td>";
			}
			if(j % 2 != 0)
				outputString = outputString + '</tr>';
			j++;
		}
		outputString = outputString + "<tr><td align=left><a style=\"font-family:verdana; font-size:xx-small; color: black;\" href='#' onclick=\"parent." + myFuncName + "((parent.CalendarPopup_selMonth + 1) + '/" + curDate.getDate() + "/" + (curDate.getFullYear() - 10) + "',"+offsetX+","+offsetY+","+locQuad+")\">&lt;&lt;</a></td>";
		outputString = outputString + "<td align=right><a style=\"font-family:verdana; font-size:xx-small; color: black;\" href='#' onclick=\"parent." + myFuncName + "((parent.CalendarPopup_selMonth + 1) + '/" + curDate.getDate() + "/" + (curDate.getFullYear() + 10) + "',"+offsetX+","+offsetY+","+locQuad+")\">&gt;&gt;</a></td></tr>";
		outputString += '</table></td>';
	}
	outputString += '</tr>';
	if (datePeriod != "DayAndMonth") {
		outputString = outputString + "<tr><td colspan='" + colspan + "' align=center nowrap><input onclick=\"parent.CalendarPopup_Up_ChangeMonthYear('" + myDivName + "', '" + funcName + "', false,"+offsetX+","+offsetY+","+locQuad+");\" type=button value=\"" + applyText + "\" style=\"font-family:verdana; font-size:xx-small\"><input onclick=\"parent.CalendarPopup_Up_ChangeMonthYear('" + myDivName + "', '" + funcName + "', true,"+offsetX+","+offsetY+","+locQuad+");\" type=button value=\"" + cancelText + "\" style=\"font-family:verdana; font-size:xx-small\"></td></tr>";
	}
	CalendarPopup_CurrentMonthYear = window.createPopup();
	var oPopupBody = CalendarPopup_CurrentMonthYear.document.body;
	oPopupBody.innerHTML = outputString;
	
	//var obj = CalendarPopup_GetOffsetControl();
	myDIV.innerHTML = outputString;
	if (controlDisplay!="InPage") {
		if (CalendarPopup_CurrentCalendar != window)
			CalendarPopup_CurrentCalendar.hide();
		CalendarPopup_CurrentMonthYear.show(
			CalendarPopup_CurrentCalendarRelatedControl.offsetWidth+offsetX,
			offsetY, 
			myDIV.offsetWidth, 
			myDIV.offsetHeight,
			CalendarPopup_CurrentCalendarRelatedControl);
	} else {
		CalendarPopup_CurrentMonthYear.show(
			offsetX+(calDIV.offsetWidth-myDIV.offsetWidth)/2,offsetY, 
			myDIV.offsetWidth, 
			myDIV.offsetHeight,
			calDIV);
			//eval(calDivName.replace("_div","_RelatedControl")));
	}
}

function CalendarPopup_Up_HideNonCurrentCalendar(divName, myName) {
	if(CalendarPopup_curMonthYear != '') {
		document.getElementById(CalendarPopup_curMonthYear).style.visibility = 'hidden';
		document.getElementById(CalendarPopup_curMonthYear).innerHTML = '';
	}
	if(CalendarPopup_curCalendar != '') {
		document.getElementById(CalendarPopup_curCalendar).innerHTML = '';
		if(eval(CalendarPopup_curCalendarID) == true)
			CalendarPopup_Up_ShowHideDDL('visible');
	}
	
	//gib
	try {
		if (CalendarPopup_CurrentCalendar != window) {
			CalendarPopup_CurrentCalendar.hide();
			CalendarPopup_CurrentCalendar = window;
		}
	} catch(e) {}
	
	if(divName != '')
		CalendarPopup_curCalendar = divName;
	if(myName != '')
		CalendarPopup_curMonthYear = myName;
}

function CalendarPopup_Up_GetMultipleDate(tbName, formatNum) {
	var todayDate;
	if(document.getElementById(tbName).value != '') {
		var theDate;
		var theDateArr = document.getElementById(tbName).value.split("/");
		theDate = theDateArr[0].concat("/").concat(theDateArr[1]).concat("/").concat(theDateArr[2]);
		todayDate = new Date(theDate);
		if(isNaN(todayDate)) {
			todayDate = new Date();
		}
	}else {
		todayDate = new Date();
	}
	return todayDate;
}

function CalendarPopup_Up_GetStandartDate(tbName, formatNum) {
	var todayDate;
	var theDate;
	var theDateArr;
	if(document.getElementById(tbName).innerText != '') {
		theDateArr = document.getElementById(tbName).innerText.split("/");
		if(theDateArr.length != 3) {
			theDateArr = document.getElementById(tbName).innerText.split(".");
			if(theDateArr.length != 3) {			
				theDateArr = document.getElementById(tbName).innerText.split("-");
			}
		}
	} else {
		theDateArr = document.getElementById(tbName).value.split("/");
		if(theDateArr.length != 3) {
			theDateArr = document.getElementById(tbName).value.split(".");
			if(theDateArr.length != 3) {
				theDateArr = document.getElementById(tbName).value.split("-");
			}
		}
	}
	
	if(theDateArr.length == 3) {
			switch(formatNum) {
				case 1: // In: MM/DD/YYYY Out: MM/DD/YYYY
					theDate = theDateArr[0].concat("/").concat(theDateArr[1]).concat("/").concat(theDateArr[2]);
					break;
				case 2: // In: DD/MM/YYYY Out: MM/DD/YYYY
					theDate = theDateArr[1].concat("/").concat(theDateArr[0]).concat("/").concat(theDateArr[2]);
					break;
				case 3: // In: YYYY/MM/DD Out: MM/DD/YYYY
					theDate = theDateArr[1].concat("/").concat(theDateArr[2]).concat("/").concat(theDateArr[0]);
					break;
				case 4: // In MM.DD.YYYY Out: MM.DD.YYYY
					theDate = theDateArr[0].concat("/").concat(theDateArr[1]).concat("/").concat(theDateArr[2]);
					break;
				case 5: // In DD.MM.YYYY Out: MM.DD.YYYY
					theDate = theDateArr[1].concat("/").concat(theDateArr[0]).concat("/").concat(theDateArr[2]);
					break;
				case 6: // In YYYY.MM.DD Out: MM.DD.YYYY
					theDate = theDateArr[1].concat("/").concat(theDateArr[2]).concat("/").concat(theDateArr[0]);
					break;
				case 7: // In MM-DD-YYYY Out: MM-DD-YYYY
					theDate = theDateArr[0].concat("/").concat(theDateArr[1]).concat("/").concat(theDateArr[2]);
					break;
				case 8: // In DD-MM-YYYY Out: MM-DD-YYYY
					theDate = theDateArr[1].concat("/").concat(theDateArr[0]).concat("/").concat(theDateArr[2]);
					break;
				case 9: // In YYYY-MM-DD Out: MM-DD-YYYY
					theDate = theDateArr[1].concat("/").concat(theDateArr[2]).concat("/").concat(theDateArr[0]);
					break;
			}
			todayDate = new Date(theDate);
			if(todayDate == 'NaN'||isNaN(todayDate))
				todayDate = new Date();
	} 
	return todayDate;
}

function CalendarPopup_Up_GetMYDate(tbName, formatNum, monthnames)
{
	//monthnames = monthnames.split(",");
	var theDate = '';
	var theDateArr;
	if(document.getElementById(tbName).innerText != '') {
		theDateArr = document.getElementById(tbName).innerText.split(" ");
	} else {
		theDateArr = document.getElementById(tbName).value.split(" ");
	}
	if (theDateArr.length>=2)
	{
		var i;
		var last = theDateArr.length-1;
		switch(formatNum) {
			case 1: // In:MM YYYY  Out:MM/DD/YYYY  
			case 2:
			case 4:
			case 5:
			case 7:
			case 8:
			case 9:
				for(i=0;i<12;i++) {
				  if (monthnames[i]==theDateArr[0])
					break;
				}
				theDate = (i+1)+"/1/"+theDateArr[last];
				break;
			case 6:
			case 3: // In: YYYY MM Out: MM/DD/YYYY 
				for(i=0;i<12;i++) {
				  if (monthnames[i]==theDateArr[last])
						break;
				}
				theDate = (i+1)+"/1/"+theDateArr[0];
				break;
		}
	}
	return theDate;
}
function CalendarPopup_Up_GetDMDate(tbName, formatNum,monthnames){
	var theDate = '';
	var theDateArr;
	var dateToday=new Date();
	if(document.getElementById(tbName).innerText != '') {
		theDateArr = document.getElementById(tbName).innerText.split(" ");
	} else {
		theDateArr = document.getElementById(tbName).value.split(" ");
	}
	
	if (theDateArr.length>=2)
	{
		var i;
		var last = theDateArr.length-1;
		switch(formatNum) {
			case 1: // In:MM DD  Out:MM/DD/YYYY  
			case 3:
			case 4:
			case 6:
			case 7:
			case 9:				
				for(i=0;i<12;i++) {
				  if (monthnames[i]==theDateArr[0])
					break;
				}
				theDate=(i+1)+"/"+theDateArr[last]+"/"+dateToday.getFullYear();						
				break;
			case 2:
			case 5: // In: DD MM Out: MM/DD/YYYY
			case 8:
				for(i=0;i<12;i++) {
				  if (monthnames[i]==theDateArr[last])
					break;
				}	
				theDate=(i+1)+"/"+theDateArr[0]+"/"+dateToday.getFullYear();	
				break;
		}
	}
	return theDate;
}

function  CalendarPopup_Up_GetCustomDate(tbName, format,monthnames){
	var theDate = '';
	var theDateArr,tmpArr = new Array();
	if(document.getElementById(tbName).innerText != '') {
		theDateArr = document.getElementById(tbName).innerText;
	} else {
		theDateArr = document.getElementById(tbName).value;
	}
	for(i=3;i<6;i++)
	{
	   if (format[i]!="")
	   	   theDateArr = theDateArr.replace(format[i], " ");
	}
	theDateArr=theDateArr.split(" ");
	for(i=0;i<3;i++) {
		switch(format[i]){
			case "D":
			case "DD":
				tmpArr[1]=theDateArr[i];
				break;
			case "M":
			case "MM":
				tmpArr[0]=theDateArr[i];
				break;
			case "MMM":
				for(j=0;j<12;j++){
					if (theDateArr[i]==monthnames[j].substring(0,3))
						tmpArr[0]=j+1;
				}
				break;
			case "MMMM":
				for(j=0;j<12;j++){
					if (theDateArr[i]==monthnames[j]){
						tmpArr[0]=j+1;
						break;
					}
				}
				break;
			case "YY":
				tmpArr[2]=theDateArr[i];
				if (tmpArr[2]>25)
					tmpArr[2]="19"+tmpArr[2];
				else
					tmpArr[2]="20"+tmpArr[2];
				break;
			case "YYYY":
				tmpArr[2]=theDateArr[i];
				break;
		}
	}
	theDate=tmpArr[0]+"/"+tmpArr[1]+"/"+tmpArr[2];
	return theDate;
}

function CalendarPopup_Up_GetQDate(tbName){
	var theDate = '';
	var theDateArr;
	if(document.getElementById(tbName).innerText != '') {
		theDateArr = document.getElementById(tbName).innerText.split(" ");
	} else {
		theDateArr = document.getElementById(tbName).value.split(" ");
	}
	if (theDateArr.length>=2){
		if (theDateArr[0]=="Q1")
			i=1;
		else if (theDateArr[0]=="Q2")
				i=4;
			else if (theDateArr[0]=="Q3")
					i=7;
				else i=10;
		theDate = i+"/1/"+theDateArr[theDateArr.length-1];
	}
	return theDate;
}

function CalendarPopup_Up_GetHDate(tbName){
	var theDate = '';
	var theDateArr;
	if(document.getElementById(tbName).innerText != '') {
		theDateArr = document.getElementById(tbName).innerText.split(" ");
	} else {
		theDateArr = document.getElementById(tbName).value.split(" ");
	}
	if (theDateArr.length>=2){
		if (theDateArr[0]=="H1")
			i=1;
		else i=7;
		theDate = i+"/1/"+theDateArr[theDateArr.length-1];
	}
	return theDate;
}

function CalendarPopup_Up_GetDate(tbName, formatNum, monthnames) {
	var theDate;
	var customFormat = document.getElementById(tbName + "_outer").getAttribute("outFormat");
	var format = customFormat.split("\",");
	var datePeriod = document.getElementById(tbName + "_outer").getAttribute("datePeriod");
	var multi = document.getElementById(tbName + "_outer").getAttribute("displayType").substring(0,8);
		var format = customFormat.split("|,");
	if (format.length<=1)
		format = customFormat.split(",");
	if (format[0]!="")
		datePeriod="Custom";
	if (multi=="Multiple"){
		tbName+="_dates";
		theDate = CalendarPopup_Up_GetMultipleDate(tbName, formatNum);
	}
	else {
		if (document.getElementById(tbName + "_tb") != null) {
			tbName+="_tb";
		} else {
			if (document.getElementById(tbName + "_label")!=null)
				tbName+="_label";
		}
		switch(datePeriod) {
			case "HalfYears":
				theDate = CalendarPopup_Up_GetHDate(tbName);
				break;
			case "QuarterYears":
				theDate = CalendarPopup_Up_GetQDate(tbName);
				break;
			case "MonthAndYear": 
				theDate = CalendarPopup_Up_GetMYDate(tbName, formatNum, monthnames);
				break;
			case "DayAndMonth": 
				theDate = CalendarPopup_Up_GetDMDate(tbName, formatNum,monthnames);
				break;
			case "Custom":
				theDate = CalendarPopup_Up_GetCustomDate(tbName, format,monthnames);
				break;
			default: 
				theDate = CalendarPopup_Up_GetStandartDate(tbName, formatNum);
				break;
		}
	}
	theDate=new Date(theDate);
	if (theDate == 'NaN'||isNaN(theDate)){
		theDate = new Date();
		theDate.setHours(0,0);
	}
	return theDate;
}


function CalendarPopup_Up_ShowHideDDL(visibility) {
	for(j=0;j<document.forms.length; j++) {
		for(i=0;i<document.forms[j].elements.length;i++) {
			if(document.forms[j].elements[i].type != null) {
				if(document.forms[j].elements[i].type.indexOf('select') == 0)
					document.forms[j].elements[i].style.visibility = visibility;
			}
		}
	}
}

function CalendarPopup_GetOffsetControl(tbName,lblName) {
	var obj,tmpObj;
	if (lblName != '') {
		obj = document.getElementById(lblName);
	} else if (tbName != '') {
		if (obj==null)
			obj = document.getElementById(tbName+"_buttonS");
		if (obj==null)
			obj = document.getElementById(tbName+"_dates");	
		if (obj==null)
			obj=document.getElementById(tbName+"_tb");
		if (obj==null)
			obj=document.getElementById(tbName);
	} else {
		alert("Unable to find offset control");
	}
	return obj;
}

function CalendarPopup_Up_DisplayCalendarByWeek(tbName, lblName, divName, myName, funcName, myFuncName, stringDate, wdStyle, weStyle, omStyle, sdStyle, mhStyle, dhStyle, cdStyle, tdStyle, wssStyle, holStyle, formatNum, monthnames, daynames, fdweek, sunNum, satNum, enableHide, includeYears, lBound, uBound, pad, postbackFunc, showClear, clearText, showGoToToday, goToTodayText, arrowUrl, customFunc, calWidth, visibleKey, nullText, dateArray, nextMonthImgUrl, prevMonthImgUrl, nextYearImgUrl, prevYearImgUrl, cellspacing, cellpadding,locQuad) {
	var offsetX=eval(tbName+"_offsetX");
	var offsetY=eval(tbName+"_offsetY");
	var mainObject = document.getElementById(tbName + "_outer");
	var customFormat = mainObject.getAttribute("outFormat");
	var controlDisplay = mainObject.getAttribute("controlDisplay");
	if (controlDisplay.indexOf("InPage")!=-1) controlDisplay="InPage";
	var CallBack = "";
	if (controlDisplay=="InPage")
		 CallBack = tbName+"_Up_CallClick();";	
	var format = customFormat.split("|,");
	var datePeriod = mainObject.getAttribute("datePeriod");
	if (format.length<=1)
		format = customFormat.split(",");
	if (format[0]!="")
		datePeriod="Custom";
	var dateToday = new Date();
	var lowerDate = new Date(lBound);
	var upperDate = new Date(uBound);
	var todayDate = new Date(stringDate);
	var curDate = new Date(CalendarPopup_Up_GetDate(tbName, formatNum, monthnames));
	var monthdays = new Array(31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31);
	var dayNum = curDate.getDay();
	var dayDifference = fdweek-dayNum;
	if (dayDifference>0)
		dayDifference -= 7;
	dayNum = curDate.getDate()+dayDifference;
	var testMonth = curDate.getMonth();
	if (dayNum<=0) {
		dayNum+=monthdays[testMonth];
		testMonth--;
	}
	else if (dayNum>monthdays[testMonth]) {
		dayNum -= curDate.getDate();
		testMonth++;
	}
	curDate = new Date(curDate.getFullYear(),testMonth,dayNum);
	var curMonth = curDate.getMonth();
	var curYear = curDate.getFullYear();
	thisday=todayDate.getDay();
	thismonth=todayDate.getMonth();
	thisdate=todayDate.getDate();
	thisyear=todayDate.getFullYear();
	if ((((thisyear % 4 == 0) && !(thisyear % 100 == 0)) ||(thisyear % 400 == 0)))
		monthdays[1]++;
	var outputString = '';
	startspaces=thisdate;
	var prevMonth = thismonth;
	var prevDay = thisdate;
	var prevYear = thisyear;
	var thisPreviousYear = thisyear - 1;
	var thisNextYear = thisyear + 1;
	if(prevMonth < 1) {
		prevMonth = 12;
		prevYear = prevYear - 1;
	}
	if(thisdate > monthdays[prevMonth - 1])
		prevDay = monthdays[prevMonth - 1];
	var nextMonth = thismonth + 2;
	var nextDay = thisdate;
	var nextYear = thisyear;
	if(nextMonth > 12) {
		nextMonth = 1;
		nextYear = nextYear + 1;
	}
	if(thisdate > monthdays[nextMonth - 1])
		nextDay = monthdays[nextMonth - 1];
	while (startspaces > 7)
		startspaces-=7;
	startspaces = thisday - startspaces + 1;
	startspaces = startspaces - fdweek;
	while (startspaces < 0)
		startspaces+=7;
	outputString = outputString + '<table';
	if(calWidth > 0)
		outputString = outputString + ' width=\"' + calWidth + 'px\"';
	outputString = outputString + ' style=\"border: black 1px solid;\" border=0 cellspacing=' + cellspacing +' cellpadding='+cellpadding+'>';
	if(prevMonthImgUrl == '')
		outputString = outputString + "<tr " + mhStyle + "><td align=center><a " + mhStyle + " href='#' onclick=\"parent." + funcName + "('" + prevMonth + "/" + prevDay+ "/" + prevYear + "',"+offsetX+","+offsetY+","+locQuad+");return false;\">&lt;</a><br>";
	else
		outputString = outputString + "<tr " + mhStyle + "><td align=center><a " + mhStyle + " href='#' onclick=\"parent." + funcName + "('" + prevMonth + "/" + prevDay+ "/" + prevYear + "',"+offsetX+","+offsetY+","+locQuad+");return false;\"><img src=\"" + prevMonthImgUrl + "\" border=0></a><br>";
	if (includeYears)
		if(prevYearImgUrl == '')
			outputString = outputString + "<a " + mhStyle + " href='#' onclick=\"parent." + funcName + "('" + (thismonth + 1) + "/" + thisdate + "/" + thisPreviousYear + "',"+offsetX+","+offsetY+","+locQuad+");return false;\">&lt;&lt;</a></td>";
		else
			outputString = outputString + "<a " + mhStyle + " href='#' onclick=\"parent." + funcName + "('" + (thismonth + 1) + "/" + thisdate + "/" + thisPreviousYear +"',"+offsetX+","+offsetY+","+locQuad+");return false;\"><img src=\"" + prevYearImgUrl + "\" border=0></a></td>";
	outputString = outputString + '<td colspan=6 nowrap align=center ' +mhStyle + "><a " + mhStyle + " href='#' onclick=\"parent." + myFuncName + "('" + (thismonth + 1) + "/1/" + thisyear + "',"+offsetX+","+offsetY+","+locQuad+",window);return false;\">" + monthnames[thismonth] + ' ' + thisyear;
	if(arrowUrl != "")
		outputString = outputString + ' <img src=\"' + arrowUrl + '\" border=0>';
	outputString = outputString + '</a></td>';
	if(nextMonthImgUrl == '')
		outputString = outputString + "<td align=center><a " + mhStyle + " href='#' onclick=\"parent." + funcName + "('" + nextMonth + "/" + nextDay+ "/" + nextYear + "',"+offsetX+","+offsetY+","+locQuad+");return false;\">&gt;</a><br>";
	else
		outputString = outputString + "<td align=center><a " + mhStyle + " href='#' onclick=\"parent." + funcName + "('" + nextMonth + "/" + nextDay+ "/" + nextYear + "',"+offsetX+","+offsetY+","+locQuad+");return false;\"><img src=\"" + nextMonthImgUrl + "\" border=0></a><br>";
	if (includeYears)
		if(nextYearImgUrl == '')
			outputString = outputString + "<a " + mhStyle + " href='#' onclick=\"parent." + funcName + "('" + (thismonth + 1) + "/" + thisdate + "/" + thisNextYear + "',"+offsetX+","+offsetY+","+locQuad+");return false;\">&gt;&gt;</a></td></tr>";
		else
			outputString = outputString + "<a " + mhStyle + " href='#' onclick=\"parent." + funcName + "('" + (thismonth + 1) + "/" + thisdate + "/" + thisNextYear + "',"+offsetX+","+offsetY+","+locQuad+");return false;\"><img src=\"" + nextYearImgUrl + "\" border=0></a></td></tr>";
		
	outputString = outputString + '<tr>';
	outputString = outputString + '<td ' + dhStyle + ' align=center>&nbsp;</td>';
	outputString = outputString + '<td ' + dhStyle + ' align=center>' + daynames[0] + '</td>';
	outputString = outputString + '<td ' + dhStyle + ' align=center>' + daynames[1] + '</td>';
	outputString = outputString + '<td ' + dhStyle + ' align=center>' + daynames[2] + '</td>';
	outputString = outputString + '<td ' + dhStyle + ' align=center>' + daynames[3] + '</td>';
	outputString = outputString + '<td ' + dhStyle + ' align=center>' + daynames[4] + '</td>';
	outputString = outputString + '<td ' + dhStyle + ' align=center>' + daynames[5] + '</td>';
	outputString = outputString + '<td ' + dhStyle + ' align=center>' + daynames[6] + '</td>';
	outputString = outputString + '</tr>';
	
	var onclickStr = "";
	var weekDay=0;
	for (s=0;s<startspaces;s++) {
		var theDate, month, year;
		if(thismonth == 0) {
			theDate = monthdays[11] - (startspaces - (s + 1));
			month = 12;
			year = thisyear - 1;
		} else {
			theDate = monthdays[thismonth - 1] - (startspaces - (s + 1));
			month = thismonth;
			year = thisyear;
		}
		var theCurDate = new Date(month + "/" + theDate + "/" + year);
		var lowerAmount = (lowerDate - theCurDate);
		var upperAmount = (theCurDate - upperDate);
		var style = ((theDate==curDate.getDate() && month==(curDate.getMonth()+1)) || chekMulti(theDate,month-1,year,tbName))?sdStyle:"";
		if (style != "") weekDay=7;
		if ((lowerAmount >0 && upperAmount<0) || (upperAmount>0 && lowerAmount<0)) {
			if(s == 0)
				outputString += "<tr "+style+"><td "+omStyle+" align=center><span "+omStyle+">&gt;</span></td>";
		} else {
			onclickStr = "\"parent.CalendarPopup_Up_SelectDate('" + tbName + "','" + lblName + "','" + divName + "','" + myName + "','" + month + "/" + theDate + "/" + year +"', " + formatNum + ", " + enableHide + ", " + pad + ", '" + postbackFunc + "', '" + customFunc + "', '" + visibleKey + "','"+monthnames+"');"+CallBack+"\"";
			if(s == 0)
				outputString += "<tr "+style+" onclick="+onclickStr+"><td "+wssStyle+" align=center><a "+wssStyle+" onclick=\"return false;\" href='#'>&gt;</a></td>";
		}
		if (weekDay) {
			outputString += "<td align=center " + sdStyle + "><span " + sdStyle + ">" + theDate + "</span></td>";
			weekDay--;
		} else
			outputString += "<td align=center " + omStyle + "><span " + omStyle + ">" + theDate + "</span></td>";
	}
	count=1;
	while (count <= monthdays[thismonth]) {
		for (b = startspaces;b<7;b++) {
			if(b == 0) {
				if ((lowerAmount >0 && upperAmount<0) || (upperAmount>0 && lowerAmount<0))
					onclickStr = "";
				else
					onclickStr = "\"parent.CalendarPopup_Up_SelectDate('" + tbName + "','" + lblName + "','" + divName + "','" + myName + "','" + (thismonth+1) + "/" + count + "/" + thisyear +"', " + formatNum + ", " + enableHide + ", " + pad + ", '" + postbackFunc + "', '" + customFunc + "', '" + visibleKey + "','"+monthnames+"');"+CallBack+"\"";
				if ((count==curDate.getDate() && thismonth == curMonth && thisyear == curYear)||chekMulti(count,thismonth,thisyear,tbName))
					if ((lowerAmount >0 && upperAmount<0) || (upperAmount>0 && lowerAmount<0)) 
						outputString += "<tr "+wssStyle+"><td "+omStyle+" align=center><span "+omStyle+">&gt;</span></td>"; 
					else {
						outputString += "<tr onclick="+onclickStr+" "+sdStyle+"><td "+wssStyle+" align=center><a "+wssStyle+" onclick=\"return false;\" href='#'>&gt;</a></td>"; 
						weekDay=7;
					}
				else
					if ((lowerAmount >0 && upperAmount<0) || (upperAmount>0 && lowerAmount<0))
						outputString += "<tr><td "+omStyle+" align=center><span "+omStyle+">&gt;</span></td>";
					else 
						outputString += "<tr onclick="+onclickStr+"><td align=center "+wssStyle+"><a "+wssStyle+" onclick=\"return false;\" href='#'>&gt;</a></td>";
			}
			if(weekDay) {
				if (weekDay){
					outputString = outputString + '<td align=center ' + sdStyle + '>';
				}
				else if(CalendarPopup_Up_IsHoliday(thismonth, count, thisyear, dateArray))
					outputString = outputString + '<td align=center ' + CalendarPopup_Up_GetStyleHoliday(thismonth,count, thisyear, dateArray,holStyle) + '>';
				else if(thismonth == dateToday.getMonth() && count == dateToday.getDate() && thisyear == dateToday.getFullYear())
						outputString = outputString + '<td align=center ' + tdStyle + '>';
			} else {
				if (count <= monthdays[thismonth]) {
					if(CalendarPopup_Up_IsHoliday(thismonth, count, thisyear, dateArray)) {
						outputString = outputString + '<td align=center ' + CalendarPopup_Up_GetStyleHoliday(thismonth,count, thisyear, dateArray,holStyle) + '>';
					} else {
						if(b!=sunNum && b!=satNum) {
							outputString = outputString + '<td align=center ' + wdStyle + '>';
						} else {
							outputString = outputString + '<td align=center ' + weStyle + '>';
						}
					}
				} else {
					outputString = outputString + '<td align=center ' + omStyle + '>';
				}
			}
			if (count <= monthdays[thismonth]) {
				var theCurDate = new Date((thismonth + 1) + "/" + count + "/" + thisyear);
				var lowerAmount = (lowerDate - theCurDate);
				var upperAmount = (theCurDate - upperDate);
				if (weekDay) {
					if (weekDay) {
						weekDay--;						
						if (CalendarPopup_Up_IsHoliday(thismonth, count, thisyear, dateArray))
							outputString = outputString + "<span " +CalendarPopup_Up_GetDescHoliday(thismonth,count, thisyear, dateArray)+ sdStyle + ">" + count + "</span>";
						else
							outputString = outputString + "<span " + sdStyle + ">" + count + "</span>";
					} else if(CalendarPopup_Up_IsHoliday(thismonth, count, thisyear, dateArray)) {
						if((lowerAmount > 0 && upperAmount < 0) || (upperAmount > 0 && lowerAmount < 0))
							outputString = outputString + "<span " + CalendarPopup_Up_GetStyleHoliday(thismonth,count, thisyear, dateArray,holStyle) + ">" + count + "</span>"; 
						else
							outputString = outputString + "<span " +CalendarPopup_Up_GetDescHoliday(thismonth,count, thisyear, dateArray)+ CalendarPopup_Up_GetStyleHoliday(thismonth,count, thisyear, dateArray,holStyle) + ">" + count + "</span>";
					} else 	
					if(thismonth == dateToday.getMonth() && count == dateToday.getDate() && thisyear == dateToday.getFullYear()) 
						outputString = outputString + "<span " + tdStyle + ">" + count + "</span>"; 
				} else if(CalendarPopup_Up_IsHoliday(thismonth, count, thisyear, dateArray)) {
					if((lowerAmount > 0 && upperAmount < 0) || (upperAmount > 0 && lowerAmount < 0))
						outputString = outputString + "<span " + CalendarPopup_Up_GetStyleHoliday(thismonth,count, thisyear, dateArray,holStyle) + ">" + count + "</span>"; 
					else
						outputString = outputString + "<span " +CalendarPopup_Up_GetDescHoliday(thismonth,count, thisyear, dateArray)+ CalendarPopup_Up_GetStyleHoliday(thismonth,count, thisyear, dateArray,holStyle) + ">" + count + "</span>";
				} else if(b!=sunNum && b!=satNum && count != thisdate) {
					outputString = outputString + "<span " + wdStyle + ">" + count + "</span>"; 
				} else if(b!=sunNum && b!=satNum) {
					outputString = outputString + "<span " + wdStyle + ">" + count + "</span>";
				} else {
					outputString = outputString + "<span " + weStyle + ">" + count + "</span>"; 
				}
			} else {
				var month, year;
				if(thismonth == 11) {
					month = 1;
					year = thisyear + 1;
				} else {
					month = thismonth + 2;
					year = thisyear;
				}
				var theCurDate = new Date(month + "/" + (count - monthdays[thismonth]) + "/" + year);
				var lowerAmount = (lowerDate - theCurDate);
				var upperAmount = (theCurDate - upperDate);
				if (weekDay) {
					outputString += "<span " + sdStyle + ">" + (count - monthdays[thismonth]) + "</span>";
					weekDay--;
				} else			
					outputString += "<span " + omStyle + ">" + (count - monthdays[thismonth]) + "</span>";
			}
			outputString = outputString + '</td>';
			count++;
		}
		outputString = outputString + '</tr>';
		startspaces=0;
		weekDay=0;
	}
	if(showClear && controlDisplay!="InPage")
		outputString = outputString + "<tr><td nowrap " + cdStyle + " colspan=\"8\" align=\"center\"><a " + cdStyle + " href='#' onclick=\"parent.CalendarPopup_Up_ClearDate('" + tbName + "','" + lblName + "','" + divName + "', '" + myName + "', " + enableHide + ", '" + postbackFunc + "', '" + customFunc + "', '" + visibleKey + "', '" + nullText + "');\">" + clearText + "</a></td></tr>";
	outputString = outputString + '</table>';
	document.getElementById(divName).innerHTML = outputString;
	switch (locQuad)
	{
		case 2:
			offsetX-=document.getElementById(divName).offsetWidth;
			break;
		case 4:
			offsetY-=document.getElementById(divName).offsetHeight;
			break;
	}
	if (controlDisplay!="InPage") {
		if (CalendarPopup_CurrentCalendar != window)
			CalendarPopup_CurrentCalendar.hide();
		CalendarPopup_CurrentCalendar = window.createPopup();
		CalendarPopup_CurrentCalendar.document.write( "<head>"+getCSS()+"</"+"head>");
		CalendarPopup_CurrentCalendar.document.write("<body style='OVERFLOW: hidden;BORDER-TOP: 0px; BORDER-RIGHT: 0px; BORDER-LEFT: 0px; BORDER-BOTTOM: 0px;PADDING-RIGHT: 0px; PADDING-LEFT: 0px; PADDING-BOTTOM: 0px; MARGIN: 0px; PADDING-TOP: 0px'>"+document.getElementById(divName).innerHTML+"</"+"body>");
		CalendarPopup_CurrentCalendar.show(
			CalendarPopup_CurrentCalendarRelatedControl.offsetWidth +offsetX,
			offsetY, 
			document.getElementById(divName).offsetWidth - 4, 
			document.getElementById(divName).offsetHeight - 4,
			CalendarPopup_CurrentCalendarRelatedControl);	
	} else {
		CalendarPopup_CurrentCalendar = window;
	}
}



function CalendarPopup_Up_DisplayCalendarByDate(tbName, lblName, divName, myName, funcName, myFuncName, stringDate, wdStyle, weStyle, omStyle, sdStyle, mhStyle, dhStyle, cdStyle, tdStyle, gttStyle, holStyle, formatNum, monthnames, daynames, fdweek, sunNum, satNum, enableHide, includeYears, lBound, uBound, pad, postbackFunc, showClear, clearText, showGoToToday, goToTodayText, arrowUrl, customFunc, calWidth, visibleKey, nullText, dateArray, nextMonthImgUrl, prevMonthImgUrl, nextYearImgUrl, prevYearImgUrl, cellspacing, cellpadding,locQuad) {
	var offsetX=eval(tbName+"_offsetX");
	var offsetY=eval(tbName+"_offsetY");
	var mainObject = document.getElementById(tbName + "_outer");
	var datePeriod = mainObject.getAttribute("datePeriod");
	var customFormat = mainObject.getAttribute("outFormat");
	var controlDisplay = mainObject.getAttribute("controlDisplay");
	if (controlDisplay.indexOf("InPage")!=-1) controlDisplay="InPage";
	var CallBack = "";
	if (controlDisplay=="InPage")
		 CallBack = tbName+"_Up_CallClick();";	
	var format = customFormat.split("|,");
	if (format.length<=1)
		format = customFormat.split(",");
	if (format[0]!="")
		datePeriod="Custom";
	var dayAndMonth = false;
	if (datePeriod=="DayAndMonth") {
		dayAndMonth = true;
	}
 	var dateToday = new Date();
	var lowerDate = new Date(lBound);
	var upperDate = new Date(uBound);
	var todayDate = new Date(stringDate);
	var curDate = new Date(CalendarPopup_Up_GetDate(tbName, formatNum, monthnames));
	var curMonth = curDate.getMonth();
	var curYear = curDate.getFullYear();
	var monthdays = new Array(31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31);
	thisday=todayDate.getDay();
	thismonth=todayDate.getMonth();
	thisdate=todayDate.getDate();
	thisyear=todayDate.getFullYear();
	if (dayAndMonth) {
		temp = new Date();
		thisyear = temp.getFullYear();
		todayDate = new Date(thismonth+"/"+thisdate+"/"+thisyear);
	}
	if ((((thisyear % 4 == 0) && !(thisyear % 100 == 0)) ||(thisyear % 400 == 0))||(dayAndMonth))
		monthdays[1]++;
	var outputString = '';
	startspaces=thisdate;
	var prevMonth = thismonth;
	var prevDay = thisdate;
	var prevYear = thisyear;
	var thisPreviousYear = thisyear - 1;
	var thisNextYear = thisyear + 1;
	if(prevMonth < 1) {
		prevMonth = 12;
		if (!dayAndMonth) {		
			prevYear = prevYear - 1;
		}
	}
	if(thisdate > monthdays[prevMonth - 1])
		prevDay = monthdays[prevMonth - 1];
	var nextMonth = thismonth + 2;
	var nextDay = thisdate;
	var nextYear = thisyear;
	if(nextMonth > 12) {
		nextMonth = 1;
		if (!dayAndMonth) {		
			nextYear = nextYear + 1;
		}
	}
	if(thisdate > monthdays[nextMonth - 1])
		nextDay = monthdays[nextMonth - 1];
	if (!dayAndMonth) {		
		while (startspaces > 7)
			startspaces-=7;
		startspaces = thisday - startspaces + 1;
		startspaces = startspaces - fdweek;
		if (startspaces < 0)
			startspaces+=7;
	} else {
	startspaces=0;
	}
	outputString = outputString + '<table';
	if(calWidth > 0)
		outputString = outputString + ' width=\"' + calWidth + 'px\"';
	outputString = outputString + ' style=\"border: black 1px solid;\" border=0 cellspacing=' + cellspacing +' cellpadding='+cellpadding+'>';
	if (dayAndMonth) {
		includeYears==false;
	}
	if (includeYears == false) {
		if(prevMonthImgUrl == '')
			outputString = outputString + "<tr " + mhStyle + "><td align=center><a " + mhStyle + " href='#' onclick=\"parent." + funcName + "('" + prevMonth + "/" + prevDay + "/" + prevYear + "',"+offsetX+","+offsetY+","+locQuad+");return false;\">&lt;</a></td>";
		else
			outputString = outputString + "<tr " + mhStyle + "><td align=center><a " + mhStyle + " href='#' onclick=\"parent." + funcName + "('" + prevMonth + "/" + prevDay + "/" + prevYear + "',"+offsetX+","+offsetY+","+locQuad+");return false;\"><img src=\"" + prevMonthImgUrl + "\" border=0></a></td>";
	} else {
		if(prevMonthImgUrl == '')
			outputString = outputString + "<tr " + mhStyle + "><td align=center><a " + mhStyle + " href='#' onclick=\"parent." + funcName + "('" + prevMonth + "/" + prevDay+ "/" + prevYear + "',"+offsetX+","+offsetY+","+locQuad+");return false;\">&lt;</a><br>";
		else
			outputString = outputString + "<tr " + mhStyle + "><td align=center><a " + mhStyle + " href='#' onclick=\"parent." + funcName + "('" + prevMonth + "/" + prevDay+ "/" + prevYear + "',"+offsetX+","+offsetY+","+locQuad+");return false;\"><img src=\"" + prevMonthImgUrl + "\" border=0></a><br>";
		
		if(prevYearImgUrl == '')
			outputString = outputString + "<a " + mhStyle + " href='#' onclick=\"parent." + funcName + "('" + (thismonth + 1) + "/" + thisdate + "/" + thisPreviousYear + "',"+offsetX+","+offsetY+","+locQuad+");return false;\">&lt;&lt;</a></td>";
		else
			outputString = outputString + "<a " + mhStyle + " href='#' onclick=\"parent." + funcName + "('" + (thismonth + 1) + "/" + thisdate + "/" + thisPreviousYear +"',"+offsetX+","+offsetY+","+locQuad+");return false;\"><img src=\"" + prevYearImgUrl + "\" border=0></a></td>";
	}
	if (!dayAndMonth) {	
		outputString = outputString + '<td colspan=5 nowrap align=center ' +mhStyle + "><a " + mhStyle + " href='#' onclick=\"parent." + myFuncName + "('" + (thismonth + 1) + "/1/" + thisyear + "',"+offsetX+","+offsetY+","+locQuad+",window);return false;\">" + monthnames[thismonth] + ' ' + thisyear;
	} else {
		outputString = outputString + '<td colspan=5 nowrap align=center ' +mhStyle + "><a " + mhStyle + " href='#' onclick=\"parent." + myFuncName + "('" + (thismonth + 1) + "/1/" + thisyear + "',"+offsetX+","+offsetY+","+locQuad+",window);return false;\">" + monthnames[thismonth];
	}
	if(arrowUrl != "")
		outputString = outputString + ' <img src=\"' + arrowUrl + '\" border=0>';
	outputString = outputString + '</a></td>';
	if (includeYears == false) {
		if(nextMonthImgUrl == '')
			outputString = outputString + "<td align=center><a " + mhStyle + " href='#' onclick=\"parent." + funcName + "('" + nextMonth + "/" + nextDay + "/" + nextYear + "',"+offsetX+","+offsetY+","+locQuad+");return false;\">&gt;</a></td></tr>";
		else
			outputString = outputString + "<td align=center><a " + mhStyle + " href='#' onclick=\"parent." + funcName + "('" + nextMonth + "/" + nextDay + "/" + nextYear + "',"+offsetX+","+offsetY+","+locQuad+");return false;\"><img src=\"" + nextMonthImgUrl + "\" border=0></a></td></tr>";
	} else {
		if(nextMonthImgUrl == '')
			outputString = outputString + "<td align=center><a " + mhStyle + " href='#' onclick=\"parent." + funcName + "('" + nextMonth + "/" + nextDay+ "/" + nextYear + "',"+offsetX+","+offsetY+","+locQuad+");return false;\">&gt;</a><br>";
		else
			outputString = outputString + "<td align=center><a " + mhStyle + " href='#' onclick=\"parent." + funcName + "('" + nextMonth + "/" + nextDay+ "/" + nextYear + "',"+offsetX+","+offsetY+","+locQuad+");return false;\"><img src=\"" + nextMonthImgUrl + "\" border=0></a><br>";
		
		if(nextYearImgUrl == '')
			outputString = outputString + "<a " + mhStyle + " href='#' onclick=\"parent." + funcName + "('" + (thismonth + 1) + "/" + thisdate + "/" + thisNextYear + "',"+offsetX+","+offsetY+","+locQuad+");return false;\">&gt;&gt;</a></td></tr>";
		else
			outputString = outputString + "<a " + mhStyle + " href='#' onclick=\"parent." + funcName + "('" + (thismonth + 1) + "/" + thisdate + "/" + thisNextYear + "',"+offsetX+","+offsetY+","+locQuad+");return false;\"><img src=\"" + nextYearImgUrl + "\" border=0></a></td></tr>";
	}
	if (!dayAndMonth)
	{
		outputString = outputString + '<tr>';
		outputString = outputString + '<td ' + dhStyle + ' align=center>' + daynames[0] + '</td>';
		outputString = outputString + '<td ' + dhStyle + ' align=center>' + daynames[1] + '</td>';
		outputString = outputString + '<td ' + dhStyle + ' align=center>' + daynames[2] + '</td>';
		outputString = outputString + '<td ' + dhStyle + ' align=center>' + daynames[3] + '</td>';
		outputString = outputString + '<td ' + dhStyle + ' align=center>' + daynames[4] + '</td>';
		outputString = outputString + '<td ' + dhStyle + ' align=center>' + daynames[5] + '</td>';
		outputString = outputString + '<td ' + dhStyle + ' align=center>' + daynames[6] + '</td>';
		outputString = outputString + '</tr>';
	}
	for (s=0;s<startspaces;s++) {
		var theDate, month, year;
		if(thismonth == 0) {
			theDate = monthdays[11] - (startspaces - (s + 1));
			month = 12;
			year = thisyear - 1;
		} else {
			theDate = monthdays[thismonth - 1] - (startspaces - (s + 1));
			month = thismonth;
			year = thisyear;
		}
		var theCurDate = new Date(month + "/" + theDate + "/" + year);
		var lowerAmount = (lowerDate - theCurDate);
		var upperAmount = (theCurDate - upperDate);	
		if(s == 0)
			outputString = outputString + '<tr>';
		var click = "onclick = \"parent.CalendarPopup_Up_SelectDate('" + tbName + "','" + lblName + "','" + divName + "','" + myName + "','" + month + "/" + theDate + "/" + year + "', " + formatNum + ", " + enableHide + ", " + pad + ", '" + postbackFunc + "', '" + customFunc + "', '" + visibleKey + "','"+monthnames+"');"+CallBack+"return false;\"";
		if((lowerAmount > 0 && upperAmount < 0) || (upperAmount > 0 && lowerAmount < 0))
			outputString = outputString + "<td align=center " + omStyle + "\">" + theDate + "</td>";
		else if(s!=sunNum && s!=satNum)
			outputString = outputString + "<td align=center " + omStyle + "><a " + omStyle + " href='#' "+click+">" + theDate + "</a></td>";
		else
			outputString = outputString + "<td align=center " + omStyle + "><a " + omStyle + " href='#' "+click+">" + theDate + "</a></td>";
	}
	count=1;
	while (count <= monthdays[thismonth]) {
		for (b = startspaces;b<7;b++) {
			if(b == 0)
				outputString = outputString + '<tr>';	
			if((thismonth == dateToday.getMonth() && count == dateToday.getDate() && thisyear == dateToday.getFullYear()) || (count==curDate.getDate() && thismonth == curMonth && thisyear == curYear && document.getElementById(tbName).value != '')) {
				if (chekMulti(count,thismonth,thisyear,tbName)) {
						outputString = outputString + '<td align=center ' + sdStyle + '>';
				}else
				if (count==curDate.getDate() && (thismonth == curMonth) && thisyear == curYear && document.getElementById(tbName).value != '')
					outputString = outputString + '<td align=center ' + sdStyle + '>';
				else if(CalendarPopup_Up_IsHoliday(thismonth, count, thisyear, dateArray))
					outputString = outputString + '<td align=center ' + CalendarPopup_Up_GetStyleHoliday(thismonth,count, thisyear, dateArray,holStyle) + '>';
				else if(thismonth == dateToday.getMonth() && count == dateToday.getDate() && thisyear == dateToday.getFullYear())
					if (dayAndMonth)
						outputString = outputString + '<td align=center ' + wdStyle + '>';
					else
						outputString = outputString + '<td align=center ' + tdStyle + '>';
			} else {
				if (count <= monthdays[thismonth]) {
					//
					if (chekMulti(count,thismonth,thisyear,tbName)) {
						outputString = outputString + '<td align=center ' + sdStyle + '>';
						}else//
					if(CalendarPopup_Up_IsHoliday(thismonth, count, thisyear, dateArray)) {
						outputString = outputString + '<td align=center ' + CalendarPopup_Up_GetStyleHoliday(thismonth,count, thisyear, dateArray,holStyle) + '>';
					} else {
						if(b!=sunNum && b!=satNum) {
							outputString = outputString + '<td align=center ' + wdStyle + '>';
						} else {
							if (!dayAndMonth) {
								outputString = outputString + '<td align=center ' + weStyle + '>';
							} else {
								outputString = outputString + '<td align=center ' + wdStyle + '>';
							}
						}
					}
				} else {
					outputString = outputString + '<td align=center ' + omStyle + '>';
				}
			}
			if (count <= monthdays[thismonth]) {
				var theCurDate = new Date((thismonth + 1) + "/" + count + "/" + thisyear);
				var lowerAmount = (lowerDate - theCurDate);
				var upperAmount = (theCurDate - upperDate);
				var onclickStr = "\"parent.CalendarPopup_Up_SelectDate('" + tbName + "','" + lblName + "','" + divName + "','" + myName + "','" + (thismonth + 1) + "/" + count + "/" + thisyear +"', " + formatNum + ", " + enableHide + ", " + pad + ", '" + postbackFunc + "', '" + customFunc + "', '" + visibleKey + "','"+monthnames+"');"+CallBack+"return false;\"";
				if ((thismonth == dateToday.getMonth() && count == dateToday.getDate() && thisyear == dateToday.getFullYear()) || (count==curDate.getDate() && thismonth == curMonth && thisyear == curYear && document.getElementById(tbName).value != '')) {
					if ((count==curDate.getDate() && thismonth == curMonth && thisyear == curYear && document.getElementById(tbName).value != '')) {							
						if((lowerAmount > 0 && upperAmount < 0) || (upperAmount > 0 && lowerAmount < 0))
							outputString = outputString + "<span " + sdStyle + ">" + count + "</span>"; 
						else
							if (CalendarPopup_Up_IsHoliday(thismonth, count, thisyear, dateArray))
								outputString = outputString + "<a " +CalendarPopup_Up_GetDescHoliday(thismonth,count, thisyear, dateArray)+ sdStyle + " href='#' onclick="+onclickStr+">" + count + "</a>";
							else
								outputString = outputString + "<a " + sdStyle + " href='#' onclick="+onclickStr+">" + count + "</a>";
					} else if(CalendarPopup_Up_IsHoliday(thismonth, count, thisyear, dateArray)) {
						if((lowerAmount > 0 && upperAmount < 0) || (upperAmount > 0 && lowerAmount < 0))
							outputString = outputString + "<span " + CalendarPopup_Up_GetStyleHoliday(thismonth,count, thisyear, dateArray,holStyle) + ">" + count + "</span>"; 
						else
							outputString = outputString + "<a " +CalendarPopup_Up_GetDescHoliday(thismonth,count, thisyear, dateArray)+ CalendarPopup_Up_GetStyleHoliday(thismonth,count, thisyear, dateArray,holStyle) + " href='#' onclick="+onclickStr+">" + count + "</a>";
					} else 	
					if(thismonth == dateToday.getMonth() && count == dateToday.getDate() && thisyear == dateToday.getFullYear()) {
						if (dayAndMonth) {
							if((lowerAmount > 0 && upperAmount < 0) || (upperAmount > 0 && lowerAmount < 0))
								outputString = outputString + "<span " + wdStyle + ">" + count + "</span>"; 
							else
								outputString = outputString + "<a " + wdStyle + " href='#' onclick="+onclickStr+">" + count + "</a>";
						}else
						if((lowerAmount > 0 && upperAmount < 0) || (upperAmount > 0 && lowerAmount < 0))
							outputString = outputString + "<span " + tdStyle + ">" + count + "</span>"; 
						else
							outputString = outputString + "<a " + tdStyle + " href='#' onclick="+onclickStr+">" + count + "</a>";
					}
				} else if(CalendarPopup_Up_IsHoliday(thismonth, count, thisyear, dateArray)) {
					//
					if (chekMulti(count,thismonth,thisyear,tbName)) {
						if((lowerAmount > 0 && upperAmount < 0) || (upperAmount > 0 && lowerAmount < 0))
							outputString = outputString + "<span " + sdStyle + ">" + count + "</span>"; 
						else
							outputString = outputString + "<a " +CalendarPopup_Up_GetDescHoliday(thismonth,count, thisyear, dateArray)+" "+ sdStyle + " href='#' onclick="+onclickStr+">" + count + "</a>";
						}else//
					if((lowerAmount > 0 && upperAmount < 0) || (upperAmount > 0 && lowerAmount < 0))
						outputString = outputString + "<span " + CalendarPopup_Up_GetStyleHoliday(thismonth,count, thisyear, dateArray,holStyle) + ">" + count + "</span>"; 
					else
						outputString = outputString + "<a " +CalendarPopup_Up_GetDescHoliday(thismonth,count, thisyear, dateArray)+ CalendarPopup_Up_GetStyleHoliday(thismonth,count, thisyear, dateArray,holStyle) + " href='#' onclick="+onclickStr+">" + count + "</a>";
				} else if(b!=sunNum && b!=satNum && count != thisdate) {
					//
					if (chekMulti(count,thismonth,thisyear,tbName)) {
						if((lowerAmount > 0 && upperAmount < 0) || (upperAmount > 0 && lowerAmount < 0))
							outputString = outputString + "<span " + sdStyle + ">" + count + "</span>"; 
						else
							outputString = outputString + "<a " + sdStyle + " href='#' onclick="+onclickStr+">" + count + "</a>";
						}else//
					if((lowerAmount > 0 && upperAmount < 0) || (upperAmount > 0 && lowerAmount < 0))
						outputString = outputString + "<span " + wdStyle + ">" + count + "</span>"; 
					else
						outputString = outputString + "<a " + wdStyle + " href='#' onclick="+onclickStr+">" + count + "</a>";
				} else if(b!=sunNum && b!=satNum) {
				//
					if (chekMulti(count,thismonth,thisyear,tbName)) {
						if((lowerAmount > 0 && upperAmount < 0) || (upperAmount > 0 && lowerAmount < 0))
							outputString = outputString + "<span " + sdStyle + ">" + count + "</span>"; 
						else
							outputString = outputString + "<a " + sdStyle + " href='#' onclick="+onclickStr+">" + count + "</a>";
						}else//
					if((lowerAmount > 0 && upperAmount < 0) || (upperAmount > 0 && lowerAmount < 0))
						outputString = outputString + "<span " + wdStyle + ">" + count + "</span>"; 
					else
						outputString = outputString + "<a " + wdStyle + " href='#' onclick="+onclickStr+">" + count + "</a>";
				} else {
					if (!dayAndMonth) {
					//
					if (chekMulti(count,thismonth,thisyear,tbName)) {
						if((lowerAmount > 0 && upperAmount < 0) || (upperAmount > 0 && lowerAmount < 0))
							outputString = outputString + "<span " + sdStyle + ">" + count + "</span>"; 
						else
							outputString = outputString + "<a " + sdStyle + " href='#' onclick="+onclickStr+">" + count + "</a>";
						}else//
						if((lowerAmount > 0 && upperAmount < 0) || (upperAmount > 0 && lowerAmount < 0))
							outputString = outputString + "<span " + weStyle + ">" + count + "</span>"; 
						else
							outputString = outputString + "<a " + weStyle + " href='#' onclick="+onclickStr+">" + count + "</a>";
					} else {
					//
					if (chekMulti(count,thismonth,thisyear,tbName)) {
						if((lowerAmount > 0 && upperAmount < 0) || (upperAmount > 0 && lowerAmount < 0))
							outputString = outputString + "<span " + sdStyle + ">" + count + "</span>"; 
						else
							outputString = outputString + "<a " + sdStyle + " href='#' onclick="+onclickStr+">" + count + "</a>";
						}else//
						if((lowerAmount > 0 && upperAmount < 0) || (upperAmount > 0 && lowerAmount < 0))
							outputString = outputString + "<span " + wdStyle + ">" + count + "</span>"; 
						else
							outputString = outputString + "<a " + wdStyle + " href='#' onclick="+onclickStr+">" + count + "</a>";
					}
				}
			} else {
			if (!dayAndMonth){
			
				var month, year;
				if(thismonth == 11) {
					month = 1;
					year = thisyear + 1;
				} else {
					month = thismonth + 2;
					year = thisyear;
				}
				var theCurDate = new Date(month + "/" + (count - monthdays[thismonth]) + "/" + year);
				var lowerAmount = (lowerDate - theCurDate);
				var upperAmount = (theCurDate - upperDate);	
					onclickStr = "\"parent.CalendarPopup_Up_SelectDate('" + tbName + "','" + lblName + "','" + divName + "','" + myName + "','" + (1+theCurDate.getMonth()) + "/" + theCurDate.getDate() + "/" + theCurDate.getFullYear() +"', " + formatNum + ", " + enableHide + ", " + pad + ", '" + postbackFunc + "', '" + customFunc + "', '" + visibleKey + "','"+monthnames+"');"+CallBack+"return false;\"";
				if((lowerAmount > 0 && upperAmount < 0) || (upperAmount > 0 && lowerAmount < 0))
					outputString = outputString + "<span " + omStyle + ">" + (count - monthdays[thismonth]) + "</span>";
				else
					outputString = outputString + "<a " +omStyle + " href='#' onclick="+onclickStr+">" + (count - monthdays[thismonth]) + "</a>";
			}
			}
			outputString = outputString + '</td>';
			count++;
		}
		outputString = outputString + '</tr>';
		startspaces=0;
	}
	if(showGoToToday && !dayAndMonth) {
		var shortDate = (dateToday.getMonth() + 1) + "/" + dateToday.getDate() + "/" + dateToday.getFullYear();
		outputString = outputString + "<tr><td nowrap " + gttStyle + " colspan=\"7\" align=\"center\">" + goToTodayText + " <a " + gttStyle + " href='#' onclick=\"javascript:parent.CalendarPopup_Up_SelectDate('" + tbName + "','" + lblName + "','" + divName + "','" + myName + "','" + shortDate + "', " + formatNum + ", " + enableHide + ", " + pad + ", '" + postbackFunc + "', '" + customFunc + "', '" + visibleKey + "','"+monthnames+"');"+CallBack+"\">" + CalendarPopup_Up_DetermineDateString(shortDate, formatNum, pad, datePeriod, monthnames,format) + "</a></td></tr>";
	}
	if(showClear&& !dayAndMonth && controlDisplay!="InPage")
		outputString = outputString + "<tr><td nowrap " + cdStyle + " colspan=\"7\" align=\"center\"><a " + cdStyle + " href='#' onclick=\"parent.CalendarPopup_Up_ClearDate('" + tbName + "','" + lblName + "','" + divName + "', '" + myName + "', " + enableHide + ", '" + postbackFunc + "', '" + customFunc + "', '" + visibleKey + "', '" + nullText + "');\">" + clearText + "</a></td></tr>";
	outputString = outputString + '</table>';
	//gib
	document.getElementById(divName).innerHTML = outputString;
	switch (locQuad)
	{
		case 2:
			offsetX-=document.getElementById(divName).offsetWidth;
			break;
		case 4:
			offsetY-=document.getElementById(divName).offsetHeight;
			break;
	}
	if (controlDisplay!="InPage") {
		try {
			if (CalendarPopup_CurrentCalendar != window)
				CalendarPopup_CurrentCalendar.hide();
		} catch(e) {}
		CalendarPopup_CurrentCalendar = window.createPopup();
		CalendarPopup_CurrentCalendar.document.write( "<head>"+getCSS()+"</"+"head>");
		CalendarPopup_CurrentCalendar.document.write("<body style='OVERFLOW: hidden;BORDER-TOP: 0px; BORDER-RIGHT: 0px; BORDER-LEFT: 0px; BORDER-BOTTOM: 0px;PADDING-RIGHT: 0px; PADDING-LEFT: 0px; PADDING-BOTTOM: 0px; MARGIN: 0px; PADDING-TOP: 0px'>"+document.getElementById(divName).innerHTML+"</"+"body>");
		CalendarPopup_CurrentCalendar.show(
			CalendarPopup_CurrentCalendarRelatedControl.offsetWidth +offsetX,
			offsetY, 
			document.getElementById(divName).offsetWidth - 4, 
			document.getElementById(divName).offsetHeight - 4,
			CalendarPopup_CurrentCalendarRelatedControl);	
	} else {
		CalendarPopup_CurrentCalendar = window;
	}
}

function chekMulti(d,m,y,tbName)
{
	var multi=false;
	var multiMode = document.getElementById(tbName + "_outer").getAttribute("displayType");
	if (multiMode.substring(0,8)=="Multiple"){
		var list = document.getElementById(tbName + "_dates");
		var date = new Date((m+1)+"/"+d+"/"+y);
		for (i=0;i<list.options.length;i++)	{
			var mdate = new Date(list.options[i].value);
			if (mdate.getDate()==date.getDate()&&mdate.getMonth()==date.getMonth()&&mdate.getFullYear()==date.getFullYear())
			{
				multi=true;
				break;
			}
		}
	}
	return multi;
}

function getCSS(){
		var links = document.getElementsByTagName("link");
		var s = "";

		for(i = 0; i < links.length; i++){
			s += links[i].outerHTML;
		}
		var style = document.getElementsByTagName("style");
		for(i = 0; i < style.length; i++){
			s += style[i].outerHTML;
		}
		return s;
}

function CalendarPopup_Up_DetermineDateString(inDate, formatNum, pad, datePeriod, monthnames,format) {
	var theDate;
	switch(datePeriod) {
			case "HalfYears":
				theDate = CalendarPopup_Up_DetermineHDate(inDate);
				break;
			case "MonthAndYear": 
				theDate = CalendarPopup_Up_DetermineMYDate(inDate, formatNum, monthnames);
				break;
			case "DayAndMonth": 
				theDate = CalendarPopup_Up_DetermineDMDate(inDate, formatNum, pad,monthnames);
				break;
			case "QuarterYears":
				theDate = CalendarPopup_Up_DetermineQDate(inDate);
				break;
			case "Custom":
				theDate = CalendarPopup_Up_DetermineCustomDate(inDate, monthnames,format);
				break;
			default: 
				theDate = CalendarPopup_Up_DetermineDate(inDate, formatNum, pad);
				break;
		}
	return theDate;
}

function CalendarPopup_Up_DetermineCustomDate(inDate,monthnames,format){
	var theDate = '';
	var theDateArr = inDate.split("/");
	if (theDateArr.length==3) {
		theDateArr[2] =theDateArr[2].split(" ")[0]; 
		for(i=0;i<3;i++) {
			switch(format[i]){
				case "D":
					theDate+=(theDateArr[1]+format[i+3]);
					break;
				case "DD":
					if (theDateArr[1]<10)
						theDateArr[1]="0"+theDateArr[1];
					theDate+=(theDateArr[1]+format[i+3]);
					break;
				case "M":
					theDate+=(theDateArr[0]+format[i+3]);
					break;
				case "MM":
					if (theDateArr[0]<10)
						theDateArr[0]="0"+theDateArr[0];
					theDate+=(theDateArr[0]+format[i+3]);
					break;
				case "MMM":
					theDate+=(monthnames[theDateArr[0]-1].substring(0,3)+format[i+3]);
					break;
				case "MMMM":
					theDate+=(monthnames[theDateArr[0]-1]+format[i+3]);
					break;
				case "YY":
					theDate+=(theDateArr[2].substring(2,4)+format[i+3]);
					break;
				case "YYYY":
					theDate+=(theDateArr[2]+format[i+3]);
					break;
			}
		}
	}
	return theDate;	
}

function CalendarPopup_Up_DetermineHDate(inDate){
	var theDateArr = inDate.split("/");
	var theDate;
	if (theDateArr[0] <7)
		theDate = "H1";
	else 
		theDate = "H2";
	theDate +=" "+ theDateArr[2];
	return theDate;
}

function CalendarPopup_Up_DetermineQDate(inDate){
	var theDateArr = inDate.split("/");
	var theDate;
	if (theDateArr[0] <7)
		if  (theDateArr[0] <4)
			theDate = "Q1";
		else 
			theDate = "Q2";
	else if (theDateArr[0] <10)
			theDate="Q3";
		else
			theDate="Q4";		
	theDate +=" "+ theDateArr[2];
	return theDate;
}

function CalendarPopup_Up_DetermineDMDate(inDate, formatNum, pad, monthnames) {
	var theDateArr = inDate.split("/");
	var theDate;
	switch(formatNum) {
		case 1: // In:MM/DD/YYYY Out: MM DD
		case 3:
		case 4:
		case 6:
		case 7:
		case 9:		
			theDate = monthnames[theDateArr[0]-1];
			if (theDateArr[1]<10&&pad)
				theDate+=" 0"+theDateArr[1];
			else
				theDate+=" "+theDateArr[1];
			
			break;
		case 2:
		case 5: // In:MM/DD/YYYY  Out: DD MM
		case 8:
			if (theDateArr[1]<10&&pad)
				theDate="0"+theDateArr[1];
			else
				theDate=theDateArr[1];
			theDate +=" "+ monthnames[theDateArr[0]-1];
			break;
	}
	return theDate;
}

function CalendarPopup_Up_DetermineMYDate(inDate, formatNum, monthnames) {
	monthnames = monthnames.split(",");
	var theDateArr = inDate.split("/");
	var theDate;
		switch(formatNum) {
			case 1: // In: MM/DD/YYYY Out: MM YYYY
			case 2:
			case 4:
			case 5:
			case 7:
			case 8:
			case 9:
				theDate = monthnames[theDateArr[0]-1].concat(" ").concat(theDateArr[2]);
				break;
			case 6:
			case 3: // In: MM/DD/YYYY Out: YYYY/MM/DD
				theDate = theDateArr[2].concat(" ").concat(monthnames[theDateArr[0]-1]);
		}
	return theDate;
}

function CalendarPopup_Up_DetermineDate(inDate, formatNum, pad) {
	var theDateArr = inDate.split("/");
	if(theDateArr.length != 3) {
		theDateArr = document.getElementById(tbName).value.split(".");
		if(theDateArr.length != 3) {
			theDateArr = document.getElementById(tbName).value.split("-");
		}		
	}
	if(pad) {
		if(parseFloat(theDateArr[0]) < 10 && theDateArr[0].length == 1)
			theDateArr[0] = '0' + theDateArr[0];
		if(parseFloat(theDateArr[1]) < 10 && theDateArr[1].length == 1)
			theDateArr[1] = '0' + theDateArr[1];
		if(parseFloat(theDateArr[2]) < 10 && theDateArr[2].length == 1)
			theDateArr[2] = '0' + theDateArr[2];
	}

		var theDate;
		switch(formatNum) {
			case 1: // In: MM/DD/YYYY Out: MM/DD/YYYY
				theDate = theDateArr[0].concat("/").concat(theDateArr[1]).concat("/").concat(theDateArr[2]);
				break;
			case 2: // In: MM/DD/YYYY Out: DD/MM/YYYY
				theDate = theDateArr[1].concat("/").concat(theDateArr[0]).concat("/").concat(theDateArr[2]);
				break;
			case 3: // In: MM/DD/YYYY Out: YYYY/MM/DD
				theDate = theDateArr[2].concat("/").concat(theDateArr[0]).concat("/").concat(theDateArr[1]);
				break;
			case 4: // In MM.DD.YYYY Out: MM.DD.YYYY
				theDate = theDateArr[0].concat(".").concat(theDateArr[1]).concat(".").concat(theDateArr[2]);
				break;
			case 5: // In MM.DD.YYYY Out: DD.MM.YYYY
				theDate = theDateArr[1].concat(".").concat(theDateArr[0]).concat(".").concat(theDateArr[2]);
				break;
			case 6: // In MM.DD.YYYY Out: YYYY.MM.DD
				theDate = theDateArr[2].concat(".").concat(theDateArr[0]).concat(".").concat(theDateArr[1]);
				break;
			case 7: // In MM-DD-YYYY Out: MM-DD-YYYY
				theDate = theDateArr[0].concat("-").concat(theDateArr[1]).concat("-").concat(theDateArr[2]);
				break;
			case 8: // In MM-DD-YYYY Out: DD-MM-YYYY
				theDate = theDateArr[1].concat("-").concat(theDateArr[0]).concat("-").concat(theDateArr[2]);
				break;
			case 9: // In MM-DD-YYYY Out: YYYY-MM-DD
				theDate = theDateArr[2].concat("-").concat(theDateArr[0]).concat("-").concat(theDateArr[1]);
				break;
		}
	return theDate;
}



function CalendarPopup_Up_SelectDate(tbName, lblName, divName, myName, theDate, formatNum, enableHide, pad, postbackFunc, customFunc, visibleKey,monthnames) {
	monthnames = monthnames.split(",");
	var multi = document.getElementById(tbName + "_outer").getAttribute("displayType");
	var datePeriod = document.getElementById(tbName + "_outer").getAttribute("datePeriod");
	var customFormat = document.getElementById(tbName + "_outer").getAttribute("outFormat");
	var format = customFormat.split("|,");
	if (format.length<=1)
		format = customFormat.split(",");
	if (format[0]!="")
		datePeriod="Custom";
	var val = CalendarPopup_Up_DetermineDateString(theDate, formatNum, pad, datePeriod,monthnames,format);
	var tb = document.getElementById(tbName+"_tb");
	var label = document.getElementById(lblName);
	var theDateArr = val.split("/");;
	if(theDateArr.length != 3) {
		theDateArr = val.split(".");
		if(theDateArr.length != 3) {			
			val.split("-");
		}
	}
	if (datePeriod!="SpecificDate")
		document.getElementById(tbName).value = val;
	else
		document.getElementById(tbName).value = val.split(" ")[0];
	if (tb!=null) {
		tb.value = val;
	}
	if(label !=null) {
		label.innerHTML = val;
	}
	var controlDisplay = document.getElementById(tbName + "_outer").getAttribute("controlDisplay");
	if (controlDisplay.indexOf("InPage")==-1) {
		document.getElementById(divName).style.visibility = 'hidden';
		document.getElementById(myName).style.visibility = 'hidden';	
		//gib
		if (CalendarPopup_CurrentCalendar != window) {
			CalendarPopup_CurrentCalendar.hide();
			CalendarPopup_CurrentCalendar = window;
		}
	}				
	if (multi.substring(0,8)=="Multiple") {
		AddToList(tbName,val,theDate,visibleKey);
	}
	eval(postbackFunc + "();");

	if(enableHide)
		CalendarPopup_Up_ShowHideDDL('visible');
	if(customFunc != "")
		//eval(customFunc + "('" + theDate + "', '" + tbName + "');");
	eval(visibleKey + ' = \"' + theDate + '\";');
}
/////------------
//Multi
/////==========



function AddToList(tbName,val,theDate,visibleKey){
	var elem = document.getElementById(tbName+"_dates");
	var mainObject = document.getElementById(tbName+"_outer");
	var isInPage = (mainObject.getAttribute("ControlDisplay").indexOf("InPage")!=-1);
	var rFlag=false;
	for (i=0;i<elem.options.length;i++) {
		if (elem.options[i].text==val)	{
			elem.options.remove(i);
			rFlag = true;
		}
	}
	if (!rFlag){
		var oOption = document.createElement("OPTION");
		elem.options.add(oOption,0);
		oOption.text = val;
		oOption.value = theDate;
		if (!isInPage)	ShakerSort(elem);
		elem.selectedIndex=0;
		if (visibleKey!="")
		{		
			Change(elem,visibleKey);
		} else {
			elem.fireEvent("onchange");
			}
	}
	document.getElementById(tbName).value=GetAllValues(elem);
}

function GetAllValues(elem) {
	var rez="";
	for (i=0;i<elem.options.length;i++) {
		rez+=elem.options[i].text;
		if (i!=elem.options.length-1)
			rez+=";";
	}
	return rez;
}

function Change(me,visibleKey)
{
	eval(visibleKey+"='"+me.options[me.selectedIndex].value+"';");
}
function ShakerSort(elem) {
	var l=1,r=elem.options.length-1,k,tval,ttext;
	k=r;
	do {
		for(j=r;j>=l;j--) {
			if (new Date(elem.options[j-1].value)>new Date(elem.options[j].value)) {
				tval=elem.options[j-1].value; ttext=elem.options[j-1].text;
				elem.options[j-1].value = elem.options[j].value;
				elem.options[j-1].text = elem.options[j].text;
				elem.options[j].value = tval;
				elem.options[j].text = ttext;
				k=j;
			}
		}
		l=k+1;
		for(j=l;j<=r;j++) {
			if (new Date(elem.options[j-1].value)>new Date(elem.options[j].value)) {
				tval=elem.options[j-1].value; ttext=elem.options[j-1].text;
				elem.options[j-1].value = elem.options[j].value;
				elem.options[j-1].text = elem.options[j].text;
				elem.options[j].value = tval;
				elem.options[j].text = ttext;
				k=j;
			}
		}
		r=k-1;
	} while (l<=r);
}

/////------------
//End Multi
/////==========


function CalendarPopup_Up_ClearDate(tbName, lblName, divName, myName, enableHide, postbackFunc, customFunc, visibleKey, nullText) {
	var todayDate = new Date();
	document.getElementById(tbName+"_tb").value = '';
	document.getElementById(tbName).value = '';
	if(lblName != '')
		document.getElementById(lblName).innerHTML = nullText;
	//gib
	CalendarPopup_CurrentCalendar.hide();
	CalendarPopup_CurrentCalendar = window;
	//if(enableHide)
	//	CalendarPopup_Up_ShowHideDDL('visible');
	eval(postbackFunc + "();");
	if(customFunc != "")
		eval(customFunc + "('', '" + tbName + "');");
	eval(visibleKey + ' = \"' + (todayDate.getMonth() + 1) + '/' + todayDate.getDate() + '/' + todayDate.getFullYear() + ' 0:0\";');
}
//Time Picker function
function check(box,min,max,oldV)
{
	var str = box.value.substring(0,1);
	if (str=="0"){
		box.value=box.value.substring(1,2);
	}
	if (isNaN(parseFloat(box.value)))
		box.value = oldV;
	if (box.value>max) box.value=max;
	if (box.value<min) box.value=min;
	if (box.value<10)
		box.value="0"+box.value;
}

function RDP_up(box, min, max, howmuch)
{
	check(box,min,max);
	var newvalue = parseFloat(box.value) + howmuch;
	if (newvalue<=max)
		box.value = newvalue;
	else
		box.value=newvalue-max-1;
	if (box.value<10)
		box.value="0"+box.value;
	box.fireEvent("onchange");
}

function RDP_down(box, min, max, howmuch) 
{
	check(box,min,max);
	var newvalue = parseFloat(box.value) - howmuch;
	if (newvalue>=min)
		box.value = newvalue;
	else
		box.value = max+newvalue+1;
	if (box.value<10)
		box.value="0"+box.value;
	box.fireEvent("onchange");
}

var _PageTemplate_innerHolder_richDatePicker2_outer_EnableHideDropDownFlag = false;
var _PageTemplate_innerHolder_richDatePicker2_outer_VisibleDate = '01/01/2006';

/*
function _PageTemplate_innerHolder_richDatePicker2_Up_SetClick(addClickTo)
{
	if(addClickTo != '') document.getElementById(addClickTo).onclick = _PageTemplate_innerHolder_richDatePicker2_Up_CallClick;
	document.onmousedown = CalendarPopup_Up_LostFocus;
	document.getElementById('_PageTemplate_innerHolder_richDatePicker2_tb').onclick = _PageTemplate_innerHolder_richDatePicker2_Up_CallClick;
}
*/
function _PageTemplate_innerHolder_richDatePicker2_Up_CallClick(e)
{
	var monthnames = new Array('January','February','March','April','May','June','July','August','September','October','November','December');
	var daynames = new Array('S','M','T','W','T','F','S');
	CalendarPopup_Up_DisplayCalendar("_PageTemplate_innerHolder_richDatePicker2_outer_EnableHideDropDownFlag", "_PageTemplate_innerHolder_richDatePicker2","","","_PageTemplate_innerHolder_richDatePicker2_div", "_PageTemplate_innerHolder_richDatePicker2_monthYear","_PageTemplate_innerHolder_richDatePicker2_Up_PreDisplayCalendar", "_PageTemplate_innerHolder_richDatePicker2_Up_PreMonthYear", "style='color:Black;background-color:White;font-family:Verdana,Helvetica,Tahoma,Arial;font-size:XX-Small;'","style='color:Black;background-color:#EFEBEF;font-family:Verdana,Helvetica,Tahoma,Arial;font-size:XX-Small;'","style='color:#A5A2A5;background-color:White;font-family:Verdana,Helvetica,Tahoma,Arial;font-size:XX-Small;'","style='color:Black;background-color:#DEAE00;font-family:Verdana,Helvetica,Tahoma,Arial;font-size:XX-Small;font-weight:bold;'","style='color:Black;background-color:#DEAE00;font-family:Verdana,Helvetica,Tahoma,Arial;font-size:XX-Small;'", "style='color:Black;background-color:#CECFCE;font-family:Verdana,Helvetica,Tahoma,Arial;font-size:XX-Small;'", "style='color:Black;background-color:White;font-family:Verdana,Helvetica,Tahoma,Arial;font-size:XX-Small;'", "style='color:#CE0000;background-color:White;font-family:Verdana,Helvetica,Tahoma,Arial;font-size:XX-Small;font-weight:bold;'", "style='color:Black;background-color:White;font-family:Verdana,Helvetica,Tahoma,Arial;font-size:XX-Small;'", "style='color:Black;background-color:White;font-family:Verdana,Helvetica,Tahoma,Arial;font-size:XX-Small;'", 1, monthnames, daynames, 0, 0, 6, false, false, '01/01/1000', '12/31/9998','_PageTemplate_innerHolder_richDatePicker2_image',3, false, '_PageTemplate_innerHolder_richDatePicker2_Up_PostBack', 0, 0, false, 'Clear Date', false, 'Today\'s Date:', '', 'customMessage', -1, "_PageTemplate_innerHolder_richDatePicker2_outer_VisibleDate", "Select a Date", CalendarPopup_Array__PageTemplate_innerHolder_richDatePicker2_outer, '', '', '', '', '0px', '2px');
}
function _PageTemplate_innerHolder_richDatePicker2_Up_PreDisplayCalendar(theDate,offsetX,offsetY,locQuad)
{
	var monthnames = new Array('January','February','March','April','May','June','July','August','September','October','November','December');
	var daynames = new Array('S','M','T','W','T','F','S');
CalendarPopup_Up_DisplayCalendarByDate("_PageTemplate_innerHolder_richDatePicker2","","_PageTemplate_innerHolder_richDatePicker2_div", "_PageTemplate_innerHolder_richDatePicker2_monthYear", "_PageTemplate_innerHolder_richDatePicker2_Up_PreDisplayCalendar", "_PageTemplate_innerHolder_richDatePicker2_Up_PreMonthYear", theDate, "style='color:Black;background-color:White;font-family:Verdana,Helvetica,Tahoma,Arial;font-size:XX-Small;'","style='color:Black;background-color:#EFEBEF;font-family:Verdana,Helvetica,Tahoma,Arial;font-size:XX-Small;'","style='color:#A5A2A5;background-color:White;font-family:Verdana,Helvetica,Tahoma,Arial;font-size:XX-Small;'","style='color:Black;background-color:#DEAE00;font-family:Verdana,Helvetica,Tahoma,Arial;font-size:XX-Small;font-weight:bold;'","style='color:Black;background-color:#DEAE00;font-family:Verdana,Helvetica,Tahoma,Arial;font-size:XX-Small;'","style='color:Black;background-color:#CECFCE;font-family:Verdana,Helvetica,Tahoma,Arial;font-size:XX-Small;'", "style='color:Black;background-color:White;font-family:Verdana,Helvetica,Tahoma,Arial;font-size:XX-Small;'", "style='color:#CE0000;background-color:White;font-family:Verdana,Helvetica,Tahoma,Arial;font-size:XX-Small;font-weight:bold;'", "style='color:Black;background-color:White;font-family:Verdana,Helvetica,Tahoma,Arial;font-size:XX-Small;'", "style='color:Black;background-color:White;font-family:Verdana,Helvetica,Tahoma,Arial;font-size:XX-Small;'", 1 , monthnames, daynames, 0, 0, 6, false, false, '01/01/1000', '12/31/9998', false, '_PageTemplate_innerHolder_richDatePicker2_Up_PostBack', false, 'Clear Date', false, 'Today\'s Date:', '', 'customMessage', -1, "_PageTemplate_innerHolder_richDatePicker2_outer_VisibleDate", "Select a Date", CalendarPopup_Array__PageTemplate_innerHolder_richDatePicker2_outer, '', '', '', '', '0px', '2px',3);
}

//_PageTemplate_innerHolder_richDatePicker2_Up_SetClick('');

function _PageTemplate_innerHolder_richDatePicker2_Up_PreMonthYear(theDate,offsetX,offsetY,locQuad,win)
{
	var monthnames = new Array('Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec');
	CalendarPopup_Up_DisplayMonthYear("_PageTemplate_innerHolder_richDatePicker2_div", "_PageTemplate_innerHolder_richDatePicker2_monthYear", "_PageTemplate_innerHolder_richDatePicker2_Up_PreDisplayCalendar", "_PageTemplate_innerHolder_richDatePicker2_Up_PreMonthYear", monthnames, theDate, "Apply", "Cancel", "01/01/1000", "12/31/9998",offsetX,offsetY,locQuad,win);
}

function _PageTemplate_innerHolder_richDatePicker2_Up_PostBack() {
}


var _PageTemplate_innerHolder_richDatePicker2_outer_cancel="Cancel", _PageTemplate_innerHolder_richDatePicker2_outer_apply="Apply";var _PageTemplate_innerHolder_richDatePicker2_outer_offsetX, _PageTemplate_innerHolder_richDatePicker2_outer_offsetY;

var CalendarPopup_Array__PageTemplate_innerHolder_richDatePicker1_outer =  new Array(new CalendarPopup_Up_Holiday(0, 0, 0, false, "", ""));
var CalendarPopup_Array__PageTemplate_innerHolder_richDatePicker2_outer =  new Array(new CalendarPopup_Up_Holiday(0, 0, 0, false, "", ""));
