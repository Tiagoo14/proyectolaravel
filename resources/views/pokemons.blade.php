<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Pokémon Chart</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        /* Fuente moderna */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #e0f7fa, #fff);
            color: #2c3e50;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            min-height: 100vh;
            margin: 0;
            transition: background 0.3s, color 0.3s;
        }

        /* Dark mode */
        @media (prefers-color-scheme: dark) {
            body {
                background: linear-gradient(135deg, #1c1c1c, #2c3e50);
                color: #ecf0f1;
            }
            .chart-container {
                background: #2b2b2b;
                box-shadow: 0 6px 20px rgba(0,0,0,0.6);
            }
        }

        h1 {
            margin-bottom: 25px;
            font-size: 2rem;
            text-align: center;
            text-shadow: 1px 1px 2px rgba(0,0,0,0.1);
        }

        .chart-container {
            background: #fff;
            padding: 30px;
            border-radius: 25px;
            box-shadow: 0 8px 25px rgba(0,0,0,0.15);
            width: 85%;
            max-width: 900px;
            transition: background 0.3s, box-shadow 0.3s;
        }

        canvas {
            max-width: 100%;
        }

        footer {
            margin-top: 30px;
            font-size: 0.9rem;
            color: #777;
        }

        @media (prefers-color-scheme: dark) {
            footer { color: #aaa; }
        }
    </style>
</head>
<body>
    <h1>📊 Distribución de Pokémon por Tipo</h1>
    <div class="chart-container">
        <canvas id="pokemonChart"></canvas>
    </div>
    <footer>Datos obtenidos desde la <a href="https://pokeapi.co/" target="_blank">PokeAPI</a></footer>

    <script>
        async function loadPokemonData() {
            const response = await fetch("https://pokeapi.co/api/v2/type");
            const data = await response.json();

            const labels = [];
            const counts = [];

            for (let type of data.results) {
                labels.push(type.name.charAt(0).toUpperCase() + type.name.slice(1));
                const typeResponse = await fetch(type.url);
                const typeData = await typeResponse.json();
                counts.push(typeData.pokemon.length);
            }

            const ctx = document.getElementById('pokemonChart');
            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Número de Pokémon',
                        data: counts,
                        backgroundColor: labels.map((_, i) => `hsl(${i * 25}, 70%, 60%)`),
                        borderColor: '#2c3e50',
                        borderWidth: 1,
                        borderRadius: 10
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            display: false
                        },
                        title: {
                            display: true,
                            text: 'Pokémon por Tipo',
                            font: {
                                size: 20,
                                weight: 'bold'
                            },
                            color: '#34495e'
                        },
                        tooltip: {
                            backgroundColor: 'rgba(0,0,0,0.7)',
                            titleFont: { size: 14 },
                            bodyFont: { size: 13 }
                        }
                    },
                    scales: {
                        x: {
                            ticks: {
                                font: { size: 13 }
                            }
                        },
                        y: {
                            beginAtZero: true,
                            ticks: {
                                stepSize: 20,
                                font: { size: 13 }
                            }
                        }
                    }
                }
            });
        }

        loadPokemonData();
    </script>
</body>
</html>
