<?php namespace Filmoteca\Models\Exhibitions;

use Carbon\Carbon;
use Codesleeve\Stapler\ORM\StaplerableInterface;
use Codesleeve\Stapler\ORM\EloquentTrait;
use Filmoteca\Exhibition\Type\Type as TypeInterface;
use Filmoteca\Exhibition\Type\ImageAttachment;
use Eloquent;

/**
 * Class Type
 * @package Filmoteca\Models\Exhibitions
 */
class Type extends Eloquent implements StaplerableInterface, TypeInterface
{
    use EloquentTrait;

    protected $table = 'exhibition_types';
    protected $guarded = [];
    protected $fillable = [
        'name', 'slug', 'description', 'since', 'until', 'created_at', 'updated_at', 'image', 'image_updated_at'
    ];
    protected $appends = ['icon'];

    /**
     * @var Attachment
     */
    protected $attachment = null;

    public function __construct(array $attributes = array())
    {
        $this->hasAttachedFile('image', [
            'styles' => ['thumbnail' => '64x64']]);

        parent::__construct($attributes);
    }

    public function exhibition()
    {
        return $this->hasMany('Filmoteca\Models\Exhibitions\Exhibition');
    }

    public function getIconAttribute()
    {
        return $this->image->url('thumbnail');
    }

    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int
     */
    public function setId($id)
    {
        $this->id = $id;
    }
    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return ImageAttachment
     */
    public function getImage()
    {
        if ($this->attachment ==! null) {
            return $this->attachment;
        }

        $attachment = new ImageAttachment();
        $attachment->setSmallImageUrl($this->image->url('thumbnail'));
        $attachment->setOriginalImageUrl($this->image->url('original'));
        $attachment->setMediumImageUrl($this->image->url('thumbnail'));

        $this->attachment = $attachment;

        return $attachment;
    }

    /**
     * @param ImageAttachment $attachment
     */
    public function setImage(ImageAttachment $attachment)
    {
        $this->attachment = $attachment;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return Carbon
     */
    public function getSince()
    {
        return Carbon::createFromFormat(MYSQL_DATE_TIME_FORMAT, $this->since);
    }

    /**
     * @param Carbon $since
     */
    public function setSince(Carbon $since)
    {
        $this->since = $since;
    }

    /**
     * @return Carbon
     */
    public function getUntil()
    {
        return Carbon::createFromFormat(MYSQL_DATE_TIME_FORMAT, $this->until);
    }

    /**
     * @param Carbon $until
     */
    public function setUntil(Carbon $until)
    {
        $this->until = $until;
    }

    /**
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * @param string $slug
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;
    }


}
