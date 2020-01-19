

$("#anazitisi").hide();

let B1clicked=false;

$("#B1").click(function() {
	if(!B1clicked){
		B1clicked=true;
		$("#anazitisi").show();
	}
	else{
		B1clicked=false;
		$("#anazitisi").hide();
	}
});


