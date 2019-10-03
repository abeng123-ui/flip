<?php
try
{
	// required headers
	header("Access-Control-Allow-Origin: *");
	header("Content-Type: application/json; charset=UTF-8");
	header("Access-Control-Allow-Methods: POST");
	header("Access-Control-Max-Age: 3600");
	header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

	// include database and object files
	include_once '../config/database.php';
	include_once '../model/transaksi.php';
	include_once '../helper/apiHelper.php';
	date_default_timezone_set("Asia/Jakarta");

	// instantiate database and product object
	$database = new Database();
	$db = $database->getConnection();
	 
	// initialize object
	$apiHelper = new apiHelper();

	// get posted data
	$posted = json_decode(file_get_contents("php://input"));

	if(!empty($posted->account_number) &&
	    !empty($posted->bank_code) &&
	    !empty($posted->amount) &&
	    !empty($posted->remark))
	{

		$param = [
		    "account_number" => $posted->account_number,
		    "bank_code" => $posted->bank_code,
		    "amount" => $posted->amount,
		    "remark" => $posted->remark
		];

		$result = $apiHelper->post($param);
		$result = json_decode($result);

		if(isset($result->status))
		{
			// save data
			$transaksi = new Transaksi($db);
			$transaksi->id_flip = $result->id;
			$transaksi->amount = $result->amount;
			$transaksi->status = $result->status;
			$transaksi->timestamp = $result->timestamp;
			$transaksi->bank_code = $result->bank_code;
			$transaksi->account_number = $result->account_number;
			$transaksi->beneficiary_name = $result->beneficiary_name;
			$transaksi->remark = $result->remark;
			$transaksi->receipt = $result->receipt;
			$transaksi->time_served = $result->time_served;
			$transaksi->fee = $result->fee;
			$transaksi->created_at = date('Y-m-d H:i:s');
			$transaksi->updated_at = date('Y-m-d H:i:s');

			if($transaksi->create())
			{
				http_response_code(200);
		 
				$result = array(
						"status" => 1,
				        "message" => "Sukses.",
				        "data" => $result
				     );
			}else{
				// set response code - 503 service unavailable
			    http_response_code(503);
			 
			    $result = array(
			        	"status" => 0,
			        	"message" => "Gagal, update status."
			    );
			}

			
		}else{
			http_response_code(404);
		
		    $result = array(
		        	"status" => 0,
		        	"message" => "Gagal."
		    );
		}
	}else{
		http_response_code(503);
			 
	    $result = array(
	        	"status" => 0,
	        	"message" => "Gagal, isi data dengan benar."
	    );
	}

} catch (Exception $e) {
    http_response_code(503);
 
    $result = array(
        	"status" => 0,
        	"message" => "Error txception."
    );
}catch (Throwable $e) {
    http_response_code(503);
 
    $result = array(
        	"status" => 0,
        	"message" => "Error throwable."
    );
}

echo json_encode($result);

 
