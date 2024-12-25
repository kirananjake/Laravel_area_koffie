<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coffee Menu</title>
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
<body class="bg-coffee-dark text-white">
    <!-- Navbar -->
    <nav class="bg-coffee-light p-4">
        <div class="container mx-auto flex justify-between items-center">
            <div class="text-xl font-bold">Coffee Shop</div>
            <div class="space-x-4">
                <a href="#" class="hover:text-gray-300">Menu</a>
                <a href="#" class="hover:text-gray-300">About</a>
                <a href="#" class="hover:text-gray-300">Contact</a>
            </div>
        </div>
    </nav>

    <!-- Main Menu Container -->
    <div class="container mx-auto p-4 max-w-3xl">
        @foreach ($categories as $category)
        <!-- Section Title -->
        <h2 class="text-2xl font-bold text-center mb-6 text-white">{{ $category->nama_kategori }}</h2>
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4 mb-8">
            @foreach ($category->menus as $menu)
            <div class="cursor-pointer" onclick="openModal('{{ $menu->nama_menu }}', '{{ $menu->deskripsi }}', '{{ asset('storage/' . $menu->foto) }}')">
                <div class="bg-coffee-light rounded-lg p-2 hover:shadow-lg transition">
                    <img src="{{ asset('storage/' . $menu->foto) }}" alt="{{ $menu->nama_menu }}" class="w-full h-24 object-cover rounded mb-2">
                    <p class="text-white text-center text-sm">{{ $menu->nama_menu }}</p>
                </div>
            </div>
            @endforeach
        </div>
        @endforeach
    </div>

    <!-- Modal -->
    <div id="modal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center">
        <div class="bg-coffee-light p-6 rounded-lg max-w-md w-full mx-4">
            <div class="relative">
                <img id="modalImage" src="" alt="" class="w-full h-48 object-cover rounded-lg mb-4">
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
    </script>
</body>
</html>
