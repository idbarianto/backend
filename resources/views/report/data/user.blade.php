
<table class="table table-bordered">
    <thead>
        <tr>
            <th class="text-center">No.</th>
            <th class="text-center">Name</th>
            <th class="text-center">Status</th>
            <th class="text-center">Create date</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $key => $obj)
            <tr>
                <td class="text-center">
                    {{ ++$key }}
                </td>
                <td>
                    {{ $obj->name }}
                </td>
                <td>
                    {{ $obj->email }}
                </td>
                <td class="text-center">
                    {{ $obj->role }}
                </td>
            </tr>
        @endforeach
    </tbody>
</table>