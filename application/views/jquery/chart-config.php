

<script type="text/javascript">
var MONTHS = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];

var randomScalingFactor = function() {
    return Math.round(Math.random() * 100);
    //return 0;
};
var randomColorFactor = function() {
    return Math.round(Math.random() * 255);
};
var randomColor = function(opacity) {
    return 'rgba(' + randomColorFactor() + ',' + randomColorFactor() + ',' + randomColorFactor() + ',' + (opacity || '.3') + ')';
};

var config = {
    type: 'line',
    data: {
        labels: ["January", "February", "March", "April", "May", "June", "July"],
        datasets: [{
            label: "Pemesanan bangku",
            data: [
              <?php foreach($bulan_bangku as $bulan){?>
                <?=$bulan;?>,
              <?php } ?>],
        }, {
            label: "Pemesanan paket",
            data: [
              <?php foreach($bulan_paket as $bulan){?>
                <?=$bulan;?>,
              <?php } ?>
            ],
        }]
    },
    options: {
        responsive: true,
        tooltips: {
            mode: 'label',
            callbacks: {
                // beforeTitle: function() {
                //     return '...beforeTitle';
                // },
                // afterTitle: function() {
                //     return '...afterTitle';
                // },
                // beforeBody: function() {
                //     return '...beforeBody';
                // },
                // afterBody: function() {
                //     return '...afterBody';
                // },
                // beforeFooter: function() {
                //     return '...beforeFooter';
                // },
                // footer: function() {
                //     return 'Footer';
                // },
                // afterFooter: function() {
                //     return '...afterFooter';
                // },
            }
        },
        hover: {
            mode: 'dataset'
        },
        scales: {
            xAxes: [{
                display: true,
                scaleLabel: {
                    show: true,
                    labelString: 'Month'
                }
            }],
            yAxes: [{
                display: true,
                scaleLabel: {
                    show: true,
                    labelString: 'Value'
                },
                ticks: {
                    suggestedMin: 0,
                    suggestedMax: <?=$bulan_bangku[4]+1;?>,
                }
            }]
        }
    }
};

$.each(config.data.datasets, function(i, dataset) {
    dataset.borderColor = randomColor(0.4);
    dataset.backgroundColor = randomColor(0.5);
    dataset.pointBorderColor = randomColor(0.7);
    dataset.pointBackgroundColor = randomColor(0.5);
    dataset.pointBorderWidth = 1;
});

window.onload = function() {
    var ctx = document.getElementById("salesChart").getContext("2d");
    window.myLine = new Chart(ctx, config);
};

$('#randomizeData').click(function() {
    $.each(config.data.datasets, function(i, dataset) {
        dataset.data = dataset.data.map(function() {
            return randomScalingFactor();
        });

    });

    window.myLine.update();
});

$('#changeDataObject').click(function() {
    config.data = {
        labels: ["July", "August", "September", "October", "November", "December"],
        datasets: [{
            label: "Pemesanan Bangku",
            data: [
              <?php foreach($bulan_bangku as $bulan){?>
                <?=$bulan;?>,
              <?php } ?>
            ],
            fill: false,
        }, {
            label: "Pemesanan Paket",
            fill: false,
            data: [
              <?php foreach($bulan_paket as $bulan){?>
                <?=$bulan;?>,
              <?php } ?>
            ],
        }]
    };

    $.each(config.data.datasets, function(i, dataset) {
        dataset.borderColor = randomColor(0.4);
        dataset.backgroundColor = randomColor(0.5);
        dataset.pointBorderColor = randomColor(0.7);
        dataset.pointBackgroundColor = randomColor(0.5);
        dataset.pointBorderWidth = 1;
    });

    // Update the chart
    window.myLine.update();
});






</script>
