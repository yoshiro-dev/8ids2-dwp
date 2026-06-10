<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

    <style>
        :root {
            --error-color: #2563eb;
            --text-color: #111827;
            --muted-color: #4b5563;
            --border-color: #e5e7eb;
            --button-color: #111827;
        }

        .error-401 {
            --error-color: #dc2626;
        }

        .error-403 {
            --error-color: #7c2d12;
        }

        .error-404 {
            --error-color: #ca8a04;
        }

        .error-419 {
            --error-color: #2563eb;
        }

        .error-429 {
            --error-color: #9333ea;
        }

        .error-500,
        .error-503 {
            --error-color: #374151;
        }

        * {
            box-sizing: border-box;
        }

        body {
            min-height: 100vh;
            margin: 0;
            background: #ffffff;
            color: var(--text-color);
            font-family: Arial, Helvetica, sans-serif;
        }

        .error-page {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px 24px;
        }

        .error-content {
            width: 100%;
            max-width: 920px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 56px;
        }

        .error-text {
            max-width: 460px;
        }

        .error-code {
            margin: 0 0 12px;
            color: var(--error-color);
            font-size: 96px;
            font-weight: 800;
            line-height: 1;
        }

        .error-title {
            margin: 0 0 16px;
            font-size: 32px;
            font-weight: 700;
            line-height: 1.2;
        }

        .error-message {
            margin: 0 0 28px;
            color: var(--muted-color);
            font-size: 18px;
            line-height: 1.6;
        }

        .error-actions {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .error-button {
            display: inline-block;
            padding: 12px 22px;
            border-radius: 8px;
            background: var(--button-color);
            color: #ffffff;
            font-size: 15px;
            font-weight: 700;
            text-decoration: none;
        }

        .error-button:hover {
            background: #374151;
        }

        .error-illustration {
            width: 320px;
            max-width: 40%;
            padding: 28px;
            border: 1px solid var(--border-color);
            border-radius: 8px;
        }

        .error-illustration img {
            display: block;
            width: 100%;
            height: auto;
        }

        @media (max-width: 720px) {
            .error-page {
                padding: 32px 20px;
            }

            .error-content {
                flex-direction: column-reverse;
                gap: 32px;
                text-align: center;
            }

            .error-text {
                max-width: 100%;
            }

            .error-code {
                font-size: 72px;
            }

            .error-title {
                font-size: 26px;
            }

            .error-message {
                font-size: 16px;
            }

            .error-actions {
                justify-content: center;
            }

            .error-illustration {
                width: 220px;
                max-width: 100%;
                padding: 20px;
            }
        }
    </style>
</head>

<body class="@yield('theme', 'error-default')">
    <main class="error-page">
        <section class="error-content">
            <div class="error-text">
                <p class="error-code">@yield('code')</p>

                <h1 class="error-title">@yield('title')</h1>

                <p class="error-message">
                    @yield('message')
                </p>

                <div class="error-actions">
                    <a href="{{ url('/') }}" class="error-button">
                        Volver al inicio
                    </a>
                </div>
            </div>

            @hasSection('image')
                <div class="error-illustration">
                    <img src="@yield('image')" alt="Ilustracion del error">
                </div>
            @endif
        </section>
    </main>
</body>

</html>
