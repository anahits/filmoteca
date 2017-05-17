<?php

namespace Filmoteca\Models\Exhibitions;

use DB;
use Filmoteca\Exhibition\Type\Exhibition as ExhibitionInterface;
use Filmoteca\Exhibition\Type as Type;
use Filmoteca\Exhibition\Type\ScheduleCollection;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class Exhibitions
 * @package Filmoteca\Models\Exhibitions
 */
class Exhibition extends Eloquent implements ExhibitionInterface
{
    protected $fillable = ['exhibition_film_id', 'type_id', 'notes'];

    public function exhibitionFilm()
    {
        return $this->belongsTo('Filmoteca\Models\Exhibitions\ExhibitionFilm');
    }

    public function type()
    {
        return $this->belongsTo('Filmoteca\Models\Exhibitions\Type');
    }

    public function schedules()
    {
        return $this->hasMany('Filmoteca\Models\Exhibitions\Schedule')->with('auditorium');
    }

    public function auditoriums()
    {
        return $this->hasManyThrough('Filmoteca\Models\Exhibitions\Auditorium', 'Schedule');
    }

    public function films()
    {

        return $this->hasManyThrough(
            'Filmoteca\Models\Exhibitions\Film',
            'Filmoteca\Models\Exhibitions\ExhibitionFilm'
        );
    }

    public function getAuditoriumsAttribute($value)
    {
        return $this->schedules->map(function ($schedule) {
            return $schedule->auditorium;
        })->unique();
    }

    public function schedulesByAuditorium($id)
    {
        $schedules = $this->schedules->filter(function ($schedule) use ($id) {
            return $schedule->auditorium->id === $id;
        });

        return $this->groupSchedulesByDay($schedules);
    }

    protected function groupSchedulesByDay(Collection $schedules)
    {
        $groups = [];

        foreach ($schedules as $schedule) {
            $day_time = explode(' ', $schedule->entry);

            $day = $day_time[0];
            $time = $day_time[1];


            if (!isset($group[$day])) {
                $group[$day] = [];
            }

            $groups[$day][] = $time; //push
        }

        foreach ($groups as &$group) {
            sort($group, SORT_NATURAL);
        }

        return $groups;
    }

    protected function setTypeIdAttribute($value)
    {
        $this->attributes['type_id'] = ($value === 0) ? null : $value;
    }

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
        $this->id = id;
    }

    /**
     * @return Type\Film
     */
    public function getFilm()
    {
        return $this->exhibition_film->film;
    }

    /**
     * @param Type\Film $film
     */
    public function setFilm(Type\Film $film)
    {
        $this->exhibition_film->film = $film;
    }

    /**
     * @return ScheduleCollection
     */
    public function getSchedules()
    {
        return new ScheduleCollection($this->schedules->all());
    }

    /**
     * @param ScheduleCollection $schedules
     */
    public function setSchedules(ScheduleCollection $schedules)
    {
        $this->schedules = $schedules;
    }

    /**
     * @return Type\Type|null
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param Type\Type $type
     */
    public function setType(Type\Type $type)
    {
        $this->type = $type;
    }

    /**
     * @return string
     */
    public function getNotes()
    {
        return $this->notes;
    }

    /**
     * @param string $notes
     */
    public function setNotes($notes)
    {
        $this->notes= $notes;
    }
}
