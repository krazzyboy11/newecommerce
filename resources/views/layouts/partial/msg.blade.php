@if ($errors->any())


    @foreach ($errors->all() as $error)

        <div class="alert alert-danger alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            Oh snap! {{ $error }}
        </div>
    @endforeach


@endif

@if(session('successMsg'))
    <div class="alert alert-success alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        {{session('successMsg')}}
    </div>
@endif