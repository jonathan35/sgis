function DataTableCheckBox_Click()
{
    var oTR = this.parentNode.parentNode;
    
    if(this.checked) 
      {
	  if(this.IsNewMessage) oTR.className += ' selected';
	  else oTR.className = 'selected';
	  g_oDataTable.CheckBoxes.NumberChecked++;
      }
    else 
      {
	  if(this.IsNewMessage) oTR.className = 'msgnew';
	  else oTR.className = 'msgold';
	  g_oDataTable.CheckBoxes.NumberChecked--;
      }
    
    g_oDataTable.SelectAllRows.checked = (g_oDataTable.CheckBoxes.NumberChecked == g_oDataTable.CheckBoxes.length) ? true : false;
}

function SelectAllRows_Click()
{
    var aCheckBoxes = g_oDataTable.CheckBoxes;
    var bChecked = g_oDataTable.SelectAllRows.checked;
    
    if(this.id == 'clearall' || this.id == 'checkall')
      {
	  bChecked = (this.id == 'clearall') ? false : true;
	  g_oDataTable.SelectAllRows.checked = bChecked;
      }
    
    var aRows = g_oDataTable.tBodies[0].rows;
    var nRows = aRows.length-1;
				
    if(bChecked)
      {
	  for(var i=nRows;i>=0;i--)
	    {
		aCheckBoxes[i].checked = bChecked;
		if(aCheckBoxes[i].IsNewMessage) aRows[i].className += ' selected';
		else aRows[i].className = 'selected';
	    }
      }
    else
      {
	  for(var i=nRows;i>=0;i--)
	    {
		aCheckBoxes[i].checked = bChecked;
		aRows[i].className = (aCheckBoxes[i].IsNewMessage) ? 'msgnew' : '';
	    }
      }
    
    g_oDataTable.CheckBoxes.NumberChecked = (bChecked) ? g_oDataTable.CheckBoxes.length : 0;
}

function DataTable_Init()
{
    g_oDataTable = document.getElementById("datatable");
    
    if(g_oDataTable)
      {
	  g_oDataTable.SelectAllRows = document.getElementById("selectallrows");
	  g_oDataTable.SelectAllRows.onclick = SelectAllRows_Click;		
	  
	  var oMouseOver = function(){this.style.textDecoration = 'underline';}
	  var oMouseOut = function(){this.style.textDecoration = 'underline';}
	  
	  document.getElementById("checkall").onclick = SelectAllRows_Click;
	  document.getElementById("clearall").onclick = SelectAllRows_Click;
	  
	  var aCheckBoxes = document.getElementsByName("message[]");
	  var aRows = g_oDataTable.tBodies[0].rows;
	  var nRows = aRows.length-1;
	  
	  for (var i = nRows; i >= 0; i--) {
	      aCheckBoxes[i].IsNewMessage = (aRows[i].className == 'msgnew') ? true : false;
	      aCheckBoxes[i].onclick = DataTableCheckBox_Click;
	  }
	  
	  g_oDataTable.CheckBoxes = aCheckBoxes;
	  g_oDataTable.CheckBoxes.NumberChecked = 0;					
      }
    else return false;
}