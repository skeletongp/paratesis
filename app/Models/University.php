<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Ramsey\Uuid\Uuid;

class University extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable=[
        'uid',
        'name',
        'acronym',
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
