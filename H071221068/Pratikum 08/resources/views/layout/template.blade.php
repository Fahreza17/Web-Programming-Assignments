<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Products</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        .navbar-brand {
            font-weight: bold;
        }
    </style>
</head>

<body>
    <nav class="navbar bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">Pemrograman Web</a>
            <form action="/search-product-line" method="POST" class="d-flex">
                @csrf
                <select class="form-control me-3" id="productSelect" name="product">
                    <option value="">Choose ProductLines</option>
                    @foreach ($productlines as $item)
                        <option value="{{ $item->productLine }}">{{ $item->productLine }}</option>
                    @endforeach
                </select>
                <button type="button" id="btnSearchProductLine" class="btn btn-success">Search</button>
            </form>
        </div>
    </nav>
    <div class="p-4">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>

    <script>
        document.getElementById('btnSearchProductLine').addEventListener('click', () => {
            var selectedOption = document.getElementById('productSelect').value;
            if (selectedOption) {
                var url = '/products/' + selectedOption;
                window.location.href = url;
            }
        });
    </script>

</body>

</html>
