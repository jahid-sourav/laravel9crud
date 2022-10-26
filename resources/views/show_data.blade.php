<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Show Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body>
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="mb-2">
                        <a href="{{ route('data.add') }}" class="btn btn-primary shadow-none">Add Data</a>
                    </div>
                    @if(Session::has('msg'))
                        <div>
                            <p class="alert alert-success d-inline-block">{{ Session::get('msg') }}</p>
                        </div>
                    @endif
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nmae</th>
                            <th scope="col">Email</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(count($showData)>0)
                            @foreach($showData as $key=>$data)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $data->name }}</td>
                                    <td>{{ $data->email }}</td>
                                    <td>
                                        <a href="{{ route('data.edit',$data->id) }}" class="btn btn-success btn-sm">Edit</a>
                                        <a href="{{ route('data.delete',$data->id) }}" onclick="return confirm('Delete It?')" class="btn btn-danger ms-2 btn-sm">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <h3 class="text-danger text-center">No Data Available</h3>
                        @endif
                        </tbody>
                    </table>
                    {{ $showData->links() }}
                </div>
            </div>
        </div>
    </section>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>
