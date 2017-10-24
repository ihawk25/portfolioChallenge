<?php

$availableFunds = [ //normally these would be columns in a database, but that seemed overkill for this
	'VFINX' => [ 'stockBond' => 'S', 'category' => 0, 'expenseRatio' => 0.14, 'fundName' => 'Vanguard 500 Index' ],
	'FCNTX' => [ 'stockBond' => 'S', 'category' => 0, 'expenseRatio' => 0.68, 'fundName' => 'Fidelity ContraFund' ],
	'FSCLX' => [ 'stockBond' => 'S', 'category' => 1, 'expenseRatio' => 0.17, 'fundName' => 'Fidelity Mid Cap Index' ],
	'DFSVX' => [ 'stockBond' => 'S', 'category' => 2, 'expenseRatio' => 0.52, 'fundName' => 'DFA US Small Cap Value I' ],
	'ASQAX' => [ 'stockBond' => 'S', 'category' => 2, 'expenseRatio' => 1.13, 'fundName' => 'American Century Small Company' ],
	'VDVIX' => [ 'stockBond' => 'S', 'category' => 3, 'expenseRatio' => 0.17, 'fundName' => 'Vanguard Developed Markets Index' ],
	'RERHX' => [ 'stockBond' => 'S', 'category' => 3, 'expenseRatio' => 0.62, 'fundName' => 'American Funds Europacific Growth' ],
	'RLEMX' => [ 'stockBond' => 'S', 'category' => 3, 'expenseRatio' => 1.09, 'fundName' => 'Lazard Emerging Markets Equity' ],
	'CSRSX' => [ 'stockBond' => 'S', 'category' => 4, 'expenseRatio' => 0.96, 'fundName' => 'Cohen &amp; Steers Realty Shares' ],
	'EKWAX' => [ 'stockBond' => '-', 'category' => 5, 'expenseRatio' => 1.09, 'fundName' => 'Wells Fargo Precious Metals' ],
	'PTTRX' => [ 'stockBond' => 'B', 'category' => 6, 'expenseRatio' => 0.46, 'fundName' => 'PIMCO Total Return' ],
	'FVIAX' => [ 'stockBond' => 'B', 'category' => 6, 'expenseRatio' => 0.76, 'fundName' => 'Fidelity Advisor Government Income' ],
	'VCORX' => [ 'stockBond' => 'B', 'category' => 6, 'expenseRatio' => 0.25, 'fundName' => 'Vanguard Core Bond' ],
	'SPRXX' => [ 'stockBond' => 'B', 'category' => 7, 'expenseRatio' => 0.42, 'fundName' => 'Fidelity Money Market' ],
	'TRRMX' => [ 'stockBond' => '-', 'category' => 8, 'expenseRatio' => 0.76, 'fundName' => 'Target Date Fund' ]
				];


$userInvestments = [];
 
if (isset($_POST)) {//parse user post input
	foreach ($_POST as $k => $v) {
		$recID = intval(substr($k, -1));
		$keyName = substr($k, 0, -2);
		
		if ($keyName === 'ticker') {
			$userInvestments[$recID] = array_merge($userInvestments[$recID], $availableFunds[$v]);
			$userInvestments[$recID]['ticker'] = $v;
		} else { //key must be investment amount, no need to evaluate
			$userInvestments[$recID]['amount'] = intval($v);
		}
	}
}

/* Add total amounts */
$totalStockBonds = [];
$totalCategories = [];
$totalInvest = 0;

foreach ($userInvestments as $inv) {

	if (!isset($totalStockBonds[$inv['stockBond']])) {
		$totalStockBonds[$inv['stockBond']] = $inv['amount'];
	} else {
		$totalStockBonds[$inv['stockBond']] += $inv['amount'];
	}

	if (!isset($totalCategories[$inv['category']])) {
		$totalCategories[$inv['category']] = $inv['amount'];
	} else {
		$totalCategories[$inv['category']] += $inv['amount'];
	}
	
	$totalInvest += $inv['amount'];
}




/* Main Algorithm */

$categories = [ //target value would be stored differently if we weren't only concerned with users 15 years from retirement
	0 => [ 'name' => 'Large Cap Stocks', 'target' => (round($totalInvest * 0.38, 2)) ],
	1 => [ 'name' => 'Mid Cap Stocks', 'target' => (round($totalInvest * 0.12, 2)) ],
	2 => [ 'name' => 'Small Cap Stocks', 'target' => (round($totalInvest * 0.08, 2)) ],
	3 => [ 'name' => 'International Stocks', 'target' => (round($totalInvest * 0.26, 2)) ],
	4 => [ 'name' => 'Real Estate', 'target' => (round($totalInvest * 0.04, 2)) ],
	5 => [ 'name' => 'Commodities', 'target' => 0 ],
	6 => [ 'name' => 'Bonds', 'target' => (round($totalInvest * 0.1, 2)) ],
	7 => [ 'name' => 'Money Market', 'target' => (round($totalInvest * 0.02, 2)) ],
	8 => [ 'name' => 'Target Date', 'target' => 0 ]
				];

$outInvestments = [];

foreach($userInvestments as $inv) {
	$outInvestments = array_merge($outInvestments, [ $inv['ticker'] => $inv ]);
	//free up investments that don't match target categories
	if ($inv['category'] === 5 || $inv['category'] === 8) {
		$outInvestments[$inv['ticker']]['diff'] = -$inv['amount'];
		$outInvestments[$inv['ticker']]['removed'] = true;
	}
}

//Go through each category. Modifying input investments first, match category total to target
foreach($categories as $k => $v) {
	if ( $totalCategories[$k] < $v['target'] ) { //category total less than target
		$newFund = [];
		
		foreach($availableFunds as $key => $value) {
			if ($value['category'] === $k && (!isset($newFund['expenseRatio']) || $value['expenseRatio'] < $newFund['expenseRatio'])) { //ensures we select cheapest fund
				$newFund = array_merge(['ticker' => $key ], $value);
			}
		}

		if (!array_key_exists($outInvestments, $newFund['ticker'])) {
			$outInvestments[$newFund['ticker']] = $newFund;
		}
		$outInvestments[$newFund['ticker']]['diff'] = ($v['target'] - $totalCategories[$k]);
	
	} elseif ( $totalCategories[$k] > $v['target'] ) { //category total above target
		$oldFund = [];
		
		foreach($userInvestments as $key => $value) {
			if ($value['category'] === $k && (!isset($oldFund['expenseRatio']) || $value['expenseRatio'] > $oldFund['expenseRatio'])) { //ensures we select the more expensive fund to sell
				$oldFund = $value;
			}
		}

		$outInvestments[$oldFund['ticker']]['diff'] = -($totalCategories[$k] - $v['target']);
	}
}

?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="assets/style.css" />
</head>

<body>

<div id="before">
	<h4>Current Portfolio</h4>
	<div>
		<?php
			echo('<p>Stocks: ' . (round($totalStockBonds['S'] / $totalInvest, 2) * 100) . '%</p>');
			echo('<p>Bonds: ' . (round($totalStockBonds['B'] / $totalInvest, 2) * 100) . '%</p>');
			echo('<p>Other: ' . (round($totalStockBonds['-'] / $totalInvest, 2) * 100) . '%</p>');
		?>
	</div>
	<div>
		<?php
			foreach ($totalCategories as $k => $v) {
				echo('<p>' . $categories[$k]['name'] . ': ' . (round($v / $totalInvest, 2) * 100) . '%</p>');
			}
		?>
	</div>
	
	<?php
		foreach ($userInvestments as $inv) {
			echo('<div class="fund"><p>' . $inv['fundName'] . "</p>\n<p>" . $inv['ticker'] . "</p>\n<p>" . $inv['expenseRatio'] . "</p><p>" . $inv['amount'] . "</p></div>");
		}
	?>
</div>

<div id="after">
	<h4>Suggested Portfolio</h4>
	<div>
		<p>Stocks: 88%</p>
		<p>Bonds: 12%</p>
	</div>
	
	<?php
		foreach ($outInvestments as $inv) {
			echo('<div class="fund"><p>' . $inv['fundName'] . "</p>\n<p>" . $inv['ticker'] . "</p>\n<p>" . $inv['expenseRatio'] . "</p><p>" . $inv['diff'] . "</p></div>");
		}
	?>
</div>
<p>Total Investments: $
<?php
	echo($totalInvest);
?>
</p>

</body>
</html>
