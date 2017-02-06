<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Signon extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
        $member_info = array(
            'user' => '山田',
            'pass' => '太郎',
        );
        
		$this->load->view('signon', $member_info);
	}
    
	public function doSingon() {
        $userId = $this->input->post('userId');
        $password = $this->input->post('password');
        $handleName = $this->input->post('handleName');
        $json = array();
        
            //$slave_db = $this->load->database('default', TRUE);
//        $slave_db = $this->load->database('default', TRUE);
        
            $sql = "INSERT INTO USER_INFO (USER_ID, HANDLE_NAME, DEVICE_ID, STATE, CREATEDATE, UPDATEDATE) VALUES ('". $userId ."', '". $handleName ."', '". $password ."', 1, now9(), now9())";
            //$cnt = $slave_db->query($sql);
            $cnt = $this->load->database('default', TRUE)->query($sql);
            
            if (!empty($cnt)) {
                // 成功処理
                $json['isSuccess'] = TRUE;
            } else {
                // 失敗処理
                $json['isSuccess'] = FALSE;
            }
            
            $member_info = array(
                'ex' => $cnt,
            );
            $this->load->view('error', $member_info);
		
        //$dataをJSONにして返す
        $this->output
             ->set_content_type('application/json')
             ->set_output(json_encode($json));
      
    }
}
