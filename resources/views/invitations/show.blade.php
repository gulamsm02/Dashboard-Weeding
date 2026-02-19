<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $invitation->title }}</title>
</head>
<body style="font-family: Arial; padding: 24px;">
    <h1>{{ $invitation->title }}</h1>
    <p><b>{{ $invitation->data_json['groom_name'] ?? '-' }}</b> & <b>{{ $invitation->data_json['bride_name'] ?? '-' }}</b></p>

    <hr>

    <p><b>Tanggal:</b> {{ $invitation->data_json['event_date'] ?? '-' }}</p>
    <p><b>Jam:</b> {{ $invitation->data_json['event_time'] ?? '-' }}</p>
    <p><b>Lokasi:</b> {{ $invitation->data_json['location'] ?? '-' }}</p>

    <hr>
    <small>Aktif sampai: {{ $invitation->expired_at?->format('Y-m-d H:i') ?? '-' }}</small>
</body>
</html>
