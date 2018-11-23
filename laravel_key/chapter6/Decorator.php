<?php
interface Decorator
{
    public function display();
}

class XiaoFang implements Decorator
{
    private $name;
    public function __construct($name)
    {
        $this->name = $name;
    }
    public function display()
    {
        echo "我是".$this->name."我出门了！\n";
    }
}

class Finery implements Decorator
{
    private $component;
    public function __construct(Decorator $component)
    {
        $this->component = $component;
    }
    public function display()
    {
        $this->component->display();
    }
}

class Shoes extends Finery
{
    public function display()
    {
        echo "穿上鞋子\n";
        parent::display();
    }
}

class Skirt extends Finery
{
    public function display()
    {
        echo "穿上裙子\n";
        parent::display();
    }
}

class Hair extends Finery
{
    public function display()
    {
        echo "出门前先整理头发\n";
        parent::display();
        echo "出门后再整理一下头发\n";
    }
}
$xiaofang = new XiaoFang('小芳');
$shoes = new Shoes($xiaofang);
$skirt = new Skirt($shoes);
$hair = new Hair($skirt);
$hair->display();