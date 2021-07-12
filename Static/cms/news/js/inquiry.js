//��������
var ELE_NAME_ARRAY = new Array('chkBuyOfferIds','chkSellOfferIds','chkProductIds','chkCompanyIds');	
var MY_WEB_SERVER = "http://my.alibaba.com";
/**
 * ѡ��ָ������ָ������
 * @param 
 */
function check(checked){
  setCheckedFlag(document.form,ELE_NAME_ARRAY,checked);
}



/**
 * ����ѯ������
 */
function inquiryNow(){
    var checkedNum = getCheckedNum();
	//alert(document.form.chkProductIds[0].value);
	
    var basketItemNum = parseInt(document.form.basketItemNum.value);
    var urlString = document.location+""; 
 
    //���û��ѡ�еļ�¼
    if(checkedNum == 0) {
      if(basketItemNum == 0){
          alert("No item(s) selected.")
          return;    	
      }else{
          document.form.action=MY_WEB_SERVER+"/apps/feedback?req_page=basket.init";
          document.form.target="_blank";
          document.form.submit();    	
      }
    }

    //�����ѡ�еļ�¼
    if(checkedNum > 0) {
        document.form.action=MY_WEB_SERVER +"/apps/feedback?req_page=feedback.init";
        document.form.target="_blank";
        document.form.submit();		

    }
}

/**
 * ��ѡ�е���Ϣ���빺�ﳵ
 */
function addBasket(){
    var basketItemMax = parseInt(document.form.basketItemMax.value);
    var basketItemNum = parseInt(document.form.basketItemNum.value);
    var num = getCheckedNum();
    var urlString = document.location+"";
    if(num == 0) {
        alert("No item(s) selected.")
        return;
    }

    //�������ﳵ���Դ�ŵ���Ʒ������
    if(basketItemMax < (basketItemNum + num)) {
        var alertMessage = "Your Inquiry Basket is full. It can store a maximum of " + basketItemMax + " inquiries.";
        alert(alertMessage);
        return;
    }
    
    //ˢ��ҳ��
    document.form.action=window.location.href;
    document.form.target="";
    document.form.submit();
}

/**
 * ���ѡ�еļ�¼��
 */
function getCheckedNum(){
  return getCheckedRecordNum(document.form,ELE_NAME_ARRAY);
}

/**
 * ���ѡ�е�buy offer������
 */
function getBuyOfferCheckedNum(){
  return getCheckedItemNum('chkBuyOfferIds'); 	
}

/**
 * ���ѡ�е�sell offer������
 */
function getSellOfferCheckedNum(){
  return getCheckedItemNum('chkSellOfferIds'); 	
}

/**
 * ���ѡ�е�Company������
 */
function getCompanyCheckedNum(){
  return getCheckedItemNum('chkCompanyIds'); 	
}

/**
 * ���ѡ�е�Product������
 */
function getProductCheckedNum(){
  return getCheckedItemNum('chkProductIds'); 	
}

/**
 * ���ָ�����Ƶ�ѡ�м�¼�ĸ���
 * @param item - ָ������������
 */
function getCheckedItemNum(item){
  return getCheckedRecordNum(document.form,new Array(item)); 	
}

/**
 * �����ѡ�е�buy offer�ļ�¼�����������������
 */
function uncheckQuote(){
  setCheckedFlag(document.form,new Array('chkBuyOfferIds'),false);
}

/**
 * �����ѡ�е�������¼�����������������
 */
function uncheckRFQ(){
  setCheckedFlag(document.form,new Array('chkSellOfferIds','chkProductIds','chkCompanyIds'),false);	
}

/////////part2 - started

/**
 * ��ָ������ָ�����Ƶĸ�ѡ����ѡ�б�־
 * @param formObj    - ������
 * @param eleNameArr - ���ָ��Ԫ�����Ƶ�����
 * @checkedFlag      - ѡ�б�־
 * @param 
 */
function setCheckedFlag(formObj,eleNameArr,checkedFlag){
  for(var i=0;i<formObj.elements.length;i++){  
     var ele = formObj.elements[i];
     for(var j=0;j<eleNameArr.length;j++){
       if(ele.name == eleNameArr[j]){
          ele.checked = checkedFlag;
          break;
       }	
     }
  }
}


/**
 * ���ָ������ָ�����Ƶĸ�ѡ���ѡ������
 * @param formObj    - ������
 * @param eleNameArr - ���ָ��Ԫ�����Ƶ�����
 * @param 
 */
function getCheckedRecordNum(formObj,eleNameArr){

  var checkedNum = 0;
  for(var i=0; i<formObj.elements.length; i++){

     var ele = formObj.elements[i];
     for(var j=0;j<eleNameArr.length;j++){
       if(ele.name == eleNameArr[j] && ele.checked){
          checkedNum ++;
          break;
       }	
     }	
  }
  
  //
  return checkedNum;
}

/**
 * ȥ���ַ���ͷβ�Ŀո�
 * @param str ��TRIM���ַ���
 */
function trim(str){
   return(trimExt(str,' '));	
}


/**
 * ȥ���ַ���ͷβ��ָ���ķ���
 * @param str ��TRIM���ַ���
 * @param ch ָ�����ַ�
 */
function trimExt(str,ch){
   if(str == null) return(null);
   	
   //ȥ��ͷ�ϵĿո�	
   var start = 0,end = 0;   //��¼�ַ�������ʼ�ͽ���λ��
   var i = 0;
   while(i<str.length){
   	  //�ж��Ƿ�Ϊ�ո�
   	  if(str.charAt(i) == ch){
   	  	i++;
   	  }else{
   	    start = i;
   	    break;
   	  }
   }
   
   i = str.length -1;
   while(i>=0){
   	  //�ж��Ƿ�Ϊ�ո�
   	  if(str.charAt(i) == ch){
   	  	i--;
   	  }else{
   	    end = i + 1;
   	    break;
   	  }
   }   
   
   return(str.substring(start,end));
}


/**
 * ����Ƿ�����
 * @param value   Ҫ����ֵ
 * @param return  �������ͷ���TRUE
 */
function isNumber(value){
	if(trim(value)!=''&&!isNaN(value)&&(value.indexOf('.')==-1)){
		return(true);
	}
	
	return(false);
}

/**
 * ����ԭ�ȵ�ֵ��ʼ�������б��
 * @param selectObj - �����б�����
 * @param oldValue  - ԭ�ȵ�ֵ
 */
function initSelectWithValue(selectObj,oldValue){
  for(var i=0;i<selectObj.length;i++){
    if(selectObj.options[i].value == oldValue){
      selectObj.options[i].selected = true;
      break;
    }
  }
}

/**
 * javascript�е�urlencode����
 * ��Ϊjs�е�escape�Ĵ����java�е�encode����ȫһ��
 * ���˲������������
 * @param str - ��Ҫ��encode���ַ���
 */
function encode(str){
  if(str == null) return '';

  //����һ�α���
  var retStr = escape(str);

  //����url�����е�+�ţ����ַ�escape�в�����
  if(str.indexOf('+') != -1){
    retStr = retStr.replace(/\+/g,'%2B');
  }
  
  //
  return retStr;
}
 

/**
 * ����
 * ���������ʱ����Ҫ  
 * @param str - 
 */
function XMLEncode(str){
     str = trim(str);
     str = str.replace("&","&amp;");
     str = str.replace("<","&lt;");
     str = str.replace(">","&gt;");
     str = str.replace("'","&apos;");
     str = str.replace("\"","&quot;");
     return str;
}

/**
 * ����
 * ���������ʱ����Ҫ  
 * @param str - 
 */
function XMLDecode(str){
     str = trim(str);
     str = str.replace("&amp;","&");
     str = str.replace("&lt;","<");
     str = str.replace("&gt;",">");
     str = str.replace("&apos;","'");
     str = str.replace("&quot;","\"");
     return str;
}

/**
 * ����ͼƬ�ĳ��ȺͿ��������
 * ���ȺͿ���ĸ������������ĸ�
 * img src="image" onload="adjustImageSize(this,45,160)"
 * @param imageObj  - img �ؼ�
 * @param maxHeight - ͼƬ��������
 * @param maxWidth  - ͼƬ�������
 */
function adjustImageSize(imageObj,maxHeight,maxWidth){
  if(maxHeight<imageObj.height){
    imageObj.height=maxHeight;
  }
  if(maxWidth<imageObj.width){
    imageObj.width=maxWidth;
  }
}

function setImgSize(theURL,sImage){
var imgObj;
var sizeStand = 200;

imgObj = new Image();
imgObj.src = theURL;

if ((imgObj.width != 0) && (imgObj.height != 0)) {
if(imgObj.width > imgObj.height) { 
var iHeight = imgObj.height*sizeStand/imgObj.width;
sImage.height = iHeight;
sImage.width = sizeStand;
} else {
var iWidth = imgObj.width*sizeStand/imgObj.height;
sImage.width = iWidth;
sImage.height= sizeStand;
}
}else{
sImage.width = 200;
sImage.height= 200;
}
}

function setBigImgSize(theURL,sImage){
var imgObj;
var sizeStand = 200;

imgObj = new Image();
imgObj.src = theURL;

if ((imgObj.width != 0) && (imgObj.height != 0)) {
if(imgObj.width > imgObj.height) { 
var iHeight = imgObj.height*sizeStand/imgObj.width;
sImage.height = iHeight*2;
sImage.width = sizeStand*2;
} else {
var iWidth = imgObj.width*sizeStand/imgObj.height;
sImage.width = iWidth*2;
sImage.height= sizeStand*2;
}
}else{
sImage.width = 360;
sImage.height= 360;
}

}

function bbimg(o){
	var zoom=parseInt(o.style.zoom, 10)||100;zoom+=event.wheelDelta/12;if (zoom>0) o.style.zoom=zoom+'%';
	return false;
}