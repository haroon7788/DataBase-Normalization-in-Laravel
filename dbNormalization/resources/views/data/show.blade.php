<x-app-without-search>

    @push('meta-title')
        <title>DB Data Normalization</title>
    @endpush

    <div class="flex flex-col">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-blue-100">
                            <tr>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-s font-medium text-black font-bold uppercase tracking-wider">
                                    id</th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-s font-medium text-black font-bold uppercase tracking-wider">
                                    User</th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-s font-medium text-black font-bold uppercase tracking-wider">
                                    Group</th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-s font-medium text-black font-bold uppercase tracking-wider">
                                    Data</th>
                            </tr>
                        </thead>

                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($groupUsers as $groupUser)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm font-bold text-black">{{ $groupUser->id }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm font-medium text-gray-700">
                                            {{ $users->where('id', $groupUser->user_id)->pluck('name')->first() }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm font-medium text-gray-700">
                                            {{ optional($groups->find($groupUser->group_id))->name }}
                                            {{-- optional() is not required here as $group will find foreign key based record, which always exists. --}}
                                            {{-- Or we can use where() instead of find() --}}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        @forelse ($groupUser->group_user_data as $data)
                                            <div class="text-sm font-medium text-gray-700">
                                                {{-- {{ $groups->find($groupUser->group_id)->group_types()->pluck('name') }}: --}}
                                                <span class="font-bold text-black">
                                                    {{ optional($groupTypes->find($data->group_type_id))->name }} :
                                                </span>
                                                {{ $data->value }}
                                            </div>
                                        @empty
                                            <div class="text-sm font-medium text-red-600">
                                                No Record Entered.
                                            </div>
                                        @endforelse
                                    </td>
                                </tr>
                            @endforeach

                            <!-- More people... -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</x-app-without-search>
