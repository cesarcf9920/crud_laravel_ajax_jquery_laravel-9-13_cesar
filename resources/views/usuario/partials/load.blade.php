<table class="table table-hover table-striped fs12">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Company</th>
            <th>Calle</th>
            <th>Latitud</th>
            <th>longitud</th>
            <th style="width:150px;max-width: 150px;min-width: 150px;">Opciones</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($usuarios as $usuario)
        <tr>
            <td>{{ $usuario->name }}</td>
            <td>{{ $usuario->phone }}</td>
            <td>{{ $usuario->email }}</td>
            <td>{{ $usuario->compañia }}</td> 
            <td>{{ $usuario->street }}</td>
            <td>{{ $usuario->lat }}</td> 
            <td>{{ $usuario->lng }}</td> 
            <td>
                <a title="Detalle"  data-name="{{ $usuario->name }}" href="{{ route('usuario.show', $usuario->id) }}" class="btn btn-default show-entity  pl10 pr10 btn-show">
                    <i class="fa fa-lg fa-info"></i>
                </a>
                <a title="Editar" data-name="{{ $usuario->name }}"  href="{{ route('usuario.edit', $usuario->id) }}" class="btn btn-default edit-entity pl5 pr5 btn-edit">
                    <i class="fa fa-lg fa-pencil"></i>
                </a>
                <a title="Eliminar" data-name="{{ $usuario->name }}" data-id="{{$usuario->id }}" href="\#" class="btn btn-danger delete-entity pl5 pr5 btn-delete">
                    <i class="fa fa-lg fa-trash"></i>
                </a>                
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="4" class="text-center text-muted"><span>No se encontraron resultados</span></td>
        </tr>
        @endforelse
    </tbody>
    <tfoot>
        <tr class="bg-light">
        </tr>
    </tfoot>
</table>
