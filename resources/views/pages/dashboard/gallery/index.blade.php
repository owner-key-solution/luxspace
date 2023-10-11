<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Product &raquo; Gallery
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            </div>
            <div class="mb-10">
                <a class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded shadow-lg" href="{{ route('dashboard.product.gallery.create',$product->id) }}">+ Upload Photos</a>
            </div>
            <div class="shadow overflow-hidden sm-rounded -md">
                <div class="px-4 py-5 bg-white sm:p-6">
                    <table id="crudTable">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Photo</th>
                                <th>Featured</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <x-slot name="script">
        <script>
            // AJAX DataTables
            var datatable = $('#crudTable').DataTable({
                ajax: {
                    url: '{!!url()->current()!!}'
                },
                columns: [
                    {data:'id', name:'id', width:'5%'},
                    {data:'url', name:'url'},
                    {data:'is_featured', name:'is_featured'},
                    {
                        data:'action',
                        name:'action',
                        orderable: false,
                        searchable: false,
                        width:'25%'
                    }
                ]
            })
        </script>
    </x-slot>
</x-app-layout>