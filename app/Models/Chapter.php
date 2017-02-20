<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
	protected $appends = ['page','release_date', 'chapter_url'];
	protected $casts = [
		'release_at' => 'date'
	];

	public function manga()
	{
		return $this->belongsTo(Manga::class);
	}

	public function pages()
	{
		return $this->hasMany(Page::class);
	}

	public function getPageAttribute()
	{
		return $this->pages()->count();
	}

	public function getReleaseDateAttribute()
	{
		if (is_null($this->release_at)) {
			return $this->created_at->diffForHumans();
		}

		return $this->release_at->diffForHumans();
	}

	public function getChapterUrlAttribute()
	{
		return route('manga.read', ['manga_slug' => $this->manga->slug, 'chapter_num' => $this->chapter_num]);
	}
}
