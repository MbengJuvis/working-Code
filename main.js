function getForm(formID,hiddenID){

		const names={};
	 	var y = document.getElementById(formID);
	 	var i;
   		for (i = 0; i < y.length-2;i++) {
		      names[ y.elements[i].name ] = y.elements[i].value;
		        
    }

    myJSON=JSON.stringify(names);
    document.getElementById(hiddenID).value = myJSON ;

    
    
    



}