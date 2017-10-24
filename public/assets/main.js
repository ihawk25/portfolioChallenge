function addFund() {
	var portfolio = document.getElementById('userPortfolio');
	var aBtn = document.getElementById('addBtn');
	var rBtn = document.getElementById('removeBtn');


	if (parseInt(aBtn.value) < 4) {
		aBtn.value = (parseInt(aBtn.value) + 1);
	
		var fieldset = portfolio.getElementsByTagName('fieldset')[parseInt(aBtn.value)];
		fieldset.hidden = false;
		fieldset.disabled = false;
		rBtn.disabled = false;
		
		if (parseInt(aBtn.value) === 4) { addBtn.disabled = true; } 
	}
}


function removeFund() {
	var portfolio = document.getElementById('userPortfolio');
	var aBtn = document.getElementById('addBtn');
	var rBtn = document.getElementById('removeBtn');
	
	if (parseInt(aBtn.value) > 0) {
		var fieldset = portfolio.getElementsByTagName('fieldset')[parseInt(aBtn.value)];
		fieldset.hidden = true;
		fieldset.disabled = true;
		
		aBtn.disabled = false;
		aBtn.value = (parseInt(aBtn.value) - 1);
		
		if (parseInt(aBtn.value) === 0) { rBtn.disabled = true; }
	}
}
