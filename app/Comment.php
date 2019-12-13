<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Comment extends Model
{
	use Sluggable;

		/**
	 	* Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
    public function post()
		{
			return $this->hasOne(Post::class);
		}

		public function author()
		{
			return $this->hasOne(User::class);
		}
}
