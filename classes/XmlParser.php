<?php
class XmlParser
{
	// Attributes
	private $xmlFile = '';
	private $entries = array();
	
	// Properties
	public function getXmlFile()
	{
		return $this->xmlFile;
	}
	public function getEntries()
	{
		return $this->entries;	
	}
	
	// Constructor
	public function __construct($fileName, $nodeName)
	{
		$this->xmlFile = simplexml_load_file('files/' . $fileName);	
		$this->getNodeEntries($nodeName);
	}
	
	// Methods
	private function getNodeEntries($nodeName)
	{
		foreach ($this->xmlFile as $entry)
		{
			$this->entries[] = $entry->$nodeName;
		}
	}
	public function listEntries()
	{
		foreach ($this->entries as $entry)
		{
			echo $entry . "<br />";
		}
	}
}

























