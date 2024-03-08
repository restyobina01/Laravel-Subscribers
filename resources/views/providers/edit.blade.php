<!DOCTYPE html>
<html>
<head>
    <title>Edit Subscriber</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .center-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin-top: -100px;
        }

        .form-container {
            width: 70%;
        }
    </style>
</head>
<body>
<div class="center-container">
        <div class="form-container">
            <h1>Edit Provider</h1>
            <form action="{{ route('providers.update', $provider->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="sim_name" class="form-label">SIM Name</label>
                    <input type="text" class="form-control" id="sim_name" name="sim_name" value="{{ $provider->sim_name }}">
                </div>
                <button type="submit" class="btn btn-primary">Update Provider</button>
            </form>
        </div>
</div>
</body>
</html>
