<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Cviebrock\EloquentSluggable\Sluggable;


class ChatRoom extends Model
{
    use SoftDeletes, Sluggable;
    protected $fillable = ['name','description','path_image'];
    public function users(){
        return $this->belongsToMany(User::class)
        ->as('suscriptions')
        ->withPivot('id','status')
        ->withTimestamps();
        //Relaccion de muchos a muchos, poder acceder a los datos de una tabla muchos a muchos
    }

    public function messages(){
        return $this->hasManyThrough(Message::class, ChatRoomUser::class);
        // poder acceder a una tabla tercera por una tabla pivote (Tabla para acceder a la informacion, tabla pivote)
    }

    public function setPathImageAttribute($value) // Recibe el valor que contiene el atributo a a mutar
    {
        if($value instanceof UploadedFile){ //Evaluamos si el valor viene vacio no guarda nada, ahora si trae algo se ejecuta el mutador
            Storage::disk('public')->delete($this->path_image); //Se verifica si existe un archivo file y si si, lo elimina
            $this->attributes['path_image'] = $value->storeAs('images', uniqid().'.jpg', 'public');
        }
    }

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
    public function getRouteKeyName()
{
    return 'slug';
}
}
