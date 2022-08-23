function validate () {
	var innerValue=document.getElementById("annee").value;
	var btn=document.getElementById('create');

	if (innerValue.length==4) {
		document.getElementById("annee").value=innerValue+" - ";
		innerValue=document.getElementById("annee").value;
		console.log(innerValue);
	}
	if (innerValue.length>=9) {
		
		if(innerValue.includes("-")){
			const array=innerValue.split(" - ");
			if((array[1]-array[0]==1) && array[0]<array[1] && array[0].substring(1,2)==0 
				&&array[1].substring(1,2)==0  ){
				btn.disabled = false;
			}else{
				btn.disabled = true
			}
		}else{
			btn.disabled = true;
		}
	}else{
		btn.disabled = true;
	}
}

function goBack() {
	alert("ddd");
   window.history.back();
}