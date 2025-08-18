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
        'name',
        'email',
        'password',
        "phone",
        "email_verified_at",
        "status",
        "remember_token"


       
        
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

   
    public function sendEmailVerificationNotification()
{
    $this->notify(new AdminVerifyEmail);
}
 
    public function sendPasswordResetNotification(#[\SensitiveParameter] $token)
    {
        $this->notify(new ResetAdminPassword($token));
    }

    
}
