<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Ramsey\Uuid\Uuid;
use Nicolaslopezj\Searchable\SearchableTrait;
class City extends Model
{
    use HasFactory, SoftDeletes, SearchableTrait;

    protected $fillable=[
        'uid',
        'name',
        'country_code',
    ];
    protected $searchable = [

        'columns' => [
            'name' => 10,
            'country_code' => 10,
        ]
    ];
    protected  static  function  boot()
    {
        parent::boot();

        static::creating(function ($model) {
             $model->uid= (string) Uuid::uuid4();
        });
    }
    public function works()
    {
        return $this->hasMany(Work::class);
    }
}
