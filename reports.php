<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Sales Chart - MR SEE CHICKEN FOOD</title>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <style>
    body {
      background: #111;
      color: #fff;
      font-family: Arial, sans-serif;
      padding: 20px;
    }
    .chart-container {
      width: 100%;
      max-width: 800px;
      margin: auto;
      background: #222;
      padding: 20px;
      border-radius: 10px;
    }
    canvas {
      width: 100% !important;
      height: 400px !important;
    }
  </style>
</head>
<body>

  <h2>📊 Monthly Sales Chart</h2>
  <div class="chart-container">
    <canvas id="salesChart"></canvas>
  </div>

  <script>
    fetch('get_sales_data.php')
      .then(response => response.json())
      .then(chartData => {
        const ctx = document.getElementById("salesChart").getContext("2d");
        new Chart(ctx, {
          type: "line",
          data: {
            labels: chartData.labels,
            datasets: [{
              label: "Monthly Sales (₦)",
              data: chartData.data,
              borderColor: "#f44336",
              backgroundColor: "rgba(244, 67, 54, 0.2)",
              borderWidth: 2,
              pointBackgroundColor: "#fff",
              pointBorderColor: "#f44336",
              tension: 0.3,
              fill: true,
            }]
          },
          options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
              legend: {
                position: "top",
                labels: { color: "#fff", font: { weight: 'bold' } }
              },
              tooltip: {
                callbacks: {
                  label: function(context) {
                    return `₦${context.parsed.y.toLocaleString()}`;
                  }
                }
              }
            },
            scales: {
              x: {
                ticks: { color: "#fff" },
                grid: { color: "rgba(255,255,255,0.1)" }
              },
              y: {
                ticks: {
                  color: "#fff",
                  callback: value => '₦' + value
                },
                grid: { color: "rgba(255,255,255,0.1)" }
              }
            }
          }
        });
      });
  </script>
</body>
</html>
