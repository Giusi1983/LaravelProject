<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tutti i Clienti</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        /* Stile personalizzato per una tabella più piacevole */
        body {
            background-color: #f4f7fa;
            font-family: 'Arial', sans-serif;
        }
        .container {
            margin-top: 30px;
        }
        .navbar{
        background-color: #007bff;
        }
        .navbar-brand, .navbar-nav .nav-link {
            color: white !important;
        }
        .table th, .table td {
            vertical-align: middle;
        }
        .table-hover tbody tr:hover {
            background-color: #f1f1f1;
        }
        .btn-custom {
            background-color: #007bff;
            color: white;
        }
        .btn-custom:hover {
            background-color: #0056b3;
            color: white;
        }
        .card-header {
            background-color: #007bff;
            color: white;
        }
    </style>
</head>
<body>
    <!-- Barra di navigazione -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Gestione CRM</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                    </li>
                </ul>
                <!-- Form di logout invisibile -->
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </div>
    </nav>
    <div class="min-h-screen bg-gray-100">
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h2>Tutti i Clienti</h2>
            </div>
            <div class="card-body">
                @if($clients->isEmpty())
                    <p class="text-center">Non ci sono clienti disponibili.</p>
                @else
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nome</th>
                                <th>Cognome</th>
                                <th>Email</th>
                                <th>Telefono</th>
                                <th>Azioni</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($clients as $client)
                                <tr id="client-row-{{ $client->id }}">
                                    <td>{{ $client->id }}</td>
                                    <td>{{ $client->first_name }}</td>
                                    <td>{{ $client->last_name }}</td>
                                    <td>{{ $client->email }}</td>
                                    <td>{{ $client->phone }}</td>
                                    <td>
                                        <a href="{{ route('clients.show', $client->id) }}" class="btn btn-info btn-sm">Fatture</a>
                                        <button class="btn btn-danger btn-sm delete-client-btn" data-id="{{ $client->id }}">Elimina</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </div>

    <!-- Script di Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Script AJAX per l'eliminazione dei clienti -->
    <script>
        $(document).ready(function() {
            // Funzione per gestire l'eliminazione del cliente
            $('.delete-client-btn').on('click', function() {
                const clientId = $(this).data('id');  // Ottiene l'ID del cliente

                if (confirm("Sei sicuro di voler eliminare questo cliente?")) {
                    $.ajax({
                        url: '/clients/' + clientId,  // Rotta di eliminazione
                        type: 'DELETE',
                        data: {
                            _token: '{{ csrf_token() }}'  // Token CSRF per la sicurezza
                        },
                        success: function(response) {
                            if (response.success) {
                                // Rimuove la riga dalla tabella
                                $('#client-row-' + clientId).remove();
                                alert(response.message);
                            } else {
                                alert(response.message);
                            }
                        },
                        error: function() {
                            alert("Si è verificato un errore durante l'eliminazione.");
                        }
                    });
                }
            });
        });
    </script>
</body>
</html>
