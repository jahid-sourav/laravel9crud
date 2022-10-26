<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Crud extends Model
{
    use HasFactory;

    protected $fillable = ['name','email'];

    protected static $crud;
    public static function saveData($request)
    {
        self::$crud = new Crud();
        self::$crud->name = $request->name;
        self::$crud->email = $request->email;
        self::$crud->save();
    }

    public static function updateData($request, $id)
    {
        self::$crud = Crud::find($id);
        self::$crud->name = $request->name;
        self::$crud->email = $request->email;
        self::$crud->save();
    }
}
