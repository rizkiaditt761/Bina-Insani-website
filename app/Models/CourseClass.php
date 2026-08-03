<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CourseClass extends Model
{

    protected $table = 'classes';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'registration_fee',
        'duration',
        'meeting_schedule',
        'description',
        'is_active',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'registration_fee' => 'decimal:2',
        'is_active' => 'boolean',
    ];

    /**
     * Get all registrations for this class.
     */
    public function registrations(): HasMany
    {
        return $this->hasMany(Registration::class, 'course_class_id');
    }
}