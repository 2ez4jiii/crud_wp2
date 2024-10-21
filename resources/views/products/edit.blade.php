<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Products</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-200">

    <div class="container mx-auto mt-5 mb-5">
        <div class="flex justify-center">
            <div class="w-full max-w-2xl">
                <div class="bg-white shadow-md rounded p-6">
                    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                    
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label class="block font-bold mb-1">IMAGE</label>
                            <input type="file" class="block w-full text-sm text-gray-900 border  rounded-lg cursor-pointer bg-gray-50 focus:outline-none @error('image') border-red-500 @enderror" name="image">
                        
                            <!-- error message untuk image -->
                            @error('image')
                                <div class="text-red-500 mt-2 text-sm">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="block font-bold mb-1">TITLE</label>
                            <input type="text" class="block w-full px-3 py-2 border  rounded-lg shadow-sm focus:outline-none focus:ring focus:border-blue-300 @error('title') border-red-500 @enderror" name="title" value="{{ old('title', $product->title) }}" placeholder="Masukkan Judul Product">
                        
                            <!-- error message untuk title -->
                            @error('title')
                                <div class="text-red-500 mt-2 text-sm">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="block font-bold mb-1">DESCRIPTION</label>
                            <textarea class="block w-full px-3 py-2 border  rounded-lg shadow-sm focus:outline-none focus:ring focus:border-blue-300 @error('description') border-red-500 @enderror" name="description" rows="5" placeholder="Masukkan Description Product">{{ old('description', $product->description) }}</textarea>
                        
                            <!-- error message untuk description -->
                            @error('description')
                                <div class="text-red-500 mt-2 text-sm">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="flex flex-wrap -mx-2">
                            <div class="w-full md:w-1/2 px-2">
                                <div class="mb-4">
                                    <label class="block font-bold mb-1">PRICE</label>
                                    <input type="number" class="block w-full px-3 py-2 border  rounded-lg shadow-sm focus:outline-none focus:ring focus:border-blue-300 @error('price') border-red-500 @enderror" name="price" value="{{ old('price', $product->price) }}" placeholder="Masukkan Harga Product">
                                
                                    <!-- error message untuk price -->
                                    @error('price')
                                        <div class="text-red-500 mt-2 text-sm">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="w-full md:w-1/2 px-2">
                                <div class="mb-4">
                                    <label class="block font-bold mb-1">STOCK</label>
                                    <input type="number" class="block w-full px-3 py-2 border  rounded-lg shadow-sm focus:outline-none focus:ring focus:border-blue-300 @error('stock') border-red-500 @enderror" name="stock" value="{{ old('stock', $product->stock) }}" placeholder="Masukkan Stock Product">
                                
                                    <!-- error message untuk stock -->
                                    @error('stock')
                                        <div class="text-red-500 mt-2 text-sm">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 mr-2">UPDATE</button>
                        <button type="reset" class="bg-orange-500 text-white px-4 py-2 rounded hover:bg-orange-600">RESET</button>

                    </form> 
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'description' );
    </script>
</body>
</html>