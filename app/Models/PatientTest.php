<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PatientTest extends Model
{
    use HasFactory, HasUuids;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'patient_tests';

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
     * Get the patient that owns the PatientTest
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function patient(): BelongsTo
    {
        return $this->belongsTo(Patient::class);
    }

    /**
     * Get Readable Test Result
     * 
     * @return string
     */
    public function getReadableTestResult(): string
    {
        $result = json_decode($this->result, true);

        return $result['class_label'] . ' (' . round($result['confidence'], 2) . '%)';
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
            if (file_exists(storage_path('app/public/images/scans/' . $model->id . '.png'))) {
                unlink(storage_path('app/public/images/scans/' . $model->id . '.png'));
            }
        });
    }
}
