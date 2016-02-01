<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;



class Users extends Model
{

    protected $table = 'users';
    public $timestamps = true;
    protected $dates = ['created_at', 'updated_at'];
    protected $hidden   = ['password', 'remember_token'];
    protected $fillable = array(
        'name',
        'email',
        'password',
        'remember_token',
        'role_id',
        'group_id',
        'branch_id',
        'customer_id',
        '_id'
    );

    public static function createUser($request)
    {

        $rs = static::where('email', $request['email'])->first();
        if (is_null($rs)) {
            $request['password'] = bcrypt($request['password']);
            //$request['password'] = Hash::make($request['password']);
             return static::create($request);
         } else {
            return false;
        }
    }

//    public function setPasswordAttribute($value)
//    {
//        $this->attributes['password'] = Hash::make($value);
//    }

    public static function loadEditUser($id){
        $rs = static::find($id);
        if(is_null($rs)) {
            return false;
        } else {
            return $rs ;
        }
    }

    public static function updateRole($id,$request){
        $rs = static::find($id);
        if(isset($rs)) {
            static::where('id', $id)
                ->update(
                    [
                        'name'     => $request->f_name,
                        'role_id'      => $request->role_id,
                        'group_id'      => $request->group_id,
                        'branch_id'        => $request->branch_id

                    ]
                );

        } else {
            return false;
        }
    }



//    public function permissions()
//    {
//        return $this->hasManyThrough('App\Permission', 'App\Role', 'user_id', 'role_id');
//    }


}