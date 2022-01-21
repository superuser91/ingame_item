<?php

namespace Vgplay\IngameItem\Models;

use Vgplay\IngameItem\Traits\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Vgplay\Contracts\Deliverable;
use Vgplay\Contracts\Player;
use Vgplay\LaravelRedisModel\Contracts\Cacheable;
use Vgplay\LaravelRedisModel\HasCache;

class IngameItem extends Model implements Cacheable, Deliverable
{
    use HasFactory;
    use SoftDeletes;
    use HasCache;

    protected $fillable = [
        'name',
        'game_id',
        'picture',
        'stats',
    ];

    protected $casts = [
        'stats' => 'array',
    ];

    public function deliver(Player $player, array $data)
    {
        return $this;
    }
}
