<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email de demande de publication d'événement</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            background-color: #f4f4f4;
            padding: 20px;
        }

        .container {
            max-width: 600px;
            margin: auto;
            background: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #333;
        }

        p {
            margin: 10px 0;
        }

        .details {
            margin-top: 20px;
            border-top: 1px solid #ccc;
            padding-top: 20px;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Cher Client {{ Auth::user()->name }},</h2>
    <p>Nous sommes ravis de vous informer que votre réservation pour l'événement "{{ $event->title }}" a été confirmée.
        Veuillez conserver cette confirmation pour votre référence.
    </p>

    <div class="invitation">
        <p>Détails de la réservation :
            - Événement : {{ $event->title }}
            - Date : {{ $event->date }}
            - Lieu : {{ $event->location }}
        </p>
        {{--        <a href="http://127.0.0.1:8000/dashboard" target="_blank">Consulter l'événement</>--}}
    </div>

    <p>
        Merci pour votre réservation. Nous attendons avec impatience de vous voir à l'événement!
    </p>

    <p>Cordialement,<br>L'équipe de l'évènement</p>
</div>
</body>
</html>

