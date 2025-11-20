<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

// class User extends Authenticatable
// {
//     /** @use HasFactory<\Database\Factories\UserFactory> */
//     use HasFactory, Notifiable;

//     /**
//      * The attributes that are mass assignable.
//      *
//      * @var list<string>
//      */
//     protected $fillable = [
//         'name',
//         'email',
//         'password',
//     ];

//     /**
//      * The attributes that should be hidden for serialization.
//      *
//      * @var list<string>
//      */
//     protected $hidden = [
//         'password',
//         'remember_token',
//     ];

//     /**
//      * Get the attributes that should be cast.
//      *
//      * @return array<string, string>
//      */
//     protected function casts(): array
//     {
//         return [
//             'email_verified_at' => 'datetime',
//             'password' => 'hashed',
//         ];
//     }
// } 

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'userid',
        'name',
        'email',
        'student_id',
        'password',
        'role_id',
        'is_active',
        'phone_num',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'is_active' => 'boolean',
        ];
    }

    // Auto-generate UserID before creating
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($user) {
            if (empty($user->userid)) {
                // Generate UserID: STUD + incrementing number
                $lastUser = static::where('userid', 'like', 'STUD%')
                    ->orderByRaw('CAST(SUBSTRING(userid, 5) AS UNSIGNED) DESC')
                    ->first();
                
                if ($lastUser) {
                    $lastNumber = (int) substr($lastUser->userid, 5);
                    $newNumber = $lastNumber + 1;
                } else {
                    $newNumber = 1;
                }
                
                $user->userid = 'STUD' . str_pad($newNumber, 6, '0', STR_PAD_LEFT);
            }
        });
    }

    // Relationship to Role
    public function role()
    {
        return $this->belongsTo(Role::class);
    }
}