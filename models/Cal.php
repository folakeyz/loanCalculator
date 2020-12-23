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
          
        $this->amount= number_format(loan);
        $this->loanTenor= "36";
        $this->loanMoratorium= "12";
       $loan = loan;
        $y = year;
        $i = $loan * 0.09 * year;
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

