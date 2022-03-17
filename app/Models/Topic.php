<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Ramsey\Uuid\Uuid;

class Topic extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable=[
        'uid',
        'topic',
        'area_id',
    ];
    protected  static  function  boot()
    {
        parent::boot();

        static::creating(function ($model) {
             $model->uid= (string) Uuid::uuid4();
        });
    }
}
