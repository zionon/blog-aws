<?php
class CommentController extends MY_Controller
{
	//评论列表
	public function commentList() {
		$this->load->model('CommentModel','cm');
		$data = $this->cm->search();
		$this->load->view('commentList', $data);
	}

	//删除评论
	public function commentDelete($id) {
		$this->load->model('CommentModel', 'cm');
		$this->cm->delete($id);
		redirect(site_url('CommentController/commentList'));
	}

	//评论详情
	public function commentDetail($id) {
		$this->load->model('CommentModel', 'cm');
		$data = $this->cm->detail($id);
		$this->load->view('commentDetail', $data);
	}

	//审核单条评论
	public function commentChk($id) {
		$this->load->model('CommentModel', 'cm');
		$this->cm->chkCom($id);
		redirect(site_url('CommentController/commentList'));
	}

	//评论状态
	public function commentStatus() {
		$this->load->model('CommentModel', 'cm');
		$num = $this->cm->statusNum();
		echo json_decode($num);
	}

	//审核多条评论
	public function commentCheck() {
		$this->load->model('CommentModel','cm');
		foreach ($this->input->post('CommentCheck') as $value) {
			$this->cm->chkCom($value);
		}
		redirect(site_url('CommentController/commentList'));
	}
}






