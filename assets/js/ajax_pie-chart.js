


function generateChart(canvas, label, chartType, entries) {
  const statuses = Object.keys(entries);
  const statusCounts = Object.values(entries);

  const data = {
  labels: statuses,
  datasets: [{
    label: label,
    data: statusCounts,
    backgroundColor: [
      'rgb(246, 67, 109)',
      'rgb(54, 162, 235)',
      'rgb(49, 182, 80)',
      'rgb(90, 96, 100)'
    ],
    hoverOffset: 4
  }]
};

  const config = {
  type: chartType,
  data: data,
};

 new Chart(canvas, config);
}

async function getData(canvas, label, chartType, url) {
  let response = await fetch(url);

  if (response.status == 200) {
    let object = await response.json();
    let entries = Object.fromEntries(object);

    generateChart(canvas, label, chartType, entries);
  }
}

// line chart
const canvas = document.querySelector("#pie").getContext("2d");

// line chart
getData(
  canvas,
  "Monthly Customer request",
  "doughnut",
  `./controllers/ajax_retrieve_rows.php?chart`
);
