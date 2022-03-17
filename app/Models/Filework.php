<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Ramsey\Uuid\Uuid;

class Filework extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'uid',
        'path',
        'work_id'
    ];

    protected  static  function  boot()
    {
        parent::boot();

        static::creating(function ($model) {
             $model->uid= (string) Uuid::uuid4();
        });
    }
    
    public function work()
    {
        return $this->belongsTo(Work::class);
    }
}
