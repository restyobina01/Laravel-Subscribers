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
        <h1>Edit Subscriber</h1>
        <form action="{{ route('subscribers.update', $subscriber->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="fname" class="form-label">First Name</label>
                <input type="text" class="form-control" id="fname" name="fname" value="{{ $subscriber->fname }}">
            </div>
            <div class="mb-3">
                <label for="lname" class="form-label">Last Name</label>
                <input type="text" class="form-control" id="lname" name="lname" value="{{ $subscriber->lname }}">
            </div>
            <div class="mb-3">
                <label for="provider_id" class="form-label">Provider Name</label>
                <select id="provider_id" name="provider_id" class="form-select">
                    @foreach($providers as $providerId => $simName)
                        <option value="{{ $providerId }}" {{ $subscriber->provider_id == $providerId ? 'selected' : '' }}>{{ $simName }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="number" class="form-label">Number</label>
                <input type="number" class="form-control" id="number" name="number" value="{{ $subscriber->number }}">
            </div>
            <button type="submit" class="btn btn-primary">Update Subscriber</button>
        </form>
    </div>
</div>

</body>
</html>
