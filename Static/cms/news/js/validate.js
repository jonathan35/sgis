function stopText(){
	if(document.input.ann_content.value.length < 1500 ){		
		document.input.character.value = 1499 - document.input.ann_content.value.length;
	}
	
	if(document.input.ann_content.value.length >= 1500){
		if (event.keyCode >=1 && event.keyCode <= 150) event.returnValue = false;
		else return true;
	}	
}
function stopText500(){
	if(document.input.ann_content.value.length < 500){		
		document.input.character.value = 500 - document.input.ann_content.value.length;
	}
	
	if(document.input.ann_content.value.length >= 500){
		if (event.keyCode >=1 && event.keyCode <= 150) event.returnValue = false;
		else return true;
	}	
}


function validate()
{
	if(document.input.ann_content.value.length==0)
	{
		alert('Please Enter Message!!!'); 
		document.input.ann_content.focus();
		return false;
	}
}
function form1_validate()
{
	if(document.form1.ann_content.value.length==0)
	{
		alert('Please Enter Message!!!'); 
		document.form1.ann_content.focus();
		return false;
	}
	if(document.form1.ann_content.value.length<200)
	{
		alert('Your Message is less than 200 characters!!!'); 
		document.form1.ann_content.focus();
		return false;
	}
}
function inputnaturalofbusiness_validate()
{
	if(document.inputnaturalofbusiness.ann_content.value.length==0)
	{
		alert('Please Enter Message!!!'); 
		document.inputnaturalofbusiness.ann_content.focus();
		return false;
	}
	if(document.inputnaturalofbusiness.ann_content.value.length<200)
	{
		alert('Your Message is less than 200 characters!!!'); 
		document.inputnaturalofbusiness.ann_content.focus();
		return false;
	}
}
//////////
function storeCaret (textEl)
{

	if (textEl.createTextRange){ 
	textEl.caretPos = document.selection.createRange().duplicate();
	}
}
//////////
function insertAtCaret (textEl, text)
{
	var caretPos = textEl.caretPos;
	if (textEl.createTextRange && textEl.caretPos)
	{
		var caretPos = textEl.caretPos;
		caretPos.text =
		caretPos.text.charAt(caretPos.text.length - 1) == ' ' ?
		text + ' ' : text;
	}
	else
	{
		textEl.value += text;
	}
}
//////////
//-->admendent
function stopTextnewcontent(news_content)
{
	if(event.keyCode==13)
	{
		//AddTxt="<br>";
		insertAtCaret(news_content, AddTxt);
	}
	if(document.form11.news_content.value.length < 200 ){		
		document.form11.character.value = 199 - document.form11.news_content.value.length;
		document.form11.characterInserted.value = 1 + document.form11.news_content.value.length;		
	}
	if(document.form11.news_content.value.length >= 200){
		if (event.keyCode >=1 && event.keyCode <= 150) event.returnValue = false;
		else return true;
	}	
}
//<--
function stopTextbackground(ann_content)
{
	if(event.keyCode==13)
	{
		//AddTxt="<br>";
		insertAtCaret(ann_content, AddTxt);
	}
	if(document.form1.ann_content.value.length < 200 ){		
		document.form1.character.value = 199 - document.form1.ann_content.value.length;
		document.form1.characterInserted.value = 1 + document.form1.ann_content.value.length;		
	}
	if(document.form1.ann_content.value.length >= 200){
		if (event.keyCode >=1 && event.keyCode <= 150) event.returnValue = false;
		else return true;
	}	
}
//////////
function stopTextnaturalofbusiness(ann_content)
{
	if(event.keyCode==13)
	{
		//AddTxt="<br>";
		insertAtCaret(ann_content, AddTxt);
	}
	if(document.inputnaturalofbusiness.ann_content.value.length < 200 )
	{		
		document.inputnaturalofbusiness.character.value = 199 - document.inputnaturalofbusiness.ann_content.value.length;
		document.inputnaturalofbusiness.characterInserted.value = 1 + document.inputnaturalofbusiness.ann_content.value.length;		
	}
	if(document.inputnaturalofbusiness.ann_content.value.length >= 200)
	{
		if (event.keyCode >=1 && event.keyCode <= 150)
			event.returnValue = false;
		else 
			return true;
	}	
}
//////////
function stopTextFNB(ann_content)
{
	if(event.keyCode==13)
	{
		//AddTxt="<br>";
		insertAtCaret(ann_content, AddTxt);
	}
	if(document.ProductPostForm.fnb.value.length < 500 )
	{		
		document.ProductPostForm.character.value = 499 - document.ProductPostForm.fnb.value.length;
		document.ProductPostForm.characterInserted.value = 1 + document.ProductPostForm.fnb.value.length;		
	}
	if(document.ProductPostForm.fnb.value.length >= 500)
	{
		if (event.keyCode >=1 && event.keyCode <= 150)
			event.returnValue = false;
		else 
			return true;
	}	
}
///////////
function stopTextTD(ann_content)
{
	if(event.keyCode==13)
	{
		//AddTxt="<br>";
		insertAtCaret(ann_content, AddTxt);
	}
	if(document.ProductPostForm.technical.value.length < 250 )
	{		
		document.ProductPostForm.characters32.value = 249 - document.ProductPostForm.technical.value.length;
		document.ProductPostForm.charactersInserted32.value = 1 + document.ProductPostForm.technical.value.length;		
	}
	if(document.ProductPostForm.technical.value.length >= 250)
	{
		if (event.keyCode >=1 && event.keyCode <= 150)
			event.returnValue = false;
		else 
			return true;
	}	
}
///////////

function stopTextAPP(ann_content)
{
	if(event.keyCode==13)
	{
		//AddTxt="<br>";
		insertAtCaret(ann_content, AddTxt);
	}
	if(document.ProductPostForm.app.value.length < 250 )
	{		
		document.ProductPostForm.characters2.value = 249 - document.ProductPostForm.app.value.length;
		document.ProductPostForm.charactersInserted2.value = 1 + document.ProductPostForm.app.value.length;		
	}
	if(document.ProductPostForm.app.value.length >= 250)
	{
		if (event.keyCode >=1 && event.keyCode <= 150)
			event.returnValue = false;
		else 
			return true;
	}	
}
///////////////

function stopTextCOL(ann_content)
{
	if(event.keyCode==13)
	{
		//AddTxt="<br>";
		insertAtCaret(ann_content, AddTxt);
	}
	if(document.ProductPostForm.colour.value.length < 100 )
	{		
		document.ProductPostForm.characters3.value = 99 - document.ProductPostForm.colour.value.length;
		document.ProductPostForm.charactersInserted3.value = 1 + document.ProductPostForm.colour.value.length;		
	}
	if(document.ProductPostForm.colour.value.length >= 100)
	{
		if (event.keyCode >=1 && event.keyCode <= 150)
			event.returnValue = false;
		else 
			return true;
	}	
}///////////////

function stopTextrecentProject(ann_content)
{
	if(event.keyCode==13)
	{
		//AddTxt="<br>";
		insertAtCaret(ann_content, AddTxt);
	}
	if(document.ProductPostForm.recentProject.value.length < 200 )
	{		
		document.ProductPostForm.charactersRP.value = 199 - document.ProductPostForm.recentProject.value.length;
		document.ProductPostForm.charactersInsertedRP.value = 1 + document.ProductPostForm.recentProject.value.length;		
	}
	if(document.ProductPostForm.recentProject.value.length >= 200)
	{
		if (event.keyCode >=1 && event.keyCode <= 150)
			event.returnValue = false;
		else 
			return true;
	}	
}
///////////////
function stopTextDEAL(ann_content)
{
	if(event.keyCode==13)
	{
		//AddTxt="<br>";
		insertAtCaret(ann_content, AddTxt);
	}
	if(document.ProductPostForm.dealer.value.length < 100 )
	{		
		document.ProductPostForm.characters322.value = 99 - document.ProductPostForm.dealer.value.length;
		document.ProductPostForm.charactersInserted322.value = 1 + document.ProductPostForm.dealer.value.length;		
	}
	if(document.ProductPostForm.dealer.value.length >= 100)
	{
		if (event.keyCode >=1 && event.keyCode <= 150)
			event.returnValue = false;
		else 
			return true;
	}	
}
///////////////
function stopTextPROMO(ann_content)
{
	if(event.keyCode==13)
	{
		//AddTxt="<br>";
		insertAtCaret(ann_content, AddTxt);
	}
	if(document.ProductPostForm.promotion.value.length < 100 )
	{		
		document.ProductPostForm.characters323.value = 99 - document.ProductPostForm.promotion.value.length;
		document.ProductPostForm.charactersInserted323.value = 1 + document.ProductPostForm.promotion.value.length;		
	}
	if(document.ProductPostForm.promotion.value.length >= 100)
	{
		if (event.keyCode >=1 && event.keyCode <= 150)
			event.returnValue = false;
		else 
			return true;
	}	
}
///////////////

function stopTextCERT(ann_content)
{
	if(event.keyCode==13)
	{
		//AddTxt="<br>";
		insertAtCaret(ann_content, AddTxt);
	}
	if(document.ProductPostForm.cert.value.length < 50 )
	{		
		document.ProductPostForm.characters324.value = 49 - document.ProductPostForm.cert.value.length;
		document.ProductPostForm.charactersInserted324.value = 1 + document.ProductPostForm.cert.value.length;		
	}
	if(document.ProductPostForm.cert.value.length >= 50)
	{
		if (event.keyCode >=1 && event.keyCode <= 150)
			event.returnValue = false;
		else 
			return true;
	}	
}
///////////////

function stopTextproducts(ann_content)
{
	if(event.keyCode==13)
	{
		//AddTxt="<br>";
		insertAtCaret(ann_content, AddTxt);
	}
	if(document.inputproducts.ann_content.value.length < 1500 )
	{		
		document.inputproducts.character.value = 1499 - document.inputproducts.ann_content.value.length;
	}
	if(document.inputproducts.ann_content.value.length >= 1500)
	{
		if (event.keyCode >=1 && event.keyCode <= 150) event.returnValue = false;
		else return true;
	}	
}
//////////
function stopTextcommitment(ann_content)
{
	if(event.keyCode==13)
	{
		//AddTxt="<br>";
		insertAtCaret(ann_content, AddTxt);
	}
	if(document.inputcommitment.ann_content.value.length < 1500 )
	{		
		document.inputcommitment.character.value = 1499 - document.inputcommitment.ann_content.value.length;
	}
	if(document.inputcommitment.ann_content.value.length >= 1500)
	{
		if (event.keyCode >=1 && event.keyCode <= 150) event.returnValue = false;
		else return true;
	}	
}
//////////
function stopTextregionalofficesbranches(ann_content)
{
	if(event.keyCode==13)
	{
		//AddTxt="<br>";
		insertAtCaret(ann_content, AddTxt);
	}
	if(document.inputregionalofficesbranches.ann_content.value.length < 1500 )
	{		
		document.inputregionalofficesbranches.character.value = 1499 - document.inputregionalofficesbranches.ann_content.value.length;
	}
	if(document.inputregionalofficesbranches.ann_content.value.length >= 1500)
	{
		if (event.keyCode >=1 && event.keyCode <= 150) event.returnValue = false;
		else return true;
	}	
}
//////////
function stopTextcontacts(ann_content)
{
	if(event.keyCode==13)
	{
		//AddTxt="<br>";
		insertAtCaret(ann_content, AddTxt);
	}
	if(document.inputcontacts.ann_content.value.length < 1500 )
	{		
		document.inputcontacts.character.value = 1499 - document.inputcontacts.ann_content.value.length;
	}
	if(document.inputcontacts.ann_content.value.length >= 1500)
	{
		if (event.keyCode >=1 && event.keyCode <= 150) event.returnValue = false;
		else return true;
	}	
}
//////////
function stopTextmarketestablishexplore(ann_content)
{
	if(event.keyCode==13)
	{
		//AddTxt="<br>";
		insertAtCaret(ann_content, AddTxt);
	}
	if(document.inputmarketestablishexplore.ann_content.value.length < 1500 )
	{		
		document.inputmarketestablishexplore.character.value = 1499 - document.inputmarketestablishexplore.ann_content.value.length;
	}
	if(document.inputmarketestablishexplore.ann_content.value.length >= 1500)
	{
		if (event.keyCode >=1 && event.keyCode <= 150) event.returnValue = false;
		else return true;
	}	
}
//////////
function stopTextprojectreference(ann_content)
{
	if(event.keyCode==13)
	{
		//AddTxt="<br>";
		insertAtCaret(ann_content, AddTxt);
	}
	if(document.inputprojectreference.ann_content.value.length < 100 )
	{		
		document.inputprojectreference.character.value = 99 - document.inputprojectreference.ann_content.value.length;
		document.inputprojectreference.characterInserted.value = 1 + document.inputprojectreference.ann_content.value.length;		

	}
	if(document.inputprojectreference.ann_content.value.length >= 100)
	{
		if (event.keyCode >=1 && event.keyCode <= 150) event.returnValue = false;
		else return true;
	}	
}
//////////
function stopTextjobreference(ann_content)
{
	if(event.keyCode==13)
	{
		//AddTxt="<br>";
		insertAtCaret(ann_content, AddTxt);
	}
	if(document.inputjobreference.ann_content.value.length < 100 )
	{		
		document.inputjobreference.character.value = 99 - document.inputjobreference.ann_content.value.length;
		document.inputjobreference.characterInserted.value = 1 + document.inputjobreference.ann_content.value.length;		
	}
	if(document.inputjobreference.ann_content.value.length >= 100)
	{
		if (event.keyCode >=1 && event.keyCode <= 150)
			event.returnValue = false;
		else 
			return true;
	}	
}
//////////
function stopTextcertifiedto(ann_content)
{
	if(event.keyCode==13)
	{
		//AddTxt="<br>";
		insertAtCaret(ann_content, AddTxt);
	}
	if(document.inputcertifiedto.ann_content.value.length < 1500 )
	{		
		document.inputcertifiedto.character.value = 1499 - document.inputcertifiedto.ann_content.value.length;
	}
	if(document.inputcertifiedto.ann_content.value.length >= 1500)
	{
		if (event.keyCode >=1 && event.keyCode <= 150) event.returnValue = false;
		else return true;
	}	
}
//////////
function stopTextfactorysize(ann_content)
{
	if(event.keyCode==13)
	{
		//AddTxt="<br>";
		insertAtCaret(ann_content, AddTxt);
	}
	if(document.inputfactorysize.ann_content.value.length < 1500 )
	{		
		document.inputfactorysize.character.value = 1499 - document.inputfactorysize.ann_content.value.length;
	}
	if(document.inputfactorysize.ann_content.value.length >= 1500)
	{
		if (event.keyCode >=1 && event.keyCode <= 150) event.returnValue = false;
		else return true;
	}	
}
//////////
function stopTextoffice(ann_content)
{
	if(event.keyCode==13)
	{
		//AddTxt="<br>";
		insertAtCaret(ann_content, AddTxt);
	}
	if(document.inputoffice.ann_content.value.length < 1500 )
	{		
		document.inputoffice.character.value = 1499 - document.inputoffice.ann_content.value.length;
	}
	if(document.inputoffice.ann_content.value.length >= 1500)
	{
		if (event.keyCode >=1 && event.keyCode <= 150) event.returnValue = false;
		else return true;
	}	
}
//////////
function other_validate()
{
	if(document.inputmarket.year_established_post.value.length==0)
	{
		alert('Please Enter year for Year Established!'); 
		document.inputmarket.year_established_post.focus();
		return false;
	}
	if(document.inputmarket.market_establish_post.value.length==0)
	{
		alert('Please Enter valid data for Market Established!'); 
		document.inputmarket.market_establish_post.focus();
		return false;
		
	}
	if(document.inputmarket.market_establish_post.value.length<10)
	{
		alert('Characters for Market Established is less than 10!'); 
		document.inputmarket.market_establish_post.focus();
		return false;
		
	}			
}
//////////
function other1_validate()
{
	if(document.inputmarket.year_established_post.value.length==0)
	{
		alert('Please Enter year for Year Established!'); 
		document.inputmarket.year_established_post.focus();
		return false;
	}
	if(document.inputmarket.market_establish_post.value.length==0)
	{
		alert('Please Enter valid data for Market Established!'); 
		document.inputmarket.market_establish_post.focus();
		return false;
	}
	if(document.inputmarket.market_establish_post.value.length<10)
	{
		alert('Characters for Market Established is less than 10!'); 
		document.inputmarket.market_establish_post.focus();
		return false;
	}
}
function other2_validate()
{
	if(document.inputproductservice.offer1_post.value.length=="")
	{
		alert('Information for first Product And Service is Compulsory!'); 
		document.inputproductservice.offer1_post.focus();
		return false;
	}		
	if(document.inputproductservice.type1_post.value.length=="")
	{
		alert('Please choose the business type for first product and service!'); 
		document.inputproductservice.offer1_post.focus();
		return false;
	}
	if(document.inputproductservice.offer2_post.value.length!="")
	{
		if(document.inputproductservice.type2_post.value.length=="")
		{
			alert('Please choose the business type for second product and service!'); 
			document.inputproductservice.offer1_post.focus();
			return false;
		}
	}
	if(document.inputproductservice.offer3_post.value.length!="")
	{
		if(document.inputproductservice.type3_post.value.length=="")
		{
			alert('Please choose the business type for third product and service!'); 
			document.inputproductservice.offer1_post.focus();
			return false;
		}
	}
	if(document.inputproductservice.type2_post.value.length!="")
	{
		if(document.inputproductservice.offer2_post.value.length=="")
		{
			alert('Please exclude the second business type, while no description have been written!'); 
			document.inputproductservice.offer1_post.focus();
			return false;
		}
	}
	if(document.inputproductservice.type3_post.value.length!="")
	{
		if(document.inputproductservice.offer3_post.value.length=="")
		{
			alert('Please exclude the third business type, while no description have been written!'); 
			document.inputproductservice.offer1_post.focus();
			return false;
		}
	}
}
function other3_validate()
{
	/*if(document.inputbankers.certified_to_post.value.length==0)
	{
		alert('Information for Certified To is Compulsory!'); 
		document.inputbankers.certified_to_post.focus();
		return false;
	}		
	if(document.inputbankers.bankers_post.value.length==0)
	{
		alert('Information for Bankers is Compulsory!'); 
		document.inputbankers.bankers_post.focus();
		return false;
	}
	*/
}
function compulsory_validate()
{
	if(document.input_backgroundphoto.productImage.src.length==0)
	{
		alert("Please Post your Photo.");
		document.input_backgroundphoto.productImage.focus();
		return false;
	}

	if(document.form1.ann_content.value.length==0)
	{
		alert("Please Post your Background Description.");
		document.form1.ann_content.focus();
		return false;
	}
	if(document.inputnaturalofbusiness.ann_content.value.length==0)
	{
		alert("Please Post your Nature of Business Description.");
		document.inputnaturalofbusiness.ann_content.focus();
		return false;
	}
	
	if(document.inputproductservice.offer1_post.value.length==0)
	{
		alert("Please Enter your Product And Service 1.");
		document.inputproductservice.offer1_post.focus();
		return false;		
	}
	
	if(document.inputmarket.year_established_post.value.length==0)
	{
		alert("Please Enter your Year Of Establish.");
		document.inputmarket.year_established_post.focus();
		return false;
	}
	if(document.inputmarket.market_establish_post.value.length==0)
	{
		alert("Please Enter your Main Market.");
		document.inputmarket.market_establish_post.focus();
		return false;
	}
	
	if(document.inputproductservice.type1_post.value.length=="")
	{
		alert("Please Enter your Busines Type 1.");
		document.inputproductservice.type1_post.focus();
		return false;
	}
}
//////john
function stopTextnaturalofbusiness1(ann_content)
{
	if(event.keyCode==13)
	{
		//AddTxt="<br>";
		insertAtCaret(ann_content, AddTxt);
	}
	if(document.inputnaturalofbusiness.ann_content.value.length < 200 )
	{		
		document.inputnaturalofbusiness.character.value = 199 - document.inputnaturalofbusiness.ann_content.value.length;
		document.inputnaturalofbusiness.characterInserted.value = 1 + document.inputnaturalofbusiness.ann_content.value.length;		
	}
	if(document.inputnaturalofbusiness.ann_content.value.length >= 200)
	{
		if (event.keyCode >=1 && event.keyCode <= 150)
			event.returnValue = false;
		else 
			return true;
	}	
}
function stopTextnaturalofbusiness1(ann_content)
{
	if(event.keyCode==13)
	{
		//AddTxt="<br>";
		insertAtCaret(ann_content, AddTx72t);
	}
	if(document.inputnaturalofbusiness.ann_content.value.length < 200 )
	{		
		document.inputnaturalofbusiness.character.value = 199 - document.inputnaturalofbusiness.ann_content.value.length;
		document.inputnaturalofbusiness.characterInserted.value = 1 + document.inputnaturalofbusiness.ann_content.value.length;		
	}
	if(document.inputnaturalofbusiness.ann_content.value.length >= 200)
	{
		if (event.keyCode >=1 && event.keyCode <= 150)
			event.returnValue = false;
		else 
			return true;
	}	
}
//johnny
function stopTextnatural(ann_content)
{
	if(event.keyCode==13)
	{
		//AddTxt="<br>";
		insertAtCaret(ann_content, AddTxt);
	}
	if(document.form1.news_content.value.length < 4000 )
	{		
		document.form1.character5.value = 3999 - document.form1.news_content.value.length;
		document.form1.characterInserted5.value = 1 + document.form1.news_content.value.length;		
	}
	if(document.form1.news_content.value.length >= 4000)
	{
		if (event.keyCode >=1 && event.keyCode <= 150)
			event.returnValue = false;
			
		else 
			return true;
	}	
}
//end johnny