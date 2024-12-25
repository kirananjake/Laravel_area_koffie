<!DOCTYPE html >
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coffee Shop</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'coffee-dark': '#2b2522',
                        'coffee-light': '#3c322d',
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-coffee-dark text-white flex flex-col min-h-screen">
    <!-- Navbar -->
    <nav class="bg-coffee-light p-4 sticky top-0 z-10">
        <div class="container mx-auto flex flex-wrap justify-between items-center">
            <div class="text-xl font-bold">Coffee Shop</div>
            <button class="lg:hidden" onclick="toggleMenu()">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                </svg>
            </button>
            <div id="menu" class="hidden w-full lg:flex lg:w-auto lg:space-x-4">
                <a href="#menu" class="block mt-4 lg:inline-block lg:mt-0 hover:text-gray-300">Menu</a>
                <a href="#about" class="block mt-4 lg:inline-block lg:mt-0 hover:text-gray-300">About</a>
                <a href="#contact" class="block mt-4 lg:inline-block lg:mt-0 hover:text-gray-300">Contact</a>
                <a href="/admin/login" class="block mt-4 lg:inline-block lg:mt-0 hover:text-gray-300">Tambah Menu</a>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="flex-grow" id="menu">
        <!-- Menu Section -->
        <section id="menu" class="container mx-auto p-4">
            @foreach ($categories as $category)
            <h2 class="text-2xl font-bold text-center mb-6 text-white">{{ $category->nama_kategori }}</h2>
            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4 mb-8">
                @foreach ($category->menus as $menu)
                <div class="cursor-pointer" onclick="openModal('{{ $menu->nama_menu }}', '{{ $menu->deskripsi }}', '{{ asset('storage/' . $menu->foto) }}')">
                    <div class="bg-coffee-light rounded-lg p-2 hover:shadow-lg transition">
                        <img src="{{ asset('storage/' . $menu->foto) }}" alt="{{ $menu->nama_menu }}" class="w-full h-40 object-cover rounded mb-2">
                        <p class="text-white text-center text-sm">{{ $menu->nama_menu }}</p>
                    </div>
                </div>
                @endforeach
            </div>
            @endforeach
        </section>

        <!-- About Section -->
        <section id="about" class="bg-coffee-light py-16">
            <div class="container mx-auto px-4">
                <h2 class="text-3xl font-bold text-center mb-8">About Us</h2>
                <div class="flex flex-col md:flex-row items-center">
                    <div class="md:w-1/2 mb-8 md:mb-0">
                        <img src="{{ asset('koffi.jpg') }}" alt="Coffee Shop Interior" class="rounded-lg shadow-lg w-full">
                    </div>
                    <div class="md:w-1/2 md:pl-8">
                        <p class="text-lg mb-4">Selamat datang di AREA KOFFIE, sebuah coffee shop yang menggabungkan keindahan floral dengan suasana yang nyaman untuk menciptakan pengalaman tak terlupakan bagi setiap pelanggan. Di AREA KOFFIE, kami menciptakan ruang yang segar dan menenangkan dengan tema floral yang indah. Setiap sudut dirancang menyerupai oasis taman, dipenuhi estetika bunga yang bermekaran untuk memberikan pengalaman relaksasi yang sempurna.</p>
                        <p class="text-lg mb-4">Kami juga menggunakan kemasan ramah lingkungan sebagai bagian dari komitmen terhadap keberlanjutan. Pilihan minuman kami diracik dengan penuh dedikasi, menghadirkan kopi berkualitas dan minuman menyegarkan untuk melengkapi kunjungan Anda. Kami berkomitmen untuk memberikan pelayanan yang ramah, profesional, dan penuh perhatian. AREA KOFFIE adalah tempat untuk menikmati waktu santai, berbagi cerita, dan menciptakan momen-momen berharga bersama orang tersayang.</p>
                        <p class="text-lg">JL. Malkontemon, Depan Komplek Taman Citra, Banjarmasin Utara, Kalimantan Selatan. Datanglah untuk menikmati kelezatan, tinggallah untuk keindahan, dan pulanglah dengan kebahagiaan di hati Anda. AREA KOFFIE – di mana keindahan alam dan kenyamanan cita rasa bertemu.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Contact Section -->
        <section id="contact" class="py-16">
            <div class="container mx-auto px-4">
                <h2 class="text-3xl font-bold text-center mb-8">Contact Us</h2>
                <div class="flex flex-col md:flex-row">
                    <div class="md:w-1/2 mb-8 md:mb-0">
                        <form class="max-w-md mx-auto">
                            <div class="mb-4">
                                <label for="name" class="block mb-2">Name</label>
                                <input type="text" id="name" name="name" class="w-full px-3 py-2 bg-coffee-light text-white rounded" required>
                            </div>
                            <div class="mb-4">
                                <label for="email" class="block mb-2">Email</label>
                                <input type="email" id="email" name="email" class="w-full px-3 py-2 bg-coffee-light text-white rounded" required>
                            </div>
                            <div class="mb-4">
                                <label for="message" class="block mb-2">Message</label>
                                <textarea id="message" name="message" rows="4" class="w-full px-3 py-2 bg-coffee-light text-white rounded" required></textarea>
                            </div>
                            <button type="submit" class="bg-coffee-light text-white px-4 py-2 rounded hover:bg-opacity-80 transition">Send Message</button>
                        </form>
                    </div>
                    <div class="md:w-1/2 md:pl-8">
                        <h3 class="text-xl font-semibold mb-4">Visit Us</h3>
                        <p class="mb-2">123 Coffee Street, Java City</p>
                        <p class="mb-2">Phone: (123) 456-7890</p>
                        <p class="mb-4">Email: info@coffeeshop.com</p>
                        <h3 class="text-xl font-semibold mb-4">Opening Hours</h3>
                        <p class="mb-2">Monday - Friday: 7:00 AM - 8:00 PM</p>
                        <p class="mb-2">Saturday - Sunday: 8:00 AM - 9:00 PM</p>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- Footer -->
    <footer class="bg-coffee-light text-white py-6">
        <div class="container mx-auto px-4">
            <div class="flex flex-wrap justify-between items-center">
                <div class="w-full md:w-1/3 text-center md:text-left mb-4 md:mb-0">
                    <h3 class="text-lg font-semibold">Coffee Shop</h3>
                    <p class="mt-2 text-sm">Serving the best coffee since 2023</p>
                </div>
                <div class="w-full md:w-1/3 text-center mb-4 md:mb-0">
                    <h4 class="text-lg font-semibold mb-2">Quick Links</h4>
                    <a href="#menu" class="block hover:text-gray-300">Menu</a>
                    <a href="#about" class="block hover:text-gray-300">About</a>
                    <a href="#contact" class="block hover:text-gray-300">Contact</a>
                </div>
                <div class="w-full md:w-1/3 text-center md:text-right">
                    <h4 class="text-lg font-semibold mb-2">Follow Us</h4>
                    <div class="flex justify-center md:justify-end space-x-4">
                        <a href="#" class="text-white hover:text-gray-300">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                            </svg>
                        </a>
                        <a href="#" class="text-white hover:text-gray-300">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/>
                            </svg>
                        </a>
                        <a href="#" class="text-white hover:text-gray-300">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12 0C8.74 0 8.333.015 7.053.072 5.775.132 4.905.333 4.14.63c-.789.306-1.459.717-2.126 1.384S.935 3.35.63 4.14C.333 4.905.131 5.775.072 7.053.012 8.333 0 8.74 0 12s.015 3.667.072 4.947c.06 1.277.261 2.148.558 2.913.306.788.717 1.459 1.384 2.126.667.666 1.336 1.079 2.126 1.384.766.296 1.636.499 2.913.558C8.333 23.988 8.74 24 12 24s3.667-.015 4.947-.072c1.277-.06 2.148-.262 2.913-.558.788-.306 1.459-.718 2.126-1.384.666-.667 1.079-1.335 1.384-2.126.296-.765.499-1.636.558-2.913.06-1.28.072-1.687.072-4.947s-.015-3.667-.072-4.947c-.06-1.277-.262-2.149-.558-2.913-.306-.789-.718-1.459-1.384-2.126C21.319 1.347 20.651.935 19.86.63c-.765-.297-1.636-.499-2.913-.558C15.667.012 15.26 0 12 0zm0 2.16c3.203 0 3.585.016 4.85.071 1.17.055 1.805.249 2.227.415.562.217.96.477 1.382.896.419.42.679.819.896 1.381.164.422.36 1.057.413 2.227.057 1.266.07 1.646.07 4.85s-.015 3.585-.074 4.85c-.061 1.17-.256 1.805-.421 2.227-.224.562-.479.96-.899 1.382-.419.419-.824.679-1.38.896-.42.164-1.065.36-2.235.413-1.274.057-1.649.07-4.859.07-3.211 0-3.586-.015-4.859-.074-1.171-.061-1.816-.256-2.236-.421-.569-.224-.96-.479-1.379-.899-.421-.419-.69-.824-.9-1.38-.165-.42-.359-1.065-.42-2.235-.045-1.26-.061-1.649-.061-4.844 0-3.196.016-3.586.061-4.861.061-1.17.255-1.814.42-2.234.21-.57.479-.96.9-1.381.419-.419.81-.689 1.379-.898.42-.166 1.051-.361 2.221-.421 1.275-.045 1.65-.06 4.859-.06l.045.03zm0 3.678c-3.405 0-6.162 2.76-6.162 6.162 0 3.405 2.76 6.162 6.162 6.162 3.405 0 6.162-2.76 6.162-6.162 0-3.405-2.76-6.162-6.162-6.162zM12 16c-2.21 0-4-1.79-4-4s1.79-4 4-4 4 1.79 4 4-1.79 4-4 4zm7.846-10.405c0 .795-.646 1.44-1.44 1.44-.795 0-1.44-.646-1.44-1.44 0-.794.646-1.439 1.44-1.439.793-.001 1.44.645 1.44 1.439z"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
            <div class="mt-8 text-center text-sm">
                <p>&copy; 2023 Coffee Shop. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <!-- Modal -->
    <div id="modal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
        <div class="bg-coffee-light p-6 rounded-lg w-full max-w-3xl mx-4">
            <div class="relative">
                <img id="modalImage" src="" alt="" class="w-full h-auto max-h-[70vh] object-contain rounded-lg mb-4">
                <h3 id="modalTitle" class="text-xl font-bold mb-2 text-white"></h3>
                <p id="modalDescription" class="text-gray-300 mb-4"></p>
                <button onclick="closeModal()" class="absolute top-2 right-2 text-gray-300 hover:text-white">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <script>
        function openModal(title, description, imageSrc) {
            const modal = document.getElementById('modal');
            const modalTitle = document.getElementById('modalTitle');
            const modalDescription = document.getElementById('modalDescription');
            const modalImage = document.getElementById('modalImage');
            
            modalTitle.textContent = title;
            modalDescription.textContent = description;
            modalImage.src = imageSrc;
            modal.classList.remove('hidden');
            modal.classList.add('flex');
        }

        function closeModal() {
            const modal = document.getElementById('modal');
            modal.classList.add('hidden');
            modal.classList.remove('flex');
        }

        document.getElementById('modal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeModal();
            }
        });

        function toggleMenu() {
            const menu = document.getElementById('menu');
            menu.classList.toggle('hidden');
        }
    </script>
</body>
</html>
