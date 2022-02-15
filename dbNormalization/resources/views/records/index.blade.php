<x-app>

    @push('meta-title')
        <title>DB Data Normalization</title>
    @endpush

    <div class="row col-md-10 m-auto">
        <table class="table table-striped border table-border table-sm">
            <thead class="table-dark">
                <tr>
                    <th>#ID</th>
                    <th>Group Name</th>
                    <th class="text-center">Edit</th>
                    <th class="text-center">Delete</th>
                </tr>
            </thead>
            <tbody class="table-light">
                @forelse ($groups as $group)
                    <tr>
                        <td>{{ $group->id }}</td>
                        <td>{{ $group->name }}</td>
                        <td class="text-center" width="80px">
                            <a href="{{ route('group.edit', $group->id) }}" class="text-info">
                                <i class="fa fa-edit" aria-hidden="true"></i>
                            </a>
                        </td>
                        <td class="text-center" width="80px">
                            <button class="bg-transparent border-0">
                                <a href="{{ route('group.delete', $group->id) }}">
                                    <i class="fa fa-trash text-danger" aria-hidden="true"></i>
                                </a>
                            </button>
                        </td>
                    </tr>
                @empty
                    <tr class="bg-danger text-center text-light">
                        <td colspan="4">
                            <h2 class="py-5">No Record Found.</h2>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{ $groups->links() }}

</x-app>
