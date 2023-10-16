<?php


namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Character extends Model
{
    use Notifiable;

    private string $name;
    private string $race;
    private int $age;
    private string $backstory;

    protected $fillable = [
        'name', 'race', 'age', 'backstory'
    ];

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getRace(): string
    {
        return $this->race;
    }

    public function setRace(string $race): void
    {
        $this->race = $race;
    }

    public function getAge(): int
    {
        return $this->age;
    }

    public function setAge(int $age): void
    {
        $this->age = $age;
    }

    public function getBackstory(): string
    {
        return $this->backstory;
    }

    public function setBackstory(string $backstory): void
    {
        $this->backstory = $backstory;
    }
}
