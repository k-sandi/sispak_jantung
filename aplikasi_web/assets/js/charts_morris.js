var morrisCharts = function() {
    Morris.Donut({
        element: 'morris-donut-example',
        data: [
            {label: "Download Sales", value: 20},
            {label: "In-Store Sales", value: 30},
            {label: "Mail-Order Sales", value: 20}
        ],
        colors: ['#95B75D', '#1caf9a', '#FEA223']
    });

}();