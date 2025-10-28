
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Aulas</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: #f4f6f9;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 1100px;
            margin: auto;
            background: #fff;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 6px 20px rgba(0,0,0,0.1);
        }

        h1 {
            color: #2c3e50;
            margin-bottom: 20px;
        }

        .btn {
            display: inline-block;
            background: #3498db;
            color: #fff;
            padding: 12px 20px;
            border-radius: 10px;
            text-decoration: none;
            font-weight: bold;
            transition: 0.3s;
        }

        .btn:hover {
            background: #2980b9;
            transform: translateY(-3px);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 25px;
            background: #fff;
            border-radius: 10px;
            overflow: hidden;
        }

        table thead {
            background: #3498db;
            color: #fff;
        }

        table th, table td {
            padding: 15px;
            text-align: center;
        }

        table tbody tr:nth-child(even) {
            background: #f8f9fa;
        }

        table tbody tr:hover {
            background: #eaf4fc;
        }

        .actions a {
            margin: 0 5px;
            padding: 6px 12px;
            border-radius: 8px;
            color: #fff;
            font-size: 0.9rem;
            text-decoration: none;
        }

        .edit {
            background: #f39c12;
        }

        .edit:hover {
            background: #d68910;
        }

        .delete {
            background: #e74c3c;
        }

        .delete:hover {
            background: #c0392b;
        }

        footer {
            margin-top: 20px;
            text-align: center;
            color: #888;
            font-size: 0.9rem;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>📚 Lista de Aulas</h1>
        <a href="{{ route('aulas.create') }}" class="btn">➕ Nueva Aula</a>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Ubicación</th>
                    <th>Capacidad</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                    
                </tr>
            </thead>
            <tbody>
                @forelse ($aulas as $aula)
                <tr>
                    <td>{{ $aula->id }}</td>
                    <td>{{ $aula->ubicacion }}</td>
                    <td>{{ $aula->capacidad }}</td>
                    <td>
                        @if($aula->estado == 'disponible')
                            ✅ Disponible
                        @else
                            ❌ Ocupada
                        @endif
                    </td>
                    <td class="actions">
                        <a href="{{ route('aulas.edit', $aula->id) }}" class="edit">✏️ Editar</a>
                        <a href="{{ route('aulas.show', $aula->id) }}" class="btn" style="background:#2ecc71">👁 Ver</a>
                        <form action="{{ route('aulas.destroy', $aula->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="delete">🗑 Eliminar</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5">No hay aulas registradas.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <footer>
        © 2025 Aula Virtual - Proyecto Laravel
    </footer>
</body>
</html>
