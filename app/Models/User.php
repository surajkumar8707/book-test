<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
// use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasUuids, HasRoles, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $guard = 'web';
    protected $primaryKey = 'uid';
    public $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'name',
        'email',
        'operator_code',
        'status',
        'order_id',
        'category_uid',
        'count_scanning',
        'password',
        'login_date'
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

    // public function profile(){
    //     return $this->hasOne(Profile::class, 'user_uid', 'uid');
    // }

    // public function products()
    // {
    //     return $this->belongsToMany(Product::class);
    // }

    // public function rawMaterials()
    // {
    //     return $this->belongsToMany(RawMaterial::class);
    // }

    // public function assignTo()
    // {
    //     return $this->belongsToMany(Product::class, 'product_raw_material_user')->withPivot(['user_uid', 'product_Uid', 'raw_material_uid']);
    // }

    // public function category_pivot(){
    //     return $this->belongsToMany(Category::class, 'category_raw_material_user')->withPivot(['category_uid', 'raw_material_uid', 'user_uid']);
    // }

    // public function rawmaterial_pivot(){
    //     return $this->belongsToMany(RawMaterial::class, 'product_raw_material_user')->withPivot(['product_uid', 'raw_material_uid', 'user_uid']);
    // }

    public function getModelNumber($productUid, $orderId)
    {
        $component = RawMaterial::where(['product_uid' => $productUid, 'order_id' => $orderId])->whereNull(['chassis_id', 'raw_material_id'])->first();
        return $component->min . '-' . $component->max;
    }

    public function getRawMaterial($productUid, $orderId)
    {
        $component = RawMaterial::where(['product_uid' => $productUid, 'order_id' => $orderId])->whereNull(['chassis_id', 'raw_material_id'])->first();
        return [
            'is_print' => ((isset($component->is_print)) and ($component->is_print == 1)) ? true : false,
        ];
    }
}
