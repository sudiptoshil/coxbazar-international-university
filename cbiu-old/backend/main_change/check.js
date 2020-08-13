var xmlHttp=createXmlHttpRequest();
var j=0;
function createXmlHttpRequest(){
	var xmlHttp;
	if(window.XMLHttpRequest){
		xmlHttp=new XMLHttpRequest();
	}
	else{
		xmlHttp=new ActiveXObject();
	}
	return xmlHttp;
}
function process(){
	if(xmlHttp.readyState == 0 || xmlHttp.readyState == 4){
		
		alert('sfs');
		//setTimeout('process()',1000);
	}
}
function handleXmlRequest(){
	if(xmlHttp.readyState == 4){
		if(xmlHttp.status == 200){
			//xmlResponse=xmlHttp.responseXML;
			//xmlDocumentElement=xmlResponse.documentElement;
			
			setTimeout('process()',500);
			
		}
		else{
			alert('something went worng');
		}
	}
}
