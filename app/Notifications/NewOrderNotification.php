<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewOrderNotification extends Notification implements ShouldQueue
{
    use Queueable;

    private $name;
    private $product;
    private $price;

    /**
     * Create a new notification instance.
     */
    public function __construct($name, $product, $price)
    {
        // Assigning constructor parameters to the class properties
        $this->name = $name;
        $this->product = $product;
        $this->price = $price;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];  // Only store in database
    }

    /**
     * Get the mail representation of the notification (if you need it).
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->greeting('Dear ' . $notifiable->name)
            ->line('A new order has been placed.')
            ->action('View Order', url('/'))  // Replace with actual URL
            ->line('Thank you for using our application!');
    }

    /**
     * Get the database representation of the notification.
     */
    public function toDatabase(object $notifiable)
    {
        return [
            'msg' => "New order was purchased by {$this->name} for {$this->product} at the price of $ {$this->price}",
            'url' => route('admin.orders')  // URL to view orders, replace with actual route
        ];
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'name' => $this->name,
            'product' => $this->product,
            'price' => $this->price,
        ];
    }
}
