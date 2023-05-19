<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Notifications\MessageSent;
use http\Message;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table='users';
    protected $guarded=[];
    protected $hidden=['password'];

    const USER_TOKEN = "userToken";

    public function chats():HasMany
    {
        return $this->hasMany(Chat::class,'created_by');
    }


    public function routeNotificationForOneSignal():array{
        return ['tags'=>['key'=>'userId','relation'=>'=','value'=>(string)(1)]];
    }

    public function sendNewMessageNotification(array $data):void{
        $this->notify(new MessageSent($data));
    }
}
