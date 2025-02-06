    <x-layout_admin>
        <x-slot:title>{{ $title }}</x-slot:title>
        <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #f4f4f4;
            }

            table {
                width: 80%;
                margin: 20px auto;
                border-collapse: collapse;
                box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
                border-radius: 8px;
                overflow: hidden;
            }

            th, td {
                padding: 12px;
                text-align: left;
                border: 1px solid #ddd;
            }

            th {
                background-color: #f48ac4;
                color: white;
            }

            tr:nth-child(even) {
                background-color: #f2f2f2;
            }

            tr:hover {
                background-color: #ddd;
            }

            ul {
                margin: 0;
                padding: 0;
                list-style-type: none;
            }

            li {
                padding: 5px;
                background-color: #fee7f1;
                border-radius: 4px;
                margin: 2px 0;
            }
        </style>
        <div>
            <table class="table-auto">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Nama department</th>
                    <th>Deskripsi</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($department as $departments)
                    <tr>
                        <td>{{ $departments->id }}</td>
                        <td>{{ $departments->name }}</td>
                        <td>{{ $departments->desc }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </x-layout_admin>
