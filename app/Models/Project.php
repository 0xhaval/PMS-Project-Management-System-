<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function scopeSearch($query, $req)
    {
        $query->where( function ($query) use ($req) {
            $query->where('name', 'LIKE', '%' . $req . '%');
        });
    }

    public function projectType()
    {
        return $this->belongsTo(ProjectType::class);
    }

    public function result()
    {
        return $this->hasOne(Result::class);
    }
}
