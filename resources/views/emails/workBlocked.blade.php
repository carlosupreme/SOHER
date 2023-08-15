@component('mail::message')
  # Solicitud bloqueada 🚫🚫🚫🚫🚫🚫
  Tu solicitud
      *{{$work->title}}*
      Ha sido **bloqueada** por alguno de los siguientos motivos:

  ---

  - La solicitud incluye contenido sensible
  - La solicitud no contiene información coherente
  - La solicitud está duplicada

  ---

  Por lo cual no será procesada y no recibirás el trabajo

  @component('mail::button', ['url' => route('work.show', $work)])
    Ver solicitud
  @endcomponent

  Si crees que esto no deberia ser asi o ha sido un error, reporta una queja al siguiente correo electronico: <thecodehousedev@gmail.com>

@endcomponent
