<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class StatusSent implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $order;
    public $username;

    public $message;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($username)
    {
        //$this->order = $order;
        $this->username = $username;
        $this->message = "{$username} liked your status";
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return ['status-liked'];
        //return new Channel('order-'.$this->order->id);
    }

   /*  public function broadcastAs()
    {
      return 'my-event';
    }

    public function broadcastWith()
    {
      return [
        'priority'  => $this->order->priority,
        'user_id'  => $this->order->user_id,
        'hotel_id'  => $this->order->hotel_id,
        'reservation_id'  => $this->order->reservation_id,
        'priority'  => $this->order->priority,
        'status'  => $this->order->status,
      ];
    } */
}
