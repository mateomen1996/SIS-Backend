<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class SignupActivate extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
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
        //$url = url('/api/auth/signup/activate/'.$notifiable->activation_token);
        $url = 'http://177.222.52.26:8000/api/auth/signup/activate/'.$notifiable->activation_token;
        $rol="";

        if($notifiable["id_rol"]==1){
            $rol="administrador";
        }elseif($notifiable["id_rol"]==2){
            $rol="doctor";
        }elseif($notifiable["id_rol"]==3){
            $rol="encargado de materiales";
        }
        elseif($notifiable["id_rol"]==4){
            $rol="paciente";
        }
        elseif($notifiable["id_rol"]==6){
            $rol="asistente";
        }

        if($notifiable["id_rol"]==1||$notifiable["id_rol"]==2||$notifiable["id_rol"]==3||$notifiable["id_rol"]==6){
            return (new MailMessage)
                ->subject('Confirma tu cuenta')
                ->line('Hola '.$notifiable["name"].",")
                ->line('Tu cuenta ha sido registrada como '.$rol,".")
                ->line('Para ingresar al sistema utiliza tu correo electronico y tu contraseña: '.$notifiable["password"])
                ->line('Pero antes de continuar, debes confirmar tu cuenta.')
                ->action('Confirmar tu cuenta', url($url))
                ->line('Muchas gracias por utilizar nuestra plataforma GRUPO 3 TALLER DE SISTEMAS');
        }else{
            return (new MailMessage)
            ->subject('Confirma tu cuenta')
            ->line('Hola '.$notifiable["name"].",")
            ->line('Tu cuenta ha sido registrada como '.$rol,".")
            ->line('Para ingresar a la aplicacion móvil utiliza tu correo electronico y tu contraseña: '.$notifiable["password"])
            ->line('Pero antes de continuar, debes confirmar tu cuenta.')
            ->action('Confirmar tu cuenta', url($url))
            ->line('Muchas gracias por utilizar nuestra plataforma GRUPO 3 TALLER DE SISTEMAS');
        }
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
