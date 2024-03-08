<!-- resources/views/providers/index.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Providers</title>
    <link rel="stylesheet" href="//cdn.datatables.net/2.0.1/css/dataTables.dataTables.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
         /* Center the table header */
         #myTable thead th {
            text-align: center;
        }
        #myTable tbody td {
            text-align: center;
        }
        table {
            border-collapse: collapse;
            width: 80%;
            margin: 0 auto;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #ddd;
        }
        h1 {
            margin-top: 10px;
            text-align: center;
        }
        /* Modal styles */
        .modal {
            display: none; /* Hide modal by default */
            position: fixed; /* Position the modal */
            z-index: 1; /* Ensure it appears on top of other elements */
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto; /* Enable scrolling if needed */
            background-color: rgba(0,0,0,0.4); /* Black background with opacity */
        }

        .modal-content {
            top: -100px;
            background-color: #fefefe;
            margin: 15% auto; /* Center modal vertically and horizontally */
            padding: 20px;
            border: 1px solid #888;
            width: 30%; /* Adjust width as needed */
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
        input[type=text], input[type=number] {
            width: 100%;
            padding: 7px 14px;
        }
    </style>
</head>
<body>
    <h1>Providers</h1>
        @if(session('status'))
            <div id="alertMessage" class="alert alert-{{ session('status') }}" style="width: 40%; margin: 0 auto;">
                {{ session('message') }}
            </div>
        @endif
    <div style="text-align: right; padding-right: 115px; margin-top: 50px; margin-bottom: -40px">
        <button onclick="showModal()">Add Provider</button>
        <a href="{{ route('subscribers.index') }}"><button>Go to Subscribers</button></a>
    </div>
    <div class="container mt-5">
        <table id="myTable" style="width: 100%">
            <thead>
                <tr>
                    <th>SIM ID</th>
                    <th>SIM Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($providers as $provider)
                <tr>
                    <td>{{ $provider->id }}</td>
                    <td>{{ $provider->sim_name }}</td>
                    <td>
                        <a href="{{ route('providers.edit', $provider->id) }}" class="btn btn-primary">Edit</a>
                        <form action="{{ route('providers.destroy', $provider->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Modal -->
    <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()" style="text-align: right">&times;</span>
            <form action="{{ route('providers.store') }}" method="POST">
                @csrf
                <label for="sim_name">Sim Name:</label><br>
                <input type="text" id="sim_name" name="sim_name"><br><br>
                <input type="submit" value="Submit">
            </form>
        </div>
    </div>

    <script>
        // Get the modal
        var modal = document.getElementById("myModal");

        // Get the button that opens the modal
        var btn = document.querySelector("button");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks the button, open the modal 
        btn.onclick = function() {
            modal.style.display = "block";
        }

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }

        // Function to show modal
        function showModal() {
            modal.style.display = "block";
        }

        // Function to close modal
        function closeModal() {
            modal.style.display = "none";
        }
    </script>

    <!-- Add this script at the end of your HTML body -->
    <script>
        // Function to hide the alert message after 3 seconds
        setTimeout(function() {
            var alertMessage = document.getElementById('alertMessage');
            alertMessage.style.display = 'none';
        }, 3000); // 3000 milliseconds = 3 seconds
    </script>
    
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/2.0.1/js/dataTables.min.js"></script>
    <script>
        let table = new DataTable('#myTable');
    </script>
</body>
</html>
