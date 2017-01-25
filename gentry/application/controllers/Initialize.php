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
        $post_data = $this->input->post('number');

        //postデータをもとに$arrayからデータを抽出
        $data = $array[$post_data];
		
        //$dataをJSONにして返す
        $this->output
             ->set_content_type('application/json')
             ->set_output(json_encode($data));
	}
}
