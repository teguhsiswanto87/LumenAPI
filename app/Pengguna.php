<?php


namespace App;


use Illuminate\Database\Eloquent\Model;

class Pengguna extends Model
{
    protected $table = 'pengguna';

    protected $primaryKey = 'id_pengguna';

    protected $fillable = ['nama_lengkap', 'jabatan', 'jenis_kelamin'];

    protected $hidden = ['username', 'password', 'id_session', 'created_at', 'updated_at'];

    public function belanjas()
    {
        return $this->hasMany(Belanja::class);
    }


}
