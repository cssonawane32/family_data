<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Family extends CI_Controller {

	//Show Heads Data
	public function index()
	{
		$data['headList'] = $this->Family_model->head_list();
		$this->load->view('family_list', $data);
	}

	//Show Members Data By Head
	public function members()
	{
		$head = $this->input->post('head');
		$data = $this->Family_model->member_by_head($head);
		echo json_encode($data);
	}

	//Form View
	public function add()
	{
		$this->load->view('family_add');
	}

	//Save Form Data
	public function save()
	{
		$data = $this->input->post();

		$config['upload_path']   = './uploads/';
        $config['allowed_types'] = 'jpg|png|jpeg|gif';

        $this->load->library('upload', $config);

        if(!$this->upload->do_upload('photo')) {
            $photo = '';
        } else {   
            $hpdata = array('upload_data' => $this->upload->data());
            $photo = $hpdata['upload_data']['file_name'];
        }

        if(isset($data['marriage_date'])) {
        	$marriage_date = $data['marriage_date'];
        } else {
        	$marriage_date = '0000-00-00';
        }

        $head = array(
        	'name' => $data['name'],
        	'surname' => $data['surname'],
        	'dob' => $data['dob'],
        	'mobile' => $data['mobile'],
        	'address' => $data['address'],
        	'state' => $data['state'],
        	'city' => $data['city'],
        	'pincode' => $data['pincode'],
        	'married' => $data['married'],
        	'marriage_date' => $marriage_date,
        	'hobbies' => implode(",", $data['hobbies']),
        	'photo' => $photo,
        	'created_at' => date("Y-m-d H:i:s")
        );

        $headId = $this->Family_model->head_save($head);

        if($headId > 0) {
        	if(isset($data['mid'])) {
	        	$members = array();
		        $j = 0;
		        foreach($data['mid'] as $mid) {
		        	$key = 'mphoto'.$mid;
		        	if(!$this->upload->do_upload($key)) {
			            $mphoto = '';
			        } else {   
			            $mpdata = array('upload_data' => $this->upload->data());
			            $mphoto = $mpdata['upload_data']['file_name'];
			        }

			        if(isset($data['mwed_date'][$j])) {
			        	$mwed_date = $data['mwed_date'][$j];
			        } else {
			        	$mwed_date = '0000-00-00';
			        }

		        	$members[] = array(
		        		'head' => $headId,
			        	'name' => $data['mname'][$j],
			        	'dob' => $data['mdob'][$j],
			        	'married' => $data['mmarriage_stat'][$j],
			        	'marriage_date' => $mwed_date,
			        	'education' => $data['meducation'][$j],
			        	'photo' => $mphoto,
			        	'created_at' => date("Y-m-d H:i:s")
		        	);

		        	$j++;
		        }

		        $this->Family_model->member_save($members);
		    }
        }

        echo $headId;
	}
}
