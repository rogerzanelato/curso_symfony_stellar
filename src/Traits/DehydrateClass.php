<?php

namespace App\Traits;

trait DehydrateClass
{
    public function dehydrate()
    {
        return get_object_vars($this);
    }
}