<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Episode extends Model
{
    use HasFactory;
    protected $table = "episodes";
    protected $fillable = ["status", "name", "slug", "file_name", "link_embed", "link_m3u8", "server_id"];

    public function servers () {
        return $this->belongsToMany(Server::class, "episode_server", 'server_id', "episode_id");
    }

    protected static function booted()
    {
        parent::booted(); // TODO: Change the autogenerated stub
        static::creating(function ($item) {
            $item->created_at = now();
            $item->updated_at = now();
        });
        static::saving(function ($item) {
            $item->updated_at = now();
        });
    }
}