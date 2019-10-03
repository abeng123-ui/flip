<?php
try
{
	// required headers
	header("Access-Control-Allow-Origin: *");
	header("Content-Type: application/json; charset=UTF-8");
	header("Access-Control-Allow-Methods: POST");
	header("Access-Control-Max-Age: 3600");
	header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
	date_default_timezone_set("Asia/Jakarta");
	 
	// include database and object files
	include_once '../config/database.php';
	include_once '../model/transaksi.php';
	include_once '../helper/apiHelper.php';

	// instantiate database and product object
	$database  = new Database();
	$db 	   = $database->getConnection();
	$apiHelper = new apiHelper();
	$posted    = json_decode(file_get_contents("php://input"));

	if(!empty($posted->id))
	{

		$param = [
		    "id" => $posted->id
		];

		$result = $apiHelper->get($param);
		$result = json_decode($result);

		if(isset($result->status))
		{
			// save data
			$transaksi = new Transaksi($db);

			$transaksi->id_flip = $posted->id;
			$transaksi->status = $result->status;
			$transaksi->receipt = $result->receipt;
			$transaksi->time_served = $result->time_served;
			$transaksi->updated_at = date('Y-m-d H:i:s');

			if($transaksi->update())
			{
		 
			    http_response_code(200);
		 
				$result = array(
						"status" => 1,
				        "message" => "Sukses.",
				        "data" => $result
				);
			}
			else{
			 
			    // set response code - 503 service unavailable
			    http_response_code(503);
			 
			    $result = array(
			        	"status" => 0,
			        	"message" => "Gagal, update status failed"
			    );
			}

			
		}else{
			http_response_code(404);
		 
		    echo json_encode(
		        array(
		        	"status" => 0,
		        	"message" => "Gagal."
		        )
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
        	"message" => "Exception."
    );
}catch (Throwable $e) {
    http_response_code(503);
 
    $result = array(
        	"status" => 0,
        	"message" => "Throwable."
    );
}

echo json_encode($result);

 
