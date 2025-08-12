<?php

namespace App\Models;


use App\Notifications\SellerVerifyEmail;
use Illuminate\Notifications\Notifiable;
use App\Notifications\ResetSellerPassword;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Seller extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'status',
        'phone',
    ];
     public function sendEmailVerificationNotification()
{
    $this->notify(new SellerVerifyEmail);
}
 /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification(#[\SensitiveParameter] $token)
    {
        $this->notify(new ResetSellerPassword($token));
    }
    public function guardName(): string
{
    return 'seller'; 
}
    
  

    
}
