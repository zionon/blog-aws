<?php
class PostController extends MY_Controller
{
	//日志列表
	public function postList(){
		$this->load->model('PostModel','pm');
		$data = $this->pm->search();
		$this->load->model('CategoryModel', 'cm');
		$data['tree'] = $this->cm->getTree();
		$this->load->view('postList', $data);
	}

	//新建日志
	public function postCreate() {
		//验证表单
		$this->load->library('form_validation');
		if ($this->form_validation->run('post') === FALSE) {
			$this->load->model('CategoryModel', 'cm');
			$data['tree'] = $this->cm->getTree();
			$this->load->view('postCreate', $data);
		} else {
			$this->load->model('PostModel','pm');
			$this->pm->create();
			redirect(site_url('PostController/postList'));
		}
	}

	//修改日志
	public function postUpdate($id) {
		$this->load->model('PostModel','pm');
		$this->load->model('CategoryModel', 'cm');
		//验证表单
		$this->load->library('form_validation');
		if ($this->form_validation->run('post') === FALSE) {
			$data = $this->pm->find($id);
			$data['tree'] = $this->cm->getTree();
			$this->load->view('postUpdate', $data);
		} else {
			$this->pm->update();
			redirect(site_url('PostController/postList'));
		}
	}

	//日志删除
	public function postDelete($id) {
		$this->load->model('PostModel', 'pm');
		$this->pm->delete($id);
		redirect(site_url('PostController/postList'));
	}

	//日志详情
	public function postDetail($id) {
		$this->load->model('PostModel','pm');
		$data = $this->pm->find($id);
		$this->load->view('postDetail', $data);
	}
}