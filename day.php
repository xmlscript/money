<?php namespace money; // vim: se fdm=marker:

/**
 * @todo 距离明年此时（生日倒计时）
 * @todo 如何像\DateTime一样实现运算符重载，$obj <= $obj
 */
class day{
  private $DateTime;

  function __construct(int $Y, int $m, int $d){

    try{
      $Y = str_pad($Y,4,'0',STR_PAD_LEFT);
      $m = str_pad($m,2,'0',STR_PAD_LEFT);
      $d = str_pad($d,2,'0',STR_PAD_LEFT);
      $this->DateTime = new \DateTime("$Y-$m-$d");
      if($this->DateTime->format('Ymd')!=="$Y$m$d") throw new \Error;
    }catch(\Error $e){
      throw new \InvalidArgumentException('');
    }

  }

}
