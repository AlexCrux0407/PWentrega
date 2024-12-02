<?php
namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ConfirmAccount extends Notification implements ShouldQueue
{
    use Queueable;

    protected $user;

    public function __construct($user)
    {
        $this->user = $user;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->subject('Confirma tu cuenta')
                    ->greeting('Hola ' . $this->user->name . '!')
                    ->line('Gracias por registrarte. Por favor, confirma tu cuenta haciendo clic en el botón de abajo.')
                    ->action('Confirmar Cuenta', url('/confirm-account/' . $this->user->confirmation_token))
                    ->line('Gracias por usar nuestra aplicación!');
    }

    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
