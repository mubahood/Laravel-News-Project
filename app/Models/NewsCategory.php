<?php

namespace App\Models;

use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsCategory extends Model
{
    protected $table = 'news_categories';

    public function posts()
    {
        return $this->hasMany(NewsPost::class, 'news_category_id');
    }

    public static function boot()
    {
        parent::boot();

        self::creating(function ($m) {
            $m->name = strtoupper($m->name);
            $old = NewsCategory::where('name', $m->name)->first();
            if ($old != null) {
                return false;
                throw new Exception("News category with $m->name already exist.", 1);
            }
            return $m;
        });

        self::updating(function ($m) {
            //$m->name = "New " . $m->name;
            $old = NewsCategory::where('name', $m->name)->first();
            if ($old != null) {
                return false;
                throw new Exception("News category with $m->name already exist.", 1);
            }
            return $m;
        });

        self::created(function ($m) {
            //
            return $m;
        });

        self::updated(function ($m) {
            return $m;
        });
    }

    //creating
    //created
    //updating
    //updated
    //deleting
    //deleted

    public function getNameAttribute($name)
    {
        return $name;
        //....
        return strtoupper($name) . ".";
    }



    public function getShortNameAttribute()
    {
        //
        return substr($this->name, 0, 3);
    }


    protected $appends = ['short_name'];

    use HasFactory;
}
