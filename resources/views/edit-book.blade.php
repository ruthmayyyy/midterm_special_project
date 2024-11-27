<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Book - {{ $books->title }}</title>
    <link rel="icon" href="{{ asset('icons/tt.ico') }}" type="image/x-icon">
    <style>
        body {
            font-family: 'Georgia', serif;
            background-color: #F5F1E1;
            margin: 0;
            padding: 20px;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #5A4E39;
            color: white;
            padding: 10px 20px;
        }

        .header-left {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
        }

        h1 {
            margin: 0;
            font-size: 2.2em;
            color: #D1A15D;
        }

        p.tagline {
            font-style: italic;
            color: #C1A18D;
            font-size: 1.2em;
            margin-top: 5px;
        }

        .header-buttons {
            display: flex;
            align-items: center;
        }

        .button {
            padding: 10px 15px;
            background-color: #9C7B4F;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 1em;
            transition: background-color 0.3s;
            margin-left: 10px;
        }

        .button:hover {
            background-color: #7F5E38;
        }

        .button-primary {
            background-color: #D1A15D;
        }

        .button-primary:hover {
            background-color: #B68C49;
        }

        main {
            flex: 1;
            margin-top: 20px;
            background-color: #EFE4B0;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #5A4E39;
            font-size: 2em;
            margin-bottom: 20px;
        }

        form {
            background-color: #FFF;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        label {
            font-size: 1.2em;
            color: #5A4E39;
        }

        input[type="text"], input[type="date"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #C1A18D;
            border-radius: 4px;
            font-size: 1em;
        }

        footer {
            text-align: center;
            color: #C1A18D;
            padding: 10px;
            background-color: #5A4E39;
            width: 100%;
        }

        @media (max-width: 768px) {
            body {
                padding: 10px;
            }

            header {
                flex-direction: column;
                align-items: flex-start;
                padding: 15px;
            }

            .header-left h1 {
                font-size: 1.8em;
            }

            p.tagline {
                font-size: 1em;
            }

            .header-buttons {
                margin-top: 10px;
            }

            .button {
                font-size: 0.9em;
                padding: 8px 12px;
                width: 100%;
                margin-left: 0;
                margin-bottom: 10px;
            }

            h2 {
                font-size: 1.5em;
                margin-bottom: 15px;
            }

            form {
                padding: 15px;
            }

            label {
                font-size: 1em;
            }

            input[type="text"], input[type="date"] {
                font-size: 0.9em;
            }

            footer {
                font-size: 0.9em;
            }
        }
    </style>
</head>
<body>
    <header>
        <div class="header-left">
            <h1>Book Keep</h1>
            <p class="tagline">your book keeping buddy.</p>
        </div>
        <div class="header-buttons">
            <form action="{{ route('showAllBooks') }}" method="GET">
                <button type="submit" class="button button-primary">Back to Book List</button>
            </form>
        </div>
    </header>

    <main>
        <h2>Edit Book - {{ $books   ->title }}</h2>
        <form action="{{ route('updateBook', $books->id) }}" method="POST">
            @csrf
            @method('PUT')

            <label for="title">Title</label>
            <input type="text" id="title" name="title" value="{{ $books->title }}" required>

            <label for="author">Author</label>
            <input type="text" id="author" name="author" value="{{ $books->author }}" required>

            <label for="genre">Genre</label>
            <input type="text" id="genre" name="genre" value="{{ $books->genre }}" required>

            <label for="publication_year">Publication Date</label>
            <input type="date" id="publication_year" name="publication_year" value="{{ $books->publication_year ? $books->publication_year->format('Y-m-d') : '' }}" required>

            <button type="submit" class="button button-primary">Save Changes</button>
        </form>
    </main>

    <footer>
        <p>© 2024 Book Keep</p>
        <p>Ruth May Regino</p>
    </footer>
</body>
</html>
