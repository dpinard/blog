<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['name', 'content', 'user_id'];

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function scopeId($query, $id) {
        return $query->where('id', $id);
    }

    public function scopeUpdate($query, $params) {
        return $query->update([
            'name' => $params['name'],
            'content' => $params['content']
        ]);
    }
}
