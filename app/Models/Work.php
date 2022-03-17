<?php

namespace App\Models;

use App\Http\Traits\GeneralTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Nicolaslopezj\Searchable\SearchableTrait;

use Ramsey\Uuid\Uuid;

class Work extends Model
{
    use HasFactory, SoftDeletes, SearchableTrait, GeneralTrait;
    protected $searchable = [

        'columns' => [
            'works.title' => 10,
            'works.target' => 10,
            'works.methodology' => 5,
            'works.authors' => 5,
            'works.teachers' => 5,
            'works.results' => 5,
            'works.recomendations' => 5,
            'cities.name' => 7,
            'cities.country_code' => 7,
            'universities.name' => 7,
            'universities.acronym' => 7,
        ],
        'joins' => [
            'universities' => ['universities.id', 'works.university_id'],
            'cities' => ['cities.id', 'works.city_id'],
        ],
    ];
    protected $canFilter = [
        'uid',
        'authors',
        'teachers',
        'title',
        'year',
        'target',
        'methodology',
        'results',
        'recomendations',
        'area_id',
        'university_id',
        'city_id',
    ];
    protected $fillable = [
        'uid',
        'authors',
        'teachers',
        'title',
        'year',
        'target',
        'methodology',
        'results',
        'recomendations',
        'area_id',
        'university_id',
        'city_id',
    ];
    protected  static  function  boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->uid = (string) Uuid::uuid4();
        });
    }

    public function getRouteKeyName()
    {
      return 'uid';     
    }

    public function university()
    {
        return $this->belongsTo(University::class);
    }
    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function filework()
    {
        return $this->hasOne(Filework::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
