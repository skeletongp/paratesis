<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Card extends Component
{
    public $model, $name;
    public $title, $subtitle, $field, $permission;
    public function __construct($model, $name)
    {
        $this->model = $model;
        $this->name = $name;
    }


    public function render()
    {
        $this->defineVars();
        return view('components.card');
    }
    public function defineVars()
    {
        switch ($this->name) {
            case 'areas':
                $this->title = $this->model->career;
                $this->subtitle = $this->model->area;
                $this->field = 'area_id';
                $this->permission = 'manage area';
                break;
            case 'cities':
                $this->title = $this->model->name;
                $this->subtitle = $this->model->country_code;
                $this->field = 'city_id';
                $this->permission = 'manage city';
                break;
            case 'universities':
                $this->title = $this->model->name;
                $this->subtitle = $this->model->acronym;
                $this->field = 'university_id';
                $this->permission = 'manage university';
                break;
            default:
                # code...
                break;
        }
    }
}
