<?php
class XmlParser
{
	// Attributes
	private $xmlFile = '';
	private $entries = array();
	private $articleIds = array();
	
	// Properties
	public function getXmlFile()
	{
		return $this->xmlFile;
	}
	public function getEntries()
	{
		return $this->entries;	
	}
	public function getArticleIds()
	{
		return $this->articleIds;
	}
	
	// Constructor
	public function __construct($fileName, $nodeName)
	{
		$this->xmlFile = simplexml_load_file('files/' . $fileName);	
		$this->getNodeEntries($nodeName);
		$this->writeArticleIdsToArray();
	}
	
	// Methods
	private function getNodeEntries($nodeName)
	{
		foreach ($this->xmlFile as $entry)
		{
			$this->entries[] = $entry->$nodeName;
		}
	}
	/**
	 *
	 * writeArticleIdsToArray - gets the article ID's out of the entries and writes them into an array
	 *
	 */
	private function writeArticleIdsToArray()
	{
		foreach ($this->getEntries() as $entry)
		{
			$explodedEntryArray = explode('/', $entry);
	
			if (end($explodedEntryArray) != "")
			{
				$temp = end($explodedEntryArray);
	
				if (preg_match('/--[1-9]+.html/', $temp) == 1)
				{
					$url = $temp;
					$lastUrlPart = end(explode('--', $url));
					$articeIds[] = reset(explode('.', $lastUrlPart));
						
					$this->articleIds = $articeIds;
				}
			}
		}
	}
	public function listEntries()
	{
		foreach ($this->entries as $entry)
		{
			echo $entry . "<br />";
		}
	}
	public function listArticleIds()
	{
		foreach ($this->articleIds as $articleId)
		{
			echo $articleId . "<br />";
		}
	}
	
	
}

























