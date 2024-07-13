<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Random Bar Chart</title>
  <style>
    body {
      padding: 0;
      margin: 0;
      box-sizing: border-box;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      background-color: #f4f4f4;
    }
  </style>
</head>
<body>
  <canvas id="myCanvas" width="800" height="600"></canvas>
  <script>
    async function fetchData() {
      try {
        const response = await fetch('random.php');
        if (!response.ok) {
          throw new Error('Network response was not ok');
        }

        const data = await response.json(); 
        
        return data; 
      } catch (error) {
        console.error('Error fetching data:', error);
      }
    }

    function drawChart(data) {
      const canvas = document.getElementById('myCanvas');
      const ctx = canvas.getContext('2d');

      const padding = 50;
      const chartHeight = canvas.height - 2 * padding;
      const chartWidth = canvas.width - 2 * padding;

      // Extract names and values
      const labels = data.map(item => item.name);
      const values = data.map(item => item.value);

      // Calculate the maximum value for y-axis scaling
      const maxValue = Math.max(...values);
      const numYTicks = Math.max(5, Math.ceil(maxValue / 50));
      const tickInterval = Math.ceil(maxValue / numYTicks);

      // Draw y-axis
      ctx.beginPath();
      ctx.moveTo(padding, padding);
      ctx.lineTo(padding, canvas.height - padding);
      ctx.stroke();

      // Draw x-axis
      ctx.beginPath();
      ctx.moveTo(padding, canvas.height - padding);
      ctx.lineTo(canvas.width - padding, canvas.height - padding);
      ctx.stroke();

      // Draw y-axis ticks and labels
      for (let i = 0; i <= numYTicks; i++) {
        const y = canvas.height - padding - (i * chartHeight / numYTicks);
        ctx.beginPath();
        ctx.moveTo(padding - 5, y);
        ctx.lineTo(padding + 5, y);
        ctx.stroke();
        ctx.fillText(i * tickInterval, padding - 30, y + 5);
      }

      // Draw bars
      const barWidth = chartWidth / values.length;
      for (let i = 0; i < values.length; i++) {
        const x = padding + i * barWidth;
        const y = canvas.height - padding - (values[i] / maxValue * chartHeight);
        const barHeight = values[i] / maxValue * chartHeight;

        // Random color for each bar
        const r = Math.floor(Math.random() * 255);
        const g = Math.floor(Math.random() * 255);
        const b = Math.floor(Math.random() * 255);
        ctx.fillStyle = `rgb(${r}, ${g}, ${b})`;
        ctx.fillRect(x + 10, y, barWidth - 5, barHeight);

        // Draw labels
        ctx.fillStyle = 'black';
        ctx.fillText(labels[i], x + barWidth / 2 - ctx.measureText(labels[i]).width / 2, canvas.height - padding + 20);
      }
    }

   async function init(){
      const data = await fetchData(); 
      drawChart(data)
    }

    init(); 

  </script>
</body>
</html>
