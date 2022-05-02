<div class="table-responsive">
    <table class="table" id="vehicles-table">
        <thead>
        <tr>
        <th>Name</th>
        <th>Type </th>
        <th>Tires</th>
        <th>Power</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($vehicles as $vehicle)
            <tr>
                <td>{{ $vehicle->name }}</td>
            <td>{{$typeItems[ $vehicle->type_id]??'' }}</td>
            <td>{{ $vehicle->tires }}</td>
            <td>{{ $vehicle->power }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['vehicles.destroy', $vehicle->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('vehicles.show', [$vehicle->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('vehicles.edit', [$vehicle->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-edit"></i>
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
