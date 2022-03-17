<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Ramsey\Uuid\Uuid;
use Nicolaslopezj\Searchable\SearchableTrait;

class Area extends Model
{
    use HasFactory, SoftDeletes, SearchableTrait;
    protected $table = 'areas';

    protected $fillable = [
        'uid',
        'career',
        'area',
    ];
    protected $searchable = [

        'columns' => [
            'career' => 10,
            'area' => 10,
        ]
    ];
    protected  static  function  boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->uid = (string) Uuid::uuid4();
        });
    }

    public function works()
    {
        return $this->hasMany(Work::class);
    }
}
