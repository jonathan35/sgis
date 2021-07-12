//CSS Debug
 if (document.all && window.attachEvent) {
   window.attachEvent("onload", fixWinIE); }
 
 function fixWinIE() {
         if (document.body.scrollHeight < document.all.scontent.offsetHeight) 
		 { document.all.scontent.style.display = 'block'; }
}