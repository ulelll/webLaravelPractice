<x-admin-layout>
    <!-- Start coding here -->
    <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
        <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
            <div class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
                <a href="/admin/students/create" class="flex items-center justify-center text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">
                    <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path clip-rule="evenodd" fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z"/>
                    </svg>
                    Add Student
                </a>

            </div>

            <div class="w-full md:w-1/2">
                <form class="flex items-center">
                    <label for="simple-search" class="sr-only">Search</label>
                    <div class="relative w-full">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor"
                                 viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                      d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                      clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <input type="text" id="simple-search"
                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                               placeholder="Search" required="">
                    </div>
                </form>
            </div>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-4 py-3">No</th>
                    <th scope="col" class="px-4 py-3">Name</th>
                    <th scope="col" class="px-4 py-3">Grade</th>
                    <th scope="col" class="px-4 py-3">Email</th>
                    <th scope="col" class="px-4 py-3">Phone</th>
                    <th scope="col" class="px-4 py-3">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($students as $student)
                    <tr class="border-b dark:border-gray-700">
                        <td class="py-3 px-4">{{ $student->id }}</td>
                        <td class="py-3 px-4">{{ $student->name }}</td>
                        <td class="py-3 px-4">{{ $student->grade->name }}</td>
                        <td class="py-3 px-4">{{ $student->email }}</td>
                        <td class="py-3 px-4">{{ $student->telepon }}</td>
                        <td class="py-3 px-4 flex space-x-4">

                            <button
                                id="modalDetail"
                                class="modalDetailBtn"
                                data-name="{{ $student->name }}"
                                data-grade="{{ $student->grade->name }}"
                                data-email="{{ $student->email }}"
                                data-phone="{{ $student->telepon }}"
                                data-address="{{ $student->address }}"
                                data-modal-target="readStudentModal"
                                data-modal-toggle="readStudentModal"
                                type="button">
                                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-width="1" d="M21 12c0 1.2-4.03 6-9 6s-9-4.8-9-6c0-1.2 4.03-6 9-6s9 4.8 9 6Z"/>
                                    <path stroke="currentColor" stroke-width="1" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                                </svg>
                            </button>

                            <a href="/admin/students/edit/{{ $student->id }}">
                                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z"/>
                                </svg>
                            </a>

                            <button id="deleteButton" data-id="{{ $student->id }}" class="text-red-600 hover:text-red-800">
                                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z"/>
                                </svg>
                            </button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <nav class="flex flex-col md:flex-row justify-between items-start md:items-center space-y-3 md:space-y-0 p-4"
             aria-label="Table navigation">
                <span class="text-sm font-normal text-gray-500 dark:text-gray-400">
                    Showing
                    <span class="font-semibold text-gray-900 dark:text-white">1-10</span>
                    of
                    <span class="font-semibold text-gray-900 dark:text-white">1000</span>
                </span>
            <ul class="inline-flex items-stretch -space-x-px">
                <li>
                    <a href="#"
                       class="flex items-center justify-center h-full py-1.5 px-3 ml-0 text-gray-500 bg-white rounded-l-lg border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                        <span class="sr-only">Previous</span>
                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewbox="0 0 20 20"
                             xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                  d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                  clip-rule="evenodd"/>
                        </svg>
                    </a>
                </li>
                <li>
                    <a href="#"
                       class="flex items-center justify-center text-sm py-2 px-3 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">1</a>
                </li>
                <li>
                    <a href="#"
                       class="flex items-center justify-center text-sm py-2 px-3 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">2</a>
                </li>
                <li>
                    <a href="#" aria-current="page"
                       class="flex items-center justify-center text-sm z-10 py-2 px-3 leading-tight text-primary-600 bg-primary-50 border border-primary-300 hover:bg-primary-100 hover:text-primary-700 dark:border-gray-700 dark:bg-gray-700 dark:text-white">3</a>
                </li>
                <li>
                    <a href="#"
                       class="flex items-center justify-center text-sm py-2 px-3 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">...</a>
                </li>
                <li>
                    <a href="#"
                       class="flex items-center justify-center text-sm py-2 px-3 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">100</a>
                </li>
                <li>
                    <a href="#"
                       class="flex items-center justify-center h-full py-1.5 px-3 leading-tight text-gray-500 bg-white rounded-r-lg border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                        <span class="sr-only">Next</span>
                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewbox="0 0 20 20"
                             xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                  d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                  clip-rule="evenodd"/>
                        </svg>
                    </a>
                </li>
            </ul>
        </nav>
    </div>

    <!-- Student detail modal -->
    <div id="readStudentModal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
        <div class="relative p-4 w-full max-w-xl h-full md:h-auto">
            <!-- Modal content -->
            <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                <!-- Modal header -->
                <dl>
                    <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">Name</dt>
                    <dd id="modalName" class="mb-4 font-light text-gray-500 sm:mb-5 dark:text-gray-400"></dd>

                    <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">Grade</dt>
                    <dd id="modalGrade" class="mb-4 font-light text-gray-500 sm:mb-5 dark:text-gray-400"></dd>

                    <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">Email</dt>
                    <dd id="modalEmail" class="mb-4 font-light text-gray-500 sm:mb-5 dark:text-gray-400"></dd>

                    <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">Phone</dt>
                    <dd id="modalPhone" class="mb-4 font-light text-gray-500 sm:mb-5 dark:text-gray-400"></dd>

                    <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">Address</dt>
                    <dd id="modalAddress" class="mb-4 font-light text-gray-500 sm:mb-5 dark:text-gray-400"></dd>
                </dl>
                <div class="flex justify-between items-center">
                    <div class="flex items-center space-x-3 sm:space-x-4">
                        <a type="button" href="/admin/students/edit/{{ $student->id }}" class="text-white inline-flex items-center bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                            <svg aria-hidden="true" class="mr-1 -ml-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"></path><path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd"></path></svg>
                            Edit
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Konfirmasi Hapus -->
    <div id="deleteModal" class="fixed inset-0 z-50 hidden flex justify-center items-center bg-gray-800 bg-opacity-50">
        <div class="bg-white p-6 rounded-lg shadow-lg max-w-sm w-full">
            <h3 class="text-lg font-semibold text-gray-800">Apakah anda yakin untuk menghapus data siswa?</h3>
            <p class="text-sm text-gray-600 mt-2">Data tidak bisa dikembalikan setelah dihapus.</p>
            <div class="mt-4 flex justify-end space-x-4">
                <!-- Tombol Cancel -->
                <button id="cancelDelete" class="px-4 py-2 bg-gray-300 text-gray-800 rounded-md hover:bg-gray-400">Batal</button>
                <!-- Tombol Confirm -->
                <button id="confirmDelete" class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700">Hapus</button>
            </div>
        </div>
    </div>

    <!-- Form for DELETE Request -->
    <form id="deleteForm" action="/admin/students/delete/{{ $student->id }}" method="POST" style="display:none;">
        @csrf
        @method('DELETE')
    </form>

    <!-- Modal will be shown when user clicks the delete button -->


    <script>
        //script untuk detail modal
        document.addEventListener("DOMContentLoaded", function(event) {
            // document.getElementById('modalDetail').click();
            // Ambil semua tombol dengan kelas .modalDetailBtn
            const modalDetailBtns = document.querySelectorAll('.modalDetailBtn');

            // Ambil modal dan elemen-elemen dalam modal untuk diisi
            const modal = document.getElementById('readStudentModal');
            const modalName = document.getElementById('modalName');
            const modalGrade = document.getElementById('modalGrade');
            const modalEmail = document.getElementById('modalEmail');
            const modalPhone = document.getElementById('modalPhone');
            const modalAddress = document.getElementById('modalAddress');

            modalDetailBtns.forEach(button => {
                button.addEventListener('click', function() {
                    // Ambil data dari atribut data-* pada tombol yang diklik
                    const name = button.getAttribute('data-name');
                    const grade = button.getAttribute('data-grade');
                    const email = button.getAttribute('data-email');
                    const phone = button.getAttribute('data-phone');
                    const address = button.getAttribute('data-address');

                    // Isi modal dengan data yang diambil
                    modalName.textContent = name;
                    modalGrade.textContent = grade;
                    modalEmail.textContent = email;
                    modalPhone.textContent = phone;
                    modalAddress.textContent = address;

                    // Tampilkan modal
                    modal.classList.remove('hidden');
                });
            });

            // Menutup modal jika klik di luar area modal
            modal.addEventListener('click', function(event) {
                if (event.target === modal) {
                    modal.classList.add('hidden');
                }
            });
        });

        //script untuk modal delete
        // Ambil elemen modal dan tombol delete
        const deleteModal = document.getElementById('deleteModal');
        const deleteButton = document.getElementById('deleteButton');
        const confirmDeleteButton = document.getElementById('confirmDelete');
        const cancelDeleteButton = document.getElementById('cancelDelete');

        // Variable untuk menyimpan ID yang ingin dihapus
        let studentIdToDelete = null;

        // Ketika tombol delete ditekan
        deleteButton.addEventListener('click', function () {
            // Menyimpan ID siswa yang ingin dihapus
            studentIdToDelete = deleteButton.getAttribute('data-id');
            // Menampilkan modal
            deleteModal.classList.remove('hidden');
        });

        // Ketika tombol cancel ditekan
        cancelDeleteButton.addEventListener('click', function () {
            // Menutup modal tanpa menghapus data
            deleteModal.classList.add('hidden');
        });

        // Ketika tombol confirm ditekan
        confirmDeleteButton.addEventListener('click', function () {
            // Mengisi form action dengan ID siswa
            const form = document.getElementById('deleteForm');
            form.action = '/admin/students/delete/' + studentIdToDelete;

            // Submit form untuk menghapus data
            form.submit();
        });

    </script>
</x-admin-layout>
