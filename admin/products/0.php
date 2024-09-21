<?php


function save_product(){
		extract($_POST);
		$data = "";
		foreach($_POST as $k =>$v){
			if(!in_array($k,array('id'))){
				if(!empty($data)) $data .=",";
				$v = $this->conn->real_escape_string($v);
				$data .= " `{$k}`='{$v}' ";
			}
		}
		$check = $this->conn->query("SELECT * FROM `products` where `product_cat` = '{$product_cat}' and id >= 0 ".($id > 0 ? " and id != '{$id}' " : '')." ")->num_rows;
		if($check > 0){
			$resp['status'] = 'failed';
			$resp['msg'] = 'Dorm Name already exists.';
			return json_encode($resp);
		}
		if(empty($id)){




			$product_cat = $_POST['product_cat'];
			$product_price = $_POST['product_price'];
			$imageName = $_FILES['image']['name'];
			$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));

			$sql = "INSERT INTO `products`  (product_cat,product_price,image)value('$product_cat','$product_price','$image') ";
		}
		
		else{$product_cat = $_POST['product_cat'];
			$product_price = $_POST['product_price'];
			$imageName = $_FILES['image']['name'];
			$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));



			$sql =  "UPDATE products SET product_cat='$product_cat', product_price='$product_price',image='$image'  where id = '{$id}' ";
		}
		////////////////kimi//                 else{
			//////$sql = "DELETE from `top`  where id = '{$id}'";
			
		//////////////kimi///////////////////////}
			$save = $this->conn->query($sql);
			
		if($save){
			$aid = !empty($id) ? $id : $this->conn->insert_id;
			$resp['status'] = 'success';
			$resp['aid'] = $aid;

			if(empty($id))
				$resp['msg'] = "New Dorm successfully saved.";
			else
				$resp['msg'] = " Dorm successfully updated.";
				//else
				///k/mi///////////////////$resp['msg'] = " Dorm successfully deleted.";
		}else{
			$resp['status'] = 'failed';
			$resp['err'] = $this->conn->error."[{$sql}]";
		}
		if($resp['status'] == 'success')
			$this->settings->set_flashdata('success',$resp['msg']);
			return json_encode($resp);
	}
	function delete_product(){
		extract($_POST);
		$del = $this->conn->query("DELETE from `products`  where id = '{$id}'");
		if($del){
			$resp['status'] = 'success';
			$this->settings->set_flashdata('success'," product successfully deleted.");
		}else{
			$resp['status'] = 'failed';
			$resp['error'] = $this->conn->error;
		}
		return json_encode($resp);

	}






