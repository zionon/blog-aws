<?php
//无限级分类
class CategoryController extends MY_Controller
{
	//增加分类
	public function categoryCreate() {
		$this->load->library('form_validation');
		$this->load->model('CategoryModel', 'cm');
		$data = $this->cm->getTree();
		if ($this->form_validation->run('category') === FALSE) {
			$data['data'] = $data;
			$this->load->view('categoryCreate', $data);
		} else {
			$this->cm->create();
			redirect(site_url('CategoryController/categoryList'));
		}
	}

	//分类列表
	public function categoryList() {
		$this->load->model('CategoryModel', 'cm');
		$data['tree'] = $this->cm->getTree();
		$this->load->view('categoryList', $data);
	}

	//修改分类
	public function categoryUpdate($id) {
		$this->load->library('form_validation');
		$this->load->model('CategoryModel', 'cm');
		$data['tree'] = $this->cm->getTree();
		if ($this->form_validation->run('category') === FALSE) {
			$data['data'] = $this->cm->find($id);
			$data['children'] = $this->cm->getChildren($id);
			$this->load->view('categoryUpdate', $data);
		} else {
			$this->cm->update($id);
			redirect(site_url('CategoryController/categoryList'));
		}
	}

	//分类删除
	public function categoryDelete($id) {
		$this->load->model('CategoryModel', 'cm');
		$this->cm->delete($id);
		redirect(site_url('CategoryController/categoryList'));
	}
}