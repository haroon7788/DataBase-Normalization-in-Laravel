<x-app>

    @push('meta-title')
        <title>DB Data Normalization</title>
    @endpush

    <div class="container col-md-10">
        <table class="table table-striped border table-border table-sm">
            <thead class="table-dark">
                <tr>
                    <th>#ID</th>
                    <th>Group Name</th>
                    <th>Group Type</th>
                    <th>Group Description</th>
                    <th class="text-center">Edit</th>
                    <th class="text-center">Delete</th>
                </tr>
            </thead>
            <tbody class="table-light">
                @forelse ($types as $type)
                    <tr>
                        <td>{{ $type->id }}</td>
                        <td>{{ $type->group->name . '(' . $type->group->id . ')' }}</td>
                        <td>{{ $type->name }}</td>
                        <td>{{ $type->description }}</td>
                        <td class="text-center" width="80px">
                            <a href="{{ route('group.type.edit', $type->id) }}" class="text-info">
                                <i class="fa fa-edit" aria-hidden="true"></i>
                            </a>
                        </td>
                        <td class="text-center" width="80px">
                            <button class="bg-transparent border-0">
                                <a href="{{ route('group.type.delete', $type->id) }}">
                                    <i class="fa fa-trash text-danger" aria-hidden="true"></i>
                                </a>
                            </button>
                        </td>
                    </tr>
                @empty
                    <tr class="bg-danger text-center text-light">
                        <td colspan="6">
                            <h2 class="py-5">No Record Found.</h2>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{ $types->links() }}

</x-app>
