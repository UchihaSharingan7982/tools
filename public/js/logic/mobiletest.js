const LINK_MOBILE_FRIENDLY_API = "https://searchconsole.googleapis.com/v1/urlTestingTools/mobileFriendlyTest:run?key=AIzaSyAe7AXnQrH6VxQk6wDlg3E7eJuZn9AywC8"

toastr.options = {
    "closeButton": true,
    "debug": false,
    "newestOnTop": false,
    "progressBar": true,
    "positionClass": "toast-top-right",
    "preventDuplicates": false,
    "onclick": null,
    "showDuration": "300",
    "hideDuration": "1000",
    "timeOut": "5000",
    "extendedTimeOut": "1000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
}

var ic_normal = $('#noCrawl'),
    ic_https = $('#crawlHttps'),
    ic_http = $('#crawlHttp'),
    data_url = $('#tested_url'),
    check_url = $('#generateButton'),
    before_crawl_result = $('#noCrawlResult'),
    after_crawl_result = $('#crawlResult'),
    before_crawl_preview = $('#noCrawlResultPreview'),
    after_crawl_preview = $('#CrawlResultPreview'),
    page_issues = $('#pageIssues'),
    mobile_issues = $('#mobileIssues'),
    result_title = $('#result-title'),
    result_subtitle = $('#result-subtitle'),
    result_date = $('#result-date'),
    image = $('#mobile-image-preview'),
    mobile_indicator_1 = $('#mobileFriendlyIcon')
    mobile_indicator_2 = $('#notMobileFriendlyIcon')

$(document).ready(function() {
    ic_normal.removeClass('d-none')
})

data_url.on('keyup', function() {
    let protocol = getProtocol(data_url)

    console.log(protocol)

    if(protocol == 'http') {
        ic_normal.addClass('d-none')
        ic_http.removeClass('d-none')
        ic_https.addClass('d-none')
    } else if (protocol == 'https') {
        ic_normal.addClass('d-none')
        ic_http.addClass('d-none')
        ic_https.removeClass('d-none')
    } else {
        ic_normal.removeClass('d-none')
        ic_http.addClass('d-none')
        ic_https.addClass('d-none')
    }
})

check_url.click(function() {
        $('#task-sleeping').addClass('d-none')
        $('#task-progress').removeClass('d-none')

        updateProgressBar(0)

        let match =/^(http(s)?|ftp):\/\//
        let url = data_url.val().replace(match,'')

        var newData =
        {
            "url" : 'https://'+url,
            "requestScreenshot": true
        };
        var dataJson = JSON.stringify(newData)

        jqueryRequest = $.ajax({
            url : LINK_MOBILE_FRIENDLY_API,
            type : "POST",
            credentials: 'include',
            header: {
                "Access-Control-Allow-Origin": "*",
            },
            dataType : "JSON",
            contentType: "application/json",
            data : dataJson,
            beforeSend: function() {
                updateProgressBar(50)
                $('#cancel-request-btn')
                    .removeClass('btn-cancel-disabled')
                    .addClass('btn-cancel')
                    .removeAttr('disabled');
            },
            success: function(result) {
                if( result.testStatus.status === 'COMPLETE') {
                    resultdata(result.mobileFriendliness, result.screenshot.data)
                    mobileissues(result.mobileFriendlyIssues)
                    resourceissues(result.resourceIssues)

                    console.log(result)
                    $('#task-progress').addClass('d-none')
                    $('#task-done').removeClass('d-none')
                    updateProgressBar(100)
                    $('#cancel-request-btn')
                        .removeClass('btn-cancel')
                        .addClass('btn-cancel-disabled')
                        .attr('disabled', 'disabled')

                    before_crawl_result.addClass('d-none')
                    after_crawl_result.removeClass('d-none')
                    after_crawl_result.addClass('d-flex')

                    before_crawl_preview.addClass('d-none')
                    after_crawl_preview.removeClass('d-none')
                } else {
                    toastr.error('Error',"An error occurred during the test process. Please try again with http/https or try with another website URL");

                    updateProgressBar(0);
                    $('#cancel-request-btn')
                        .removeClass('btn-cancel')
                        .addClass('btn-cancel-disabled')
                        .attr('disabled', 'disabled')

                    before_crawl_result.removeClass('d-none')
                    after_crawl_result.addClass('d-none')
                    after_crawl_result.removeClass('d-flex')

                    before_crawl_preview.removeClass('d-none')
                    after_crawl_preview.addClass('d-none')

                    $('#task-sleeping').removeClass('d-none')
                    $('#task-progress').addClass('d-none')
                    $('#task-done').addClass('d-none')
                    page_issues.addClass('d-none')
                }
            },
            error: function(e) {
                if (e.statusText === 'abort'){
                    toastr.error('Cencel button clicked','Cancel');
                }else {
                    toastr.error('Error',"An error occurred during the test process. Please try again or try with another website URL");
                }

                updateProgressBar(0);
                $('#cancel-request-btn')
                    .removeClass('btn-cancel')
                    .addClass('btn-cancel-disabled')
                    .attr('disabled', 'disabled')

                before_crawl_result.removeClass('d-none')
                after_crawl_result.addClass('d-none')
                after_crawl_result.removeClass('d-flex')

                before_crawl_preview.removeClass('d-none')
                after_crawl_preview.addClass('d-none')

                $('#task-sleeping').removeClass('d-none')
                $('#task-progress').addClass('d-none')
                $('#task-done').addClass('d-none')
            }
        })
})

function resultdata(titledata, imagedata) {
    let title, subtitle

    mobile_indicator_1.removeClass('d-none')
    mobile_indicator_2.removeClass('d-none')

    if(titledata === 'MOBILE_FRIENDLY') {
        title = 'Page is mobile friendly'
        subtitle = 'This page is easy to use on a mobile device'

        mobile_indicator_2.addClass('d-none')
    } else if(titledata === 'MOBILE_FRIENDLY_TEST_RESULT_UNSPECIFIED') {
        title = 'An Error Occurred While Performing a Test. Please Try Again'
        subtitle = ''

        mobile_indicator_1.addClass('d-none')
        mobile_indicator_2.addClass('d-none')
    } else if(titledata === 'NOT_MOBILE_FRIENDLY') {
        title = 'Page is not mobile friendly'
        subtitle = 'This page is difficult to use on a mobile device'

        mobile_indicator_1.addClass('d-none')
    }

    result_title.html(title)
    result_subtitle.html(subtitle)

    let date_now = formatDate(new Date())
    result_date.html(date_now)

    var baseStr64 = imagedata;

    image.attr('src', "data:image/png;base64," + baseStr64)
}

function resourceissues(issues) {

    page_issues.removeClass('d-none')

    if ( typeof issues === 'undefined' ) {
        page_issues.addClass('d-none')
    } else {
        page_issues.removeClass('d-none')

        delete issueurl
        issueurl = ''

        for (i = 0; i < issues.length; i++) {
            issueurl += '<div class="d-block mb-3"><i class="bx bxs-error mr-3 align-middle" style="color:#FBC918;"></i><span class="text-darkgrey">' +issues[i].blockedResource.url+ '</span></div>';
        }

        let issues_content = $('#page-issues-content')
        issues_content.html(issueurl)
    }
}

function mobileissues(rules) {

    let mob_wider = lang ==='en'? 'Content wider than screen' : 'Konten lebih lebar dari layar';
    let mob_unexpected = lang ==='en'? 'Sorry, we don\'t have a description of the settings for errors.' : 'Maaf, kami tidak memiliki deskripsi tentang pengaturan untuk kesalahan.';
    let mob_plugin = lang ==='en'? 'Uses incompatible plugins' : 'Menggunakan plugin yang tidak cocok   ';
    let mob_viewnot = lang ==='en'? 'Viewport not set' : 'Area pandang tidak diatur';
    let mob_viewnotto = lang ==='en'? 'Viewport not set to "device-width"' : 'Area pandang tidak diatur ke lebar perangkat';
    let mob_text = lang ==='en'? 'Text too small to read' : 'Teks terlalu kecil untuk dibaca';
    let mob_element = lang ==='en'? 'Clickable elements too close together' : 'Elemen yang dapat diklik terlalu berdekatan';
    let mob_fix = lang ==='en'? 'Fix the Following Problems' : 'Perbaiki Masalah Berikut';

    if ( typeof rules === 'undefined' ) {
        mobile_issues.addClass('d-none')
    } else {
        mobile_issues.removeClass('d-none')

        delete issueurl
        issueurl = ''

        for (i = 0; i < rules.length; i++) {

            if( rules[i].rule === 'MOBILE_FRIENDLY_RULE_UNSPECIFIED') {
                issueurl += '<div class="d-block mb-3"><i class="bx bxs-error mr-3 align-middle" style="color:#FF5656;"></i><span class="text-darkgrey">'+ mob_unexpected +'</span></div>';
            } else if( rules[i].rule === 'USES_INCOMPATIBLE_PLUGINS') {
                issueurl += '<div class="d-block mb-3"><i class="bx bxs-error mr-3 align-middle" style="color:#FF5656;"></i><span class="text-darkgrey">'+ mob_plugin +'</span></div>';
            } else if( rules[i].rule === 'CONFIGURE_VIEWPORT') {
                issueurl += '<div class="d-block mb-3"><i class="bx bxs-error mr-3 align-middle" style="color:#FF5656;"></i><span class="text-darkgrey">'+ mob_viewnot +'</span></div>';
            } else if( rules[i].rule === 'FIXED_WIDTH_VIEWPORT') {
                issueurl += '<div class="d-block mb-3"><i class="bx bxs-error mr-3 align-middle" style="color:#FF5656;"></i><span class="text-darkgrey">'+ mob_viewnotto +'</span></div>';
            } else if( rules[i].rule === 'SIZE_CONTENT_TO_VIEWPORT') {
                issueurl += '<div class="d-block mb-3"><i class="bx bxs-error mr-3 align-middle" style="color:#FF5656;"></i><span class="text-darkgrey">'+ mob_wider +'</span></div>';
            } else if( rules[i].rule === 'USE_LEGIBLE_FONT_SIZES') {
                issueurl += '<div class="d-block mb-3"><i class="bx bxs-error mr-3 align-middle" style="color:#FF5656;"></i><span class="text-darkgrey">'+ mob_text +'</span></div>';
            } else if( rules[i].rule === 'TAP_TARGETS_TOO_CLOSE') {
                issueurl += '<div class="d-block mb-3"><i class="bx bxs-error mr-3 align-middle" style="color:#FF5656;"></i><span class="text-darkgrey">'+ mob_element +'</span></div>';
            }

            let issues_content = $('#mobile-issues-content')
            issues_content.html(issueurl)
        }
    }
}

function formatDate(date) {
    const monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];

    return `Tested on ${date.getDate()} ${monthNames[date.getMonth()]} ${date.getFullYear()} at ${date.getHours()}:${date.getMinutes()}`
}

function updateProgressBar(value) {
    $('#progress-bar-loader')
        .css('width', `${value}%`)
        .attr('aria-valuenow', value)
        .html(value+'%')
}

function checkUrl(url) {
    try {
        let _url = new URL(url)
        return _url.protocol === 'https:' || _url.protocol === 'http:';
    } catch (e) {
        return false
    }
}

function getProtocol(url) {
    try {
        let _url = new URL(url)
        return _url.protocol;
    } catch (e) {
        return false
    }
}

$('#cancel-request-btn').click(function () {
    jqueryRequest.abort();
    updateProgressBar(0);
    $('#cancel-request-btn')
        .removeClass('btn-cancel')
        .addClass('btn-cancel-disabled')
        .attr('disabled', 'disabled')

    before_crawl_result.removeClass('d-none')
    after_crawl_result.addClass('d-none')
    after_crawl_result.removeClass('d-flex')

    before_crawl_preview.removeClass('d-none')
    after_crawl_preview.addClass('d-none')

    $('#task-sleeping').removeClass('d-none')
    $('#task-progress').addClass('d-none')
    $('#task-done').addClass('d-none')
})