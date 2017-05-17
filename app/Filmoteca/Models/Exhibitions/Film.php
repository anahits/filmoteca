<?php

namespace Filmoteca\Models\Exhibitions;

use Carbon\Carbon;
use Codesleeve\Stapler\ORM\EloquentTrait;
use Codesleeve\Stapler\ORM\StaplerableInterface;
use Illuminate\Database\Eloquent\Model as Eloquent;
use Filmoteca\Exhibition\Type\Film as FilmInterface;
use Filmoteca\Exhibition\Type\ImageAttachment;
use Illuminate\Support\Str;

/**
 * Class Film
 * @package Filmoteca\Models
 */
class Film extends Eloquent implements StaplerableInterface, FilmInterface
{
    use EloquentTrait;

    protected $guarded = [];

    protected $appends = ['cover'];

    protected $fillable = [
        'id',
        'title',
        'original_title',
        'duration',
        'slug',
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

    /**
     * @var ImageAttachment
     */
    protected $attachment;

    public function __construct(array $attributes = array())
    {
        $this->hasAttachedFile('image', [
            'styles' => [
                'medium' => '300x300',
                'thumbnail' => '150x150']]);

        parent::__construct($attributes);
    }

    /*
     |-----------------------------------------------------------------------------------------------------------------
     | Relationships
     |-----------------------------------------------------------------------------------------------------------------
     */

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function exhibitionFilm()
    {
        return $this->hasOne('Filmoteca\Models\Exhibitions\ExhibitionFilm');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function genre()
    {
        return $this->belongsTo('Filmoteca\Models\Exhibitions\Genre');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function countries()
    {

        return $this->belongsToMany('Filmoteca\Models\Exhibitions\Country');
    }

    /**
     * @return array
     */
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

    /*
     |-----------------------------------------------------------------------------------------------------------------
     | Setters and Getters
     |-----------------------------------------------------------------------------------------------------------------
     */

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id =$id;
    }

    /**
     * @return String
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param String $title
     */
    public function setTitle($title)
    {
        $this->title =$title;
    }

    /**
     * @return String
     */
    public function getOriginalTile()
    {
        return $this->original_title;
    }

    /**
     * @param string $originalTitle
     */
    public function setOriginalTile($originalTitle)
    {
        $this->original_title = $originalTitle;
    }

    /**
     * @return \DateTime
     */
    public function getDuration()
    {
        return $this->duration;
    }

    /**
     * @param \DateTime $duration
     */
    public function setDuration($duration)
    {
        $this->duration =$duration;
    }

    /**
     * @return array
     */
    public function getYears()
    {
        return $this->years;
    }

    /**
     * @param array $years
     */
    public function setYears($years)
    {
        $this->years =$years;
    }

    /**
     * @return String
     */
    public function getGenre()
    {
        return $this->genre;
    }

    /**
     * @param String $genre
     */
    public function setGenre($genre)
    {
        $this->genre =$genre;
    }

    /**
     * @return mixed
     */
    public function getDirector()
    {
        return $this->director;
    }

    /**
     * @param mixed $director
     */
    public function setDirector($director)
    {
        $this->director =$director;
    }

    /**
     * @return String
     */
    public function getScript()
    {
        return $this->script;
    }

    /**
     * @param String $script
     */
    public function setScript($script)
    {
        $this->script =$script;
    }

    /**
     * @return String
     */
    public function getPhotographic()
    {
        return $this->photographic;
    }

    /**
     * @param String $photographic
     */
    public function setPhotographic($photographic)
    {
        $this->photographic =$photographic;
    }

    /**
     * @return String
     */
    public function getMusic()
    {
        return $this->music;
    }

    /**
     * @param String $music
     */
    public function setMusic($music)
    {
        $this->music =$music;
    }

    /**
     * @return String
     */
    public function getEdition()
    {
        return $this->edition;
    }

    /**
     * @param String $edition
     */
    public function setEdition($edition)
    {
        $this->edition =$edition;
    }

    /**
     * @return String
     */
    public function getProduction()
    {
        return $this->production;
    }

    /**
     * @param String $production
     */
    public function setProduction($production)
    {
        $this->production =$production;
    }

    /**
     * @return String
     */
    public function getCast()
    {
        return $this->cast;
    }

    /**
     * @param String $cast
     */
    public function setCast($cast)
    {
        $this->cast =$cast;
    }

    /**
     * @return String
     */
    public function getSynopsis()
    {
        return $this->synopsis;
    }

    /**
     * @param String $synopsis
     */
    public function setSynopsis($synopsis)
    {
        $this->synopsis =$synopsis;
    }

    /**
     * @return String
     */
    public function getTrailer()
    {
        return $this->trailer;
    }

    /**
     * @param String $trailer
     */
    public function setTrailer($trailer)
    {
        $this->trailer =$trailer;
    }

    /**
     * @return ImageAttachment
     */
    public function getCover()
    {
        if ($this->attachment ==! null) {
            return $this->attachment;
        }

        $attachment = new ImageAttachment();
        $attachment->setSmallImageUrl($this->image->url('thumbnail'));
        $attachment->setOriginalImageUrl($this->image->url('original'));
        $attachment->setMediumImageUrl($this->image->url('medium'));

        $this->attachment = $attachment;

        return $attachment;
    }

    /**
     * @param ImageAttachment $attachment
     */
    public function setCover(ImageAttachment $attachment)
    {
        $this->attachment = $attachment;
    }

    /**
     * @return String
     */
    public function getNotes()
    {
        return $this->notes;
    }

    /**
     * @param String $notes
     */
    public function setNotes($notes)
    {
        $this->notes =$notes;
    }

    /**
     * @return Collection
     */
    public function getCountries()
    {
        return $this->countries;
    }

    /**
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * @param $slug
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;
    }
}
