<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class MailResetPasswordNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($token)
    {
        $this->token = $token;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->from('dinamik14@upi.edu', 'Dinamik 14')
            ->subject('Dinamik 14 - Reset Password')
            ->line('Dear peserta Dinamik 14,')
            ->line('Sistem kami menerima informasi bahwa Anda ingin melakukan reset password akun.')
            ->action('Reset Password', url(config('app.url') . route('password.reset', ['token' => $this->token, 'email' => $notifiable->getEmailForPasswordReset()], false)))
            ->line('Link reset password ini akan berakhir dalam ' . config('auth.passwords.users.expire') . ' menit.')
            ->line('Jika anda tidak melakukan permintaan reset password, maka e-mail ini tidak perlu Anda hiraukan.');

        // return (new MailMessage)
        //     ->greeting('Hello!')
        //     ->line('One of your invoices has been paid!')
        //     ->action('View Invoice', '#')
        //     ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
