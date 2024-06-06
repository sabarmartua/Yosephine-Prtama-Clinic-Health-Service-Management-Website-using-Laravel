<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Komentar</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Arial', sans-serif;
        }
        .container {
            margin-top: 50px;
        }
        .form-group label {
            font-weight: bold;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .alert-warning {
            text-align: center;
            margin-top: 20px;
        }
        h2 {
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        @auth
        @if(auth()->user()->role === 'admin' || auth()->user()->role === 'pasien')
        <h2>Edit Reply</h2>
        <form action="{{ route('replies.update', $reply) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="body">Body</label>
                <textarea class="form-control" name="body" id="body" rows="3" required>{{ $reply->body }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
        @endif
        @endauth

        @guest
        <div class="alert alert-warning">Please login to access this section.</div>
        @endguest
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.6.0/js/bootstrap.min.js"></script>
</body>

</html>
