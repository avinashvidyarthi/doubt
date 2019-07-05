<?php
include('header.php');
if (!isset($_SESSION['uid']))
    header('location:login.php');
?>

<div class="container" style="margin-top: 20px">
    <div class="row">
        <div class="col-md-10 results">

        </div>
    </div>
    <center>
        <div class="loading" style="margin: auto;">

        </div>
    </center>
</div>

<?php
include('footer.php');
?>
<script type="text/javascript">
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'UA-116679066-3');

    var isLoading = false;
    var start = 0;
    var limit = 2;
    var reachedMax = false;

    $(window).scroll(function() {
        console.log("scrolltop: " + $(window).scrollTop() + " value: " + ($(document).height() - $(window).height() - 56));
        if (($(window).scrollTop() == $(document).height() - $(window).height() - 56) || ($(window).scrollTop() == $(document).height() - $(window).height())) {

            if (!isLoading) {
                console.log("fetching...");
                getData();
            }
        }

    });

    $(document).ready(function() {
        getData();
    });

    function getData() {
        isLoading = true;
        if (reachedMax)
            return;

        $.ajax({
            url: 'data.php',
            method: 'POST',
            dataType: 'text',
            data: {
                getData: 1,
                start: start,
                limit: limit
            },
            success: function(response) {
                isLoading = false;
                $(".loading").html("");
                if (response == "reachedMax")
                    reachedMax = true;
                else {
                    start += limit;
                    $(".results").append(response);
                }
            },
            beforeSend: function() {
                $(".loading").html("<img src='images/loading.gif' style='margin: auto'>");
            }
        });
    }
</script>