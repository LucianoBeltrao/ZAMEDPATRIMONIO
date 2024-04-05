<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <table  class="w-full border-collapse bg-secondary-100">
        <thead>
            <tr class="bg-primary-500">
                <th class="p-4 cursor-pointer" x-on:click="sortBy('name')">Departamento</th>
            </tr>
        </thead>
        <tbody>
            @foreach($departments as $department)
            <tr class="border-b border-primary-500">
                <td class="px-4 py-4">{{ $department->name}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
