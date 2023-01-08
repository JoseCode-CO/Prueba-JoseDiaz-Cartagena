<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>index</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col col-12">
                <div class="pt-4 float-right">
                    <a class="btn btn-sm btn-danger" href={{ route('activity.create') }}>Agregar nueva
                        actividad<span></span></a>
                </div>
            </div>
        </div>
    </div>

    @if (sizeof($activitys) === 0)
        <div class="container pt-2 ">
            <div class="row">
                <div class="col-sm-8 mx-auto mt-2">
                    <div class="alert alert-danger" role="alert">
                        No hay actividades registradas por favor crea uno
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if (sizeof($activitys) > 0)
        <div class="container-fluid">
            <h3>Lista de actividades</h3>

            <div class="row pt-2">
                <div class="col-12  mt-2">
                    <div class="card border-2 shadow">
                        <div class="card-body">
                            <table class="table thead-dark">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Consecutivo</th>
                                        <th>Nombre</th>
                                        <th>Derechos culturales</th>
                                        <th>Nac</th>
                                        <th>Fecha</th>
                                        <th>Hora inicio</th>
                                        <th>Hora final</th>
                                        <th>Experticia</th>
                                        <th>Fecha base de datos</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($activitys as $activity)
                                        <tr>
                                            <th>{{ $activity->id }}</th>
                                            <td>{{ $activity->consecutive }}</td>
                                            <td>{{ $activity->activity_name }}</td>
                                            <td>{{ $activity->culturalRight->name }}</td>
                                            <td>{{ $activity->nac->name }}</td>
                                            <td>{{ $activity->activity_date }}</td>
                                            <td>{{ $activity->start_time }}</td>
                                            <td>{{ $activity->final_hour }}</td>
                                            <td>{{ $activity->expertise->name }}</td>
                                            <td>{{ $activity->created_at->format('Y-m-d') }}</td>
                                            <td>
                                                <a href="{{ route('activity.edit', $activity->id) }}" type="button"
                                                    class="btn btn-warning btn-sm">Editar</a>
                                                <form action="{{ route('activity.delete', $activity->id) }}"
                                                    class="d-inline" method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button class="btn btn-sm  btn-outline-danger"
                                                        type="submit">Eliminar</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</body>

</html>
