<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles de la Reservación</title>
</head>
<body> 
        <h2>Bienvenid@ Sr(a): <strong>{{ $reservation['huesped'] }}</strong></h2>
        <p><strong>Asunto:</strong> {{ $subject }}</p>
        <h3>Los datos de su Reservation son los siguientes:</h3>
        ----------------------------------------------------------------------------
        <p><strong>Num Reservation:</strong> {{ $reservation['num_reservation'] }}</p>
        <p><strong>Num People:</strong> {{ $reservation['num_people'] }}</p>
        <p><strong>Date Arrival:</strong> {{ $reservation['date_arrival'] }}</p>
        <p><strong>Date Depature:</strong> {{ $reservation['date_depature'] }}</p>
        <p><strong>Arriving From:</strong> {{ $reservation['arriving_from'] }}</p>
        <p><strong>Destination:</strong> {{ $reservation['destination'] }}</p>
       <!--  <p><strong>Hotel :</strong> {{ $reservation['hotel_id'] }}</p> -->
        <p><strong>Num Room :</strong> {{ $reservation['num_room'] }}</p>
    
</body>
</html>