<script>
    var ctx = document.getElementById('dashedChart').getContext('2d');

    var data = {
        labels: ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12'],
        datasets: [
            {

                borderColor: 'rgba(0, 0, 0, 0.1)', // Black with opacity
                borderWidth: 3,

                borderCapStyle: 'round',
                lineTension: 0.3,
                borderDash: [5, 5], // Dashed line style
                pointRadius: 0,      // Set point radius to 0 (hide data points)
                pointHoverRadius: 0, // Set point hover radius to 0 (hide data points on hover)
                data: [30000, 18000, 20000, 27000, 20000, 12000, 23000, 34000, 30000, 45000, 32000, 40000],


            },
            {

                borderColor: 'blue', // Black with higher opacity
                borderWidth: 3,
                borderCapStyle: 'round',
                lineTension: 0.3,
                // borderDash: [5, 5], // Dashed line style
                pointRadius: 0,      // Set point radius to 0 (hide data points)
                pointHoverRadius: 0, // Set point hover radius to 0 (hide data points on hover)
                data: [20000, 25000, 20000, 11000, 11000, 22000, 42000, 28000, 40000, 48000, 30000, 32000],
            },
        ],
    };

    var options = {
        scales: {
            x: {
                title: {
                    display: false,

                },
                grid: {
                    display: false, // Hide x-axis grid lines
                },
                ticks: {
                    fontSize: 12,
                    color: '#8D8D8D',  // Set the font size for x-axis labels (1 to 12)
                },
            },
            y: {
                title: {
                    display: false, // Hide y-axis title
                },
                ticks: {
                    callback: function (value, index, values) {
                        return "$" + value / 1000 + 'k'; // Format y-axis labels as '10k', '20k', etc.
                    },
                    stepSize: 10000, // Step size between ticks
                    fontSize: 12,
                    color: '#8D8D8D',    // Set the font size for y-axis labels ("10k")
                },
                grid: {
                    display: true, // Hide y-axis grid lines
                },
            },
        },
        plugins: {
            legend: {
                display: false, // Hide the legend
            },
            title: {
                display: true,
                text: 'Islamabad Institute Of Arts And Applied Sciences',
                position: 'top', // Position title at the top
                align: 'end',    // Align title to the right
                color: '#000',  // Set the title color to green
                font: {
                    size: 12,      // Set the font size of the title to 20px
                }  // Set the font size to 200
            },
        },
    };

    var dashedChart = new Chart(ctx, {
        type: 'line',
        data: data,
        options: options,
    });
    const cta = document.getElementById('stackedAreaChart').getContext('2d');

    const dat = {
        labels: ['', '', '', '', '', '', ''],
        datasets: [
            {
                backgroundColor: '#A9DFD8', // Blue
                borderColor: '#40BBAB',
                borderWidth: 1,
                data: [90, 40, 50, 30, 40, 30, 90],
                fill: 'start', // Fill the area under the line
            },
            {
                backgroundColor: '#F06EE1', // Red
                borderColor: '#F06EE1',
                borderWidth: 1,
                data: [90, 40, 50, 30, 40, 30, 90],
                fill: 'start', // Fill the area under the line
            },
        ],
    };

    const option = {
        scales: {
            x: {
                stacked: true,
            },
            y: {
                stacked: true,
                title: {
                    display: false,
                },
                grid: {
                    display: false, // Hide x-axis grid lines
                },
                ticks: {
                    display: false,
                    // Set the font size for x-axis labels (1 to 12)
                },
            },
        },
        plugins: {
            legend: {
                display: false, // Hide the legend
            },
        },
    };

    const stackedAreaChart = new Chart(cta, {
        type: 'line', // Use 'line' type for stacked area chart
        data: dat,
        options: option,
    });

</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

<!-- code for data table  -->
<script>

    $(document).ready(function () {
        var table = $('#myTable').DataTable({
            paging: $('#myTable tbody tr').length > 6, // Show pagination if more than 10 rows
            searching: false, // Disable search functionality
            select: {
                style: 'os' // Enable row selection
            },

        });
    });
    $(document).ready(function () {
        var table = $('#myTable2').DataTable({
            paging: $('#myTable2 tbody tr').length > 6, // Show pagination if more than 10 rows
            searching: false, // Disable search functionality
            select: {
                style: 'os' // Enable row selection
            },

        });
    });
    $(document).ready(function () {
        var table = $('#myTable3').DataTable({
            paging: $('#myTable3 tbody tr').length > 6, // Show pagination if more than 10 rows
            searching: false, // Disable search functionality
            select: {
                style: 'os' // Enable row selection
            },

        });
    });

    $(document).ready(function () {
        var table = $('#myTable4').DataTable({
            paging: $('#myTable4 tbody tr').length > 6, // Show pagination if more than 10 rows
            searching: false, // Disable search functionality
            select: {
                style: 'os' // Enable row selection
            },

        });
    });


</script>
