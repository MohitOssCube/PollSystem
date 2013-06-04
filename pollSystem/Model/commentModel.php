<?php

class commentModel extends DBConnection {
	private $_userid;
	
	public function addComment($userName,$comment) {
		//echo ("in model");
		$_userid=$userName;
		$userName="1";
		$data = array('question_id'=>'1','comment'=>$comment,'login_id'=>$userName,'date_time'=>date('Y-m-d h:i:s', time()),'status'=>'TRUE');
		//$result = $this->_db->select($data);
		$this->_db->insert("comment",$data);
		
	}
	public function getComments($qid) {
		//echo ("in model");
		
		$data['columns']	= array('comment', 'login_id','date_time');
		$data['tables']		= 'comment';
		$data['conditions']		= array('question_id' => $qid);
		$result = $this->_db->select($data);
		
		while($row = $result->fetch(PDO::FETCH_ASSOC)) {
			//print_r($row);die;
			$loginId=$row['login_id'];
			$data['columns']	= array('first_name');
			$data['tables']		= 'login';
			$data['conditions']		= array('id' => $loginId);
			$result1 = $this->_db->select($data); 
			while($row1 = $result1->fetch(PDO::FETCH_ASSOC)) {
				$row['login_id']=$row1['first_name'];
			}
			$ar[]=($row);
			//print_r($row);
		}	
		echo json_encode($ar);
	}
	
	
}
?>