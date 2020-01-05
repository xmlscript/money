<?php namespace money; // vim: se fdm=marker:

class birthday extends day{

  /**
   * @fixme today要跟着this的时区，免得前后差一天
   */
  final function happy():int{
    $day = new \DateTime(date('Y').$this->format('md'));
    $today = new \DateTime('today');
    if($day<$today) $day->modify('next year');
    return $today->diff($day)->days;
  }

  final function age():int{
    return date('Y')-$this->format('Y');
  }


  final function 五行():string{
    return ['金','金','金','水','木','木','火','火','土','土'][$this->format('Y')%10];
  }

  final function 阴阳():string{
    return ['阳','阴','阳','阴','阳','阴','阳','阴','阳','阴'][$this->format('Y')%10];
  }

  /**
   * @todo 年月日时八字
   */
  final function bazi():string{

    $a = ['庚','辛','壬','癸','甲','乙','丙','丁','戊','己'][$this->days%10];
    $b = ['申','酉','戌','亥','子','丑','寅','卯','辰','巳','午','未'][$this->days%12];
    return $a.$b;
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
