<?php
class BoardDTO{
	private $pk;
	private $memberPk;
	private $title;
	private $writer;
	private $content;
	private $views;
	private $insertTime;
	private $updateTime;
	
	public function __construct($pk, $memberPk, $title, $writer, $content, $views, $insertTime, $updateTime)
	{
		$this->pk = $pk;
		$this->memberPk = $memberPk;
		$this->title = $title;
		$this->writer = $writer;
		$this->content = $content;
		$this->views = $views;
		$this->insertTime = $insertTime;
		$this->updateTime = $updateTime;
		
	}
	
	public function getPk() {
		return $this->pk;
	}
	public function setPk($pk) {
		$this->pk = $pk;
	}
	public function getMemberPk() {
		return $this->memberPk;
	}
	public function setMemberPk($memberPk) {
		$this->memberPk = $memberPk;
	}
	public function getTitle() {
		return $this->title;
	}
	public function setTitle($title) {
		$this->title = $title;
	}
	public function getWriter() {
		return $this->content;
	}
	public function setWriter($writer) {
		$this->writer = $writer;
	}
	public function getContent() {
		return $this->pk;
	}
	public function setContent($content) {
		$this->content = $content;
	}
	public function getViews() {
		return $this->views;
	}
	public function setViews($views) {
		$this->views = $views;
	}
	public function getInsertTime() {
		return $this->insertTime;
	}
	public function setInsertTime($insertTime) {
		$this->insertTime = $insertTime;
	}
	public function getUpdateTime() {
		return $this->updateTime;
	}
	public function setUpdateTime($updateTime) {
		$this->updateTime = $updateTime;
	}
}
?>