<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Crypt;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
    ];

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
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function roles()
    {
        return $this->belongsTo("App\Role");
    }
    //  /**
    //  * Set the email attribute.
    //  *
    //  * @param  string  $value
    //  * @return void
    //  */
    // public function setEmailAttribute($value)
    // {
    //     $this->attributes['email'] = Crypt::encryptString($value);
    // }

    // /**
    //  * Get the email attribute.
    //  *
    //  * @param  string  $value
    //  * @return string
    //  */
    // public function getEmailAttribute($value)
    // {
    //     try {
    //         $decryptedValue = Crypt::decryptString($value);
    //         // Do something with the decrypted value
    //     } catch (DecryptException $e) {
    //         // Handle decryption errors
    //         // Log the error or return a default value
    //         // For example:
    //         logger()->error('Decryption error: ' . $e->getMessage());
    //         $decryptedValue = null; // or any default value
    //     }
    //     return $decryptedValue;
    // }
}
