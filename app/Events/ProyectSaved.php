<?php

namespace App\Events;

use App\Models\Proyectos;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ProyectSaved
{
    use Dispatchable, InteractsWithSockets, SerializesModels;


    public $proyecto ;
    /**
     * Create a new event instance.
     */
    public function __construct(Proyectos $proyecto)
    {
        $this->proyecto = $proyecto;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('channel-name'),
        ];
    }
}
