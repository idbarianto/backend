
<table class="table table-bordered">
    <thead>
        <tr>
            <th class="text-center">No.</th>
            <th class="text-center">Request Date</th>
            <th class="text-center">Vehicle</th>
            <th class="text-center">Driver</th>
            <th class="text-center">Description</th>
            <th class="text-center">Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $key => $obj)
            <tr>
                <td class="text-center">
                    {{ ++$key }}
                </td>
                <td>
                    {{ date('j F Y', strtotime($obj->request_date)) }}
                </td>
                <td>
                    {{ $obj->vehicle->name }}
                </td>
                <td>
                    {{ $obj->driver->name }}
                </td>
                <td>
                    {{ $obj->description }}
                </td>
                <td>
                    {{ $obj->request_status }}
                </td>
            </tr>
        @endforeach
    </tbody>
</table>