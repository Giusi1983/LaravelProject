<!-- resources/views/clients/show.blade.php -->
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
        <title>Fatture del Cliente</title>
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
                        <a class="nav-link" href="{{ route('clients.index') }}">Clienti</a>
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
        <h1>Fatture di {{ $client->first_name }} {{ $client->last_name }}</h1>

        <h2>Dettagli Cliente</h2>
        <p>Email: {{ $client->email }}</p>
        <p>Telefono: {{ $client->phone }}</p>
        <p>Indirizzo: {{ $client->address }}</p>

        <h2>Fatture</h2>
        @if($invoices->isEmpty())
            <p>Questo cliente non ha fatture.</p>
        @else
            <table>
                <thead>
                    <tr>
                        <th>Numero Fattura</th>
                        <th>Data Fattura</th>
                        <th>Importo Totale</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($invoices as $invoice)
                        <tr>
                            <td>{{ $invoice->invoice_number }}</td>
                            <td>{{ $invoice->invoice_date }}</td>
                            <td>{{ $invoice->total_amount }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </body>
</html>
