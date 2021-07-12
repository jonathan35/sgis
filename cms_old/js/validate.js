function stopText(){
	if(document.input.txtDesc.value.length < 1500 ){		
		document.input.character.value = 1499 - document.input.txtDesc.value.length;
	}
	
	if(document.input.txtDesc.value.length >= 1500){
		if (event.keyCode >=1 && event.keyCode <= 150) event.returnValue = false;
		else return true;
	}	
}
//johnny
function stopTextSpec(){
	if(document.ProductPostForm.Spec.value.length < 500 ){		
		document.ProductPostForm.character.value = 500 - document.ProductPostForm.Spec.value.length;
		document.ProductPostForm.characterInserted.value = 1 + document.ProductPostForm.Spec.value.length;				
	}
	
	if(document.ProductPostForm.Spec.value.length >= 500){
		if (event.keyCode >=1 && event.keyCode <= 20) event.returnValue = false;
		else return true;
	}	
}
function stopTextSpec_chinese(){
	if(document.ProductPostForm.Spec_chinese.value.length < 500 ){		
		document.ProductPostForm.character2.value = 500 - document.ProductPostForm.Spec_chinese.value.length;
		document.ProductPostForm.characterInserted2.value = 1 + document.ProductPostForm.Spec_chinese.value.length;				
	}
	
	if(document.ProductPostForm.Spec_chinese.value.length >= 500){
		if (event.keyCode >=1 && event.keyCode <= 20) event.returnValue = false;
		else return true;
	}	
}

function stopTextdimension(){
	if(document.ProductPostForm.dimension.value.length < 500 ){		
		document.ProductPostForm.character2.value = 500 - document.ProductPostForm.dimension.value.length;
		document.ProductPostForm.characterInserted2.value = 1 + document.ProductPostForm.dimension.value.length;				
	}
	
	if(document.ProductPostForm.dimension.value.length >= 500){
		if (event.keyCode >=1 && event.keyCode <= 20) event.returnValue = false;
		else return true;
	}	
}
function stopTextwarranty(){
	if(document.ProductPostForm.warranty.value.length < 500 ){		
		document.ProductPostForm.character22.value = 500 - document.ProductPostForm.warranty.value.length;
		document.ProductPostForm.characterInserted22.value = 1 + document.ProductPostForm.warranty.value.length;				
	}
	
	if(document.ProductPostForm.warranty.value.length >= 500){
		if (event.keyCode >=1 && event.keyCode <= 20) event.returnValue = false;
		else return true;
	}	
}
function stopTextFirst(){
	if(document.main_cat.short_desp.value.length < 250 ){		
		document.main_cat.character.value = 250 - document.main_cat.short_desp.value.length;
		document.main_cat.characterInserted.value = 1 + document.main_cat.short_desp.value.length;				
	}
	
	if(document.main_cat.short_desp.value.length >= 250){
		if (event.keyCode >=1 && event.keyCode <= 20) event.returnValue = false;
		else return true;
	}	
}
//johnny
function stopText500(){
	if(document.input.txtDesc.value.length < 500){		
		document.input.character.value = 500 - document.input.txtDesc.value.length;
	}
	
	if(document.input.txtDesc.value.length >= 500){
		if (event.keyCode >=1 && event.keyCode <= 150) event.returnValue = false;
		else return true;
	}	
}

function validate()
{
	if(document.input.txtDesc.value.length==0)
	{
		alert('Please Enter Message!!!'); 
		document.input.txtDesc.focus();
		return false;
	}
}
function inputbackground_validate()
{
	if(document.inputbackground.txtDesc.value.length==0)
	{
		alert('Please Enter Message!!!'); 
		document.inputbackground.txtDesc.focus();
		return false;
	}
	if(document.inputbackground.txtDesc.value.length<200)
	{
		alert('Your Message is less than 200 characters!!!'); 
		document.inputbackground.txtDesc.focus();
		return false;
	}
}
function inputnaturalofbusiness_validate()
{
	if(document.inputnaturalofbusiness.txtDesc.value.length==0)
	{
		alert('Please Enter Message!!!'); 
		document.inputnaturalofbusiness.txtDesc.focus();
		return false;
	}
	if(document.inputnaturalofbusiness.txtDesc.value.length<200)
	{
		alert('Your Message is less than 200 characters!!!'); 
		document.inputnaturalofbusiness.txtDesc.focus();
		return false;
	}
}
//////////
function storeCaret (textEl)
{
	if (textEl.createTextRange) 
	textEl.caretPos = document.selection.createRange().duplicate();
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
	if(document.inputbackground1.news_content.value.length < 2000 ){		
		document.inputbackground1.character.value = 1999 - document.inputbackground1.news_content.value.length;
		document.inputbackground1.characterInserted.value = 1 + document.inputbackground1.news_content.value.length;		
	}
	if(document.inputbackground1.news_content.value.length >= 2000){
		if (event.keyCode >=1 && event.keyCode <= 150) event.returnValue = false;
		else return true;
	}	
}
//<--
function stopTextbackground(txtDesc)
{
	if(event.keyCode==13)
	{
		//AddTxt="<br>";
		insertAtCaret(txtDesc, AddTxt);
	}
	if(document.inputbackground.txtDesc.value.length < 2000 ){		
		document.inputbackground.character.value = 1999 - document.inputbackground.txtDesc.value.length;
		document.inputbackground.characterInserted.value = 1 + document.inputbackground.txtDesc.value.length;		
	}
	if(document.inputbackground.txtDesc.value.length >= 2000){
		if (event.keyCode >=1 && event.keyCode <= 150) event.returnValue = false;
		else return true;
	}	
}
//////////
function stopTextnaturalofbusiness(txtDesc)
{
	if(event.keyCode==13)
	{
		//AddTxt="<br>";
		insertAtCaret(txtDesc, AddTxt);
	}
	if(document.inputnaturalofbusiness.txtDesc.value.length < 2000 )
	{		
		document.inputnaturalofbusiness.character.value = 1999 - document.inputnaturalofbusiness.txtDesc.value.length;
		document.inputnaturalofbusiness.characterInserted.value = 1 + document.inputnaturalofbusiness.txtDesc.value.length;		
	}
	if(document.inputnaturalofbusiness.txtDesc.value.length >= 2000)
	{
		if (event.keyCode >=1 && event.keyCode <= 150)
			event.returnValue = false;
		else 
			return true;
	}	
}
//////////
function stopTextproducts(txtDesc)
{
	if(event.keyCode==13)
	{
		//AddTxt="<br>";
		insertAtCaret(txtDesc, AddTxt);
	}
	if(document.inputproducts.txtDesc.value.length < 1500 )
	{		
		document.inputproducts.character.value = 1499 - document.inputproducts.txtDesc.value.length;
	}
	if(document.inputproducts.txtDesc.value.length >= 1500)
	{
		if (event.keyCode >=1 && event.keyCode <= 150) event.returnValue = false;
		else return true;
	}	
}
//////////
function stopTextcommitment(txtDesc)
{
	if(event.keyCode==13)
	{
		//AddTxt="<br>";
		insertAtCaret(txtDesc, AddTxt);
	}
	if(document.inputcommitment.txtDesc.value.length < 1500 )
	{		
		document.inputcommitment.character.value = 1499 - document.inputcommitment.txtDesc.value.length;
	}
	if(document.inputcommitment.txtDesc.value.length >= 1500)
	{
		if (event.keyCode >=1 && event.keyCode <= 150) event.returnValue = false;
		else return true;
	}	
}
//////////
function stopTextregionalofficesbranches(txtDesc)
{
	if(event.keyCode==13)
	{
		//AddTxt="<br>";
		insertAtCaret(txtDesc, AddTxt);
	}
	if(document.inputregionalofficesbranches.txtDesc.value.length < 1500 )
	{		
		document.inputregionalofficesbranches.character.value = 1499 - document.inputregionalofficesbranches.txtDesc.value.length;
	}
	if(document.inputregionalofficesbranches.txtDesc.value.length >= 1500)
	{
		if (event.keyCode >=1 && event.keyCode <= 150) event.returnValue = false;
		else return true;
	}	
}
//////////
function stopTextcontacts(txtDesc)
{
	if(event.keyCode==13)
	{
		//AddTxt="<br>";
		insertAtCaret(txtDesc, AddTxt);
	}
	if(document.inputcontacts.txtDesc.value.length < 1500 )
	{		
		document.inputcontacts.character.value = 1499 - document.inputcontacts.txtDesc.value.length;
	}
	if(document.inputcontacts.txtDesc.value.length >= 1500)
	{
		if (event.keyCode >=1 && event.keyCode <= 150) event.returnValue = false;
		else return true;
	}	
}
//////////
function stopTextmarketestablishexplore(txtDesc)
{
	if(event.keyCode==13)
	{
		//AddTxt="<br>";
		insertAtCaret(txtDesc, AddTxt);
	}
	if(document.inputmarketestablishexplore.txtDesc.value.length < 1500 )
	{		
		document.inputmarketestablishexplore.character.value = 1499 - document.inputmarketestablishexplore.txtDesc.value.length;
	}
	if(document.inputmarketestablishexplore.txtDesc.value.length >= 1500)
	{
		if (event.keyCode >=1 && event.keyCode <= 150) event.returnValue = false;
		else return true;
	}	
}
//////////
function stopTextprojectreference(txtDesc)
{
	if(event.keyCode==13)
	{
		//AddTxt="<br>";
		insertAtCaret(txtDesc, AddTxt);
	}
	if(document.inputprojectreference.txtDesc.value.length < 1000 )
	{		
		document.inputprojectreference.character.value = 999 - document.inputprojectreference.txtDesc.value.length;
		document.inputprojectreference.characterInserted.value = 1 + document.inputprojectreference.txtDesc.value.length;		

	}
	if(document.inputprojectreference.txtDesc.value.length >= 1000)
	{
		if (event.keyCode >=1 && event.keyCode <= 150) event.returnValue = false;
		else return true;
	}	
}
//////////
function stopTextjobreference(txtDesc)
{
	if(event.keyCode==13)
	{
		//AddTxt="<br>";
		insertAtCaret(txtDesc, AddTxt);
	}
	if(document.inputjobreference.txtDesc.value.length < 1000 )
	{		
		document.inputjobreference.character.value = 999 - document.inputjobreference.txtDesc.value.length;
		document.inputjobreference.characterInserted.value = 1 + document.inputjobreference.txtDesc.value.length;		
	}
	if(document.inputjobreference.txtDesc.value.length >= 1000)
	{
		if (event.keyCode >=1 && event.keyCode <= 150)
			event.returnValue = false;
		else 
			return true;
	}	
}
//////////
function stopTextcertifiedto(txtDesc)
{
	if(event.keyCode==13)
	{
		//AddTxt="<br>";
		insertAtCaret(txtDesc, AddTxt);
	}
	if(document.inputcertifiedto.txtDesc.value.length < 1500 )
	{		
		document.inputcertifiedto.character.value = 1499 - document.inputcertifiedto.txtDesc.value.length;
	}
	if(document.inputcertifiedto.txtDesc.value.length >= 1500)
	{
		if (event.keyCode >=1 && event.keyCode <= 150) event.returnValue = false;
		else return true;
	}	
}
//////////
function stopTextfactorysize(txtDesc)
{
	if(event.keyCode==13)
	{
		//AddTxt="<br>";
		insertAtCaret(txtDesc, AddTxt);
	}
	if(document.inputfactorysize.txtDesc.value.length < 1500 )
	{		
		document.inputfactorysize.character.value = 1499 - document.inputfactorysize.txtDesc.value.length;
	}
	if(document.inputfactorysize.txtDesc.value.length >= 1500)
	{
		if (event.keyCode >=1 && event.keyCode <= 150) event.returnValue = false;
		else return true;
	}	
}
//////////
function stopTextoffice(txtDesc)
{
	if(event.keyCode==13)
	{
		//AddTxt="<br>";
		insertAtCaret(txtDesc, AddTxt);
	}
	if(document.inputoffice.txtDesc.value.length < 1500 )
	{		
		document.inputoffice.character.value = 1499 - document.inputoffice.txtDesc.value.length;
	}
	if(document.inputoffice.txtDesc.value.length >= 1500)
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

	if(document.inputbackground.txtDesc.value.length==0)
	{
		alert("Please Post your Background Description.");
		document.inputbackground.txtDesc.focus();
		return false;
	}
	if(document.inputnaturalofbusiness.txtDesc.value.length==0)
	{
		alert("Please Post your Nature of Business Description.");
		document.inputnaturalofbusiness.txtDesc.focus();
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



