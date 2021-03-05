<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use Storage;
use NotificationChannels\WebPush\HasPushSubscriptions;

//use App\Transformers\UserTransformer;



class User extends Authenticatable
{
    use HasApiTokens, Notifiable, SoftDeletes, HasRoles;
    use HasPushSubscriptions;

    const USUARIO_VERIFICADO = '1';
    const USUARIO_NO_VERIFICADO = '0';

    const USUARIO_ADMINISTRADOR = 'true';
    const USUARIO_REGULAR = 'false';

   // public $transformer = UserTransformer::class;

    protected $table = 'users';
    protected $dates = ['deleted_at'];

    
    
    protected $fillable = [
        'first_name',
        'last_name', 
        'email', 
        'telephone',
        'nationality',
        'identity_document',
        'civil_status',
        'date_birth',
        'home_address',
        'zip_code',
        'user_creator_id',
        'user_deleted_id',
        'user_updated_id',
        'role_id',
        'country_id',
        'verified',
        'verification_token',
        'admin',
        
    ];

    protected $appends = [
        'full_name',
        'rol_name',
        'image_document',
        'image_pay',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 
        'remember_token',
        'verification_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

   
    public function getImageDocumentAttribute()
    {
        return  ($this->image_doc_huesped) ? url('/').Storage::url('images/doc_huesped/'.$this->image_doc_huesped) : null;
       
    }

    public function getImagePayAttribute()
    {
        return  ($this->receipt_of_payment) ? url('/').Storage::url('images/doc_huesped/'.$this->receipt_of_payment) : null;
       
    }

    public function setNameAttribute($valor)
    {
        $this->attributes['name'] = strtolower($valor);
    }

    public function getNameAttribute($valor)
    {
        return ucwords($valor);
    }

    public function setEmailAttribute($valor)
    {
        $this->attributes['email'] = strtolower($valor);
    }

    public function getFullNameAttribute()
    {
        return $this->first_name . ' '. $this->last_name ;
    }

    public function esVerificado()
    {
        return $this->verified == User::USUARIO_VERIFICADO;
    }

    public function esAdministrador()
    {
        return $this->admin == User::USUARIO_ADMINISTRADOR;
    }

    public static function generarVerificationToken()
    {
        return Str::random(40);
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function reservation()
    {
        return $this->hasOne(Reservation::class);
    }

    public function hotel()
    {
        return $this->hasMany(HotelUser::class,'user_id', 'id');
    }

    public function getRolNameAttribute()
    {
        return $this->role()->first();
    }

    public function checking()
    {
        return $this->belongsTo(Checking::class);
    }

    public function authorizeRoles($roles)
    {
        abort_unless($this->hasAnyRole($roles), 401);
        return true;
    }

    public function hasAnyRole($roles)
    {
        if (is_array($roles)) {
            foreach ($roles as $role) {
                if ($this->hasRole($role)) {
                    return true;
                }
            }
        } else {
            if ($this->hasRole($roles)) {
                return true; 
            }   
        }
        return false;
    }

    public function hasRole($role)
    {

        if ($this->role()->where('slug', (string) $role)->first()) {
            return true;
        }
        return false;
    }

    public function roomservice()
    {
        return $this->hasMany(RoomService::class,'user_id', 'id');
    }


    
}
