<?php
	$date = date('Y-m-d');
	$access_path = 'public/upload/' . $date;
	$upload_path = FCPATH . $access_path; 
	if (!file_exists($upload_path)) {
		@mkdir($upload_path);
	}
	$config = array(
		'upload_path' => $upload_path,
		'allowed_types' => 'gif|jpg|png',
		'max_size' => '1000',
		'max_width' => '1024',
		'max_height' => '768',
		'encrypt_name' => true,
		'access_path' => $access_path,
	);