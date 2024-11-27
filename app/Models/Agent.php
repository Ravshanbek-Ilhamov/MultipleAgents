<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    /** @use HasFactory<\Database\Factories\AgentFactory> */
    use HasFactory;

    protected $fillable = ['name', 'email', 'parent_id'];

    public function parent()
    {
        return $this->belongsTo(Agent::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Agent::class, 'parent_id', 'id');
    }

    public function products(){
        return $this->hasMany(AgentProduct::class);
    }
}
