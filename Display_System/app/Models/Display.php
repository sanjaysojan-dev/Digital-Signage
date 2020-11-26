<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Display extends Model
{
    use HasFactory;

    /**
     * Returns the creator of the display
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }


    /**
     * Returns all of the content that will be displayed on device
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function contents (){

        return $this->belongsToMany('App\Models\Content', 'display_contents',
            'display_id', 'content_id');
    }


}
