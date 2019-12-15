<?php


namespace App;


use Illuminate\Database\Eloquent\Model;

class Modul extends Model
{
    protected $table = 'modul';

    protected $primaryKey = 'id_modul';

    protected $fillable = ['nama', 'link', 'icon', 'urutan', 'aktif'];

    protected $hidden = ['id_modul'];
}
