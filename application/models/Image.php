<?php
	class Image extends CI_Model{
		function __construct()
		{
			parent::__construct();
		}
		function upload_image($path_dir,$file_name,$thumb_width){
			$path_dir_thumb = $path_dir.'thumb/';
			if (!is_dir($path_dir)){mkdir($path_dir);} 
			if (!is_dir($path_dir_thumb)){mkdir($path_dir_thumb);} 
			$config['upload_path']	= $path_dir;
			$config['allowed_types'] = 'jpg|png|jpeg|gif'; 
			$config['max_size'] = 5120;
			$config['file_name'] = $file_name;
			$this->load->library('upload', $config); 
			$this->upload->initialize($config); 
			$image = $this->upload->do_upload("image");
			$image_data = $this->upload->data();
			$name_image = $image_data['file_name'];

			//Create thumb
			$this->load->library('image_lib');
			$config['image_library'] 	= 'gd2';
			$config['source_image'] 	= $this->path_dir.$image_data['file_name'];
			$config['new_image'] 		= $this->path_dir_thumb.$image_data['file_name'];
			$config['create_thumb'] 	= TRUE;
			$config['maintain_ratio'] 	= TRUE;
			$config['thumb_marker'] 	= '-thumb';
			$config['width'] = $thumb_width;

			$ar_name_image = explode('.',$image_data['file_name']);
			$name_thumb = $ar_name_image[0].'-thumb.'.$ar_name_image[1];
		    $this->image_lib->initialize($config);
		    $this->image_lib->resize();
		    return array('name_image' => $name_image,'name_thumb' => $name_thumb);
		}
	}
?>