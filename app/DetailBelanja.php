<?php


namespace App;


use Illuminate\Database\Eloquent\Model;

class DetailBelanja extends Model
{
    protected $table = 'detail_belanja';

    protected $primaryKey = ['id_produk', 'id_belanja'];

    protected $fillable = ['id_belanja', 'id_produk', 'harga', 'jumlah'];

    protected $hidden = [];

    public function belanja()
    {
        return $this->belongsTo(Belanja::class);
    }

    public function produk()
    {
        return $this->belongsTo(Produk::class);
    }


}
