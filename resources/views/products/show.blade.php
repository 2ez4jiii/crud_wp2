<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Show Products</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-200">

    <div class="container mx-auto mt-5 mb-5">
        <div class="flex flex-wrap -mx-2">
            <div class="w-full md:w-1/3 px-2">
                <div class="bg-white shadow-md rounded p-4">
                    <img src="{{ asset('/storage/products/'.$product->image) }}" class="rounded w-full">
                </div>
            </div>
            <div class="w-full md:w-2/3 px-2">
                <div class="bg-white shadow-md rounded p-4">
                    <h3 class="text-xl font-bold">{{ $product->title }}</h3>
                    <hr class="my-2"/>
                    <p class="text-lg font-semibold">{{ "Rp " . number_format($product->price,2,',','.') }}</p>
                    <div class="prose">
                        <p>{!! $product->description !!}</p>
                    </div>
                    <hr class="my-2"/>
                    <p class="text-lg">Stock: {{ $product->stock }}</p>
                </div>
            </div>
        </div>
    </div>

</body>
</html>