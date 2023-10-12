<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('User') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            </div>
            <div class="mb-10">
                {{-- Button Create --}}
            </div>
            <div class="shadow overflow-hidden sm-rounded -md">
                <div class="px-4 py-5 bg-white sm:p-6">
                    <table id="crudTable">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Roles</th>
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
                    {data:'name', name:'name'},
                    {data:'email', name:'email'},
                    {data:'roles', name:'roles'},
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
