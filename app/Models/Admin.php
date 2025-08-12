<?php

namespace App\Models;

use App\Notifications\AdminVerifyEmail;
use Illuminate\Notifications\Notifiable;
use App\Notifications\ResetAdminPassword;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
     public function sendEmailVerificationNotification()
{
    $this->notify(new AdminVerifyEmail);
}
 /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification(#[\SensitiveParameter] $token)
    {
        $this->notify(new ResetAdminPassword($token));
    }
    public function guardName(): string
{
    return 'admin'; 
}

    
}
