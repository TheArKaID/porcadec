<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use \Database\Factories\PatientFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Patient extends Model
{
    use HasFactory, HasUuids;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'patients';

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    /**
     * Get all of the patientTests for the Patient
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function patientTests(): HasMany
    {
        return $this->hasMany(PatientTest::class);
    }

    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory<static>
    */
    protected static function newFactory(): PatientFactory
    {
        return PatientFactory::new();
    }

    /**
     * Static boot
     * 
     * @return void
     */
    protected static function boot(): void
    {
        parent::boot();
        static::creating(function ($model) {
            $model->id = (string) $model->newUniqueId();
        });

        static::deleting(function ($model) {
            foreach ($model->patientTests as $patientTest) {
                $patientTest->delete();
            }
        });
    }
}
