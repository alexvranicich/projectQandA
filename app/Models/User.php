<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Laravel\Sanctum\HasApiTokens;

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
    ];


    ///  Funzion per hashare la password  ////

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }


    public function questions(){
        return $this->hasMany(Question::class);
    }
    public function answers(){
        return $this->hasMany(Answer::class);
    }
    public function ratings(){
        return $this->hasMany(Rating::class);
    }


    ////  Salva i dati dell'utente nel database  ////

    protected static function storeUser(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' =>  $data['email'],
            'password' => $data['password'],
        ]);
    }

    /////  Data l'email restituisce l'id dell'utente  //////

    public static function EmailtoId($email)
    {
        return DB::table('users')
                ->select('id')
                ->where('email', '=' , $email)
                ->first()->id;
    }

    /////  Dato l'id restituisce la mail dell'utente  //////

    public static function IdtoName($id)
    {
        return DB::table('users')
                ->select('name')
                ->where('id', '=', $id)
                ->first()->name;
    }


    public static function getUser($id)
    {
        return DB::table('users')
                ->where('id', '=' , $id)
                ->get();
    }
}
