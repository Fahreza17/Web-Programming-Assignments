<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ProductTrucks&Buses</title>
    <style>
        h1 {
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>Data Produk Berjenis Trucks & Buses</h1>

        @foreach($reads as $read)
            <p>========================================================</p>
            <p>Nama Produk : <a href="{{ route('readDetail', ['productCode' => $read->productCode]) }}">{{$read -> productName}}</a></p>
        
        @endforeach
</body>
</html>