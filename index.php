<?php
include '../freaky_functions/freaky_functions.php';
include 'classes/XmlParser.php';

$xml = new XmlParser('sitemap-old.xml', 'loc');

//$xml->listEntries();


foreach ($xml->getEntries() as $entry)
{
	$explodedEntryArray = explode('/', $entry);
	
	if (end($explodedEntryArray) != "")
	{
		$tempArray[] = end($explodedEntryArray);
	}
}

foreach ($tempArray as $part)
{
	if (preg_match('/--[1-9]+.html/', $part) == 1)
	{
		$urlsArray[] = $part;
	}
}

foreach ($urlsArray as $url)
{
	$lastUrlParts[] = end(explode('--', $url));
}

foreach ($lastUrlParts as $lastUrlPart)
{
	$articeIds[] = reset(explode('.', $lastUrlPart));
}


dump($articeIds);
