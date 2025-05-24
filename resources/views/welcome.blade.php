<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Список активных Почтоматов</title>
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
            text-align: center;
            padding-left: 10px;
            border-top: 2px solid #aaa;
        }

        .btn {
            padding: 15px;
            background: green;
            color: white;
            border: none;
            border-radius: 10px;
            display: inline-flex;
            align-items: center;

            &:hover {
                background: darkgreen;
            }

            &:disabled {
                background: gray;
                cursor: not-allowed;
                color: #ccc;
            }
        }

        .centered {
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="centered">
        <h2 style="font-weight: bold;">Список активных Почтоматов</h2>
        <button class="btn" id="refreshBtn" onclick="refreshPage()" disabled>Подождите 60 сек</button>
    </div>

    <div>
        <table>
            <thead>
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

    <script>
        const button = document.getElementById('refreshBtn');
        let cooldown = 60;

        function updateButton() {
            if (cooldown > 0) {
                button.innerText = `Подождите ${cooldown} сек`;
                button.disabled = true;
            } else {
                button.innerText = 'Обновить страницу';
                button.disabled = false;
            }
        }

        function refreshPage() {
            location.reload();
        }

        function startCooldown() {
            updateButton();
            const interval = setInterval(() => {
                cooldown--;
                updateButton();
                if (cooldown <= 0) clearInterval(interval);
            }, 1000);
        }

        startCooldown();
    </script>
</body>

</html>