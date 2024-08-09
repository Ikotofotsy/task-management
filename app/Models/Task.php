<?php

namespace App\Models;

use Carbon\Carbon;
use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'description',
        'completed',
        'deadline'
    ];

    private $deadlineStatus = [
        [
            'status' => '0',
            'mssg' => 'En retard'
        ],
        [
            'status' => '1',
            'mssg' => 'imminente'
        ],
        [  
            'status' => '2',
            'mssg' => 'Proche de l\'echeance'
        ],
        [
            'status' => '3',
            'mssg' => 'A venir'
        ]
    ];

    public function User(): BelongsTo{
        return $this->belongsTo(User::class);
    }

    public function remainingTime(): array | int{
        $deadline = new DateTime($this->deadline);
        $current_date = new DateTime();
        if($deadline > $current_date){
            $remainingTime = $current_date->diff($deadline);

            return [
                'days' => $remainingTime->days +1,
                'hours' => $remainingTime->h,
                'minutes' => $remainingTime->i,
                'seconds' => $remainingTime->s
            ];
        }
        
        return ['days' => 0];
    }

    public function deadlineStatus(): array {
        $now = Carbon::now();
        if(!empty($this->deadline)){
            $deadline = Carbon::parse($this->deadline);

            if($deadline->isPast()){
                return $this->deadlineStatus[0];
            }
    
            $diffInDays = $now->diffInDays($deadline, false);
    
            if ($diffInDays > 7) {
                return $this->deadlineStatus[3];
            } elseif ($diffInDays >= 3 && $diffInDays <= 7) {
                return $this->deadlineStatus[2];
            } elseif ($diffInDays < 3) {
                return $this->deadlineStatus[1];
            }
        }
        return [];
    }
}
