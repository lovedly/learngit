
window.onload = function(){
    var url = "http://localhost/sales.json";
	var request = new XMLHttpRequest();
	request.open("get",url);
	request.onload = function(){
		   if(request.status == 200){
			   updateSales(request.responseText);  
		   }
		
		};
		request.send(null);

}

function undateSales(responseText){
    var salesDiv = document.getElementById("sales")
 	salesDiv.innerHTML = responseText;
}