function numberWithCommas(n) {
		if(n==null){
			n=0;
		}
    var parts=n.toString().split(".");
    return parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",") + (parts[1] ? "." + parts[1] : "");
}

function removeCommas(str){
	if(str==null){
			str=0;
		}
	var number=str.replace(/\,/g,'');
	return number;
}