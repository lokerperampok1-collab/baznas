<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Kelola Kampanye</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 font-sans">
    <div class="min-h-screen">
        <!-- Navbar -->
        <nav class="bg-green-600 text-white shadow-lg">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex items-center">
                        <span class="text-xl font-bold">PURNO Admin Panel</span>
                    </div>
                    <div class="flex items-center space-x-4">
                        <a href="{{ url('/') }}" class="hover:text-green-200 transition">Lihat Website</a>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Main Content -->
        <main class="max-w-7xl mx-auto py-10 px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center mb-8">
                <h1 class="text-3xl font-extrabold text-gray-900">Kelola Paket Kurban</h1>
                <button onclick="openModal('modal-add')" class="bg-green-600 hover:bg-green-700 text-white px-6 py-2 rounded-lg shadow-md transition transform hover:scale-105">
                    <i class="fas fa-plus mr-2"></i> Tambah Paket
                </button>
            </div>

            @if(session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-8 rounded-r-lg shadow-sm animate-pulse">
                {{ session('success') }}
            </div>
            @endif

            <!-- Package Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($packages as $p)
                <div class="bg-white rounded-2xl shadow-xl overflow-hidden hover:shadow-2xl transition duration-300">
                    <div class="relative h-48">
                        <img src="{{ $p->image_url }}" alt="{{ $p->name }}" class="w-full h-full object-cover">
                        <div class="absolute top-4 right-4 flex space-x-2">
                            <button onclick="editPackage({{ $p }})" class="bg-blue-500 hover:bg-blue-600 text-white p-2 rounded-full shadow-lg transition">
                                <i class="fas fa-edit"></i>
                            </button>
                            <form action="{{ route('admin.purno.delete', $p->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white p-2 rounded-full shadow-lg transition">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                        <div class="absolute bottom-4 left-4">
                            <span class="px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider {{ $p->is_active ? 'bg-green-500 text-white' : 'bg-gray-500 text-white' }}">
                                {{ $p->is_active ? 'Aktif' : 'Non-Aktif' }}
                            </span>
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="flex justify-between items-start mb-2">
                            <h3 class="text-xl font-bold text-gray-800">{{ $p->name }}</h3>
                            <span class="bg-green-100 text-green-800 text-xs font-semibold px-2.5 py-0.5 rounded uppercase">{{ $p->type }}</span>
                        </div>
                        <p class="text-gray-600 text-sm mb-4 line-clamp-2">{{ $p->description }}</p>
                        <div class="flex items-center justify-between mt-auto">
                            <span class="text-2xl font-bold text-green-600">{{ $p->formatted_price }}</span>
                            <form action="{{ route('admin.purno.toggle', $p->id) }}" method="POST">
                                @csrf @method('PATCH')
                                <button type="submit" class="text-xs text-gray-500 hover:text-green-600 font-medium transition">
                                    {{ $p->is_active ? 'Non-aktifkan' : 'Aktifkan' }}
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </main>
    </div>

    <!-- Modal Add -->
    <div id="modal-add" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50 p-4">
        <div class="bg-white rounded-2xl shadow-2xl w-full max-w-lg overflow-hidden transform transition-all">
            <div class="px-8 py-6 bg-green-600 text-white flex justify-between items-center">
                <h2 class="text-2xl font-bold">Tambah Paket Baru</h2>
                <button onclick="closeModal('modal-add')" class="text-white hover:text-green-200 transition">
                    <i class="fas fa-times text-xl"></i>
                </button>
            </div>
            <form action="{{ route('admin.purno.store') }}" method="POST" enctype="multipart/form-data" class="p-8 space-y-6">
                @csrf
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Paket</label>
                    <input type="text" name="name" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent outline-none transition" required>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Harga</label>
                        <input type="number" name="price" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent outline-none transition" required>
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Jenis Kurban</label>
                        <select name="type" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent outline-none transition" required>
                            <option value="Domba">Domba</option>
                            <option value="Kambing">Kambing</option>
                            <option value="Sapi">Sapi</option>
                            <option value="Unta">Unta</option>
                            <option value="Lainnya">Lainnya</option>
                        </select>
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Deskripsi (Berat/Detail)</label>
                    <textarea name="description" rows="3" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent outline-none transition"></textarea>
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Foto Paket</label>
                    <input type="file" name="image" class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-green-50 file:text-green-700 hover:file:bg-green-100 transition" accept="image/*">
                </div>
                <div class="flex justify-end pt-4">
                    <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-8 py-3 rounded-lg font-bold shadow-lg transition transform hover:scale-105">
                        Simpan Paket
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal Edit -->
    <div id="modal-edit" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50 p-4">
        <div class="bg-white rounded-2xl shadow-2xl w-full max-w-lg overflow-hidden transform transition-all">
            <div class="px-8 py-6 bg-blue-600 text-white flex justify-between items-center">
                <h2 class="text-2xl font-bold">Edit Paket</h2>
                <button onclick="closeModal('modal-edit')" class="text-white hover:text-blue-200 transition">
                    <i class="fas fa-times text-xl"></i>
                </button>
            </div>
            <form id="edit-form" method="POST" enctype="multipart/form-data" class="p-8 space-y-6">
                @csrf
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Paket</label>
                    <input type="text" name="name" id="edit-name" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition" required>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Harga</label>
                        <input type="number" name="price" id="edit-price" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition" required>
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Jenis Kurban</label>
                        <select name="type" id="edit-type" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition" required>
                            <option value="Domba">Domba</option>
                            <option value="Kambing">Kambing</option>
                            <option value="Sapi">Sapi</option>
                            <option value="Unta">Unta</option>
                            <option value="Lainnya">Lainnya</option>
                        </select>
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Deskripsi</label>
                    <textarea name="description" id="edit-description" rows="3" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition"></textarea>
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Ganti Foto (Opsional)</label>
                    <input type="file" name="image" class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 transition" accept="image/*">
                </div>
                <div class="flex justify-end pt-4">
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-3 rounded-lg font-bold shadow-lg transition transform hover:scale-105">
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function openModal(id) {
            const modal = document.getElementById(id);
            modal.classList.remove('hidden');
            modal.classList.add('flex');
            document.body.style.overflow = 'hidden';
        }

        function closeModal(id) {
            const modal = document.getElementById(id);
            modal.classList.remove('flex');
            modal.classList.add('hidden');
            document.body.style.overflow = 'auto';
        }

        function editPackage(package) {
            const form = document.getElementById('edit-form');
            form.action = `/purno/update/${package.id}`;
            document.getElementById('edit-name').value = package.name;
            document.getElementById('edit-price').value = package.price;
            document.getElementById('edit-type').value = package.type;
            document.getElementById('edit-description').value = package.description;
            openModal('modal-edit');
        }

        // Close on escape
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') {
                closeModal('modal-add');
                closeModal('modal-edit');
            }
        });
    </script>
</body>
</html>
