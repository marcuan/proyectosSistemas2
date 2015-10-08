	< table >
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Existencia</th>
                <th>precio</th>
               
            </tr>
        </thead>
 
                   <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Existencia</th>
                <th>precio</th>
                
            </tr>
       
               	@foreach($materiaprima as $dato)
            <tr>
                <td>{{ $dato->id}}</td>
                <td>{{ $dato->nombre}}</td>
                <td>{{ $dato->existencia}}</td>
                <td>width="50" </td>
	   <a hrf="" class="btn btn-info"	>
	   ver
	   </a>
            </tr>
            @endforeach 
       
    </table>
