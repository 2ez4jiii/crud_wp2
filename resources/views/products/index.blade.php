<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Products</title>
    @vite('resources/css/app.css')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
</head>
<body class="bg-gray-200 font-sans overflow-hidden">

    <div class="container mx-auto mt-5">
        <div class="flex justify-center">
            <div class="w-full">
                <div class=" font-montserrat">
                    <h3 id="tugaswp2" class="text-center my-4 text-xl font-bold">Tugas Crud WP2</h3>
                    <h5 id="namagweh" class="text-center font-bold">
                        <p>
                            NAMA : AHMAD AJI SAPUTRA   
                        </p>
                        <p>
                            NIM : 19230997
                        </p>
                        <p>
                            KELAS : 19.3B.05
                        </p>
                    </h5>
                    <h5 id="note" class="text-blue-700">
                        <p>
                            note: ketik di terminal vsc <span class="font-bold text-red-500">npm run dev</span>
                         </p>
                         <p>
                             #akuTAILWIND
                         </p>
                    </h5>
                    <hr class="my-4">
                </div>
                <div class="bg-white shadow-md rounded p-6">
                    <div id="bgtabel" class="mb-3">
                        <a href="{{ route('products.create') }}" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">ADD PRODUCT</a>
                    </div>
                    <table id="tabel" class="min-w-full bg-white border">
                        <thead>
                            <tr>
                                <th class="py-2 border-b text-left">IMAGE</th>
                                <th class="py-2 border-b text-left">TITLE</th>
                                <th class="py-2 border-b text-left">PRICE</th>
                                <th class="py-2 border-b text-left">STOCK</th>
                                <th class="py-2 border-b text-left" style="width: 20%">ACTIONS</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($products as $product)
                                <tr class="hover:bg-gray-100">
                                    <td class="py-2 border-b text-center">
                                        <img src="{{ asset('/storage/products/'.$product->image) }}" class="rounded" style="width: 150px">
                                    </td>
                                    <td class="py-2 border-b">{{ $product->title }}</td>
                                    <td class="py-2 border-b">{{ "Rp " . number_format($product->price,2,',','.') }}</td>
                                    <td class="py-2 border-b">{{ $product->stock }}</td>
                                    <td class="py-2 border-b text-center">
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('products.destroy', $product->id) }}" method="POST">
                                            <a href="{{ route('products.show', $product->id) }}" class="bg-gray-800 text-white px-3 py-1 rounded hover:bg-gray-900">SHOW</a>
                                            <a href="{{ route('products.edit', $product->id) }}" class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">EDIT</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">HAPUS</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center py-4">Data Products belum Tersedia.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        //message with sweetalert
        @if(session('success'))
            Swal.fire({
                icon: "success",
                title: "BERHASIL",
                text: "{{ session('success') }}",
                showConfirmButton: false,
                timer: 2000
            });
        @elseif(session('error'))
            Swal.fire({
                icon: "error",
                title: "GAGAL!",
                text: "{{ session('error') }}",
                showConfirmButton: false,
                timer: 2000
            });
        @endif

        //buat animasi dari gsap
        const Tugaswp2Animation = (selector) => {
            gsap.from(selector, {
              scrollTrigger: {
                trigger: selector,
                start: "top 80%",
                toggleActions: "play none none none",
              },
              y: -400,
              opacity: 0,
              duration: 1.0,
              delay: 0.5
            });
          };
          Tugaswp2Animation("#tugaswp2");
        
        const NamagwehAnimation = (selector) => {
            gsap.from(selector, {
                scrollTrigger: {
                trigger: selector,
                start: "top 80%",
                toggleActions: "play none none none",
                },
                x: -400,
                opacity: 0,
                duration: 1.0,
                delay: 1.7
            });
           };
           NamagwehAnimation("#namagweh");
           
        const tabelhAnimation = (selector) => {
            gsap.from(selector, {
                scrollTrigger: {
                trigger: selector,
                start: "top 80%",
                toggleActions: "play none none none",
                },
                y: 100,
                opacity: 0,
                duration: 1.0,
                delay: 3.0
            });
        };
        tabelhAnimation("#tabel");

        const BgtabelhAnimation = (selector) => {
            gsap.from(selector, {
                scrollTrigger: {
                trigger: selector,
                start: "top 80%",
                toggleActions: "play none none none",
                },
                x: 500,
                opacity: 0,
                duration: 1.0,
                delay: 2.5
            });
        };
        BgtabelhAnimation("#bgtabel");
    </script>
</body>
</html>