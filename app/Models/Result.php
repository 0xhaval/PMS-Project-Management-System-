<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function group()
    {
        return $this->belongsTo(Group::class);
    }

    protected $casts = [
        'choices' => 'array'
    ];

    public function setChoicesAttribute($value)
    {
        $choices = [];

        foreach ($value as $array_item) {
            if (!is_null($array_item['key'])) {
                $choices[] = $array_item;
            }
        }

        $this->attributes['choices'] = json_encode($choices);
    }
}
