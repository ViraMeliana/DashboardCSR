$(function () {
    'use strict';

    var isRtl = $('html').attr('data-textdirection') === 'rtl', select = $('.select2');

    var cardBlock = {
        message:
            '<div class="d-flex justify-content-center align-items-center"><p class="mr-50 mb-0">Please wait...</p><div class="spinner-grow spinner-grow-sm text-white" role="status"></div> </div>',
        css: {
            backgroundColor: 'transparent',
            color: '#fff',
            border: '0'
        },
        overlayCSS: {
            opacity: 0.5
        }
    }

    var areaChartEl = document.querySelector('#tjsl-statistics-chart'),
        areaCard = $('#tjsl-statistics-chart'),
        areaForm = $('#tjsl-statistic-form');

    var areaChartConfig = {
        chart: {
            height: 400,
            type: 'area',
            parentHeightOffset: 0,
            toolbar: {
                show: false
            }
        },
        dataLabels: {
            enabled: false
        },
        stroke: {
            curve: 'smooth'
        },
        legend: {
            show: true,
            position: 'top',
        },
        grid: {
            xaxis: {
                lines: {
                    show: true
                }
            }
        },
        series: [],
        noData: {},
        tooltip: {
            shared: false
        },
        yaxis: {
            opposite: isRtl
        }
    };

    if (typeof areaChartEl !== undefined && areaChartEl !== null) {
        var areaChart = new ApexCharts(areaChartEl, areaChartConfig)
        areaChart.render();

        chartFetch(areaCard, areaForm)
    }

    function chartUpdate(data) {
        if (data) {
            if (data.category) {
                areaChart.updateOptions({
                    xaxis: {
                        categories: data.category
                    }
                })
            }
            if (data.series) {
                areaChart.updateSeries(data.series)
            }
        }
    }

    function chartFetch(cardSection, form) {

        $.ajax({
            type: 'POST',
            url: form.data('action'),
            data: form.serialize(),
            beforeSend: function () {
                cardSection.block(cardBlock);
            },
            success: function (data) {
                if (data !== 'failed') {
                    chartUpdate(JSON.parse(data))
                    cardSection.unblock();
                } else {
                    console.log('error')
                }
            }
        })
    }
});
