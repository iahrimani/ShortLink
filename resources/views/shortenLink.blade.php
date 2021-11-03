<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Генератор коротких ссылок</title>
</head>
<body>

<div class="container">
    <br>
    <h1>Привет, давай сократим твою ссылку !</h1>
    <br>
    <div class="card">
        <div class="card-header">
            <form method="POST" action="{{ route('generate.shorten.link.post') }}">
                @csrf
                <div class="input-group mb-3">
                    <input type="text" name="link" class="form-control" placeholder="URL">
                    <div class="input-group-append">
                        <button class="btn btn-success" type="submit">Сократить ссылку</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-sm">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Сокращенная ссылка</th>
                    <th>Ссылка</th>
                    <th>Переходов</th>
                </tr>
                </thead>
                <tbody>
                @foreach($shortLinks as $link)
                    <tr>
                        <td>{{ $link->id }}</td>
                        <td>
                            <a href="{{ route('shorten.link', $link->code) }}"
                               target="_blank">{{ route('shorten.link', $link->code) }}</a>
                        </td>
                        <td>{{ $link->link }}</td>
                        <td>{{ $link->count }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <br>
        </div>
    </div>
</div>

</body>
</html>
