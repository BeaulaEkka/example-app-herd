<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $guarded = [];
    // protected $fillable = [
    //     'first_name',
    //     'last_name',
    //     'email',
    //     'password',
    //     
    // ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',

        ];
    }

    public function employer()
    {
        return $this->hasOne(Employer::class);
    }

    /**
     * Determine if the user is an employer.
     */

    public function isEmployer()
    {
        return $this->role === 'employer';
    }

    /**
     * Determine if the user is a job seeker.
     */

    public function isJobSeeker()
    {
        return $this->role === 'job_seeker';
    }

}