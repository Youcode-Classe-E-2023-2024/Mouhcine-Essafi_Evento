<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email de demande de réservation d'événement</title>
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
    <h2>Cher Organisateur,</h2>
    <p>Vous avez reçu une nouvelle demande de réservation pour l'événement "{{ $event->title }}" de la part de {{ Auth::user()->name }}.
        La demande est actuellement en attente d'approbation.</p>

    <div class="invitation">
        <p>Pour approuver ou rejeter cette demande, veuillez vous connecter à votre compte et accéder à la section des réservations:</p>
        <a href="http://127.0.0.1:8000/reservations" target="_blank">Consulter l'événement</>
    </div>

</div>
</body>
</html>

