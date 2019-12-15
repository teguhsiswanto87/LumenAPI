<?php


namespace App;


use Illuminate\Database\Eloquent\Model;

class Belanja extends Model
{
    protected $table = 'belanja';

    protected $primaryKey = 'id_belanja';

    protected $fillable = ['id_belanja', 'id_pengguna', 'tanggal_belanja', 'total_harga'];

    protected $hidden = [];

    public function pengguna()
    {
        return $this->belongsTo(Pengguna::class);
    }

    public function detailBelanjas()
    {
        return $this->hasMany(DetailBelanja::class);
    }

}
