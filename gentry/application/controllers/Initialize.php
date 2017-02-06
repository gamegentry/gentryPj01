<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Initialize extends CI_Controller {

	public function index()
	{
        // サーバ側でもってるデータ
        $array = array(
            array('isSignon' => TRUE),
            array('isSignon' => FALSE),
        );

        //postで送られてきたデータ
        $userId = $this->input->post('userId');
        $password = $this->input->post('password');
        
        $json = array();
        try {
            $slave_db = $this->load->database('default', TRUE);
        
            $sql = "SELECT * FROM USER_INFO WHERE USER_ID = '". $userId ."' AND DEVICE_ID='". $password ."'";
            $result = $slave_db->query($sql);
            $userInfo = $result->result('object');
            $type =  gettype($userInfo);
            
            if (!empty($userInfo)) {
                // 成功処理
                $json['isSignon'] = TRUE;
                $json['userInfo'] = $userInfo;
                $json['type'] = $type;
            } else {
                // 失敗処理
                $json['isSignon'] = FALSE;
                $json['type'] = $type;
            }

//            $member_info = array(
//                'ex' => $userInfo,
//            );
//            $this->load->view('error', $member_info);
          
        } catch (Exception $ex) {

            $member_info = array(
                'ex' => $ex,
            );
            $this->load->view('error', $member_info);
        }
		
        //$dataをJSONにして返す
        $this->output
             ->set_content_type('application/json')
             ->set_output(json_encode($json));
	}
}
