<?php

namespace App\Models;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Series extends Model
{
    use HasFactory;
    protected $fillable = ['nome'];
    // protected $with = ['seasons'];

    public function seasons() {
        return $this->hasMany(Season::class, 'series_id');
    }

    protected static function booted() {
        self::addGlobalScope('ordered', function(Builder $queryBuilder) {
            $queryBuilder->orderBy('nome', 'asc');
        });
    }

    // public function scopeActive(Builder $query) {
    //     return $query->where('active', true);
    // }
}
