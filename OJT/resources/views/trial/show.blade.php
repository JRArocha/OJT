<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Show Page</title>
    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Latest compiled JQuery -->
    <script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous"></script>
    <!-- Latest compiled Axios -->
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <!-- Latest compiled font awesome -->
    <script src="https://kit.fontawesome.com/941ad23302.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container-fluid ">
        <center>
            <div class="card default text-center w-25 p-2 ">
                <div class="card header bg-light">
                    Student #{{ $preview->id}}
                </div>
                <div class="card body ">
                    Full Name: {{ $preview->name }}
                    <br>
                    Email: {{ $preview->email }}
                    <br>
                    Course: {{ $preview->course }}
                    <br>
                    Section: {{ $preview->section }}
                </div>
            </div>
        </center>
    </div>
</body>
</html>
