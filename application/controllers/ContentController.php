<?php
//分类文章控制器
class ContentController extends CI_Controller
{
	//获取日志分类
	public function getContents() {
		$this->load->model('PostModel','pm');
		$data = $this->pm->lst();
		$this->load->model('TagModel','tm');
		$tag = $this->tm->search();
		$data['tags']['tags'] = $tag;
		$this->load->model('CommentModel', 'cm');
		$comment = $this->cm->newCom();
		$commentNum = $this->cm->totalCom($data['data']);
		$data['num'] = $commentNum;
		$data['comments']['comment'] = $comment->result();
		$this->load->model('CategoryModel', 'ca');
		$data['categorys']['tree'] = $this->ca->getTree();
		$this->load->view('blog', $data);
	}
}