<!DOCTYPE html>
<html>
<head>
    <title>Ціну змінено</title>
</head>
<body>
<h1>Ціну змінено</h1>
<p>Ціна на "{{ $announcement->title }}" була змінена.</p>
<p>Посилання на оголошення: "{{ $announcement->url }}" була змінена.</p>
<img src="{{ $announcement->img }}" alt="{{ $announcement->title }} зображення"/>
<p style="color: red; font-style: oblique">Нова ціна: {{ $newPrice }}</p>
</body>
</html>
