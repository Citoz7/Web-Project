<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fixie Garage - Modern Bicycle Marketplace</title>
    @vite('resources/css/app.css')
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <style>
        .hero-slider .swiper-slide {
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
        }
        .hero-slider .swiper-pagination-bullet {
            background: rgba(255,255,255,0.6);
            opacity: 1;
        }
        .hero-slider .swiper-pagination-bullet-active {
            background: white;
        }
    </style>


</head>
<body class="bg-neutral-50 text-gray-900 font-inter tracking-tight dark:bg-gray-900 dark:text-gray-50">
    <!-- Modern Header -->
    <header class="sticky top-0 z-50 bg-white/90 backdrop-blur-sm shadow-md">
        <div class="container mx-auto px-4 py-4 flex justify-between items-center">
            <div class="flex items-center space-x-4">
                <h1 class="text-2xl font-bold text-gray-800">Fixie Garage</h1>
            </div>
            <nav>
                <ul class="flex space-x-6 font-bold text-gray-600">
                    <li><a href="#home" class="transition hover:text-blue-600">Home</a></li>
                    <li><a href="#parts" class="transition hover:text-blue-600">Parts</a></li>
                    <li><a href="#bikes" class="transition hover:text-blue-600">Bikes</a></li>
                    <li><a href="{{ route('orders.purchasement') }}" class="transition hover:text-blue-600">Pesanan</a></li>
                    <li class="flex space-x-4">
    @auth
        <form action="{{ route('logout') }}" method="POST" class="inline">
            @csrf
            <button type="submit" class="px-3 py-1 bg-red-600 text-white rounded-md hover:bg-red-700 transition">
                Logout
            </button>
        </form>
    @else
        <a href="{{ route('login') }}" class="px-3 py-1 border border-blue-500 text-blue-600 rounded-md hover:bg-blue-50 transition">Login</a>
        <a href="{{ route('register') }}" class="px-3 py-1 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition">Register</a>
    @endauth
</li>

                </ul>
            </nav>
        </div>
    </header>

  <script>
document.addEventListener('DOMContentLoaded', function () {
    console.log("Halaman dimuat.");

    // Debugging localStorage
    console.log("Nilai localStorage untuk 'theme':", localStorage.getItem('theme'));

    const darkModeToggle = document.createElement('button');
    darkModeToggle.innerHTML = '🌓';
    darkModeToggle.className = 'ml-2 px-3 py-1 bg-gray-200 rounded-md';

    const navList = document.querySelector('header nav ul li:last-child');
    navList.appendChild(darkModeToggle);

    darkModeToggle.addEventListener('click', () => {
        const html = document.documentElement;

        if (html.classList.contains('dark')) {
            html.classList.remove('dark');
            localStorage.setItem('theme', 'light');
            console.log("Dark mode dimatikan. LocalStorage diatur ke 'light'.");
        } else {
            html.classList.add('dark');
            localStorage.setItem('theme', 'dark');
            console.log("Dark mode diaktifkan. LocalStorage diatur ke 'dark'.");
        }
    });

    // Set mode awal berdasarkan localStorage
    if (localStorage.getItem('theme') === 'dark') {
        document.documentElement.classList.add('dark');
        console.log("Dark mode diaktifkan berdasarkan localStorage.");
    } else {
        console.log("Light mode diaktifkan berdasarkan localStorage.");
    }
});
</script>

    <!-- Hero Section with Swiper -->
    <section id="home" class="hero-slider">
        <div class="swiper">
            <div class="swiper-wrapper">

                <!-- Main Content Slide 1 -->
                <div class="swiper-slide bg-gradient-to-br from-blue-100 via-white to-blue-100">
                    <div class="container mx-auto px-4 text-center relative z-10">
                        <div class="max-w-3xl mx-auto">
                            <h2 class="text-5xl font-bold mb-6 text-gray-900 leading-tight">Craft Your Perfect Ride</h2>
                            <p class="text-xl text-gray-600 mb-8">Precision-engineered fixie bikes and parts for urban cyclists</p>
                            <div class="flex justify-center space-x-4">
                                <a href="#bikes" class="px-6 py-3 bg-blue-600 text-white rounded-full shadow-lg hover:bg-blue-700 transition transform hover:-translate-y-1">
                                    Explore Bikes
                                </a>
                                <a href="#parts" class="px-6 py-3 border-2 border-blue-600 text-blue-600 rounded-full hover:bg-blue-50 transition transform hover:-translate-y-1">
                                    Shop Parts
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="absolute inset-0 overflow-hidden opacity-20">
                        <img src="{{ asset('images/bg.jpg') }}" alt="Fixie Background" class="w-full h-full object-cover">
                    </div>
                </div>

                <!-- Advertising Slide 2 -->
                <div class="swiper-slide bg-gradient-to-br from-blue-100 via-white to-blue-100">
                    <div class="container mx-auto px-4 text-center relative z-10">
                        <div class="max-w-3xl mx-auto">
                            <h2 class="text-5xl font-bold mb-6 text-gray-900 leading-tight">Special Promo: 20% Off</h2>
                            <p class="text-xl text-gray-600 mb-8">Limited Time Offer on All Fixie Bikes</p>
                            <div class="flex justify-center space-x-4">
                                <a href="#bikes" class="px-6 py-3 bg-blue-600 text-white rounded-full shadow-lg hover:bg-blue-700 transition">
                                    Shop Now
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="absolute inset-0 overflow-hidden opacity-20">
                        <img src="{{ asset('images/baner.png') }}" alt="Fixie Background" class="w-full h-full object-cover">
                    </div>
                </div>

                <!-- Advertising Slide 3 -->
                <div class="swiper-slide bg-gradient-to-br from-blue-100 via-white to-blue-100">
                    <div class="container mx-auto px-4 text-center relative z-10">
                        <div class="max-w-3xl mx-auto">
                            <h2 class="text-5xl font-bold mb-6 text-gray-900 leading-tight">New Parts Collection</h2>
                            <p class="text-xl text-gray-600 mb-8">Latest Urban Cycling Accessories</p>
                            <div class="flex justify-center space-x-4">
                                <a href="#parts" class="px-6 py-3 bg-blue-600 text-white rounded-full shadow-lg hover:bg-blue-700 transition">
                                    View Collection
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="absolute inset-0 overflow-hidden opacity-20">
                        <img src="{{ asset('images/baner1.jpg') }}" alt="Fixie Background" class="w-full h-full object-cover">
                    </div>
                </div>
            </div>
            
            <!-- Pagination -->
            <div class="swiper-pagination"></div>
        </div>
    </section>

    <!-- Remaining original sections (Parts, Bikes, Order Form, Footer) stay exactly the same as in the original document -->
    <!-- Parts Section with Card Hover Effects -->
    <section id="parts" class="py-20 bg-white">
        <div class="container mx-auto px-4">
            <h2 class="text-4xl font-bold text-center mb-12 text-gray-900">Premium Bicycle Parts</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                @php 
                $parts = [
                    ['name' => 'Wake Stem Stang', 'price' => 50, 'image' => 'p1.jpg'],
                    ['name' => 'Dropbar', 'price' => 40, 'image' => 'p2.jpg'],
                    ['name' => 'Pedal Cleat', 'price' => 35, 'image' => 'p3.jpg'],
                    ['name' => 'Izumi Chain', 'price' => 60, 'image' => 'p4.jpg'],
                    ['name' => 'Bicycle Saddle', 'price' => 45, 'image' => 'p5.jpg'],
                    ['name' => 'Front Wheelset', 'price' => 55, 'image' => 'p6.jpg'],
                    ['name' => 'Bicycle Seatpost', 'price' => 30, 'image' => 'p7.jpg'],
                    ['name' => 'Fixie Crank', 'price' => 65, 'image' => 'p8.png']
                ];
                @endphp

                @foreach($parts as $part)
                <div class="bg-white border border-gray-200 rounded-lg overflow-hidden shadow-lg transform transition hover:scale-105 hover:shadow-xl">
                    <img src="{{ asset('images/'.$part['image']) }}" alt="{{ $part['name'] }}" class="w-full h-48 object-cover">
                    <div class="p-4">
                        <h3 class="text-xl font-semibold text-gray-800 mb-2">{{ $part['name'] }}</h3>
                        <div class="flex justify-between items-center">
                            <span class="text-lg font-bold text-blue-600">${{ $part['price'] }}</span>
                            <a href="#purchase" class="px-3 py-1 bg-blue-600 text-white rounded-full text-sm hover:bg-blue-700 transition">
                                Buy Now
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Bikes Section with Sleek Layout -->
    <section id="bikes" class="py-20 bg-neutral-100">
        <div class="container mx-auto px-4">
            <h2 class="text-4xl font-bold text-center mb-12 text-gray-900">Our Curated Fixie Bikes</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @php 
                $bikes = [
                    ['name' => 'Urban Racer', 'price' => 350, 'image' => 'fixie1.jpeg'],
                    ['name' => 'City Glider', 'price' => 400, 'image' => 'fixie2.png'],
                    ['name' => 'Street Master', 'price' => 450, 'image' => 'fixie3.png'],
                    ['name' => 'Pro Edition', 'price' => 600, 'image' => 'fixie4.png'],
                    ['name' => 'Elite Series', 'price' => 640, 'image' => 'fixie5.png'],
                    ['name' => 'Ultimate Ride', 'price' => 1111, 'image' => 'fixie6.png']
                ];
                @endphp

                @foreach($bikes as $bike)
                <div class="bg-white border border-gray-200 rounded-lg overflow-hidden shadow-lg group">
                    <div class="relative overflow-hidden">
                        <img src="{{ asset('images/'.$bike['image']) }}" alt="{{ $bike['name'] }}" 
                             class="w-full h-64 object-cover transition duration-500 group-hover:scale-110">
                    </div>
                    <div class="p-6">
                        <h3 class="text-2xl font-bold text-gray-800 mb-2">{{ $bike['name'] }}</h3>
                        <div class="flex justify-between items-center">
                            <span class="text-xl font-bold text-blue-600">${{ $bike['price'] }}</span>
                            <a href="#purchase" class="px-4 py-2 bg-blue-600 text-white rounded-full hover:bg-blue-700 transition">
                                Purchase
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Order Form with Modern Design -->
    <section class="py-20 bg-white">
        <div class="container mx-auto px-4">
            <div class="max-w-xl mx-auto bg-neutral-50 p-8 rounded-xl shadow-lg">
                <h2 class="text-3xl font-bold text-center mb-8 text-gray-900">Place Your Order</h2>
                <form action="{{ route('orders.store') }}" method="POST" class="space-y-6">
                    @csrf
                    <div>
                        <label for="product_id" class="block text-gray-700 font-semibold mb-2">Select Product</label>
                        <select id="product_id" name="product_id" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 transition" required>
                            @foreach($products as $product)
                                <option value="{{ $product->id }}">{{ $product->name }} - Rp{{ $product->price }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label for="quantity" class="block text-gray-700 font-semibold mb-2">Quantity</label>
                        <input type="number" id="quantity" name="quantity" min="1" 
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 transition" required>
                    </div>
                    <button type="submit" class="w-full bg-blue-600 text-white py-3 rounded-lg hover:bg-blue-700 transition font-semibold">
                        Confirm Order
                    </button>
                </form>
            </div>
        </div>
    </section>

    <!-- Modern Footer -->
    <footer class="bg-gray-900 text-white py-12">
        <div class="container mx-auto px-4 text-center">
            <div class="mb-6">
                <p class="text-xl font-semibold mb-4">Fixie Shop</p>
                <p class="text-gray-400">Crafting Urban Cycling Experiences Since 2024</p>
            </div>
            <div class="flex justify-center space-x-6 mb-8">
                <a href="#" class="text-gray-400 hover:text-white transition">About</a>
                <a href="#" class="text-gray-400 hover:text-white transition">Contact</a>
                <a href="#" class="text-gray-400 hover:text-white transition">FAQ</a>
            </div>
            <p class="text-sm text-gray-500">&copy; 2024 Fixie Shop. All Rights Reserved.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            new Swiper('.hero-slider .swiper', {
                loop: true,
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true
                },
                autoplay: {
                    delay: 5000,
                    disableOnInteraction: false
                }
            });
        });
    </script>
</body>
</html>