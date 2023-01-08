<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Editar</title>
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-12 mx-auto mt-2">
                <div class="pt-2 float-right">
                    <a class="btn btn-sm btn-danger" href={{ route('activity.index') }}>Volver al listado de
                        Actividades<span></span></a>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row pt-2">
            <div class="col col-12">
                <h1>Formulario</h1>
                <form action="{{ route('activity.update', $activity->id) }}" method="POST" class="row g-3 needs-validation">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <label class="form-label">NOMBRE ACTIVIDAD *</label>
                                <span class="text-sm text-danger">
                                    @error('activy_name')
                                        {{ $message }}
                                    @enderror
                                </span>
                                <input type="text" class="form-control" placeholder="Nombre actividad"
                                    name="activy_name" value="{{$activity->activity_name}}">
                            </div>
                            <div class="col">
                                <label class="form-label">FECHA *</label>
                                <span class="text-sm text-danger">
                                    @error('activity_date')
                                        {{ $message }}
                                    @enderror
                                </span>
                                <input type="date" class="form-control" placeholder="fecha del dia"
                                    name="activity_date" value="{{$activity->activity_date}}">
                            </div>
                        </div>

                        <div class="row pt-2">
                            <div class="col">
                                <label class="form-label">HORA INICIO *</label>
                                <span class="text-sm text-danger">
                                    @error('start_time')
                                        {{ $message }}
                                    @enderror
                                </span>
                                <input type="time" pattern="([01]?[0-9]|2[0-3]):[0-5][0-9] (AM|PM)" class="form-control" placeholder="Hora de Inicio"
                                    name="start_time" value="{{$activity->start_time}}">
                            </div>
                            <div class="col">
                                <label class="form-label">HORA FINAL *</label>
                                <span class="text-sm text-danger">
                                    @error('final_hour')
                                        {{ $message }}
                                    @enderror
                                </span>
                                <input type="time" pattern="([01]?[0-9]|2[0-3]):[0-5][0-9] (AM|PM)" class="form-control" placeholder="Hora Final" name="final_hour"  value="{{$activity->final_hour}}">
                            </div>
                        </div>

                        <div class="row pt-2">
                            <div class="col">
                                <label class="form-label">Derechos culturales *</label>
                                <select class="form-control" name="cultural_rights">
                                    @foreach ($culturalRigths as $culturalRigth)
                                        <option value="{{ $culturalRigth->id }}">{{ $culturalRigth->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col">
                                <label class="form-label">Nac *</label>
                                <select class="form-control" name="nac_id">
                                    @foreach ($nacs as $nac)
                                        <option value="{{ $nac->id }}">{{ $nac->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row pt-2">
                            <div class="col">
                                <label class="form-label">Experticias *</label>
                                <select class="form-control" name="expertises">
                                    @foreach ($expertises as $expertise)
                                        <option value="{{ $expertise->id }}">{{ $expertise->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col pt-4">
                                <label class="form-label"></label>
                                @csrf
                                @method('PUT')
                                <button class="btn btn-primary float-right" type="submit">Guardar</button>
                            </div>
                        </div>
                    </div>
                </form>
                @if (session()->has('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                @endif

            </div>
        </div>
    </div>

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
