<?php
class Transaksi{
 
    // database connection and table name
    private $conn;
    private $table_name = "transaksi";

    // object properties
    public $id_flip;
    public $amount;
    public $status;
    public $timestamp;
    public $bank_code;
    public $account_number;
    public $beneficiary_name;
    public $remark;
    public $receipt;
    public $time_served;
    public $fee;
    public $created_at;
    public $updated_at;
 
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }

    
    function create(){

        // query to insert record
        $query = "INSERT INTO
                    " . $this->table_name . "
                SET
                    id_flip=:id_flip, amount=:amount, status=:status, timestamp=:timestamp,
                    bank_code=:bank_code, account_number=:account_number, beneficiary_name=:beneficiary_name, remark=:remark, receipt=:receipt,
                    time_served=:time_served, fee=:fee, created_at=:created_at, updated_at=:updated_at
                ";
     
        // prepare query
        $stmt = $this->conn->prepare($query);
     
        // sanitize
        $this->id_flip=htmlspecialchars(strip_tags($this->id_flip));
        $this->amount=htmlspecialchars(strip_tags($this->amount));
        $this->status=htmlspecialchars(strip_tags($this->status));
        $this->timestamp=htmlspecialchars(strip_tags($this->timestamp));
        $this->bank_code=htmlspecialchars(strip_tags($this->bank_code));
        $this->account_number=htmlspecialchars(strip_tags($this->account_number));
        $this->beneficiary_name=htmlspecialchars(strip_tags($this->beneficiary_name));
        $this->remark=htmlspecialchars(strip_tags($this->remark));
        $this->receipt=htmlspecialchars(strip_tags($this->receipt));
        $this->time_served=htmlspecialchars(strip_tags($this->time_served));
        $this->fee=htmlspecialchars(strip_tags($this->fee));
        $this->created_at=htmlspecialchars(strip_tags($this->created_at));
        $this->updated_at=htmlspecialchars(strip_tags($this->updated_at));
     
        // bind values
        $stmt->bindParam(":id_flip", $this->id_flip);
        $stmt->bindParam(":amount", $this->amount);
        $stmt->bindParam(":status", $this->status);
        $stmt->bindParam(":timestamp", $this->timestamp);
        $stmt->bindParam(":bank_code", $this->bank_code);
        $stmt->bindParam(":account_number", $this->account_number);
        $stmt->bindParam(":beneficiary_name", $this->beneficiary_name);
        $stmt->bindParam(":remark", $this->remark);
        $stmt->bindParam(":receipt", $this->receipt);
        $stmt->bindParam(":time_served", $this->time_served);
        $stmt->bindParam(":fee", $this->fee);
        $stmt->bindParam(":created_at", $this->created_at);
        $stmt->bindParam(":updated_at", $this->updated_at);
     
        // execute query
        if($stmt->execute()){
            return true;
        }
     
        return false;
         
    }


    function update(){

        // query to insert record
        $query = "UPDATE
                    " . $this->table_name . "
                SET
                    status=:status, receipt=:receipt, time_served=:time_served, updated_at=:updated_at
                WHERE
                    id_flip=:id_flip
                ";
     
        // prepare query
        $stmt = $this->conn->prepare($query);
     
        // sanitize
        $this->id_flip=htmlspecialchars(strip_tags($this->id_flip));
        $this->status=htmlspecialchars(strip_tags($this->status));
        $this->receipt=htmlspecialchars(strip_tags($this->receipt));
        $this->time_served=htmlspecialchars(strip_tags($this->time_served));
        $this->updated_at=htmlspecialchars(strip_tags($this->updated_at));
     
        // bind values
        $stmt->bindParam(":id_flip", $this->id_flip);
        $stmt->bindParam(":status", $this->status);
        $stmt->bindParam(":receipt", $this->receipt);
        $stmt->bindParam(":time_served", $this->time_served);
        $stmt->bindParam(":updated_at", $this->updated_at);
     
        // execute query
        if($stmt->execute()){
            return true;
        }
     
        return false;
         
    }

}