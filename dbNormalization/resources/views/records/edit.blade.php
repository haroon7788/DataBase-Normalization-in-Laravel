<x-app>

    @push('meta-title')
        <title>Edit Group Name</title>
    @endpush
    <div class="container mt-5">
        <form method="POST" action="{{ route('group.update', $groups->id) }}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Enter Group Name: </label>
                <input type="text" class="form-control" name="name" value="{{ $groups->name }}" placeholder="Enter Group Name Here..." autofocus>

                {{-- old() will refill the form old value if there occurs a validation error. --}}
                {{-- $message is given by laravel to display error message --}}
                {{-- message will be generated through controller in store data validation --}}
                @error('name')
                    <p class="text-danger text-sm">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary px-5">Submit</button>
        </form>
    </div>

</x-app>
