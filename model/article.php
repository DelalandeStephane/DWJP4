<?php

class article 
{
	private $id;
	private $chapterIndex;
	private $title;
	private $content;
	private $creationDate;
	private $UpdateDate;

	public  function getId() {
		return $this->id;
	}
	public  function getChapterIndex() {
		return $this->chapterIndex;
	}
	public  function getTitle() {
		return $this->title;
	}
	public  function getContent() {
		return $this->content;
	}
	public  function getCreationDate() {
		return $this->creationDate;
	}
	public  function getUpdateDate() {
		return $this->UpdateDate;
	}

	public  function setId($id) {
		$this->id = $id;
	}
	public  function setChapterIndex($chapIndex) {
		$this->chapterIndex = $chapIndex;
	}
	public  function setTitle($title) {
		$this->title = $title;
	}
	public  function setContent($content) {
		$this->content = $content;
	}
	public  function setCreationDate($creaDate) {
		$this->creationDate = $creaDate;
	}
	public  function setUpdateDate($upDate) {
		$this->UpdateDate = $upDate;
	}
}