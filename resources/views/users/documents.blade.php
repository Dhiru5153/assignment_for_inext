<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="container mx-auto p-4">
                        <h2 class="text-2xl font-bold mb-4">Upload Multiple Documents</h2>

                        <!-- Success/Error Message -->
                        @if(session('success'))
                            <div class="bg-green-100 text-green-800 p-2 rounded mb-4">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if($errors->any())
                            <div class="bg-red-100 text-red-800 p-2 rounded mb-4">
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>• {{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <!-- Upload Form -->
                        <form method="POST" action="{{ route('documents.store') }}" enctype="multipart/form-data" id="uploadForm">
                            @csrf

                            <input 
                                type="file" 
                                name="documents[]" 
                                id="documents" 
                                multiple 
                                class="block w-full mb-4 p-2 border border-gray-300 rounded"
                                accept=".pdf,.doc,.docx,.xlsx,.jpg,.jpeg,.png"
                            >

                            <!-- Preview List -->
                            <ul id="fileList" class="mb-4 space-y-2"></ul>

                            <!-- Submit -->
                            <x-primary-button class="ms-3">
                                {{ __('Upload') }}
                            </x-primary-button>
                            {{-- <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                                Upload
                            </button> --}}

                            <!-- Optional Progress Bar -->
                            <div id="progressContainer" class="mt-4 hidden">
                                <div class="w-full bg-gray-300 rounded-full h-4">
                                    <div id="progressBar" class="bg-blue-600 h-4 rounded-full" style="width: 0%;"></div>
                                </div>
                                <p id="progressText" class="text-sm mt-1 text-gray-700">Uploading...</p>
                            </div>
                        </form>
                    </div>

                    <script>
                        const fileInput = document.getElementById('documents');
                        const fileList = document.getElementById('fileList');
                        const form = document.getElementById('uploadForm');
                        const maxFileSize = 50 * 1024 * 1024; // 50 MB

                        fileInput.addEventListener('change', () => {
                            fileList.innerHTML = '';
                            const files = Array.from(fileInput.files);

                            files.forEach((file, index) => {
                                if (file.size > maxFileSize) {
                                    alert(`File "${file.name}" exceeds 50MB limit and will not be uploaded.`);
                                    fileInput.value = '';
                                    return;
                                }

                                const listItem = document.createElement('li');
                                listItem.className = 'flex justify-between items-center p-2 bg-gray-100 rounded';
                                listItem.innerHTML = `
                                    <span class="text-sm truncate">${file.name} (${(file.size / (1024 * 1024)).toFixed(2)} MB)</span>
                                    <button type="button" class="text-red-500 ml-2" onclick="removeFile(${index})">Remove</button>
                                `;
                                fileList.appendChild(listItem);
                            });
                        });

                        // Remove file function
                        function removeFile(index) {
                            const dt = new DataTransfer();
                            const files = Array.from(fileInput.files);
                            files.splice(index, 1);
                            files.forEach(file => dt.items.add(file));
                            fileInput.files = dt.files;
                            fileInput.dispatchEvent(new Event('change'));
                        }

                        // Optional: Show progress bar
                        form.addEventListener('submit', function(e) {
                            const progressContainer = document.getElementById('progressContainer');
                            const progressBar = document.getElementById('progressBar');
                            const progressText = document.getElementById('progressText');

                            progressContainer.classList.remove('hidden');

                            const xhr = new XMLHttpRequest();
                            xhr.open('POST', form.action, true);
                            xhr.upload.onprogress = function(e) {
                                if (e.lengthComputable) {
                                    const percent = (e.loaded / e.total) * 100;
                                    progressBar.style.width = percent + '%';
                                    progressText.innerText = `Uploading... ${Math.round(percent)}%`;
                                }
                            };
                            xhr.onload = function() {
                                if (xhr.status === 200) {
                                    progressText.innerText = 'Upload successful!';
                                    location.reload();
                                } else {
                                    progressText.innerText = 'Upload failed!';
                                }
                            };

                            const formData = new FormData(form);
                            xhr.send(formData);
                            e.preventDefault();
                        });
                    </script>
                        {{-- <form method="POST" action="{{ route('documents.store') }}" enctype="multipart/form-data">
                            @csrf

                            <label for="documents" class="block mb-2 font-medium">Upload Documents</label>
                            <input 
                                type="file" 
                                name="documents[]" 
                                id="documents" 
                                multiple 
                                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50">

                            @error('documents.*')
                                <div class="text-red-500 mt-1">{{ $message }}</div>
                            @enderror --}}
                            {{-- <button type="submit" class="mt-4 bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                                Upload
                            </button> --}}
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
