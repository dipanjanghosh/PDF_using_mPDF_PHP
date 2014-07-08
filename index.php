<?php
	// For debug uncomment
	// error_reporting(E_ALL);
	// ini_set('display_errors',1);
 	require_once('MPDF56/mpdf.php');
 	if(isset($_GET['create-pdf'])) {
			$mpdf = new mPDF('', 'A4', 0, '', 12, 12, 10, 10, 5, 5);
			$mpdf->AliasNbPages('[pagetotal]');
            $mpdf->SetHTMLHeader('{PAGENO}/{nb}', '1',true);
            $mpdf->SetDisplayMode('fullpage');
            $mpdf->pagenumPrefix = 'Page number ';
            $mpdf->pagenumSuffix = ' - ';
            $mpdf->nbpgPrefix = ' out of ';
            $mpdf->nbpgSuffix = ' pages';
            $mpdf->SetHeader('{PAGENO}{nbpg}');
            $stylesheet = file_get_contents('style.css');
            $mpdf->WriteHTML($stylesheet,1);  
            $htmView = file_get_contents('testView.html');                     
            $mpdf->WriteHTML($htmView,2);                       
            $mpdf->Output('output.pdf','I');
 	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>PDF Create Using mPDF with CSS file and inline CSS</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<div class="container">
	 		<div class="page-heading"> PDF Create Using mPDF with CSS file and inline CSS and Image </div>
	 		<center>
				<a href="index.php?create-pdf=1" title="Click">Cteate PDF</a>	
	 		</center>	
	 		<div class="footer"> @Dipanjan Ghosh</div>
	 </div>
	
</body>
</html>