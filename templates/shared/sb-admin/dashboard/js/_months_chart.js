// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';

// Bar Chart Example
var ctx = document.getElementById("myBarChart");
var myLineChart = new Chart(ctx, {
  type: 'bar',
  data: {
    labels: ["{{ month[0][0] }}", "{{ month[0][1] }}", "{{ month[0][2] }}", "{{ month[0][3] }}", "{{ month[0][4] }}", "{{ month[0][5] }}", "{{ month[0][6] }}"],
    datasets: [{
      label: "Aid Applications",
      backgroundColor: "rgba(2,117,216,1)",
      borderColor: "rgba(2,117,216,1)",
      data: [{{ month[1][0] }}, {{ month[1][1] }}, {{ month[1][2] }}, {{ month[1][3] }}, {{ month[1][4] }}, {{ month[1][5] }}, {{ month[1][6] }}],
    }],
  },
  options: {
    scales: {
      xAxes: [{
        time: {
          unit: 'month'
        },
        gridLines: {
          display: false
        },
        ticks: {
          maxTicksLimit: 6
        }
      }],
      yAxes: [{
        ticks: {
          min: 0,
          max: {{ maxByMonth }},
          maxTicksLimit: 5
        },
        gridLines: {
          display: true
        }
      }],
    },
    legend: {
      display: false
    }
  }
});
