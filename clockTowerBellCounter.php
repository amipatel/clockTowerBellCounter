<?php
  
  class clockTowerBellCounter 
  {
  
  public function __construct()
    {
      $bellRange = [];$counter=0;
      for($i=0;$i<=23;$i++) {
         if($i == 0 || $i == 12){
              array_push($bellRange,12);
         }else{
              array_push($bellRange,$counter);
         }
         $counter++;
         if($counter == 13){$counter = 1;}
      }
      $this->bellRange = $bellRange;
    }
  
  public function countBells($startTime, $endTime){
      if(!preg_match('#^([01]?[0-9]|2[0-3]):[0-5][0-9]$#', $startTime) || !preg_match('#^([01]?[0-9]|2[0-3]):[0-5][0-9]$#', $startTime)) {
       //trigger_error("Incorrect parameters!", E_USER_ERROR);
       return NULL;
    }  
      
    if($startTime == $endTime) {
      $sum = array_sum($this->bellRange);    
      return $sum + $this->bellRange[(int)$endTime];
    }   
    $startTime = explode(":",$startTime);
    $startTime = ($startTime[1] == '00')?(int)$startTime[0]:(($startTime[0] == 23)?0:((int)$startTime[0] + 1));
    $endTime = explode(":",$endTime);
    $endTime = (int)$endTime[0];
      
      $countBell=0;$i=$startTime;
      do {
       $countBell += $this->bellRange[$i];
       if($i==$endTime){break;}       
       if($i==23){$i=0;}else{$i++;}      
      }
      while(24);
      return $countBell;
  } 
}

?>
