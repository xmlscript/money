<?php namespace money; // vim: se fdm=marker:

class day extends \DateTime{

  final function __construct(int $Y, int $m, int $d, \DateTimeZone $timezone=null){

    if($Y<0)
      $Y = '-'.str_pad(abs($Y),4,'0',STR_PAD_LEFT);
    else
      $Y = str_pad($Y,4,'0',STR_PAD_LEFT);
    $m = str_pad($m,2,'0',STR_PAD_LEFT);
    $d = str_pad($d,2,'0',STR_PAD_LEFT);

    parent::__construct("$Y-$m-$d",$timezone);

    if($this->format('Ymd')!=="$Y$m$d")
      throw new \InvalidArgumentException('');

  }

  final function 天干():string{
    return ['庚','辛','壬','癸','甲','乙','丙','丁','戊','己'][$this->format('Y')%10];
  }

  final function 地支():string{
    return ['申','酉','戌','亥','子','丑','寅','卯','辰','巳','午','未'][$this->format('Y')%12];
  }

  /**
   * @todo 测试公元元年附近
   */
  final function 生肖():string{
    return ['猴','鸡','狗','猪','鼠','牛','虎','兔','龙','蛇','马','羊'][$this->format('Y')%12];
  }

  final function sunset():time{
    return new time;
  }

  final function sunrais():time{
    return new time;
  }

}
