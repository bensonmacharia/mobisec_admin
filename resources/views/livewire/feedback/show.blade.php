<div>
    <table class="table-auto w-full">
        <thead>
            <tr>
                <th class="px-4 py-2">#</th>
                <th class="px-4 py-2">User</th>
                <th class="px-4 py-2">Feedback</th>
                <th class="px-4 py-2">Logged By</th>
                <th class="px-4 py-2">Date Logged</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($list as $key=>$item)
            <tr @if($loop->even)class="bg-grey"@endif>
                <td class="border px-4 py-2">{{ $loop->iteration }}</td>
                <td class="border px-4 py-2">{{ $item->user_name }}</td>
                <td class="border px-4 py-2">{{ $item->information }}</td>
                <td class="border px-4 py-2">{{ $item->name }}</td>
                <td class="border px-4 py-2">{{ $item->created_at }}</td>              
            </tr>
            @endforeach
        </tbody>
    </table>

</div>