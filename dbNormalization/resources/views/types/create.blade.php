<x-app>

    @push('meta-title')
        <title>Create New Group</title>
    @endpush

    <div class="container mt-5">
        <form method="POST" action="{{ route('group.type.store') }}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="group">Choose Group Name: </label>
                <select class="form-control col-md-6 overflow-y" name="group_id">
                    @forelse ($groups as $group)
                        <option value="{{ $group->id }}">{{ $group->name }}</option>
                    @empty
                        <option disabled>No Groups Found</option>
                    @endforelse
                </select>

                @error('group_id')
                    <p class="text-danger text-sm my-0">{{ $message }}</p>
                @enderror

                <label for="type" class="mt-4">Enter Group Type Name: </label>
                <input type="text" class="form-control" name="name" value="{{ old('name') }}"
                    placeholder="Enter Group Type Name Here..." autofocus>

                @error('name')
                    <p class="text-danger text-sm my-0">{{ $message }}</p>
                @enderror

                <label for="type" class="mt-4">Enter Group Type Description: </label>
                <input type="text" class="form-control" name="description" value="{{ old('description') }}"
                    placeholder="Enter Group Type Description Here..." autofocus>

                @error('description')
                    <p class="text-danger text-sm my-0">{{ $message }}</p>
                @enderror

                <button type="submit" class="btn btn-primary px-5 my-4">Submit</button>
            </div>
        </form>
    </div>

</x-app>
