<div>    
    <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
        <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
            <table class="min-w-full leading-normal">
                <thead>
                    <tr>
                        <th
                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Name
                        </th>
                        <th
                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-xs font-semibold text-gray-600 uppercase tracking-wider text-center">
                            Action
                        </th>
                        <th
                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-xs font-semibold text-gray-600 uppercase tracking-wider text-center">
                            Model
                        </th>
                        <th
                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-xs font-semibold text-gray-600 uppercase tracking-wider text-center">
                            Id model
                        </th>
                        <th
                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-xs font-semibold text-gray-600 uppercase tracking-wider text-center">
                            User
                        </th>
                        <th
                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-xs font-semibold text-gray-600 uppercase tracking-wider text-center">
                            Date
                        </th>
                        <th
                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-xs font-semibold text-gray-600 uppercase tracking-wider text-center">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($items as $i)
                        <tr>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 w-10 h-10">
                                        <p class="text-gray-900 whitespace-no-wrap">
                                            {{$i->log_name}}
                                        </p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-center">
                                <p class="text-gray-900 whitespace-no-wrap">
                                    @if ($i->description == 'created')
                                        <span class="bg-red-400 text-white mt-4" role="alert"></span>
                                    @elseif ($i->description == 'created')
                                        <span class="bg-red-400 text-white mt-4" role="alert"></span>
                                    @elseif ($i->description == 'created')
                                        <span class="bg-red-400 text-white mt-4" role="alert"></span>
                                    @else
                                        <span class="bg-red-400 text-white mt-4" role="alert"></span>
                                    @endif
                                            {{$i->description}}
                                        </span>
                                </p>
                            </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-center">
                                <p class="text-gray-900 whitespace-no-wrap">
                                    {{$i->subject_type}}
                                </p>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-center">
                                <p class="text-gray-900 whitespace-no-wrap">
                                    {{$i->subject_id}}
                                </p>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-center">
                                <p class="text-gray-900 whitespace-no-wrap">
                                    {{\App\Models\User::select('name')->find($i->causer_id)->name ?? ''}}
                                </p>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-center">
                                <p class="text-gray-900 whitespace-no-wrap">
                                    {{\Carbon\Carbon::parse($i->created_at)->diffForhumans()}}
                                </p>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-center">
                                <a href="javascript:alert('{{$i->properties}}')">Detail</a>
                            </td>
                        </tr>
                    @empty
                    @endforelse
                </tbody>
            </table>
        </div>
        {{$items->links()}}
    </div>
</div>