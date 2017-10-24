<!DOCTYPE html>
<html>
<head>
	<script src="assets/main.js"></script>
</head>

<body>
	<div id="userPortfolio">
		<label>Current Investments</label>
		<form action="evaluate.php" method="POST">
			<input type="submit" value="Analyze Portfolio">
			<fieldset name="0">
				<span>$</span>
				<input name="amount-0" type="numeric" placeholder="Enter amount...">
				<select name="ticker-0">
					<option selected hidden>Select a fund...</option>
					<option value="VFINX">Vanguard 500 Index</option>
					<option value="FCNTX">Fidelity ContraFund</option>
					<option value="FSCLX">Fidelity Mid Cap Index</option>
					<option value="DFSVX">DFA US Small Cap Value I</option>
					<option value="ASQAX">American Century Small Company</option>
					<option value="VDVIX">Vanguard Developed Markets Index</option>
					<option value="RERHX">American Funds Europacific Growth</option>
					<option value="RLEMX">Lazard Emerging Markets Equity</option>
					<option value="CSRSX">Cohen &amp; Steers Realty Shares</option>
					<option value="EKWAX">Wells Fargo Precious Metals</option>
					<option value="PTTRX">PIMCO Total Return</option>
					<option value="FVIAX">Fidelity Advisor Government Income</option>
					<option value="VCORX">Vanguard Core Bond</option>
					<option value="SPRXX">Fidelity Money Market</option>
					<option value="TRRMX">Target Date Fund</option>
				</select>
			</fieldset>
			
			<fieldset name="1" hidden disabled>
				<span>$</span>
				<input name="amount-1" type="numeric" placeholder="Enter amount...">
				<select name="ticker-1">
					<option selected hidden>Select a fund...</option>
					<option value="VFINX">Vanguard 500 Index</option>
					<option value="FCNTX">Fidelity ContraFund</option>
					<option value="FSCLX">Fidelity Mid Cap Index</option>
					<option value="DFSVX">DFA US Small Cap Value I</option>
					<option value="ASQAX">American Century Small Company</option>
					<option value="VDVIX">Vanguard Developed Markets Index</option>
					<option value="RERHX">American Funds Europacific Growth</option>
					<option value="RLEMX">Lazard Emerging Markets Equity</option>
					<option value="CSRSX">Cohen &amp; Steers Realty Shares</option>
					<option value="EKWAX">Wells Fargo Precious Metals</option>
					<option value="PTTRX">PIMCO Total Return</option>
					<option value="FVIAX">Fidelity Advisor Government Income</option>
					<option value="VCORX">Vanguard Core Bond</option>
					<option value="SPRXX">Fidelity Money Market</option>
					<option value="TRRMX">Target Date Fund</option>
				</select>
			</fieldset>

			<fieldset name="2" hidden disabled>
				<span>$</span>
				<input name="amount-2" type="numeric" placeholder="Enter amount...">
				<select name="ticker-2">
					<option selected hidden>Select a fund...</option>
					<option value="VFINX">Vanguard 500 Index</option>
					<option value="FCNTX">Fidelity ContraFund</option>
					<option value="FSCLX">Fidelity Mid Cap Index</option>
					<option value="DFSVX">DFA US Small Cap Value I</option>
					<option value="ASQAX">American Century Small Company</option>
					<option value="VDVIX">Vanguard Developed Markets Index</option>
					<option value="RERHX">American Funds Europacific Growth</option>
					<option value="RLEMX">Lazard Emerging Markets Equity</option>
					<option value="CSRSX">Cohen &amp; Steers Realty Shares</option>
					<option value="EKWAX">Wells Fargo Precious Metals</option>
					<option value="PTTRX">PIMCO Total Return</option>
					<option value="FVIAX">Fidelity Advisor Government Income</option>
					<option value="VCORX">Vanguard Core Bond</option>
					<option value="SPRXX">Fidelity Money Market</option>
					<option value="TRRMX">Target Date Fund</option>
				</select>
			</fieldset>

			<fieldset name="3" hidden disabled>
				<span>$</span>
				<input name="amount-3" type="numeric" placeholder="Enter amount...">
				<select name="ticker-3">
					<option selected hidden>Select a fund...</option>
					<option value="VFINX">Vanguard 500 Index</option>
					<option value="FCNTX">Fidelity ContraFund</option>
					<option value="FSCLX">Fidelity Mid Cap Index</option>
					<option value="DFSVX">DFA US Small Cap Value I</option>
					<option value="ASQAX">American Century Small Company</option>
					<option value="VDVIX">Vanguard Developed Markets Index</option>
					<option value="RERHX">American Funds Europacific Growth</option>
					<option value="RLEMX">Lazard Emerging Markets Equity</option>
					<option value="CSRSX">Cohen &amp; Steers Realty Shares</option>
					<option value="EKWAX">Wells Fargo Precious Metals</option>
					<option value="PTTRX">PIMCO Total Return</option>
					<option value="FVIAX">Fidelity Advisor Government Income</option>
					<option value="VCORX">Vanguard Core Bond</option>
					<option value="SPRXX">Fidelity Money Market</option>
					<option value="TRRMX">Target Date Fund</option>
				</select>
			</fieldset>

			<fieldset name="4" hidden disabled>
				<span>$</span>
				<input name="amount-4" type="numeric" placeholder="Enter amount...">
				<select name="ticker-4">
					<option selected hidden>Select a fund...</option>
					<option value="VFINX">Vanguard 500 Index</option>
					<option value="FCNTX">Fidelity ContraFund</option>
					<option value="FSCLX">Fidelity Mid Cap Index</option>
					<option value="DFSVX">DFA US Small Cap Value I</option>
					<option value="ASQAX">American Century Small Company</option>
					<option value="VDVIX">Vanguard Developed Markets Index</option>
					<option value="RERHX">American Funds Europacific Growth</option>
					<option value="RLEMX">Lazard Emerging Markets Equity</option>
					<option value="CSRSX">Cohen &amp; Steers Realty Shares</option>
					<option value="EKWAX">Wells Fargo Precious Metals</option>
					<option value="PTTRX">PIMCO Total Return</option>
					<option value="FVIAX">Fidelity Advisor Government Income</option>
					<option value="VCORX">Vanguard Core Bond</option>
					<option value="SPRXX">Fidelity Money Market</option>
					<option value="TRRMX">Target Date Fund</option>
				</select>
			</fieldset>
		</form>
	</div>
	<button id="addBtn" onclick="addFund();" value="0">+</button>
	<button id="removeBtn" onclick="removeFund();" disabled>-</button>


</body>
</html>
