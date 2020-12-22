<?php
class Post {
    //Database
        
    //Post Properties
    public $amount;
    public $loanTenor;
    public $loanMoratorium;
    public $intrest;
    public $upfront;
    public $tintrest;
    public $tAmount;
    public $month;
   
    
    //Get Single Visitor
    public function single_visitor(){
          
        $this->amount= loan;
        $this->loanTenor= "36";
        $this->loanMoratorium= "12";
       $loan = loan;
        $y = year;
        $i = $loan * 0.09 * year;
        $ii = $loan * 0.04 ;
        $iii = $i - $ii;
        $ta= $loan + $iii;
        $this->intrest = $i;
        $this->upfront = $ii;   
        $this->tintrest = $iii;
        $this->tAmount = $ta;
        $this->month = $ta / 24;
      
    } 
}

