<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Registration extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'registration_number',
        'course_class_id',

        'full_name',
        'email',
        'phone',

        'gender',
        'birth_date',

        'city',
        'address',

        // Education
        'last_education',
        'school_name',
        'graduation_year',

        // Documents
        'ktp_file',
        'diploma_file',
        'photo_file',

        'status',
        'notes',
    ];


    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'birth_date' => 'date',
        'graduation_year' => 'integer',
    ];


    /**
     * Get the course class that owns the registration.
     */
    public function courseClass(): BelongsTo
    {
        return $this->belongsTo(
            CourseClass::class,
            'course_class_id'
        );
    }

    public function payments()
    {
        return $this->hasMany(
            RegistrationPayment::class
        );
    }


    /**
     * Get the payment associated with the registration.
     */
    public function payment(): HasOne
    {
        return $this->hasOne(
            RegistrationPayment::class,
            'registration_id'
        );
    }
}