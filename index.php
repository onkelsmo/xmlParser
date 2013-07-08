<?php
include '../freaky_functions/freaky_functions.php';
include 'classes/XmlParser.php';
include 'classes/DBHandler.php';

$db = new DBHandler('localhost', 'root', 'hedpe1981');
$db->connect('schneekloth1');

$xml = new XmlParser('sitemap-old.xml', 'loc');


foreach ($xml->getArticleIds() as $articleId)
{
	$ergebnis = $db->selector('catalog_product_flat_1', 'url_path', 'artikel_id', $articleId);
	
	while ($row = mysql_fetch_object($ergebnis))
	{
		$newUrl = $row->url_path;
	}

	$redirectListArray[] = array($articleId, $newUrl);	// gibt 1285 Ergebnisse
	//$redirectListArray[$articleId] = $newUrl;				// gibt 625 Ergebnisse
}

//dump($redirectListArray);

$fp = fopen('files/redirectList.csv', 'w');

foreach ($redirectListArray as $listEntry)
{
	fputcsv($fp, $listEntry);
}

fclose($fp);





