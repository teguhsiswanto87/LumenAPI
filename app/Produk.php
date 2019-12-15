<?php


namespace App;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    // custom nama tabel produk | default +s => produks
    protected $table = 'produk';

    // custom nama primaryKey | default id
    protected $primaryKey = 'id_produk';

    protected $fillable = ['nama', 'stok', 'modal', 'harga_jual', 'laba_kotor'];

    protected $hidden = ['created_at', 'updated_at'];

    public function detailBelanjas()
    {
        return $this->hasMany(DetailBelanja::class);
    }

}
