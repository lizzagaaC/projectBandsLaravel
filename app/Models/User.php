<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class User
 * 
 * @property int $id
 * @property string $name
 * @property string $bandname
 * @property string $email
 * @property Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $logo
 * @property string|null $remember_token
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class User extends Model implements Authenticatable
{

	use HasFactory, \Illuminate\Auth\Authenticatable;

	protected $table = 'users';

	protected $casts = [
		'email_verified_at' => 'datetime'
	];

	protected $hidden = [
		'password',
		'remember_token'
	];

	protected $fillable = [
		'name',
		'bandname',
		'email',
		'email_verified_at',
		'password',
		'logo',
		'remember_token'
	];
}
