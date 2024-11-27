<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books</title>
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

        .button-view {
            background-color: #5B8C5A;
        }

        .button-view:hover {
            background-color: #4E6F4A;
        }

        .button-edit {
            background-color: #A6824B;
        }

        .button-edit:hover {
            background-color: #8D693D;
        }

        .button-delete {
            background-color: #9E5F58;
        }

        .button-delete:hover {
            background-color: #7F4B44;
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

        section {
            margin-top: 20px;
        }

        .content {
            margin-bottom: 10px;
        }

        footer {
            text-align: center;
            color: #C1A18D;
            padding: 10px;
            background-color: #5A4E39;
            width: 100%;
        }

        .no-books {
            color: #888;
            font-style: italic;
            text-align: center;
        }

        @media (max-width: 768px) {
            body {
                padding: 10px;
            }

            header {
                flex-direction: column;
                align-items: flex-start;
                padding: 10px;
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
                margin-left: 0;
            }

            h2 {
                font-size: 1.5em;
            }

            .content button {
                width: 100%;
                margin-bottom: 10px;
            }

            .content button {
                width: 100%;
                margin-bottom: 10px;
            }

            .content button:last-child {
                margin-bottom: 0;
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
            <form action="{{ route('createBook') }}" method="GET">
                <button type="submit" class="button button-primary">Add New Book</button>
            </form>
        </div>
    </header>

    <main>
        <h2>All Books</h2>
        <section>
            @if ($books->isEmpty())
                <p class="no-books">no books added yet...</p>
            @else
                @foreach ($books as $book)
                    <div class="content">
                        <form action="{{ route('readBook', $book->id) }}" method="GET" style="display:inline;">
                            <button type="submit" class="button button-view">
                                <p><b>{{ $book->title }}</b> - <i>By {{ $book->author }}</i></p>
                            </button>
                        </form>
                        <form action="{{ route('editBook', $book->id) }}" method="GET" style="display:inline;">
                            <button type="submit" class="button button-edit">Edit</button>
                        </form>
                        <!-- Delete button with confirmation -->
                        <a href="javascript:void(0);" 
                           onclick="if(confirm('Are you sure you want to delete this book?')) { document.getElementById('delete-form-{{ $book->id }}').submit(); }">
                            <button class="button button-delete">Delete</button>
                        </a>
                        <!-- Hidden Delete Form -->
                        <form id="delete-form-{{ $book->id }}" action="{{ route('deleteBook', $book->id) }}" method="POST" style="display:none;">
                            @csrf
                            @method('DELETE')
                        </form>
                    </div>
                @endforeach
            @endif
        </section>
    </main>

    <footer>
        <p>© 2024 Book Keep</p>
        <p>Ruth May Regino</p>
    </footer>
</body>
</html>
