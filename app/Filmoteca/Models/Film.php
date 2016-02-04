<?php

namespace Filmoteca\Models;

use Carbon\Carbon;
use Codesleeve\Stapler\ORM\EloquentTrait;
use Codesleeve\Stapler\ORM\StaplerableInterface;
use Illuminate\Database\Eloquent\Model as Eloquent;

class Film extends Eloquent implements StaplerableInterface
{
    use EloquentTrait;

    protected $guarded = [];

    protected $appends = ['cover'];

    protected $fillable = [
        'id',
        'title',
        'original_title',
        'duration',
        'genre_id',
        'director',
        'script',
        'photographic',
        'music',
        'edition',
        'production',
        'cast',
        'synopsis',
        'trailer',
        'notes',
        'years',
        'image'
    ];

    public function __construct(array $attributes = array())
    {
        $this->hasAttachedFile('image', [
            'styles' => [
                'medium' => '300x300',
                'thumbnail' => '150x150']]);

        parent::__construct($attributes);
    }

    public function exhibtionFilm()
    {
        return $this->hasOne('Filmoteca\Models\Exhibitions\ExhibitionFilm');
    }

    public function genre()
    {
        return $this->belongsTo('Filmoteca\Models\Genre');
    }

    public function countries()
    {

        return $this->belongsToMany('Filmoteca\Models\Country');
    }

    public function getCoverAttribute()
    {
        return [
            'thumbnail' => $this->image->url('thumbnail'),
            'medium' => $this->image->url('medium')
        ];
    }

    public function getYearsAttribute($value)
    {
        return explode(',', $value);
    }

    public function setYearsAttribute($value)
    {
        if (is_string($value)) {
            $this->attributes['years'] = $value;

            return;
        }

        if (is_numeric($value)) {
            $this->attributes['years'] = '' . $value;

            return;
        }

        $this->attributes['years'] = implode(',', $value);
    }

    /**
     * Convert to minutes.
     * @param  String $value [description]
     * @return String        [description]
     */
    public function getDurationAttribute($value)
    {
        $parts = explode(':', $value);

        $minutes = ($parts[0] * Carbon::MINUTES_PER_HOUR) + $parts[1];

        return $minutes;
    }

    /**
     * @param String $strMinutes
     */
    public function setDurationAttribute($strMinutes)
    {
        $min = (int)$strMinutes;

        $minutes = $min % Carbon::MINUTES_PER_HOUR;
        $hours = floor($min / Carbon::MINUTES_PER_HOUR);

        $paddedMinutes = str_pad($minutes, 2, '0', STR_PAD_LEFT);
        $paddedHours = str_pad($hours, 2, '0', STR_PAD_LEFT);

        $this->attributes['duration'] = $paddedHours . ':' . $paddedMinutes . ':00';
    }

    public function toArray()
    {
        $relations = [
            'genre' => $this->genre,
            'countries' => $this->countries
        ];

        return array_merge(parent::toArray(), $relations);
    }
}
