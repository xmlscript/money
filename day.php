<?php namespace money; // vim: se fdm=marker:

class day extends \DateTime{

  final function 天干():string{
    return ['庚','辛','壬','癸','甲','乙','丙','丁','戊','己'][$this->format('Y')%10];
  }

  final function 地支():string{
    return ['申','酉','戌','亥','子','丑','寅','卯','辰','巳','午','未'][$this->format('Y')%12];
  }

  final function 生肖():string{
    return ['猴','鸡','狗','猪','鼠','牛','虎','兔','龙','蛇','马','羊'][$this->format('Y')%12];
  }

}
