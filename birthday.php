<?php namespace money; // vim: se fdm=marker:

class birthday extends day{

  final function happy():int{
    $day = new \DateTime(date('Y').$this->format('md'));
    $today = new \DateTime('today');
    if($day<$today) $day->modify('next year');
    return $day->diff($today)->days;
  }

  final function 周岁():int{
    return date('Y')-$this->format('Y');
  }

  final function 星座():string{
    $arr = [
      [20=>'水瓶'],
      [19=>'双鱼'],
      [19=>'白羊'],
      [20=>'金牛'],
      [21=>'双子'],
      [22=>'巨蟹'],
      [23=>'狮子'],
      [23=>'处女'],
      [23=>'天秤'],
      [24=>'天蝎'],
      [23=>'射手'],
      [22=>'魔羯'],
    ];
    $m = (int)$this->format('m')-1;
    if($this->format('d') < key($arr[$m])) $m+=11;
    return current($arr[$m%12]);
  }

}
