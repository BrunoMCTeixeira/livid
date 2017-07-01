<?php

namespace App\Http\Presenter;

use Laracasts\Presenter\Presenter;

class UserPresenter extends Presenter {

    public function fullName()
    {
        return $this->name . ' ' . $this->lastname;
    }

}