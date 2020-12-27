<?php 

namespace App;

class Faction {

    protected string $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function GetName()
    {
        return $this->name;
    }

}

?>
