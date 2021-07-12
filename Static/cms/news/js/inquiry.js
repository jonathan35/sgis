//常量定义
var ELE_NAME_ARRAY = new Array('chkBuyOfferIds','chkSellOfferIds','chkProductIds','chkCompanyIds');	
var MY_WEB_SERVER = "http://my.alibaba.com";
/**
 * 选中指定表单中指定名称
 * @param 
 */
function check(checked){
  setCheckedFlag(document.form,ELE_NAME_ARRAY,checked);
}



/**
 * 发送询价请求
 */
function inquiryNow(){
    var checkedNum = getCheckedNum();
	//alert(document.form.chkProductIds[0].value);
	
    var basketItemNum = parseInt(document.form.basketItemNum.value);
    var urlString = document.location+""; 
 
    //如果没有选中的记录
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

    //如果有选中的记录
    if(checkedNum > 0) {
        document.form.action=MY_WEB_SERVER +"/apps/feedback?req_page=feedback.init";
        document.form.target="_blank";
        document.form.submit();		

    }
}

/**
 * 将选中的信息放入购物车
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

    //超过购物车可以存放的物品的上限
    if(basketItemMax < (basketItemNum + num)) {
        var alertMessage = "Your Inquiry Basket is full. It can store a maximum of " + basketItemMax + " inquiries.";
        alert(alertMessage);
        return;
    }
    
    //刷新页面
    document.form.action=window.location.href;
    document.form.target="";
    document.form.submit();
}

/**
 * 获得选中的记录数
 */
function getCheckedNum(){
  return getCheckedRecordNum(document.form,ELE_NAME_ARRAY);
}

/**
 * 获得选中的buy offer的数量
 */
function getBuyOfferCheckedNum(){
  return getCheckedItemNum('chkBuyOfferIds'); 	
}

/**
 * 获得选中的sell offer的数量
 */
function getSellOfferCheckedNum(){
  return getCheckedItemNum('chkSellOfferIds'); 	
}

/**
 * 获得选中的Company的数量
 */
function getCompanyCheckedNum(){
  return getCheckedItemNum('chkCompanyIds'); 	
}

/**
 * 获得选中的Product的数量
 */
function getProductCheckedNum(){
  return getCheckedItemNum('chkProductIds'); 	
}

/**
 * 获得指定名称的选中记录的个数
 * @param item - 指定参数的名称
 */
function getCheckedItemNum(item){
  return getCheckedRecordNum(document.form,new Array(item)); 	
}

/**
 * 清除已选中的buy offer的记录．不就是清除所有吗？
 */
function uncheckQuote(){
  setCheckedFlag(document.form,new Array('chkBuyOfferIds'),false);
}

/**
 * 清除已选中的其他记录．不就是清除所有吗？
 */
function uncheckRFQ(){
  setCheckedFlag(document.form,new Array('chkSellOfferIds','chkProductIds','chkCompanyIds'),false);	
}

/////////part2 - started

/**
 * 给指定表单中指定名称的复选框置选中标志
 * @param formObj    - 表单对象
 * @param eleNameArr - 存放指定元素名称的数组
 * @checkedFlag      - 选中标志
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
 * 获得指定表单中指定名称的复选框的选中数量
 * @param formObj    - 表单对象
 * @param eleNameArr - 存放指定元素名称的数组
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
 * 去除字符串头尾的空格
 * @param str 被TRIM的字符串
 */
function trim(str){
   return(trimExt(str,' '));	
}


/**
 * 去除字符串头尾的指定的符号
 * @param str 被TRIM的字符串
 * @param ch 指定的字符
 */
function trimExt(str,ch){
   if(str == null) return(null);
   	
   //去除头上的空格	
   var start = 0,end = 0;   //记录字符串的起始和结束位置
   var i = 0;
   while(i<str.length){
   	  //判断是否为空格
   	  if(str.charAt(i) == ch){
   	  	i++;
   	  }else{
   	    start = i;
   	    break;
   	  }
   }
   
   i = str.length -1;
   while(i>=0){
   	  //判断是否为空格
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
 * 检查是否整数
 * @param value   要检查的值
 * @param return  是整数就返回TRUE
 */
function isNumber(value){
	if(trim(value)!=''&&!isNaN(value)&&(value.indexOf('.')==-1)){
		return(true);
	}
	
	return(false);
}

/**
 * 根据原先的值初始化下拉列表框
 * @param selectObj - 下拉列表框对象
 * @param oldValue  - 原先的值
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
 * javascript中的urlencode函数
 * 因为js中的escape的处理和java中的encode不完全一样
 * 除了才有了这个函数
 * @param str - 需要被encode的字符串
 */
function encode(str){
  if(str == null) return '';

  //先做一次编码
  var retStr = escape(str);

  //处理url中所有的+号，该字符escape中不处理
  if(str.indexOf('+') != -1){
    retStr = retStr.replace(/\+/g,'%2B');
  }
  
  //
  return retStr;
}
 

/**
 * 编码
 * 这个函数暂时不需要  
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
 * 解码
 * 这个函数暂时不需要  
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
 * 调节图片的长度和宽度做限制
 * 长度和宽度哪个超出就限制哪个
 * img src="image" onload="adjustImageSize(this,45,160)"
 * @param imageObj  - img 控件
 * @param maxHeight - 图片长度限制
 * @param maxWidth  - 图片宽度限制
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