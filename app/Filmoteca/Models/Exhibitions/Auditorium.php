<?php namespace Filmoteca\Models\Exhibitions;

use Codesleeve\Stapler\ORM\EloquentTrait;
use Codesleeve\Stapler\ORM\StaplerableInterface;
use Eloquent;
use Filmoteca\Exhibition\Type\ImageAttachment;

/**
 * Class Auditorium
 * @package Filmoteca\Models\Exhibitions
 */
class Auditorium extends Eloquent implements StaplerableInterface, \Filmoteca\Exhibition\Type\Auditorium
{
    use EloquentTrait;

    protected $table = 'auditoriums';

    protected $guarded = array();

    public function __construct(array $attributes = array())
    {
        $this->hasAttachedFile(
            'image',
            [
                'styles' => [
                    'medium' => '200x355',
                    'thumbnail' => '150x255'
                ]
            ]
        );

        parent::__construct($attributes);
    }

    public function schedules()
    {
        return $this->hasMany('Schedule');
    }

    public function venue()
    {
        return $this->hasOne('Filmoteca\Models\Exhibitions\Auditorium', 'id', 'venue_id');
    }

    /**
     * @param $id
     * @return int
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
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

    /**
     * @param string $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }

    /**
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param string $telephone
     */
    public function setTelephone($telephone)
    {
        // TODO: Implement setTelephone() method.
    }

    /**
     * @return string
     */
    public function getTelephone()
    {
        // TODO: Implement getTelephone() method.
    }

    /**
     * @param string $schedule
     */
    public function setSchedule($schedule)
    {
        // TODO: Implement setSchedule() method.
    }

    /**
     * @return string
     */
    public function getSchedule()
    {
        // TODO: Implement getSchedule() method.
    }

    /**
     * @param float $cost
     */
    public function setGeneralCost($cost)
    {
        // TODO: Implement setGeneralCost() method.
    }

    /**
     * @return float
     */
    public function getGeneralCost()
    {
        // TODO: Implement getGeneralCost() method.
    }

    /**
     * @param $cost
     */
    public function setSpecialCost($cost)
    {
        // TODO: Implement setSpecialCost() method.
    }

    /**
     * @param float $cost
     * @return float
     */
    public function getSpecialCost($cost)
    {
        // TODO: Implement getSpecialCost() method.
    }

    /**
     * @param string $map
     */
    public function setMap($map)
    {
        // TODO: Implement setMap() method.
    }

    /**
     * @return string
     */
    public function getMap()
    {
        // TODO: Implement getMap() method.
    }

    /**
     * @param ImageAttachment $image
     */
    public function setImage(ImageAttachment $image)
    {
        $this->attachment = $image;
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
        $attachment->setMediumImageUrl($this->image->url('medium'));

        $this->attachment = $attachment;

        return $attachment;
    }

    /**
     * @return \Filmoteca\Exhibition\Type\Auditorium
     */
    public function getVenue()
    {
        return $this->venue;
    }

    /**
     * @param \Filmoteca\Exhibition\Type\Auditorium $venue
     */
    public function setVenue(\Filmoteca\Exhibition\Type\Auditorium $venue)
    {
        $this->venue = venue;
    }


}
