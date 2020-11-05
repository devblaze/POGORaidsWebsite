<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RaidMember extends Model
{
    use HasFactory;

    protected $fillable = ['raid_id', 'trainer_id'];

    /**
     * The trainer ID of a raid member belongs to one trainer.
     *
     * @return BelongsTo
     */
    public function trainer(): BelongsTo
    {
        return $this->belongsTo(Trainer::class, 'trainer_id');
    }

    /**
     * The raid ID of a raid member associates the trainer with that raid.
     *
     * @return BelongsTo
     */
    public function raid(): BelongsTo
    {
        return $this->belongsTo(Raid::class, 'raid_id');
    }
}
