<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Список шкафчиков</title>
    <style>
        table {
            width: 90%;
            margin: 20px auto;
            border-collapse: collapse;
            font-family: sans-serif;
        }

        th,
        td {
            border: 1px solid #ccc;
            padding: 8px 12px;
            text-align: center;
        }

        thead {
            background-color: #f2f2f2;
        }

        tbody tr:nth-child(even) {
            background-color: #fafafa;
        }

        .section-header {
            background-color: #d9eaff;
            font-weight: 700;
            text-align: left;
            padding-left: 10px;
            border-top: 2px solid #aaa;
        }
    </style>
</head>

<body>
    <h2 style="text-align: center;">Список активных Почтоматов</h2>
    <div>


        <table>
            <thead>
                <tr>
                    <th colspan="6">Данные серверов</th>
                </tr>
            </thead>
            <tbody>
                <!-- Секция Uzpost -->
                @php
                $uzKeys = array_keys($in_uzpost);
                $uzTotal = count($uzKeys);
                @endphp
                <tr>
                    <td class="section-header" colspan="6">
                        На сервере Uzpost || Количество активных: {{ $uzTotal }}
                    </td>
                </tr>
                @for ($i = 0; $i < $uzTotal; $i +=6)
                    <tr>
                    <td>{{ $uzKeys[$i] ?? '' }}</td>
                    <td>{{ $uzKeys[$i + 1] ?? '' }}</td>
                    <td>{{ $uzKeys[$i + 2] ?? '' }}</td>
                    <td>{{ $uzKeys[$i + 3] ?? '' }}</td>
                    <td>{{ $uzKeys[$i + 4] ?? '' }}</td>
                    <td>{{ $uzKeys[$i + 5] ?? '' }}</td>
                    </tr>
                    @endfor

                    <!-- Секция Lockerpost -->
                    @php
                    $lockerKeys = array_keys($in_lockerpost);
                    $lockerTotal = count($lockerKeys);
                    @endphp
                    <tr>
                        <td class="section-header" colspan="6">
                            На сервере Lockerpost || Количество активных: {{ $lockerTotal }}
                        </td>
                    </tr>
                    @for ($i = 0; $i < $lockerTotal; $i +=6)
                        <tr>
                        <td>{{ $lockerKeys[$i] ?? '' }}</td>
                        <td>{{ $lockerKeys[$i + 1] ?? '' }}</td>
                        <td>{{ $lockerKeys[$i + 2] ?? '' }}</td>
                        <td>{{ $lockerKeys[$i + 3] ?? '' }}</td>
                        <td>{{ $lockerKeys[$i + 4] ?? '' }}</td>
                        <td>{{ $lockerKeys[$i + 5] ?? '' }}</td>
                        </tr>
                        @endfor
            </tbody>
        </table>
    </div>


</body>

</html>