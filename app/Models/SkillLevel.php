<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\SkillType;

class SkillLevel extends Model
{
    protected $fillable = [
        'skill_type_id',
        'name',
    ];

    public function skillType()
    {
        return $this->belongsTo(SkillType::class, 'skill_type_id');
    }
}