<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $weddingTitle ?? 'Düğün Davetiyesi' }}</title>
    <style>
        /* Burada davetiye stilini oluşturabilirsin */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f5f5f5;
            color: #333;
        }
        .invitation-container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
            background: #fff;
            border: 2px solid #ddd;
            border-radius: 10px;
            text-align: center;
        }
        .title {
            font-size: 2em;
            margin-bottom: 20px;
        }
        .names {
            font-size: 1.5em;
            margin-bottom: 10px;
            font-weight: bold;
        }
        .date-location {
            font-size: 1.2em;
            margin-top: 10px;
        }
        .message {
            margin-top: 20px;
            font-size: 1.1em;
            color: #555;
        }
    </style>
</head>
<body>

    <div class="invitation-container">
        <div class="title">
            {{ $title ?? 'Vintage Düğün Davetiyesi' }}
        </div>
        
        <div class="names">
            <p>Gelin: {{ $brideName ?? 'Gelin İsmi' }}</p>
            <p>Damat: {{ $groomName ?? 'Damat İsmi' }}</p>
        </div>

        <div class="date-location">
            <p>Tarih: {{ $weddingDate ?? 'Tarih' }}</p>
            <p>Yer: {{ $weddingLocation ?? 'Mekan' }}</p>
        </div>

        <div class="message">
            <p>{{ $personalMessage ?? 'Sizleri aramızda görmekten mutluluk duyarız!' }}</p>
        </div>
    </div>

</body>
</html>