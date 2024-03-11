<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticket - {{ $event->title }}</title>
    <style>
        /* Styles pour le texte "Evento" */
        .logo {
            font-size: 24px; /* Taille de police */
            font-weight: bold; /* Gras */
            color: #333; /* Couleur du texte */
            margin-bottom: 20px; /* Marge en bas pour l'espacement */
        }

        /* Styles pour le ticket */
        .ticket {
            border: 2px solid #333; /* Bordure */
            padding: 20px; /* Espacement intérieur */
            background-color: #f9f9f9; /* Couleur de fond */
        }

        /* Styles pour les titres */
        h1, h2, h3 {
            color: #333; /* Couleur du texte pour les titres */
        }

        /* Styles pour les listes */
        ul {
            list-style-type: disc; /* Puces */
            margin-left: 20px; /* Marge à gauche */
        }
    </style>
</head>
<body>
<div class="ticket">
    <div class="logo">Evento</div> <!-- Affiche le texte "Evento" -->
    <h1>Billet pour l'événement : {{ $event->title }}</h1>
    <p>Date et heure :{{ $event->date }} à {{ $event->time }}</p>
    <p>Lieu : {{ $event->location }}</p>

    <h3>Participant :</h3>
    <p>Nom : {{ $user->name }}</p>
    <p>E-mail : {{ $user->email }}</p>

    <p>Numéro de réservation : 1515477541111110</p>

    <h3>Instructions spéciales :</h3>
    <ul>
        <li>Veuillez présenter ce ticket à l'entrée de l'événement.</li>
        <li>Assurez-vous d'arriver à l'heure.</li>
    </ul>

    <h3>Remarques :</h3>
    <ul>
        <li>Les billets ne sont pas remboursables.</li>
        <li>Contactez-nous pour toute question ou préoccupation.</li>
    </ul>
</div>
</body>
</html>
