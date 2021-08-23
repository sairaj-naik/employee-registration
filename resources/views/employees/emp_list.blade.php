<table class="table">
<tr>
<th scope="col">Id</th>
<th scope="col">Name</th>
<th scope="col">Address</th>
<th scope="col">Email</th>
<th scope="col"> Phone</th>
<th scope="col">Position</th>
<th scope="col">Resume</th>
<th scope="col"></th>
</tr>
@foreach ($employee as $emp)
<tr>
<td>{{ $emp->id }}</td>
<td>{{ $emp->name }}</td>
<td>{{ $emp->Address }}</td>
<td><a href="mailto:{{ $emp->email }}">{{ $emp->email }}</a></td>
<td><a href="tel:{{ $emp->phone }}">{{ $emp->phone }}</a></td>
<td>{{ $emp->Position }}</td>
<td><a target="_blank" href="{{ route('public',$emp->resume) }}" download="{{ $emp->resume }}">Resume</a></td>
<td> 
    <div class="flex justify-content-between">
        <span class="material-icons">
            <a href="{{ url('edit/'.$emp->id) }}">edit </a> 
        </span>
        <span class="material-icons">
            <a href="{{ url('delete/'.$emp->id) }}">    
                delete_forever
            </a>
        </span>
    </div>
</td>
</tr>
@endforeach
</table>