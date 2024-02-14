Bonjour [{{ $user->name }}],

Nous avons reçu une demande de réinitialisation de mot de passe pour votre compte. Veuillez cliquer sur le lien ci-dessous pour procéder à la réinitialisation : <a href="{{ route('recoverPassword',[$token,$user->uuid]) }}"></a>