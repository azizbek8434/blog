<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{
	use Sluggable;

	protected $fillable = ['title', 'content', 'user_id'];

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

		public function add($fields)
		{
			$post = new static;
			$post->fill($fields);
			$post->user_id = 1;
			$post->save();
			
			return $post;
		}

		public function edit($fields)
		{
			$this->fill($fields);
			$this->save();
		}

		public function remove()
		{
			Storage::delete('uploads/',$this->image);
			$this->delete();
		}

		public function uploadImage($image)
		{
			if($image == null){ return; }
			Storage::delete('uploads/',$this->image);
			$filename = str_rundom(10). '.'. $image->extension();
			$image->saveAs('uploads', $filename);
			$this->image = $filename;
			$this->save();
		}
		
		public function category()
		{
			return $this->hasOne(Category::class);
		}

		public function author()
		{
			return $this->hasOne(User::class);
		}

		public function tags()
		{
			return $this->belongsToMany(
				Tag::class,
				'post_tags',
				'post_id',
				'tag_id'
			);
		}
}
