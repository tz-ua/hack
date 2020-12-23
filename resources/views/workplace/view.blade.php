<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>

<style>
img {
    max-width: 100%;
}

.text-green {
    color: green;
}

.text-red {
    color: red;
}
</style>

<div class="workplace-wrapper">
    <h1>
        Workspace #{{$workplace->id}}:<br>
        <b>{{$workplace->name}}</b>
    </h1>
    <a href="https://6gnyg.csb.app/">View online map</a>
    <br>
    <br>

    @if ($workplace->user)
        <div class="user-wrapper">
            <h2><b>{{ucfirst($workplace->user->name)}}</b></h2>

            <img src="{{$workplace->user->photo}}" alt="{{$workplace->user->name}}">

            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <td>Email</td>
                        <td>{{$workplace->user->email}}</td>
                    </tr>
                    <tr>
                        <td>Phone</td>
                        <td>{{$workplace->user->phone}}</td>
                    </tr>
                    <tr>
                        <td>Position</td>
                        <td>{{$workplace->user->position}}</td>
                    </tr>
                    <tr>
                        <td>Team</td>
                        <td>{{$workplace->user->team}}</td>
                    </tr>
                    <tr>
                        <td>Status</td>
                        <td>
                            <span class="@if ($workplace->user->online) {{'text-green'}} @else {{'text-red'}} @endif">
                                {{$workplace->user->online ? 'online' : 'offline'}}
                            </span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    @endif

    @if (!empty($workplace->user->equipment->isNotEmpty()))
        <div class="user-equipment-wrapper">

            <h3>Equipment of {{$workplace->user->name}}</h3>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Inventory Number</th>
                        <th>Type</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($workplace->user->equipment as $equipment)
                    <tr>
                        <td>{{$equipment->inventory_number}}</td>
                        <td>{{$equipment->type}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    @endif

    @if (!empty($workplace->equipment->isNotEmpty()))
        <div class="workplace-equipment-wrapper">

            <h3>Equipment attached to workplace #{{$workplace->id}}</h3>

            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Inventory Number</th>
                    <th>Type</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($workplace->equipment as $equipment)
                        <tr>
                            <td>{{$equipment->inventory_number}}</td>
                            <td>{{$equipment->type}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
</body>
</html>
