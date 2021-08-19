// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';

// Area Chart Example
var ctx = document.getElementById("myAreaChart");
var myLineChart = new Chart(ctx, {
  type: 'line',
  data: {
    labels: ["{{ day[0][0] }}", "{{ day[0][1] }}", "{{ day[0][2] }}", "{{ day[0][3] }}", "{{ day[0][4] }}", "{{ day[0][5] }}", "{{ day[0][6] }}", "{{ day[0][7] }}", "{{ day[0][8] }}", "{{ day[0][9] }}", "{{ day[0][10] }}", "{{ day[0][11] }}", "{{ day[0][12] }}"],
    datasets: [{
      label: "Aid applications",
      lineTension: 0.3,
      backgroundColor: "rgba(2,117,216,0.2)",
      borderColor: "rgba(2,117,216,1)",
      pointRadius: 5,
      pointBackgroundColor: "rgba(2,117,216,1)",
      pointBorderColor: "rgba(255,255,255,0.8)",
      pointHoverRadius: 5,
      pointHoverBackgroundColor: "rgba(2,117,216,1)",
      pointHitRadius: 50,
      pointBorderWidth: 2,
      data: [{{ day[1][0] }}, {{ day[1][1] }}, {{ day[1][2] }}, {{ day[1][3] }}, {{ day[1][4] }}, {{ day[1][5] }}, {{ day[1][6] }}, {{ day[1][7] }}, {{ day[1][8] }}, {{ day[1][9] }}, {{ day[1][10] }}, {{ day[1][11] }}, {{ day[1][12] }}],
    }],
  },
  options: {
    scales: {
      xAxes: [{
        time: {
          unit: 'date'
        },
        gridLines: {
          display: false
        },
        ticks: {
          maxTicksLimit: 7
        }
      }],
      yAxes: [{
        ticks: {
          min: 0,
          max: {{ maxByDay }},
          maxTicksLimit: 10
        },
        gridLines: {
          color: "rgba(0, 0, 0, .125)",
        }
      }],
    },
    legend: {
      display: false
    }
  }
});
