<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmployeeSkill extends Model
{
    protected $fillable = [
        'employee_id',
        'skill_type_id',
        'skill_id',
        'skill_level_id',
        'level_progress',
        'is_default_level',
        'image',
        'effective_date',
        'expiry_date',
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function skillType()
    {
        return $this->belongsTo(SkillType::class);
    }

    public function skill()
    {
        return $this->belongsTo(Skill::class);
    }

    public function skillLevel()
    {
        return $this->belongsTo(SkillLevel::class);
    }
}