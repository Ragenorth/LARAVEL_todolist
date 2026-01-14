<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Todo List</title>

    <style>
        body {
            margin: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: 'Segoe UI', sans-serif;
            background: linear-gradient(135deg, #667eea, #764ba2);
        }

        .card {
            background: white;
            width: 360px;
            padding: 25px;
            border-radius: 14px;
            box-shadow: 0 15px 30px rgba(0,0,0,.25);
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        form {
            display: flex;
            gap: 8px;
            margin-bottom: 20px;
        }

        input {
            flex: 1;
            padding: 10px;
            border-radius: 6px;
            border: 1px solid #ccc;
            font-size: 14px;
        }

        button {
            background: #667eea;
            color: white;
            border: none;
            padding: 10px 14px;
            border-radius: 6px;
            cursor: pointer;
        }

        button:hover {
            background: #5a67d8;
        }

        ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        li {
            background: #f6f6f6;
            padding: 10px;
            border-radius: 6px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 8px;
        }

        .delete {
            color: #e53e3e;
            text-decoration: none;
            font-weight: bold;
        }

        .delete:hover {
            color: #c53030;
        }

        .empty {
            text-align: center;
            color: #888;
        }
    </style>
</head>
<body>

<div class="card">
    <h1>📝 Todo List</h1>

    <form method="POST" action="{{ route('todos.store') }}">
        @csrf
        <input type="text" name="task" placeholder="Add todo..." required>
        <button type="submit">Add</button>
    </form>
        <form action="{{ route('todos.clear') }}" method="GET">
            <button type="submit">Refresh / Clear Session</button>
        </form>

    <ul>
        @forelse ($todos as $index => $todo)
            <li>
                {{ $todo }}
                <a href="{{ route('todos.delete', $index) }}">❌</a>
            </li>
        @empty
            <li>No todos yet</li>
        @endforelse
    </ul>
</div>

</body>
</html>

