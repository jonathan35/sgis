/******************************************************************************
  Crossday Discuz! Board - BB Code Insert
  Modified by: Crossday Studio (http://crossday.com), Weiming Bianzhou
  Based upon:  XMB CodeInsert (http://www.xmbforum.com), matt
*******************************************************************************/

defmode = "normalmode";		// default mode (normalmode, advmode, helpmode)

if (defmode == "advmode") {
        helpmode = false;
        normalmode = false;
        advmode = true;
} else if (defmode == "helpmode") {
        helpmode = true;
        normalmode = false;
        advmode = false;
} else {
        helpmode = false;
        normalmode = true;
        advmode = false;
}
function chmode(swtch){
        if (swtch == 1){
                advmode = false;
                normalmode = false;
                helpmode = true;
                alert(help_mode);
        } else if (swtch == 0) {
                helpmode = false;
                normalmode = false;
                advmode = true;
                alert(adv_mode);
        } else if (swtch == 2) {
                helpmode = false;
                advmode = false;
                normalmode = true;
                alert(normal_mode);
        }
}

function AddText(NewCode, thetype) {
var type=thetype;
	if(thetype=="inputbackground")
	{
        if(document.all)
		{
        	insertAtCaret(document.inputbackground.txtDesc, NewCode);
        	setfocus(thetype);
        }
		else
		{
        	document.inputbackground.txtDesc.value += NewCode;
        	setfocus(thetype);
        }
	}
	else if(thetype=="inputnaturalofbusiness")
	{
        if(document.all)
		{
        	insertAtCaret(document.inputnaturalofbusiness.txtDesc, NewCode);
        	setfocus(thetype);
        }
		else
		{
        	document.inputnaturalofbusiness.txtDesc.value += NewCode;
        	setfocus(thetype);
        }
	}
	else if(thetype=="inputproducts")
	{
        if(document.all)
		{
        	insertAtCaret(document.inputproducts.txtDesc, NewCode);
        	setfocus(thetype);
        }
		else
		{
        	document.inputproducts.txtDesc.value += NewCode;
        	setfocus(thetype);
        }
	}
	else if(thetype=="inputcommitment")
	{
        if(document.all)
		{
        	insertAtCaret(document.inputcommitment.txtDesc, NewCode);
        	setfocus(thetype);
        }
		else
		{
        	document.inputcommitment.txtDesc.value += NewCode;
        	setfocus(thetype);
        }
	}
	
	else if(thetype=="form1")
	{//john start here
        if(document.all)
		{
        	insertAtCaret(document.form1.txtDescription_1, NewCode);
        	setfocus(thetype);
        }
		else
		{
        	document.form1.txtDescription_1.value += NewCode;
        	setfocus(thetype);
        }
	//john end here
	}
	
	else if(thetype=="form2")
	{//john start here
        if(document.all)
		{
        	insertAtCaret(document.form2.txtDescription_2, NewCode);
        	setfocus(thetype);
        }
		else
		{
        	document.form2.txtDescription_2.value += NewCode;
        	setfocus(thetype);
        }
	//john end here
	}
	
	else if(thetype=="form3")
	{//john start here
        if(document.all)
		{
        	insertAtCaret(document.form3.txtDescription_3, NewCode);
        	setfocus(thetype);
        }
		else
		{
        	document.form3.txtDescription_3.value += NewCode;
        	setfocus(thetype);
        }
	//john end here
	}

	else if(thetype=="form4")
	{//john start here
        if(document.all)
		{
        	insertAtCaret(document.form4.txtDescription_4, NewCode);
        	setfocus(thetype);
        }
		else
		{
        	document.form4.txtDescription_4.value += NewCode;
        	setfocus(thetype);
        }
	//john end here
	}

	else if(thetype=="inputregionalofficesbranches")
	{
        if(document.all)
		{
        	insertAtCaret(document.inputregionalofficesbranches.txtDesc, NewCode);
        	setfocus(thetype);
        }
		else
		{
        	document.inputregionalofficesbranches.txtDesc.value += NewCode;
        	setfocus(thetype);
        }
	}
	else if(thetype=="inputcontacts")
	{
        if(document.all)
		{
        	insertAtCaret(document.inputcontacts.txtDesc, NewCode);
        	setfocus(thetype);
        }
		else
		{
        	document.inputcontacts.txtDesc.value += NewCode;
        	setfocus(thetype);
        }
	}
	else if(thetype=="inputmarketestablishexplore")
	{
        if(document.all)
		{
        	insertAtCaret(document.inputmarketestablishexplore.txtDesc, NewCode);
        	setfocus(thetype);
        }
		else
		{
        	document.inputmarketestablishexplore.txtDesc.value += NewCode;
        	setfocus(thetype);
        }
	}
	else if(thetype=="inputprojectreference")
	{
        if(document.all)
		{
        	insertAtCaret(document.inputprojectreference.txtDesc, NewCode);
        	setfocus(thetype);
        }
		else
		{
        	document.inputprojectreference.txtDesc.value += NewCode;
        	setfocus(thetype);
        }
	}
	else if(thetype=="inputcertifiedto")
	{
        if(document.all)
		{
        	insertAtCaret(document.inputcertifiedto.txtDesc, NewCode);
        	setfocus(thetype);
        }
		else
		{
        	document.inputcertifiedto.txtDesc.value += NewCode;
        	setfocus(thetype);
        }
	}
	else if(thetype=="inputfactorysize")
	{
        if(document.all)
		{
        	insertAtCaret(document.inputfactorysize.txtDesc, NewCode);
        	setfocus(thetype);
        }
		else
		{
        	document.inputfactorysize.txtDesc.value += NewCode;
        	setfocus(thetype);
        }
	}
	else if(thetype=="inputoffice")
	{
        if(document.all)
		{
        	insertAtCaret(document.inputoffice.txtDesc, NewCode);
        	setfocus(thetype);
        }
		else
		{
        	document.inputoffice.txtDesc.value += NewCode;
        	setfocus(thetype);
        }
	}	
}

function storeCaret (textEl){
        if(textEl.createTextRange){
                textEl.caretPos = document.selection.createRange().duplicate();
        }
}

function insertAtCaret (textEl, text){
        if (textEl.createTextRange && textEl.caretPos){
                var caretPos = textEl.caretPos;
                caretPos.text += caretPos.text.charAt(caretPos.text.length - 2) == ' ' ? text + ' ' : text;
        } else if(textEl) {
                textEl.value += text;
        } else {
        	textEl.value = text;
        }
}

function email(frm)
{
	var thetype=frm.name;
	if (helpmode)
	{
		alert(email_help);
	}
	else if (document.selection && document.selection.type == "Text")
	{
		var range = document.selection.createRange();
		txt=prompt(email_normal_input,"name@domain.com"); 
		range.text = "<a href=\"mailto:" + txt + "\">"+range.text+"</a>";
	}
	else if (advmode)
	{
		//AddTxt="[email] [/email]";
		//AddText(AddTxt);
		alert("Please add the name for the hyperlink. i.e Click Here.");
	}
	else
	{ 
		txt2=prompt(email_normal,""); 
		if (txt2!=null)
		{
			txt=prompt(email_normal_input,"name@domain.com");      
			if (txt!=null)
			{
				if (txt2=="")
				{
					AddTxt="<a href="+txt+">";

				}
				else
				{//<a href="mailto:liling@webnyou.com">Mail To</a>
					AddTxt="<a href=\"mailto:"+txt+"\">"+txt2+"</a>";
				} 
			AddText(AddTxt, thetype);                
			}
		}
	}
}


function chsize(size) {
        if (helpmode) {
                alert(fontsize_help);
	} else if (document.selection && document.selection.type == "Text") {
		var range = document.selection.createRange();
		range.text = "[size=" + size + "]" + range.text + "[/size]";
        } else if (advmode) {
                AddTxt="[size="+size+"] [/size]";
                AddText(AddTxt);
        } else {                       
                txt=prompt(fontsize_normal,text_input); 
                if (txt!=null) {             
                        AddTxt="[size="+size+"]"+txt;
                        AddText(AddTxt);
                        AddText("[/size]");
                }        
        }
}

function chfont(font) {
        if (helpmode){
                alert(font_help);
	} else if (document.selection && document.selection.type == "Text") {
		var range = document.selection.createRange();
		range.text = "[font=" + font + "]" + range.text + "[/font]";
        } else if (advmode) {
                AddTxt="[font="+font+"] [/font]";
                AddText(AddTxt);
        } else {                  
                txt=prompt(font_normal,text_input);
                if (txt!=null) {             
                        AddTxt="[font="+font+"]"+txt;
                        AddText(AddTxt);
                        AddText("[/font]");
                }        
        }  
}


function bold(frm) {
var thetype=frm.name;
        if (helpmode) {
                alert(bold_help);
	} else if (document.selection && document.selection.type == "Text") {
		var range = document.selection.createRange();
		range.text = "<b>" + range.text + "</b>";
        } else if (advmode) {
                AddTxt="<b> </b>";
                AddText(AddTxt, thetype);
        } else {  
                txt=prompt(bold_normal,text_input);     
                if (txt!=null) {           
                        AddTxt="<b>"+txt;
                        AddText(AddTxt, thetype);
                        AddText("</b>", thetype);
                }       
        }
}

function italicize(frm) {
var thetype=frm.name;

        if (helpmode) {
                alert(italicize_help);
	} else if (document.selection && document.selection.type == "Text") {
		var range = document.selection.createRange();
		range.text = "<i>" + range.text + "</i>";
        } else if (advmode) {
                AddTxt="<i> </i>";
                AddText(AddTxt, thetype);
        } else {   
                txt=prompt(italicize_normal,text_input);     
                if (txt!=null) {           
                        AddTxt="<i>"+txt;
                        AddText(AddTxt, thetype);
                        AddText("</i>", thetype);
                }               
        }
}

function chcolor(color) {
        if (helpmode) {
                alert(color_help);
	} else if (document.selection && document.selection.type == "Text") {
		var range = document.selection.createRange();
		range.text = "[color=" + color + "]" + range.text + "[/color]";
        } else if (advmode) {
                AddTxt="[color="+color+"] [/color]";
                AddText(AddTxt);
        } else {  
        txt=prompt(color_normal,text_input);
                if(txt!=null) {
                        AddTxt="[color="+color+"]"+txt;
                        AddText(AddTxt);
                        AddText("[/color]");
                }
        }
}

function center(frm) {
var thetype=frm.name;

        if (helpmode) {
                alert(center_help);
	} else if (document.selection && document.selection.type == "Text") {
		var range = document.selection.createRange();
		range.text = "<center>" + range.text + "</center>";
        } else if (advmode) {
                AddTxt="<center> </center>";
                AddText(AddTxt, thetype);
        } else {  
                txt=prompt(center_normal,text_input);     
                if (txt!=null) {          
                        AddTxt="\r<center>"+txt;
                        AddText(AddTxt, thetype);
                        AddText("</center>", thetype);
                }              
        }
}

function hyperlink(frm)
{
var thetype=frm.name;

	if (helpmode)
	{
		alert(link_help);
	}
	else if(advmode)
	{
		//AddTxt="[url] [/url]";
		//AddText(AddTxt);
		alert("Please add the name for the hyperlink. i.e Click Here.");
	}
	else
	{ 
		txt2=prompt(link_normal,""); 
		if (txt2!=null)
		{
			txt=prompt(link_normal_input,"http://");      
			if (txt!=null)
			{
				if (txt2=="")
				{
					//AddTxt="[url]"+txt;
					//AddText(AddTxt);
					//AddText("[/url]");
					alert("Please add the name for the hyperlink. i.e Click Here.");
					//alert(txt);
				}
				else
				{
					AddTxt="<a href=\""+txt+"\">"+txt2;
					AddText(AddTxt, thetype);
					AddText("<a/>", thetype);
				}         
			} 
		}
	}
}

function code() {
        if (helpmode) {
                alert(code_help);
	} else if (document.selection && document.selection.type == "Text") {
		var range = document.selection.createRange();
		range.text = "[code]" + range.text + "[/code]";
        } else if (advmode) {
                AddTxt="\r[code]\r[/code]";
                AddText(AddTxt);
        } else {   
                txt=prompt(code_normal,"");     
                if (txt!=null) {          
                        AddTxt="\r[code]"+txt;
                        AddText(AddTxt);
                        AddText("[/code]");
                }              
        }
}

function underline(frm) {
var thetype=frm.name;

        if (helpmode) {
                alert(underline_help);
	} else if (document.selection && document.selection.type == "Text") {
		var range = document.selection.createRange();
		range.text = "<u>" + range.text + "</u>";
        } else if (advmode) {
                AddTxt="<u> </u>";
                AddText(AddTxt, thetype);
        } else {  
                txt=prompt(underline_normal,text_input);
                if (txt!=null) {           
                        AddTxt="<u>"+txt;
                        AddText(AddTxt, thetype);
                        AddText("</u>", thetype);
                }               
        }
}

function setfocus(thetype)
{
	if(thetype=="inputbackground")
	{
		document.inputbackground.txtDesc.focus();
	}
	else if(thetype=="inputnaturalofbusiness")
	{
		document.inputnaturalofbusiness.txtDesc.focus();
	}
	else if(thetype=="inputproducts")
	{
		document.inputproducts.txtDesc.focus();
	}
	else if(thetype=="inputcommitment")
	{
		document.inputcommitment.txtDesc.focus();
	}
	else if(thetype=="inputregionalofficesbranches")
	{
		document.inputregionalofficesbranches.txtDesc.focus();
	}
	else if(thetype=="inputcontacts")
	{
		document.inputcontacts.txtDesc.focus();
	}
	else if(thetype=="inputmarketestablishexplore")
	{
		document.inputmarketestablishexplore.txtDesc.focus();
	}
	else if(thetype=="inputprojectreference")
	{
		document.inputprojectreference.txtDesc.focus();
	}
	else if(thetype=="inputcertifiedto")
	{
		document.inputcertifiedto.txtDesc.focus();
	}
	else if(thetype=="inputfactorysize")
	{
		document.inputfactorysize.txtDesc.focus();
	}
	else if(thetype=="inputoffice")
	{
		document.inputoffice.txtDesc.focus();
	}
}