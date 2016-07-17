<?php
class TagController extends MY_Controller
{
	//添加标签
	public function add() {
		$this->load->model('TagModel','tm');
		$this->tm->add();
	}
}