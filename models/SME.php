<?php
class Post {
    //Database
    
    private $conn;
    private $table = "[SME Loan Application Form]";
    private $newTable = 'SmeSIG';
//    private $param = 'SmeSIG';
//    private $params = 'SmeSIG';
    
    
    //Post Properties
    public $bvn;
    public $Name;
    public $amount;
    public $loanTenor;
    public $loanMoratorium;
    public $intrest;
    public $upfront;
    public $tintrest;
    public $tAmount;
    public $month;
   
    
    //Constructor with DB
    public function __construct($db){
        $this->conn = $db;
    }
    
    //Get Posts
    
    public function read(){
        //Create query
        $query = 'SELECT * FROM ' . $this->table . '';
        
        //Prepare Statement
        $stmt = $this->conn->prepare($query);
        
        //Execute Query
        
        $stmt->execute();
        
        return $stmt;
    }
    
    //Get Single Visitor
    public function single_visitor(){
         $query = "SELECT * FROM $this->table  WHERE  [Director's BVN] = ? ";  
        
         //Prepare Statement
        $stmt = $this->conn->prepare($query);
        
        //Bind BVN
        $stmt->bindParam(1, $this->bvn);
          //Execute Query
        $stmt->execute();
        $count = $stmt->rowCount();
        if($count == 0){
           $query = 'SELECT * FROM ' . $this->newTable . ' WHERE BVN= ?';
        
         //Prepare Statement
        $stmt = $this->conn->prepare($query);
        
        //Bind BVN
        $stmt->bindParam(1, $this->bvn);
        
          //Execute Query
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->bvn= $row['BVN'];
        $this->Name= $row['Name'];
        $this->amount= number_format($row['ApprovedLoanAmount']); 
        $this->loanTenor= "36";
        $this->loanMoratorium= "12";
        $this->intrest =  0.09 * 3;
        $loan = $row['ApprovedLoanAmount'];
        $i = $loan * 0.09 * 3;
        $ii = $loan * 0.04 ;
        $iii = $i - $ii;
        $ta= $loan + $iii;
        $this->intrest = number_format($i);
        $this->upfront = number_format($ii);   
        $this->tintrest = number_format($iii);
        $this->tAmount = number_format($ta);
        $this->month = number_format($ta / 24);
        }
      else{
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->bvn= $this->bvn;
        $this->Name= $row['Business/Company Name'];
        $this->amount= number_format($row['Approved Loan Amount']);
        $this->loanTenor= "36";
        $this->loanMoratorium= "12";
       $loan = $row['Approved Loan Amount'];
        $i = $loan * 0.09 * 3;
        $ii = $loan * 0.04 ;
        $iii = $i - $ii;
        $ta= $loan + $iii;
        $this->intrest = number_format($i);
        $this->upfront = number_format($ii);   
        $this->tintrest = number_format($iii);
        $this->tAmount = number_format($ta);
        $this->month = number_format($ta / 24);
      }
    } 
}

