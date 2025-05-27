
<?php

namespace App;

class GildedRose
{
    public $name;

    public $quality;

    public $sellIn;

    public function __construct($name, $quality, $sellIn)
    {
        $this->name = $name;
        $this->quality = $quality;
        $this->sellIn = $sellIn;
    }

    public static function of($name, $quality, $sellIn) {
        return new static($name, $quality, $sellIn);
    }

public function tick()
{
    if ($this->name === 'Sulfuras, Hand of Ragnaros') {
        return;
    }

    $this->sellIn--;

    switch (true) {
        case $this->name === 'Aged Brie':
            $this->increaseQuality();
            if ($this->sellIn < 0) {
                $this->increaseQuality();
            }
            break;

        case $this->name === 'Backstage passes to a TAFKAL80ETC concert':
            if ($this->sellIn < 0) {
                $this->quality = 0;
            } else {
                $this->increaseQuality();
                if ($this->sellIn < 10) $this->increaseQuality();
                if ($this->sellIn < 5)  $this->increaseQuality();
            }
            break;

        case str_starts_with($this->name, 'Conjured'):
            $this->decreaseQuality();
            $this->decreaseQuality();
            if ($this->sellIn < 0) {
                $this->decreaseQuality();
                $this->decreaseQuality();
            }
            break;

        default:
            $this->decreaseQuality();
            if ($this->sellIn < 0) {
                $this->decreaseQuality();
            }
            break;
    }
}
private function increaseQuality()
{
    if ($this->quality < 50) {
        $this->quality++;
    }
}

private function decreaseQuality()
{
    if ($this->quality > 0) {
        $this->quality--;
    }
}
  
}
