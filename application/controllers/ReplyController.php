<?php
class ReplyController extends MY_Controller
{
	//回复列表
	public function replyList() {
		$this->load->model('ReplyModel','rm');
		$data = $this->rm->search();
		$this->load->view('replyList', $data);
	}

	//删除回复
	public function replyDelete($id) {
		$this->load->model('ReplyModel', 'rm');
		$this->rm->delete($id);
		redirect(site_url('replyController/replyList'));
	}

	//回复详情
	public function replyDetail($id) {
		$this->load->model('ReplyModel', 'rm');
		$data = $this->rm->detail($id);
		$this->load->view('replyDetail', $data);
	}

	//审核单条回复
	public function replyChk($id) {
		$this->load->model('ReplyModel', 'rm');
		$this->rm->chkRpy($id);
		redirect(site_url('replyController/replyList'));
	}

	//回复状态
	public function replyStatus() {
		$this->load->model('ReplyModel', 'rm');
		$num = $this->rm->statusNum();
		echo json_decode($num);
	}

	//审核多条回复
	public function replyCheck() {
		$this->load->model('ReplyModel','rm');
		foreach ($this->input->post('ReplyCheck') as $value) {
			$this->rm->chkRpy($value);
		}
		redirect(site_url('replyController/replyList'));
	}
}