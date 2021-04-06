<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class finalResult extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function group()
    {
        return $this->belongsTo(Group::class);
    }

    protected $casts = [
        'choice' => 'array'
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function setChoiceAttribute($value)
{
    $choice = [];

    foreach ($value as $array_item) {
        if (!is_null($array_item['key'])) {
            $choice[] = $array_item;
        }
    }

    $this->attributes['choice'] = json_encode($choice);
}
}

